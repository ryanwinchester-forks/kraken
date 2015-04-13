import React from 'react/addons';

var Properties = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        console.log(this.props);
        return {
            formId: this.props.formId,
            properties: this.props.properties
        }
    },

    getProperty: function(property) {
        return <li>{property.name}</li>;
    },

    render: function() {
        console.log(this.state);
        return (
            <div className="form-group">
                <label>Properties:</label>
                <ul>
                    {this.state.properties.map(getProperty)}
                </ul>
            </div>
        );
    }
});

export default Properties;