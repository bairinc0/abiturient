<!-- �������� ������ -->
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8ru">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="�������� ������">
    <meta name="author" content="���� ��������">
    <title>�������� ������</title>
    <!-- Bootstrap core CSS -->
    <link href="{$site_root}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{$site_root}/assets/css/{$css}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{$site_root}/assets/js/html5shiv.js"></script>
      <script src="{$site_root}/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="auth">
        <h3 class="form-signin-heading">������� ����� � ������</h3>
        <input name="login" type="text" class="form-control" placeholder="�����" autofocus>
        <input name="password" type="password" class="form-control" placeholder="������">
        <input name="Location" type="hidden" value="LoginPage"/>        
        <button class="btn btn-lg btn-primary btn-block" type="submit">�����</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
