<div class="container" style="margin-left: 13%">
	<h1>UCC</h1>

	<div id="body">
	<a href="<?php echo base_url();?>index.php/Ucc/create" class="btn btn-default">Añadir nueva unidad</a>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
			</tr>

<script type="text/javascript">
$(document).ready(function() {
    $('#UCC').DataTable();
});
</script>

<?php 
// var_dump($consulta->result());
	foreach ($consulta->result() as $fila) {?>
		
		<tr>
			<td><?=	$fila->ID_UCC;?></td>
			<td><?= $fila->NOMBRE;?></td>
			<td><a href="#">Editar</a> || <a href="#"> Eliminar</a></td>
		</tr>
<?php
} 
?>
		</table>
		
} );
	</div>	
</div>