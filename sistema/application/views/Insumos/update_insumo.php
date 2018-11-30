<body>     
  <div class="container">
      <h2>Editar insumo</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Insumos/editarInsumo/<?=$id?>" method="POST">
      
       <label for="NOMBRE_I">Nombre</label>
       <input type="input" name="NOMBRE_I" value="<?=$NOMBRE_I?>" /><br />
       <label for="PRECIO_C">Precio de compra</label>
       <input type="input" name="PRECIO_C" value="<?=$PRECIO_C?>"/><br />
       <label for="MARCA">Marca</label>
       <input type="input" name="MARCA" value="<?=$MARCA?>"/><br />
       <label for="STOCK">Stock</label>
       <input type="input" name="STOCK" value="<?=$STOCK?>"/><br />
       <label> ID Proveedor </label>
       <input type="input" name="ID_PROVEEDOR" value="<?=$ID_PROVEEDOR?>"/><br />
       <label> ID Sucursal </label>
       <input type="input" name="ID_SUCURSAL" value="<?=$ID_SUCURSAL?>"/><br />
       <br>
       <input type="submit" name="editar" value="Modificar" />
</form>
 
  </div>

</body>