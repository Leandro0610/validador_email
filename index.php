<html lang="pt-br">
<head>
  <title>Validador Emails</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div id = "wrapper">
        <h5>Importe o arquivo com os emails que precisam ser validados</h5>
        <br>
        <form action="validar_email.php" method="post" enctype="multipart/form-data">
            <input type="file" name="csv" value="" />
            <br>
            <br>
            <input id="btnValidar" class="btn btn-primary" type="submit" name="submit" value="Validar"/>
        </form>
    </div>
</body>
</html>