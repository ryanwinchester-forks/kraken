var MessageBox = React.createClass({
    render: function() {
        return (
            <h1>Hello World!</h1>
        );
    }
});

React.render(
    <MessageBox />,
    document.getElementById('message')
);