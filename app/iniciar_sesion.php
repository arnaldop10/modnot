<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Módulo de Noticias</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/sb-admin-2.css">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modulo de Noticias</h3>
                    </div>
                    <div class="panel-body">
                        <form action="controller/usuario_controller.php" role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="login" type="login" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!--<a href="#" class="btn btn-lg btn-success btn-block">Acceder</a>-->
                                <input type="hidden" name="evento" value="validar_usuario">
								<input type="submit" value="Acceder" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>	
	<script src="../public/js/jquery-2.1.1.min.js"></script>
	<script src="../public/js/bootstrap.js"></script>
	<script src="../public/js/sb-admin-2.js"></script>
</body>
</html>