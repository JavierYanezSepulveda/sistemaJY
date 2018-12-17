
<div id="someDiv" class="container" style="margin-left: 13%">
	<h1>BECAS</h1>
		<div id="body">
			<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
				<thead>
					<tr>
						<th>ID Beca</th>
						<th>N° Beca</th>
						<th>Cantidad</th>
						<th>Fecha Compra</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
			<tbody>
	<?php 
		foreach ($Becas as $fila) {
	?>
		
			
				<tr>
					<td><?=	$fila['ID_BECA'];?></td>
					<td><?= $fila['N_BECA'];?></td>
					<td><?= $fila['CANTIDAD'];?></td>
					<td><?= $fila['FECHA_INGRESO'];?></td>
					<td><a href="<?php echo base_url();?>index.php/Compras/editar/<?=$fila['ID_BECA'];?>">Editar</a></td>
					<td><a class="delete" href="<?php echo base_url();?>index.php/Compras/delete/<?=$fila['ID_BECA'];?> ">Eliminar</a></td>
		
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