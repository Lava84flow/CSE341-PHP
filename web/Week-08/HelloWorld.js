//console.log('Hello World!');

var http = require('http');


function sayHello(reg, res) {
    console.log('Recived a reguest for: ' + reg.url);

    res.write('<h1>Hello from Node</h1>');
    res.end();
}









var server = http.createServer(sayHello);

server.listen(8888);

console.log('The server is now listening on port 8888...');