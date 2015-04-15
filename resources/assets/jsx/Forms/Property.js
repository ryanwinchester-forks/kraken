import React from 'react';

var Property = React.createClass({

    getInitialState: function() {
        return {
            id: this.props.id,
            name: this.props.name
        }
    },

    render: function() {
        return (
            <a className="list-group-item">{this.state.name}</a>
        );
    }
});

export default Property;