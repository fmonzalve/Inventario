<div class="row">
	<div class="col-md-12">
		<h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Entregas</h1>
		<div class="clearfix"></div>


<?php

//if($_SESSION["perfil"]==2){echo "Hola Margarita";}else{echo "No hay Margarita";}

$products = SellData::getSells();

if(count($products)>0){

	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<!--<th>Numero de Productos</th>-->
        <th>Funcionario</th>
        <th>Departamento</th>
        <th>Unidad</th>
        <th>Productos</th>
		<!--<th>Total</th>-->
		<th>Fecha</th>
		<th></th>
	</thead>
    <?php foreach($products as $sell):?>

        <tr>
            <td style="width:30px;">
            <a href="index.php?view=onesell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
            </td>

            <!--<td>

            <?php
            $operations = OperationData::getAllProductsBySellId($sell->id);
            //echo count($operations);
            ?>
            </td>-->
            
            <td>
               
               <?php
               //Funcionario
               $funcionario = PersonData::getById($sell->person_id);
                echo $funcionario->name." ".$funcionario->lastname;

                
                ?> 
            
            </td>
            
            <td>
                               <?php
               //Departamento
               $funcionario = PersonData::getById($sell->person_id);
                echo $funcionario->address1;

                
                ?> 
                </td>
            <td>               <?php
               //Unidad
               $funcionario = PersonData::getById($sell->person_id);
                echo $funcionario->address2;

                
                ?> </td>
            
            <td>
               
               <?php
               //Lista de productos
               for ($i=0; $i < count($operations); $i++) { 
                   $id_prod = $operations[$i]->product_id;
                   $producto = ProductData::getById($id_prod);
                   echo $producto->name."<br>";
               }

                
                ?> 
            
            </td>
            

            
            <td>
            <?php echo $sell->created_at; ?>
            </td>
            
            <td style="width:30px;">
                <?php if($_SESSION["perfil"]!=2){?>
                <a href="index.php?view=delsell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                <?php }?>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay ventas</h2>
		<p>No se ha realizado ninguna venta.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>