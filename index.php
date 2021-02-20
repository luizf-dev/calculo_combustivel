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
            $mensagem.= "<b>Sem dados para exibir!<br> <--Preencha o Formulário!</b>";
            $mensagem.= "</div>";
        }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Cálculo de Combustível</title>
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
<p>&nbsp;</p>
    <div class="container">       
        <div class="row">    
            <div class="col s12 m4 l4 painel">
                <h3>Instruções</h3>
                <div class="conteudo-painel">
                    <p>Esta aplicação tem como finalidade demonstrar os valores que
                        serão gastos com combustível durante uma viagem, com base no
                    consumo do seu veículo, e com a distância determinada por você!</p>
                    <p>Os combustíveis disponíveis para este cálculo são:</p>
                    <ul>
                        <li><b>Álcool</b></li>
                        <li><b>Díesel</b></li>
                        <li><b>Gasolina</b></li>
                    </ul>
                </div>
            </div>

            <div class="col s12 m4 l4 painel">
                <h3>Cálculo</h3>
                <div class="conteudo-painel">
                    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
                        <label for="distancia">Distância em Quilômetros a ser percorrida</label>
                        <input type="number" class="campoTexto"  name="distancia" required/><br>

                        <label for="autonomia">Consumo de combustível do veículo (Km/l)</label>
                        <input type="number" class="campoTexto" name="autonomia" required/>

                        <div class="row">
                            <div class="col s12 m6 l6">
                                <button class="botao" type="submit">Calcular</button>
                            </div>
                            <div class="col s12 m6 l6">
                                <button class="botao" type="reset">Limpar</button>
                            </div>
                        </div>
                    </form>
                </div>                    
            </div>

            <div class="col s12 m4 l4 painel">
                <h3>Resultado</h3>
                <div class="conteudo-painel">
                    <?php
                    echo $mensagem;
                    ?>
                    
                </div>
            </div>   
        </div>      
    </div>
</body>
</html>

