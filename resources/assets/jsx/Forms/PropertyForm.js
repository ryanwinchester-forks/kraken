import React from 'react/addons';

var PropertyForm = React.createClass({

    render: function() {
        const { label } = this.props;
        const { defaultValue } = this.props;
        const { required } = this.props;

        return (
            <div>
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
        );
    }

});

export default PropertyForm;