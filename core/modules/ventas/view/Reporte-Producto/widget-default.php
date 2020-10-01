<h1>Reporte Existencia</h1>

<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <!--<li><a href="report/products-word.php">Word 2007 (.docx)</a></li>-->
    <li><a href="Reporte-Producto/Reporte-inventario.php">PDF</a></li>
  </ul>
</div>


<?php
$sell = SellData::getById($_GET["id"]);
$operations = OperationData::getAllProductsBySellId($_GET["id"]);
$total = 0;
?>


981702215 nro sra olivia
