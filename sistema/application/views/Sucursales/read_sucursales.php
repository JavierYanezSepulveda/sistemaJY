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
	<h1>Sucurasales</h1>
	
	<div id="body">
	<a href="<?php echo base_url();?>index.php/Sucursales/add" class="btn btn-default">Añadir nueva sucursal</a>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Ciudad</th>
			</tr>

<?php 

	foreach ($Sucursales as $fila) {?>
		
		<tr>
			<td><?=	$fila['ID_SUCURSAL'];?></td>
			<td><?= $fila['NOMBRE_S'];?></td>
			<td><?= $fila['CIUDAD'];?></td>
	
			<td><a href="<?php echo base_url();?>index.php/Sucursales/editar/<?=$fila['ID_SUCURSAL'];?>">Editar</a></td>
			<td><a class="delete" href="<?php echo base_url();?>index.php/Sucursales/delete/<?=$fila['ID_SUCURSAL'];?> ">Eliminar</a></td>

		</tr>
<?php
} 
?>
		</table>
		
	</div>	
</div>
