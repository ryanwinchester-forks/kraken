import Edit from './Forms/Edit.js';
import Util from './Util.js';
import DraggableMixin from './Mixins/DraggableMixin.js';

var SortableRepeatingFieldset = React.createClass({

    mixins: [
        ReactForms.FormElementMixin, // we need ReactForms.FormElementMixin cause we want to update the form value
        ReactForms.FormContextMixin,
        DraggableMixin // DraggableMixin provides basic dragging functionality
    ],

    getInitialState: function() {
        return {sorting: null}
    },

    render: function() {
        var className = classSet({
            SortableRepeatingFieldset: true,
            SortableActive: this.state.sorting !== null
        })
        return this.transferPropsTo(
            <RepeatingFieldset className={className} item={this.renderItem} />
        )
    },

    /**
     * Render a single item in a fieldset
     *
     * It returns a placeholder for the currently sorted item if repeating
     * fieldset is in sortable state.
     */
    renderItem: function(props, child) {
        var sorting = this.state.sorting
        if (sorting && sorting.name === props.name) {
            return <div
                key={props.name}
                style={sorting.size}
                className="SortablePlaceholder" />
        } else {
            props = merge(props, {
                sorting: sorting,
                onSortStart: this.onSortStart,
                onSortOver: this.onSortOver,
            })
            return SortableItem(props, child)
        }
    },

    /**
     * Called by DraggableMixin on drag end
     */
    onDragEnd: function() {
        this.setState({sorting: null})
        if (this._image) {
            document.body.removeChild(this._image)
            this._image = undefined
        }
    },

    onDrag: function(e) {
        if (this._image) {
            setImagePositionFromEvent(this._image, e)
        }
    },

    onSortStart: function(e, info) {
        // call into DraggableMixin to start dragging
        this.onMouseDown(e)

        var node = this._image = document.createElement('div')
        var val = this.value()
        var schema = val.schema.children
        var value = val.value[info.name]

        React.renderComponent(Form({schema: schema, value: value}), node)

        node.classList.add('SortableImage')
        node.style.position = 'absolute'
        node.style.width = '' + info.size.width + 'px'
        node.style.height = '' + info.size.height + 'px'
        setImagePositionFromEvent(node, e)
        document.body.appendChild(node)

        this.setState({sorting: info})
    },

    onSortOver: function(e, name) {
        if (!this.state.sorting) {
            return
        }

        // update sorting state and swap values
        this.setState({sorting: merge(this.state.sorting, {name: name})})
        this.onValueUpdate(this.value().swap(name, this.state.sorting.name))
    }
})