<?php

if($_POST) {

	$distancia = $_POST['distancia'];
	$autonomia = $_POST['autonomia'];

	$valorGasolina = 4.80;
	$valorAlcool = 3.80;
	$valorDiesel = 3.90;

	$mensagem = "";

	if (is_numeric($autonomia) && is_numeric($distancia)){
		if (($distancia > 0) && ($autonomia > 0)) {

			$consumoGasolina = ($distancia / $autonomia ) * $valorGasolina;
			$consumoGasolina = number_format($consumoGasolina,2,',','.');

			$consumoAlcool = ($distancia / $autonomia ) * $valorAlcool;
			$consumoAlcool = number_format($consumoAlcool,2,',','.');

			$consumoDiesel = ($distancia / $autonomia ) * $valorDiesel;
			$consumoDiesel = number_format($consumoDiesel,2,',','.');

			$mensagem.= "<div class='sucesso'>";
			$mensagem.= "O valor total gasto será de:";
			$mensagem.= "<ul>";
			$mensagem.= "<li><b>Gasolina:</b> R$ ".$consumoGasolina."</li>";
			$mensagem.= "<li><b>Álcool:</b> R$ ".$consumoAlcool."</li>";
			$mensagem.= "<li><b>Diesel</b>: R$ ".$consumoDiesel."</li>";
			$mensagem.= "</ul>";
			$mensagem.= "</div>";
		} else {
			$mensagem.= "<div class='erro'>";
			$mensagem.= "<b>O valor da distância e da autonomia deve ser maior que zero.</b>";
			$mensagem.= "</div>";
		}
	} else {
		$mensagem.= "<div class='erro'>";
		$mensagem.= "<b>O valor recebido não é numérico</b>";
		$mensagem.= "</div>";
	}
} else {
	$mensagem = "<div class='erro'>";
	$mensagem.= "<b>Nenhum dado foi recebido pelo formulário</b>";
	$mensagem.= "</div>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<!-- Theme Made By www.w3schools.com - No Copyright -->
<title>Curso de PHP 02</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<!-- Minha estilização CSS -->
<link rel="stylesheet"  href="estilo.css">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
</head>

<body>    
	<main>
		<div class="painel">
			<h2>Resultado do cálculo de consumo</h2>
			<div class="conteudo-painel">
				<?php
				echo $mensagem;
				?>
				<a class="botao" href="index.php">Voltar</a>
			</div>
		</div>
	</main>
</body>
</html>

