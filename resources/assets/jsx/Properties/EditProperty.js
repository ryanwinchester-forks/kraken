import React from 'react/addons';
import Property from './Property.js';

var EditProperty = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        return {
            id: null,
            name: null,
            key: null,
            label: null,
            required: null,
            defaultValue: null,
            typeId: null,
            type: [],
            types: []
        }
    },

    componentDidMount: function() {
        this.getFormFromServer();
    },

    getFormFromServer: function () {
        $.get(this.props.source, (result) => {
            if (this.isMounted()) {
                this.setState({
                    id: result.id,
                    name: result.name,
                    key: result.key,
                    label: result.label,
                    required: result.required,
                    defaultValue: result.default,
                    type: result.type,
                    typeId: result.type.id
                });
            }
        });

        $.get('/api/property-types/', (result) => {
            if (this.isMounted()) {
                this.setState({
                    types: result.data
                });
            }
        });
    },

    getTypes: function() {
        const { types } = this.state;

        return types.map( type => {
            return (
                <option key={type.id} value={type.id}>
                    {type.name}
                </option>
            );
        });
    },

    render: function() {
        const { name } = this.state;
        const { key } = this.state;
        const { label } = this.state;
        const { required } = this.state;
        const defaultValue = this.state.default;

        return (
            <div>
                <h1>Property</h1>
                <form>
                    <div className="form-group">
                        <label>Type:</label>
                        <select name="type" valueLink={this.linkState('typeId')} className="form-control">
                            {this.getTypes()}
                        </select>
                    </div>
                    <div className="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" valueLink={this.linkState('name')} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>Key:</label>
                        <input type="text" name="key" valueLink={this.linkState('key')} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>Label:</label>
                        <input type="text" name="label" valueLink={this.linkState('label')} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>Default value:</label>
                        <input type="text" name="default" valueLink={this.linkState('defaultValue')} className="form-control" />
                    </div>
                    <div className="checkbox">
                        <label>
                            <input type="checkbox" name="required" valueLink={this.linkState('required')} />
                            Required
                        </label>
                        <span className="help-block">Make this field default to a required field when included in a form.</span>
                    </div>
                    <div className="form-group">
                        <button type="submit" className="btn btn-primary">Save</button>&nbsp;
                        <a href="/forms" className="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        );
    }

});

export default EditProperty;