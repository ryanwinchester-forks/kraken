import React from 'react/addons';
import update from 'react/lib/update';
import Property from './Property.js';

var EditForm = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        return {
            id: null,
            name: null,
            slug: null,
            type: []
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
                    slug: result.slug,
                    type: result.type
                });
            }
        });
    },

    render: function() {
        const { name } = this.state;
        const { slug } = this.state;
        const { type } = this.state;

        return (
            <div>
                <h1>Property</h1>
                <form>
                    <div className="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" valueLink={this.linkState('name')} className="form-control" />
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

export default EditForm;