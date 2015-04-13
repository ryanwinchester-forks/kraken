import React from 'react/addons';
import Properties from './Properties.js';

var Edit = React.createClass({

    mixins: [ React.addons.LinkedStateMixin ],

    getInitialState: function() {
        return {
            id: null,
            name: null,
            slug: null,
            properties: null
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
        return (
            <div>
                <h1>Form</h1>
                <form>
                    <div className="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" valueLink={this.linkState('name')} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>Slug:</label>
                        <input type="text" name="slug" valueLink={this.linkState('slug')} className="form-control" />
                    </div>
                    <Properties source={this.props.source} />
                </form>
            </div>
        );
    }
});

export default Edit;