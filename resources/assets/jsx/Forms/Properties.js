import React from 'react';
import Property from './Property.js';

var Properties = React.createClass({

    getInitialState: function() {
        return {
            formId: this.props.formId,
            properties: this.props.properties
        }
    },

    getProperty: function(property) {
        return <Property id={property.id} name={property.name} />;
    },

    render: function() {
        return (
            <div className="form-group">
                <label>Properties:</label>
                <div className="list-group">
                    {this.state.properties.map(this.getProperty)}
                </div>
            </div>
        );
    }
});

export default Properties;