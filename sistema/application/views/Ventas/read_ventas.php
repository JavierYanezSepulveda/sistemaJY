<head>
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
	</script>
	
	
</head>

<div id="someDiv" class="container" style="margin-left: 13%">
	<h1>VENTAS</h1>

		<div id="body">
			<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
				<thead>
					<tr>
						<th>ID Venta</th>
						<th>ID Usuario</th>
						<th>N° Boleta</th>
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
					<td><?= $fila['N_BOLETA'];?></td>
					<td><?= $fila['FECHA_INGRESO'];?></td>
					<td><?= $fila['TOTAL'];?></td>
					<td><a href="<?php echo base_url();?>index.php/Ventas/detalle_venta/<?=$fila['ID_VENTA'];?>">Detalle</a></td>
					<td><a href="<?php echo base_url();?>index.php/Ventas/editar/<?=$fila['ID_VENTA'];?>">Editar</a></td>
					<td><a class="delete" href="<?php echo base_url();?>index.php/Ventas/delete/<?=$fila['ID_VENTA'];?> ">Eliminar</a>	</td>	
		
				</tr>
	<?php
		} 
	?>
				
				
</tbody>
			</table>
		
		</div>	
</div>