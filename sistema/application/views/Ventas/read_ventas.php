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
						<th>Estado</th>
						<th>Detalle</th>
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
					<?php if ($fila['ESTADO'] === '1'|| $fila['ESTADO'] === null):?>
          <td><a href="<?php echo base_url();?>index.php/Ventas/desactivar/<?=$fila['ID_VENTA'];?>">Activo</a></td> 
      <?php elseif($fila['ESTADO'] === '0' ) :?>
          <td><a href="<?php echo base_url();?>index.php/Ventas/activar/<?=$fila['ID_VENTA'];?>">Inactivo</a></td> 
      <?php endif;?>
					<td><a href="<?php echo base_url();?>index.php/Ventas/detalle_venta/<?=$fila['ID_VENTA'];?>">Detalle</a></td>
					
					
		
				</tr>
	<?php
		} 
	?>
				
				
</tbody>
			</table>
		
		</div>	
</div>