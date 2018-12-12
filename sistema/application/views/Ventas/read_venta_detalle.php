<div class="container" style="margin-left: 13%">
	<h1>VENTAS</h1>
		<div id="body">
			<table border="1" align="center">
				<tr>
					<th>ID Producto</th>
					<th>Cantidad</th>
				</tr>

	<?php 
		foreach ($Detalle as $fila) {
	?>
		
			<tr>
				<td><?=	$fila['ID_PRODUCTO'];?></td>
				<td><?= $fila['CANTIDAD'];?></td>
			</tr>
	<?php
		} 
	?>
			</table>
		
		</div>	
</div>