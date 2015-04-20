import React from 'react/addons';
import update from 'react/lib/update';
import Select from 'react-select';
import Property from './Property.js';

var EditForm = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        return {
            id: null,
            name: null,
            slug: null,
            properties: [],
            allProperties: []
        }
    },

    componentDidMount: function() {
        if (this.isMounted()) {
            this.getFormFromServer();
            this.getAllProperties();
        }
    },

    getFormFromServer: function () {
        $.get(this.props.source, (result) => {
            this.setState({
                id: result.id,
                name: result.name,
                slug: result.slug,
                properties: result.properties.data
            });
        });
    },

    getAllProperties: function() {
        $.get('/api/properties?count=100', (result) => {
            if (result.data.length) {
                this.setState({
                    allProperties: result.data
                });
            }
        });
    },

    moveProperty: function(id, afterId) {
        const { properties } = this.state;

        const property = properties.filter(p => p.id === id)[0];
        const afterProperty = properties.filter(p => p.id === afterId)[0];
        const propertyIndex = properties.indexOf(property);
        const afterIndex = properties.indexOf(afterProperty);

        this.setState(update(this.state, {
            properties: {
                $splice: [
                    [propertyIndex, 1],
                    [afterIndex, 0, property]
                ]
            }
        }));
    },

    handleAddProperty: function(id) {
        $.get(`/api/properties/${id}?include=type`, (result) => {
            this.setState({
                properties: this.state.properties.concat(result)
            });
        });
    },

    render: function() {
        var { properties } = this.state;
        var { allProperties } = this.state;

        var propertyExists = function(property) {
            if (properties.length) {
                return properties.some(function(element) {
                    return element.id === property.id;
                });
            }
            return false;
        };

        var propertiesList = properties.map((property, i) => {
            return (
                <Property
                    key={property.id}
                    id={property.id}
                    type={property.type.name}
                    name={property.name}
                    moveProperty={this.moveProperty}
                />
            );
        });

        var propertyOptions = allProperties.map((property, i) => {
            return {
                value: property.id,
                label: property.name
            }
        });

        return (
            <div>
                <h1>Form</h1>
                <form>
                    <div className="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" valueLink={this.linkState('name')} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>Properties:</label>
                        <div className="panel-groupproperties-list" id="accordian" role="tablist" aria-multiselectable="true">
                            {propertiesList}
                        </div>
                        <div>
                            <label>Add property</label>
                            <Select placeholder="Add a property" options={propertyOptions} onChange={this.handleAddProperty} />
                        </div>
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