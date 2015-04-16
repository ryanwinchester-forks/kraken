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
            properties: []
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
                    properties: result.properties.data
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

    render: function() {
        const { properties } = this.state;

        var propertiesList = properties.map((property, i) => {
            return (
                <Property
                    key={property.id}
                    id={property.id}
                    type={property.type.name}
                    name={property.name}
                    moveProperty={this.moveProperty} />
            );
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
                        <div className="list-group properties-list">
                            {propertiesList}
                        </div>
                    </div>
                </form>
            </div>
        );
    }

});

export default EditForm;