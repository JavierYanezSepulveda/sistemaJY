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
	<h1>Proveedores</h1>
	
	<div id="body">
	<a href="<?php echo base_url();?>index.php/Proveedores/add" class="btn btn-default">Añadir nuevo proveedor</a>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Teléfono</th>
				<th>Dirección</th>
			</tr>

<?php 

	foreach ($Proveedores as $fila) {?>
		
		<tr>
			<td><?=	$fila['ID_PROVEEDOR'];?></td>
			<td><?= $fila['NOMBRE_P'];?></td>
			<td><?= $fila['TELEFONO'];?></td>
			<td><?= $fila['DIRECCION'];?></td>

	
			<td><a href="<?php echo base_url();?>index.php/Proveedores/editar/<?=$fila['ID_PROVEEDOR'];?>">Editar</a></td>
			<td><a class="delete" href="<?php echo base_url();?>index.php/Proveedores/delete/<?=$fila['ID_PROVEEDOR'];?> ">Eliminar</a></td>

		</tr>
<?php
} 
?>
		</table>
		
	</div>	
</div>
