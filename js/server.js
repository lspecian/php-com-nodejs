var socket 	= require('socket.io'),
	express = require('express'),
	http 	= require('http'),
	app		= express(),
	server  = http.createServer(app),
	io		= socket.listen(server);

io.sockets.on('connection', function(cliente){
	cliente.on('enviar-mensagem-para-servidor', function(data){
		io.sockets.emit('enviar-mensagem-para-cliente', {mensagem: data.mensagem});
	});
});

server.listen(8080);