import React from 'react/addons';
// Page specific imports:
import EditForm from './Forms/EditForm.js';
import EditProperty from './Properties/EditProperty.js';

// ---------------------------------------------------------------------
// Forms
// ---------------------------------------------------------------------
var $editForm = $('#form');
if ($editForm.length) {
    var id = $editForm.data('id');
    var source = `/api/forms/${id}?include=properties.type`;

    React.render(
        <EditForm source={source} />,
        document.getElementById('form')
    );
}

// ---------------------------------------------------------------------
// Properties
// ---------------------------------------------------------------------
var $editProperty = $('#property');
if ($editProperty.length) {
    var id = $editProperty.data('id');
    var source = `/api/properties/${id}?include=type`;

    React.render(
        <EditProperty source={source} />,
        document.getElementById('property')
    );
}
