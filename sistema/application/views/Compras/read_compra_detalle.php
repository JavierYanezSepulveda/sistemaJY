<div class="container" style="margin-left: 13%">
	<h1>COMPRAS</h1>
		<div id="body">
			<table border="1" align="center">
				<thead>
					<tr>
						<th>ID Insumo</th>
						<th>Cantidad</th>
					</tr>
				</thead>
	<?php 
		foreach ($Detalle as $fila) {
	?>
			<tbody>
				<tr>
					<td><?=	$fila['ID_INSUMO'];?></td>
					<td><?= $fila['CANTIDAD'];?></td>
				</tr>
			</tbody>
	<?php
		} 
	?>
			</table>
		
		</div>	
</div>
<script type="text/javascript">
	$("#grid").DataTable();
</script>