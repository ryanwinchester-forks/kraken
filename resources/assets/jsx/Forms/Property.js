import React, { PropTypes } from 'react/addons';
import { DragDropMixin } from 'react-dnd';
import ItemTypes from './ItemTypes';

import TextForm from './Types/TextForm.js';
import TextareaForm from './Types/TextareaForm.js';
import HiddenForm from './Types/HiddenForm.js';

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

    getPropertyForm: function() {
        var { type } = this.props;
        var { label } = this.props;
        var { required } = this.props;
        var defaultValue = this.props.default;

        if (type === 'Hidden') {
            return <HiddenForm defaultValue={defaultValue} required={required} />;
        } else if (type === 'Checkbox') {
            return 'select form';
        } else if (type === 'Checkbox') {
            return 'checkbox form';
        } else if (type === 'Radio') {
            return 'radio form';
        } else if (type === 'Textarea') {
            return <TextareaForm label={label} defaultValue={defaultValue} required={required} />;
        } else {
            return <TextForm label={label} defaultValue={defaultValue} required={required} />;
        }
    },

    render: function () {
        var { type } = this.props;
        var { name } = this.props;
        var { isDragging } = this.getDragState(ItemTypes.PROPERTY);
        var className = isDragging ?
            'panel panel-default is-dragging' :
            'panel panel-default';
        var panel = this.props.id;
        var panelAnchor = '#' + panel;

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
                        {this.getPropertyForm()}
                    </div>
                </div>
            </div>
        );
    }
});

export default Property;
