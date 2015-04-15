import Edit from './Forms/Edit.js';
import Properties from './Forms/Properties.js';

var id = $('#form').data('id');
var source = `/api/forms/${id}?include=type,properties.type`;

React.render(
    <Edit source={source} />,
    document.getElementById('form')
);