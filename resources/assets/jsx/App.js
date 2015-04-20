import React from 'react/addons';

// Page specific imports
import EditForm from './Forms/EditForm.js';
import EditProperty from './Properties/EditProperty.js';

// Pages
var $editForm = $('#form');
var $editProperty = $('#property');

// ---------------------------------------------------------------------
// Forms
// ---------------------------------------------------------------------
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
if ($editProperty.length) {
    var id = $editProperty.data('id');
    var source = `/api/properties/${id}?include=type`;

    React.render(
        <EditProperty source={source} />,
        document.getElementById('property')
    );
}