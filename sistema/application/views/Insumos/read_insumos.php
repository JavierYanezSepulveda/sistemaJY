<head><script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('¿Está seguro que desea eliminar este elemento?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script></head>
<div class="container" style="margin-left: 13%">
	<h1>INSUMOS</h1>
	
	<div id="body">
	<a href="<?php echo base_url();?>index.php/Insumos/add" class="btn btn-default">Añadir nuevo insumo</a>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Precio de compra</th>
				<th>Marca</th>
				<th>Stock</th>
				<th>Proveedor</th>
				<!-- <th>Sucursal</th> -->
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>

<?php 
	foreach ($Insumos as $fila) {?>
		
		<tr>
			<td><?=	$fila['ID_INSUMO'];?></td>
			<td><?= $fila['NOMBRE_I'];?></td>
			<td><?= $fila['PRECIO_C'];?></td>
			<td><?= $fila['MARCA'];?></td>
			<td><?= $fila['STOCK'];?></td>
			<td><?= $fila['NOMBRE_P'];?></td>

	
			<td><a href="<?php echo base_url();?>index.php/Insumos/editar/<?=$fila['ID_INSUMO'];?>">Editar</a></td>
			<td><a class="delete" href="<?php echo base_url();?>index.php/Insumos/delete/<?=$fila['ID_INSUMO'];?> ">Eliminar</a></td>

		</tr>
<?php
} 
?>
		</table>
		
	</div>	
</div>