<div id="someDiv" class="container" style="margin-left: 13%">
	<h1>Proveedores</h1>
	
	<body>
	<a href="<?php echo base_url();?>index.php/Proveedores/add" class="btn btn-default">Añadir nuevo proveedor</a>
		<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Dirección</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
<tbody>
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
</tbody>
		</table>
		
	</body>	
</div>
