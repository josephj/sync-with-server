var ws   = require(__dirname + "/node-websocket-server/lib/ws/server"),
    connected,
    server;

connected = 0;
server = ws.createServer({debug: true});

// Event: listening.
// Emits when the server is ready to start accepting clients, after server.listen();
server.addListener("listening", function () {
    console.log("Listening for connections.");
});

// Event: connection.
// Emits when a websocket client connects to the server.
server.addListener("connection", function (conn) {
    console.log("opened connection: " + conn.id + ".");
    connected++;
    //server.send(conn.id, connected + "");

    conn.addListener("message", function (message) {
        var text = "<" + conn.id + "> " + message + ".";
        conn.send(text);
    });

    setInterval(function () {
        conn.send("Server said " + parseInt(new Date().getTime(), 10) + ".");
    }, 5000)
});

// Event: close.
// Emits when a websocket client's connection closes.
server.addListener("close", function (conn) {
    console.log("closed connection: " + conn.id + ".");
    connected--;
    conn.broadcast(connected + "");
});

server.addListener("request", function () {
    console.log("not support browser");
});

server.listen(1388);
