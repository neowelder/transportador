<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class='container'>
      <h1>Administrador</h1>
<div class="navbar navbar-inverse" style="position: static;">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">El Transportador</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="<?php echo url_for('driver/index');?>">Conductores</a></li>
                      <li><a href="<?php echo url_for("vehicle/index");?>">Vehiculos</a></li>
                      <li><a href="<?php echo url_for("route/index");?>">Rutas</a></li>
                    </ul>
                    <ul class="nav pull-right">
                      <li><a href="<?php echo url_for("trip/index");?>">Viajes</a></li>
                      <li><a href="#">Boletos</a></li>
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Asignaciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo url_for("driver_vehicle/index");?>">Asignar Vehiculos</a></li>
                          <li><a href="#">Asignar Ruta</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Ventas</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
      <?php echo $sf_content ?>
    </div>
  </body>
</html>
