<!--
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/onesell-word.php?id=<?php echo $_GET["id"];?>">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
<h1>Resumen de Venta</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$sell = SellData::getById($_GET["id"]);
$operations = OperationData::getAllProductsBySellId($_GET["id"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($operations as $operation) {
//		print_r($operation);
		$qx = OperationData::getQYesF($operation->product_id);
		// print "qx=$qx";
			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
		}
	}
	setcookie("selled","",time()-18600);
}

?>
<table class="table table-bordered">
<?php if($sell->person_id!=""):
$client = $sell->getPerson();
?>
<tr>
	<td style="width:150px;">Funcionario</td>
	<td><?php echo $client->name." ".$client->lastname." - ".$client->email1;?></td>
</tr>

<?php endif; ?>
<?php if($sell->user_id!=""):
$user = $sell->getUser();
?>
<tr>
	<td>Atendido por</td>
	<td><?php echo $user->name;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Código</th>
        <th>Barcode</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>


	</thead>
<?php
$productos = array();
$cantidades = array();
	foreach($operations as $operation){
		$product  = $operation->getProduct();
?>
<tr>
	<td><?php echo $product->id ;?></td>
    <td><?php echo $product->barcode ;?></td>
	<td><?php echo $operation->q ;?></td>
	<td><?php echo $product->name ;?></td>
    <?php array_push($cantidades,$operation->q); ?>
    <?php array_push($productos,$product->name); ?>
</tr>
<?php
	}
	?>
</table>


<br>

<?php
    //Datos para acta
    $_SESSION['funcionario'] = $client->name." ".$client->lastname;
    $_SESSION['departamento'] = $client->address1;
    $_SESSION['unidad'] = $client->address2;
    $_SESSION['cantidades'] = $cantidades;
    $_SESSION['productos'] = $productos;
    $_SESSION['date'] = str_replace("-","",$operation->created_at);
    $_SESSION['date'] = str_replace(":","",$_SESSION['date'] );
    $_SESSION['date'] = str_replace(" ","",$_SESSION['date'] );
    $_SESSION['cargo'] = $user->lastname;
    $_SESSION['nombre'] = $user->name;

    ?>

    <!--<a href="ActaDeEntrega.php"  target="_blank">Generar PDF</a>-->

    <button class="btn btn-info" onclick="window.open('ActaDeEntrega.php')">Acta de entrega</button>


	<?php

?>
<?php else:?>
	501 Internal Error
<?php endif; ?>
