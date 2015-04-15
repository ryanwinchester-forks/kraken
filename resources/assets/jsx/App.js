import FormEdit from './Forms/FormEdit.js';

// ---------------------------------------------------------------------
// Form Edit
// ---------------------------------------------------------------------
var id = $('#form').data('id');
var source = `/api/forms/${id}?include=type,properties.type`;

React.render(
    <FormEdit source={source} />,
    document.getElementById('form')
);