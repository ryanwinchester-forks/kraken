import React from 'react/addons';

var { DragDropMixin } = require('react-dnd');
var ItemTypes = {
    PROPERTY: 'property'
};

var FormEdit = React.createClass({

    mixins: [ React.addons.LinkedStateMixin, DragDropMixin ],

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
                <a {...this.dragSourceFor(ItemTypes.PROPERTY)} className="list-group-item">
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
                        <div {...this.dropTargetFor(ItemTypes.IMAGE)} className="list-group properties-list">
                            {propertyListItems}
                        </div>
                    </div>
                </form>
            </div>
        );
    },

    statics: {
        configureDragDrop(register) {
            register(ItemTypes.PROPERTY, {
                dragSource: {
                    beginDrag(component) {
                        return {
                            item: {
                                property: component.props.property
                            }
                        };
                    }
                },
                dropTarget: {
                    acceptDrop(component, proeprty) {
                        DocumentActionCreators.setImage(component.props.blockId, property);
                    }
                }
            });
        }
    }
});

export default FormEdit;