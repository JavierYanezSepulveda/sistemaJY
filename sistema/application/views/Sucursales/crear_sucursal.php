<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Crear nueva sucursal</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Sucursales/addSucursal" method="POST">
      
       <label for="NOMBRE_S">Nombre</label>
       <input type="input" name="NOMBRE_S" value="" required /><br />
       <label for="CIUDAD">CIUDAD</label>
       <input type="input" name="CIUDAD" value="" required/><br />
       

       <input type="submit" name="editar" value="Agregar sucursal" />
</form>
 
  </div>

</body>