<?php
    require "../controle/conf.php";

    function deletPessoa($dados){
        try{
            Conexao::conectar()->prepare("DELETE FROM `pessoa` WHERE` cpf` = :Pcpf")->execute($dados);
                Conexao::desconnectar();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    function insertPessoa($dados){
        try{
            Conexao::conectar()->prepare("INSERT INTO `pessoa` (`cpf`, `nome`, `login`, `senha`, `email`, `nomeAcompanhante`, `datanascimento`, `perfil`) VALUES (:Pcpf, :Pnome, :Plogin, :Psenha, :Pemail, :PnomeAcompanhante, :Pdatanascimento, :Pperil)")->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }
    function atualizaPessoa($dados,$id){
        try{
            Conexao::conectar()->prepare("UPDATE  `pessoa` SET  `Enome` =  :Enome, `Edescricao` =  :Edescricao, `dataPessoa` =  :dataPessoa,  `codigoTipoPessoa` =  :codigoTipoPessoa, `codigoAmbiente` =  :codigoAmbiente WHERE `codigoEvent` = ".$id)->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }   
    }
    if (isset($_POST['opcao'])) {
        $opcao = $_POST['opcao'];
        if ($opcao=='delete') {
            if (isset($_POST['codigoDlete'])) {
                deletPessoa(array('codPessoa' => $_POST['codigoDlete']));
            }
        }elseif ($opcao=='atualiza') {
            if (isset($_POST['codigoEvent'])) {
                atualizaPessoa(array('Enome' => $_POST['Enome'],'Edescricao' => $_POST['edescricao'],'dataPessoa' => $_POST['dataevento'],'codigoTipoPessoa' => $_POST['descricao'],'codigoAmbiente' => $_POST['ambiente']),$_POST['codigoEvent']);
            }
        }
    }else{
        insertPessoa(array('Pcpf' => $_POST['Pcpf'], 'Pnome' => $_POST['Pnome'], 'Plogin' => $_POST['Plogin'], 'Psenha' => $_POST['Psenha'], 'Pemail' => $_POST['Pemail'], 'PnomeAcompanhante' => $_POST['Pdatanascimento'], 'Pdatanascimento' => $_POST['Pdatanascimento'], 'Pperil' => $_POST['Pperil']));
    }
    header("Location: ../paginas/cadastro.php");
?>
