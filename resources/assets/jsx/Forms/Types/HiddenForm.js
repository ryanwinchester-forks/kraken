import React from 'react/addons';

var HiddenForm = React.createClass({

    render: function() {
        const { defaultValue } = this.props;
        const { required } = this.props;

        return (
            <div>
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

export default HiddenForm;