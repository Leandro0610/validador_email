<?php
require('controllers/validar_email.php');
?>

<html lang="pt-br">
<head>
  <title>Validador Emails</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/validar_email.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript">var emails = <?=json_encode($emails);?>;</script>
</head>
<body>
    <div id = wrapper>
        <a class="btn btn-primary" href="index.php">Voltar</a>
        <br><br>
        <div id="emailsRemovidos" class="alert alert-success" role="alert">
            <p class="textoEmailsInvalidos"><span id="numeroEmailInvalidos"></span> e-mail(s) removido(s).</p>
            <i id="dropdown_icon_down" class="fa fa-caret-down"></i>
            <i id="dropdown_icon_up" class="fa fa-caret-up"></i>
            <div id="emailsInvalidos"></div>
        </div>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    <button id="btnExport" class="btn btn-success">Exportar para csv</button>
    </div>
    <footer>
        <script src="js/validar_email.js"></script>
    </footer>
</body>
</html>