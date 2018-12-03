<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Editar proveedor</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Proveedores/editarProveedor/<?=$id?>" method="POST">
      
       <label for="NOMBRE_P">Nombre</label>
       <input type="input" name="NOMBRE_P" value="<?=$NOMBRE_P?>" required /><br />
       <label for="TELEFONO">Teléfono</label>
       <input type="input" name="TELEFONO" value="<?=$TELEFONO?>" required/><br />
       <label for="DIRECCION">Dirección</label>
       <input type="input" name="DIRECCION" value="<?=$DIRECCION?>" required/><br />
       <input type="submit" name="editar" value="Agregar proveedor" />
</form>
 
  </div>

</body>