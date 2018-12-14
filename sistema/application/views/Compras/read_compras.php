
<div id="someDiv" class="container" style="margin-left: 13%">
	<h1>COMPRAS</h1>
		<div id="body">
			<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
				<thead>
					<tr>
						<th>ID Compra</th>
						<th>ID Usuario</th>
						<th>N° Factura</th>
						<th>Fecha Compra</th>
						<th>SubTotal</th>
						<th>Total c/IVA</th>
						<th>Detalle</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
			<tbody>
	<?php 
		foreach ($Compras as $fila) {
	?>
		
			
				<tr>
					<td><?=	$fila['ID_COMPRA'];?></td>
					<td><?= $fila['ID_USUARIO'];?></td>
					<td><?= $fila['N_FACTURA'];?></td>
					<td><?= $fila['FECHA_INGRESO'];?></td>
					<td><?= $fila['SUBTOTAL'];?></td>
					<td><?= $fila['TOTAL'];?></td>
					<td><a href="<?php echo base_url();?>index.php/Compras/detalle_compra/<?=$fila['ID_COMPRA'];?>">Detalle</a></td>
					<td><a href="<?php echo base_url();?>index.php/Compras/editar/<?=$fila['ID_COMPRA'];?>">Editar</a></td>
					<td><a class="delete" href="<?php echo base_url();?>index.php/Compras/delete/<?=$fila['ID_COMPRA'];?> ">Eliminar</a></td>
		
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