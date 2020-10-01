<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.: Inventio Lite :.</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<img src="logo.jpeg"  height="42" width="42" align="left" style="margin: 5px 5px">-->
          <a class="navbar-brand" href="./">Inventario Serviu VI <!--<sup><small><span class="label label-danger">v1.8</span></small></sup>--> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
  $_SESSION["perfil"]=$u->is_admin;
?>

          <ul class="nav navbar-nav side-nav">


          <!--Visualizador-->
           <?php if($u->is_admin==2):?>
<li><a href="index.php?view=sells"><i class="fa fa-shopping-cart"></i> Entregas</a></li>
<li><a href="index.php?view=inventary"><i class="fa fa-area-chart"></i> Inventario</a></li>
<li><a href="index.php?view=res"><i class="fa fa-th-list"></i> Reabastecimientos</a></li>
          <?php endif;?>


          <!--Admin y Normal-->
          <?php if($u->is_admin==0 or $u->is_admin==1 ):?>
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href="index.php?view=sell"><i class="fa fa-usd"></i> Entrega</a></li>

          <li><a href="index.php?view=sells"><i class="fa fa-shopping-cart"></i> Entregas</a></li>

          <!--<li><a href="index.php?view=box"><i class="fa fa-archive"></i> Caja </a></li>-->
          <li><a href="index.php?view=products"><i class="fa fa-glass"></i> Productos</a></li>
          <li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Categorías </a></li>
          <li><a href="index.php?view=clients"><i class="fa fa-smile-o"></i> Funcionarios </a></li>
          <li><a href="index.php?view=providers"><i class="fa fa-truck"></i> Proveedores </a></li>

          <li><a href="index.php?view=inventary"><i class="fa fa-area-chart"></i> Inventario</a></li>

          <li><a href="index.php?view=re"><i class="fa fa-refresh"></i> Reabastecer </a></li>

          <li><a href="index.php?view=res"><i class="fa fa-th-list"></i> Reabastecimientos</a></li>
          <li><a href="index.php?view=reporte-personas"><i class="fa fa-th-list"></i> Reporte Personas</a></li>
          <li><a href="index.php?view=Reporte-Producto"><i class="fa fa-th-list"></i> Reporte Productos</a></li>


          <!--<li><a href="index.php?view=reportes"><i class="fa fa-th-list"></i> Reportes</a></li>-->
          <!--<li><a href="index.php?view=reports"><i class="fa fa-tasks"></i> Reportes</a></li>-->
          <?php endif;?>


          <!--Solo admin-->
          <?php if($u->is_admin==1):?>
          <li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li>
          <!--<li><a href="index.php?view=settings"><i class="fa fa-cogs"></i> Configuracion <small><span class="label label-warning">Experimental</span></small></a></li>-->
        <?php endif;?>

               <div class="col-sm-11">
            <img src="logo.jpeg"  class="img-responsive">
        </div>

          </ul>

<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");
?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>
<script src="res/datepicker/js/bootstrap-datepicker.js"></script>
<script>
            $('.tip').tooltip();

            $('#alert').hide();
  var startDate = new Date();
      var endDate = new Date();
      $('#dp4').attr('data-date',startDate);
      $('#dp5').attr('data-date',endDate);

      $('#startDate').text($('#dp4').data('date'));
      $('#endDate').text($('#dp5').data('date'));
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de inicio no debe ser mayor que la fecha de fin.');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
            $('#stdate').val($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });

      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de fin no debe ser menor que la fecha de inicio.');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
            $('#endate').val( $('#dp5').data('date') );
          }
          $('#dp5').datepicker('hide');
        });


</script>

  </body>
</html>
