<?php
	require "../controle/conf.php";

	function insertAmbiente($dados){
		try{
			Conexao::conectar()->prepare("INSERT INTO ambiente (codigoAmbiente, ambiente,capacidade,numeroAssentosCoberto,numeroAssentosDescoberto) VALUES (:codAmb,:ambiente,:capacidade,:nAssentosCob,:nAssentosDescob)")->execute($dados);
			Conexao::desconnectar();
			
		}catch(PDOException $e){
			print_r($e->getMessage());

		}
	}

	if (isset($_POST['Salvar']) && isset($_POST['ambiente'])) {

		$codAmb = "NULL";
		$ambiente = $_POST['ambiente'];
		$capacidade = $_POST['capacidade'];
		$nAssentosCob = "NULL";
		$nAssentosDescob = "NULL";

		if (isset($_POST['numeroAssentosCoberto']) && isset($_POST['numeroAssentosDescoberto'])){
			$nAssentosCob = $_POST['numeroAssentosCoberto'];
			$nAssentosDescob = $_POST['numeroAssentosDescoberto'];
		}elseif (isset($_POST['numeroAssentosDescoberto']) ){
			$nAssentosCob = "NULL";
			$nAssentosDescob = $_POST['numeroAssentosDescoberto'];
		}elseif(isset($_POST['numeroAssentosCoberto'])) {
			$nAssentosCob = $_POST['numeroAssentosCoberto'];
			$nAssentosDescob = "NULL";
		}
		$dados_ambiente = array('codAmb'=> $codAmb,'ambiente'=>$ambiente,'capacidade'=>$capacidade,'nAssentosCob'=>$nAssentosCob,'nAssentosDescob'=>$nAssentosDescob);

		insertAmbiente($dados_ambiente);

	}
	header("Location: ../index.php");


?>