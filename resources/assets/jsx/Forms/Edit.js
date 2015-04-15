import React from 'react/addons';
import Properties from './Properties.js';

var Edit = React.createClass({

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

    render: function() {
        var propertyListItems = this.state.properties.map((property, i) => {
            return (
                <a className="list-group-item">
                    {property.type.name}: {property.name}
                </a>
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
                            {propertyListItems}
                        </div>
                    </div>
                </form>
            </div>
        );
    }
});

export default Edit;