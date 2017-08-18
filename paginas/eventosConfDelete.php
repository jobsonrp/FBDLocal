<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="span10 offset1">
      <div class="row">
        <h3>Delete Evento</h3>
      </div>
      <form class="form-horizontal" action="../controle/eventos.func.php" method="POST">
        <input type="hidden" name="codigoDlete" value="<?php echo $_GET['codigoDlete'];?>"/>
        <input type="hidden" name="opcao" value="delete"/>
          <p class="alert alert-error">Deseja Realmente apagar o evento ?</p>
          <div class="form-actions">
            <button type="submit" class="btn btn-sm btn-danger">Sim</button>
            <a class="btn btn-sm  btn-default" href="eventos.php">não</a>
          </div>
      </form>
    </div>
  </div>
</body>
</html>