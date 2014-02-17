<!doctype html>
<html>
	<head>
	</head>
	<body>
		<div id='mensagens'>
		</div>
		<br>
		<input type='text' id='text_enviar'>
		<input type='button' id='btn_enviar' value='Enviar'>
		<script src='js/jquery-1.11.0.min.js'></script>
		<script src="js/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>
		<script>
			var socket = io.connect('http://localhost:8080');

			$(function(){
				$('#btn_enviar').click(function(){
					socket.emit('enviar-mensagem-para-servidor', {mensagem: $('#text_enviar').val() });
					$('#text_enviar').val('');
				});
			});

			socket.on('enviar-mensagem-para-cliente', function(data){
				$('#mensagens').append('<br>'+data.mensagem);
			});
		</script>
	</body>
</html>
