// From: https://developer.mozilla.org/en-US/docs/Web/API/WebSocket
// Create WebSocket connection.
const socket = new WebSocket('ws://localhost:8765');

// Connection opened
socket.addEventListener('open', function (event) {
    socket.send('{\n"changeStatus": "true"\n}');
});

// Listen for messages
socket.addEventListener('message', function (event) {
    console.log('Message from server ', event.data);
});
