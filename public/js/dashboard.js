var MessageBox = React.createClass({displayName: "MessageBox",
    render: function() {
        return (
            React.createElement("h1", null, "Hello World!")
        );
    }
});

React.render(
    React.createElement(MessageBox, null),
    document.getElementById('message')
);