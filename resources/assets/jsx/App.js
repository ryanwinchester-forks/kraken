import EditForm from './Forms/EditForm.js';

// ---------------------------------------------------------------------
// Form Edit
// ---------------------------------------------------------------------
var id = $('#form').data('id');
var source = `/api/forms/${id}?include=type,properties.type`;

React.render(
    <EditForm source={source} />,
    document.getElementById('form')
);