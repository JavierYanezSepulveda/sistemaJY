<head><script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
</script></head>
<div class="container" style="margin-left: 13%">
	<h1>UCC</h1>

	<div id="body">
	<a href="<?php echo base_url();?>index.php/Ucc/add" class="btn btn-default">Añadir nueva unidad</a>
		<table id="grid" class="table table-striped table-bordered dt-responsive nowrap" border="1" align="center">
			<thead>
			<tr>
				<th>ID</th>
				<th>Numero_UCC</th>
				<th>Nombre</th>
				<th>Anexo</th>

			</tr>
			</thead>


<tbody>
<?php 
 // var_dump($UCC);
	foreach ($UCC as $fila) {?>
		
		<tr>
			<td><?=	$fila['ID_UCC'];?></td>
			<td><?= $fila['NUMERO_UCC'];?></td>
			<td><?= $fila['NOMBRE'];?></td>
			<td><?= $fila['ANEXO'];?></td>
			<td><a href="<?php echo base_url();?>index.php/Ucc/editar/<?=$fila['ID_UCC'];?>">Editar</a></td>
			<td>||</td>
			<td><a href="<?php echo base_url();?>index.php/Ucc/delete/<?=$fila['ID_UCC'];?>" class="delete">Eliminar</a></td>

		</tr>
<?php
} 
?>
</tbody>
		</table>
		
	</div>	
</div>
