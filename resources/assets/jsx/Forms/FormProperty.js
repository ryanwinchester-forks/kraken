import React, { PropTypes } from 'react/addons';
import { DragDropMixin } from 'react-dnd';
import ItemTypes from './ItemTypes';

const dragSource = {
    beginDrag(component) {
        return {
            item: {
                id: component.props.id
            }
        };
    }
};

const dropTarget = {
    over(component, item) {
        component.props.moveProperty(item.id, component.props.id);
    }
};

var FormProperty = React.createClass({

    mixins: [ React.addons.LinkedStateMixin, DragDropMixin ],

    propTypes: {
        id: PropTypes.any.isRequired,
        type: PropTypes.string.isRequired,
        name: PropTypes.string.isRequired,
        moveProperty: PropTypes.func.isRequired
    },

    statics: {
        configureDragDrop(register) {
            register(ItemTypes.PROPERTY, {
                dragSource,
                dropTarget
            });
        }
    },

    render: function () {
        const { type } = this.props;
        const { name } = this.props;
        const { isDragging } = this.getDragState(ItemTypes.PROPERTY);
        const opacity = isDragging ? 0 : 1;

        return (
            <a  className="list-group-item"
                {...this.dragSourceFor(ItemTypes.PROPERTY)}
                {...this.dropTargetFor(ItemTypes.PROPERTY)}
                style={{...opacity}}>
                {type}: {name}
            </a>
        );
    }
});

export default FormProperty;