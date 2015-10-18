<?php session_start(); ?>
<?php if (isset($_SESSION['usuario'])) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu de Opciones</title>
  <link rel="shortcut icon" type="image/x-icon" href="../public/img/logo.ico">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/metisMenu.css">
  <link rel="stylesheet" href="../public/css/sb-admin-2.css">
  <link rel="stylesheet" href="../vendor/font-awesome-4.3.0/css/font-awesome.css">  
<!--  <link rel="stylesheet" href="../vendor/froala_editor_1.2.6/css/froala_editor.min.css">  
  <link rel="stylesheet" href="../vendor/froala_editor_1.2.6/css/froala_style.min.css">  	-->
</head>
<body>

  <div id="wrapper">

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index_modulo.php">Módulo de Noticias v0.3</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">                             
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <label><?php print_r($_SESSION['usuario']);?></label> <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">                  
                  <li><a href="#" id="btnConfiguracion"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                  </li>
              </ul>
              <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">                  
                  <li>
                      <a href="index_modulo.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-files-o fa-fw"></i> Articulos<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="#" id="btnCrearArticulo">Crear Articulo</a></li>
                          <li><a href="#" id="btnPublicarArticulo">Publicar Articulo</a></li>
                          <li><a href="#" id="btnActualizarArticulo">Actualizar Articulo</a></li>
                          <li><a href="#" id="btnEliminarArticulo">Eliminar Articulo</a></li>
                          <li><a href="#" id="btnBuscarArticulo">Buscar Articulo</a></li>                          
                      </ul>
                      <!-- /.nav-second-level -->
                  </li>                  
                  <li>
                      <a href="#"><i class="fa fa-tags fa-fw"></i> Categorias<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="#" id="btnCrearCategoria">Crear Categoria</a></li>
                          <li><a href="#" id="btnActualizarCategoria">Actualizar Categoria</a></li>
                          <li><a href="#" id="btnEliminarCategoria">Eliminar Categoria</a></li>
                      </ul>
                      <!-- /.nav-second-level -->
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-comments fa-fw"></i> Comentarios<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="#" id="btnVisualizarComentarios">Visualizar Comentarios</a></li>
                          <li><a href="#" id="btnValorarComentarios">Valorar Comentarios</a></li>                         
                      </ul>
                      <!-- /.nav-second-level -->
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li><a href="#" id="btnCrearUsuario">Crear Usuario</a></li>
                      <li><a href="#" id="btnActualizarUsuario">Actualizar Usuario</a></li>
                      <li><a href="#" id="btnEliminarUsuario">Eliminar Usuario</a></li>                      
                      <li><a href="#" id="btnCambiarClave">Cambiar Clave</a></li>                      
                      <li><a href="#" id="btnPreguntaSeguridad">Cambiar Pregunta de Seguridad</a></li>                      
                    </ul>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-download fa-fw"></i> Descargas</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Circulares</a>
                  </li>
              </ul>
          </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
  </nav>

      <div id="page-wrapper">        
            <div class="row">
              <div class="col-lg-12">
                <div id="formulario"></div>
                <div id="mensaje"></div>                
              </div>
            </div>
      </div> 

	</div>

	<script src="../public/js/jquery-2.1.1.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/metisMenu.js"></script>
  <script src="../public/js/sb-admin-2.js"></script>
  <script src="../public/js/menu.js"></script>    
</body>
</html>
<?php } else {    
    header("Location: iniciar_sesion.php");
} ?>