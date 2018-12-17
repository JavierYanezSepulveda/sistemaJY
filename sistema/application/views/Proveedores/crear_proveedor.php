<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Crear nuevo proveedor</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Proveedores/addProveedor" method="POST">
       <label for="RUT_PROVEEDOR">RUT Proveedor</label>
       <input type="input" name="RUT_PROVEEDOR" value="" required /><br />
       <label for="NOMBRE_P">Nombre</label>
       <input type="input" name="NOMBRE_P" value="" required /><br />
       <label for="TELEFONO">Teléfono</label>
       <input type="input" name="TELEFONO" value="" required/><br />
       <label for="DIRECCION">Dirección</label>
       <input type="input" name="DIRECCION" value="" required/><br />
       <input type="submit" name="editar" value="Agregar proveedor" />
</form>
 
  </div>

</body>