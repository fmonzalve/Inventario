<div class="row">
	<div class="col-md-12">

		<h1>Reportes</h1>
<br>

Producto:

<form  action="index.php?view=reportes" method="post">



<select id="producto" name="producto">
    <option value="0">-- Seleccione --</option>
    <?php 
    $products = ProductData::getAllWhoRe();
    foreach($products as $product):?>
        <option value="<?php echo $product->id;?>"> <?php echo $product->name;?></option>
    <?php endforeach;?>
</select>



  


<br>
<br>
<p>Fecha Inicio: <input type="text" id="datepicker" name="datepicker"></p>
<br>
<p>Fecha Termino: <input type="text" id="datepicker2" name="datepicker2"></p>
 <br>
 <input type="submit" value="A submit button" id="boton">
 <br>
<br>

</form>





  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script>
      
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    
    $(function() {
        $( "#datepicker2" ).datepicker();
    });
    
  </script>




    <table class="table table-bordered table-hover">
        <thead>
        <th>Nombre</th>
        <th></th>
        </thead>
    <?php
    foreach($users as $user){
        ?>
        <tr>
        <td></td>
        <td></td>
        </tr>
        <?php
    }
    ?>


	</div>
</div>