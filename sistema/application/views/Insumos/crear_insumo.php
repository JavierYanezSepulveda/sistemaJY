<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Crear nuevo insumo</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Insumos/addInsumo" method="POST">
      
       <label for="NOMBRE_I">Nombre</label>
       <input type="input" name="NOMBRE_I" value="" /><br />
       <label for="PRECIO_C">Precio de compra</label>
       <input type="input" name="PRECIO_C" value=""/><br />
       <label for="MARCA">Marca</label>
       <input type="input" name="MARCA" value=""/><br />
       <label for="STOCK">Stock</label>
       <input type="input" name="STOCK" value=""/><br />
       <label> Proveedores </label>
       <select style="display: block;" name="selectProveedores">
       <?php foreach ($proveedores as $k => $v): ?>
        <option type="input" value="<?php echo $v["ID_PROVEEDOR"] ?>"><?php echo $v["NOMBRE_P"] ?></option>
        <?php endforeach ?>

</select>
<br>
<label> Sucursal </label>
<select style="display: block;" name="selectSucursales" >
  <?php foreach ($sucursales as $p => $q): ?>
    <option type="input"  value="<?php echo $q["ID_SUCURSAL"] ?>"><?php echo $q["NOMBRE_S"] ?></option>
  <?php endforeach ?>
</select> 

       <input type="submit" name="editar" value="Agregar insumo" />
</form>
 
  </div>

</body>