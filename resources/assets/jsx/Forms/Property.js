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

var Property = React.createClass({

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
        const className = isDragging ?
            'panel panel-default is-dragging' :
            'panel panel-default';
        const panel = this.props.id;
        const panelAnchor = '#' + panel;

        const { label } = this.props;
        const { required } = this.props;
        const defaultValue = this.props.default;

        return (
            <div className={className}
                {...this.dragSourceFor(ItemTypes.PROPERTY)}
                {...this.dropTargetFor(ItemTypes.PROPERTY)}>
                <div className="panel-heading" role="tab">
                    <h4 className="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href={panelAnchor} aria-expanded="true" aria-controls={panel}>
                            <strong>{type}</strong>: {name}
                        </a>
                    </h4>
                </div>
                <div id={panel} className="panel-collapse collapse" role="tabpanel">
                    <div className="panel-body">
                        <div className="form-group">
                            <label className="control-label">Label</label>
                            <input className="form-control" value={label} />
                        </div>
                        <div className="form-group">
                            <label className="control-label">Required</label>
                            <input className="form-control" value={required} />
                        </div>
                        <div className="form-group">
                            <label className="control-label">Default value</label>
                            <input className="form-control" value={defaultValue} />
                        </div>
                    </div>
                </div>
            </div>
        );
    }
});

export default Property;
