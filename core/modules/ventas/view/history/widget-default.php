<?php
if(isset($_GET["product_id"])):
$product = ProductData::getById($_GET["product_id"]);
$operations = OperationData::getAllByProductId($product->id);
?>
<div class="row">
	<div class="col-md-12">
        
<!--
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/history-word.php?id=<?php echo $product->id;?>">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->

<h1><?php echo $product->name;; ?> <small>Historial</small></h1>
	</div>
	</div>

<div class="row">


	<div class="col-md-4">


	<?php
$itotal = OperationData::GetInputQYesF($product->id);

	?>
<div class="jumbotron">
<center>
	<h2>Entradas</h2>
	<h1><?php echo $itotal; ?></h1>
</center>
</div>

<br>
<?php
?>

</div>

	<div class="col-md-4">
	<?php
$total = OperationData::GetQYesF($product->id);


	?>
<div class="jumbotron">
<center>
	<h2>Disponibles</h2>
	<h1><?php echo $total; ?></h1>
</center>
</div>
<div class="clearfix"></div>
<br>
<?php
?>

</div>

	<div class="col-md-4">


	<?php
$ototal = -1*OperationData::GetOutputQYesF($product->id);

	?>
<div class="jumbotron">
<center>
	<h2>Salidas</h2>
	<h1><?php echo $ototal; ?></h1>
</center>
</div>


<div class="clearfix"></div>
<br>
<?php
?>

</div>






</div>
<div class="row">
	<div class="col-md-12">
		<?php if(count($operations)>0):?>
			<table class="table table-bordered table-hover">
			<thead>
			<th></th>
			<th>Cantidad</th>
			<th>Tipo</th>
            <th>Funcionario</th>
			<th>Fecha</th>
			<th></th>
			</thead>
			<?php foreach($operations as $operation):?>
			<tr>
			<td>
            <a href="index.php?view=onesell&id=<?php echo $operation->sell_id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
            </td>
			<td><?php echo $operation->q; ?></td>
            <td><?php echo $operation->getOperationType()->name; ?></td>
            
            <td><?php 
            
            if($operation->operation_type_id==2){
                
                //$persona = SellData::getById($operation->sell_id);
                //echo $persona->person_id; 
                
                $persona = SellData::getById($operation->sell_id);
                $nombre = PersonData::getById($persona->person_id);
                echo $nombre->name." ".$nombre->lastname; 
            }else{
                if($operation->sell_id>0){
                    $persona = SellData::getById($operation->sell_id);
                    $nombre = UserData::getById($persona->person_id);
                    if(strlen($nombre->name)>0){
                        echo $nombre->name; 
                    }else{
                        echo "N/A";
                    }
                }else{
                    echo "N/A";
                }

                
            }
            
            
            ?></td>
			<td><?php echo $operation->created_at; ?></td>
			<td style="width:40px;">
                <?php if($_SESSION["perfil"]!=2){?>
                <a href="#" id="oper-<?php echo $operation->id; ?>" class="btn tip btn-xs btn-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a> 
                <?php }?>
            </td>
			<script>
			$("#oper-"+<?php echo $operation->id; ?>).click(function(){
				x = confirm("Estas seguro que quieres eliminar esto ??");
				if(x==true){
					window.location = "index.php?view=deleteoperation&ref=history&pid=<?php echo $operation->product_id;?>&opid=<?php echo $operation->id;?>";
				}
			});

			</script>
			</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>