<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Editar sucursal</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Sucursales/editarSucursal/<?=$id?>" method="POST">
      
       <label for="NOMBRE_S">Nombre</label>
       <input type="input" name="NOMBRE_S" value="<?=$NOMBRE_S?>" required /><br />
       <label for="CIUDAD">Ciudad</label>
       <input type="input" name="CIUDAD" value="<?=$CIUDAD?>" required/><br />
       
       <input type="submit" name="editar" value="Agregar sucursal" />
</form>
 
  </div>

</body>