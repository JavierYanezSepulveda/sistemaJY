<div class="container" style="margin-left: 13%; margin-top: 3%">
	<h1>INICIO</h1>
	<?php echo "BIENVENIDO ",$NOMBRE;?>
	<br><br>

<a href="<?php echo base_url();?>index.php/Ventas/add" class="btn btn-default">Ventas</a>
<a href="<?php echo base_url();?>index.php/Ordenes/add" class="btn btn-default">Ordenes</a>
<a href="<?php echo base_url();?>index.php/Compras/add" class="btn btn-default">Compras</a>
<a href="<?php echo base_url();?>index.php/Becas/index" class="btn btn-default">Becas</a><br><br>
<a href="<?php echo base_url();?>index.php/Usuarios/logueado/" class="btn btn-default">Informes</a>
<a href="<?php echo base_url();?>index.php/Usuarios/cerrar_sesion" class="btn btn-default">Cerrar sesión</a>
</div>
