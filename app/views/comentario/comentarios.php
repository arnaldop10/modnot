<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu de Opciones</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navegation">
		<div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Módulo de Noticias</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Opciones</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Ayuda</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
	</nav>

	<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-sm-3 col-md-2 sidebar">
				
				<ul class="nav nav-sidebar">
					<li><a href="articulos.php">Articulos</a></li>
					<li><a href="categorias.php">Categorias</a></li>
					<li class="active"><a href="#">Comentarios</a></li>
					<li><a href="#">Configuración</a></li>
				</ul>
				<ul class="nav nav-sidebar">
		            <li><a href="">Nav item</a></li>
		            <li><a href="">Nav item again</a></li>
		            <li><a href="">One more nav</a></li>
		            <li><a href="">Another nav item</a></li>
		            <li><a href="">More navigation</a></li>
   		        </ul>

			</div>

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Comentarios</h1>
				
				<div class="row">
					
					<div class="col-md-12">
						
						<div class="well">
							
							<form action="#">
					
								<div class="form-group">
								
									<label for="categoria">Buscar Articulo</label>
									<input type="text" name="categoria" class="form-control">

								</div>

								<input type="submit" value="Buscar" class="btn btn-default">

							</form>

						</div>

					</div>

				</div>

				<div class="row">
					
					<div class="col-md-12">
						
						<div class="well">
							
							<h2>Lista de Comentarios</h2>

							<table class="table table-bordered">
								
								<thead>
									<tr>
										<th>ID</th>
										<th>Categoria</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Noticia</td>
									</tr>
								</tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>