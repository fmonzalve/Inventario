<div class="row">
	<div class="col-md-12">

<h1>Reporte Personas</h1>
<br>

<?php if(!isset($_POST["bus_fun"]) ){?>

    <p><b>Buscar Funcionario:</b></p>

    <form  action="index.php?view=reporte-personas" method="post">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="view" value="sell">
                <input type="text" name="bus_fun" class="form-control">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
            </div>
        </div>
    </form>
<?php }; ?>

<br>


<form method="post" class="form-horizontal" action="index.php?view=reporte-personas">
    <?php if(isset($_POST["bus_fun"])){
        $clients = PersonData::getLikeCli($_POST["bus_fun"]);
        if( count($clients)>0){
        ?>
        <div class="col-md-6">
        <select name="client_id" class="form-control">
            <?php foreach($clients as $client):?>
                <option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname." - ".$client->email1;?></option>
            <?php endforeach;?>
        </select>
        </div>
        <br><br>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <div class="checkbox">
                    <label>
                    <button class="btn btn-lg btn-primary">Aceptar</button>
                    </label>
                </div>
            </div>
        </div>
        <?php
        }else{
            ?>
            No se han encontrado Resultados
            <br><br>
            <form method="get" action="index.php?view=reporte-personas">
            <button type="submit" class="btn btn-primary">Buscar Nuevamente</button>
            </form>
            <?php
        }//END IF 2
    }//END IF 1
    ?>
</form>



<?php if(isset($_POST["client_id"])>0){

$persona = PersonData::getById($_POST["client_id"]);

$ventas = SellData::getSellsByCli($_POST["client_id"]);

?>


<table class="table table-bordered table-hover">
    <thead>
		<th>Persona</th>
		<th>Producto</th>
        <th>Cantidad</th>
		<th>Fecha</th>
        <!--<th>Total</th>
		<!--<th></th>-->
	</thead>



<?php
    foreach ($ventas as $venta) {?>
        <tr>
            <td>
                <?php echo $persona->name." ".$persona->lastname;?>
            </td>
            <td>
                <?php $producto = ProductData::getById($venta->product_id);?>
                <?php echo $producto->name;?>
            </td>
            <td>
                <?php echo $venta->q;?>
            </td>
            <td>
                <?php echo $venta->created_at;?>
            </td>
        </tr>
    <?php }

} ?>

</table>
	</div>
</div>
