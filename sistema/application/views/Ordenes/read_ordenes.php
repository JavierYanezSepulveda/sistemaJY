
<div id="someDiv" class="container" style="margin-left: 13%">
	<h1>ORDENES</h1>
		<div id="body">
			<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
				<thead>
					<tr>
						<th>ID Orden</th>
						<th>ID Usuario</th>
						<th>N° Orden</th>
						<th>Fecha Venta</th>
						<th>Total</th>
						<th>Detalle</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
			<tbody>
	<?php 
		foreach ($Ventas as $fila) {
	?>
		
			
				<tr>
					<td><?=	$fila['ID_VENTA'];?></td>
					<td><?= $fila['ID_USUARIO'];?></td>
					<td><?= $fila['N_ORDEN'];?></td>
					<td><?= $fila['FECHA_INGRESO'];?></td>
					<td><?= $fila['TOTAL'];?></td>
					<td><a href="<?php echo base_url();?>index.php/Ordenes/detalle_orden/<?=$fila['ID_VENTA'];?>">Detalle</a></td>
					<td><a href="<?php echo base_url();?>index.php/Ordenes/editar/<?=$fila['ID_VENTA'];?>">Editar</a></td>
					<td><a class="delete" href="<?php echo base_url();?>index.php/Ordenes/delete/<?=$fila['ID_VENTA'];?> ">Eliminar</a></td>
		
				</tr>
			
	<?php
		} 
	?>
			</tbody>

			</table>
		
		</div>	
</div>

	<script language="JavaScript" type="text/javascript">
		$(document).ready(function(){

			$("#grid").DataTable();

    		$("a.delete").click(function(e){
        		if(!confirm('¿Está seguro que desea eliminar este elemento?')){
        	    	e.preventDefault();
        	    	return false;
        		}
        		return true;
    		});
		});
	</script>