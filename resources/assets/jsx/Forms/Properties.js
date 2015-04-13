import React from 'react/addons';

var Properties = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        return {
            formId: this.props.formId,
            properties: this.props.properties
        }
    },

    getProperty: function(property) {
        return <li>{property.name}</li>;
    },

    render: function() {
        return (
            <div className="form-group">
                <label>Properties:</label>
                <ul>
                    {this.state.properties.map(this.getProperty)}
                </ul>
            </div>
        );
    }
});

export default Properties;