<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Crear nueva venta</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Ventas/addVenta" method="POST">
      
       
       <label for="N_BOLETA">N° BOLETA</label>
       <input type="input" name="N_BOLETA" value="" required/><br />
       <label for="FECHA_INGRESO">FECHA DE INGRESO</label>
       <input type="date" name="FECHA_INGRESO" value="" required/><br />
       <!-- <label> UCC</label>
       <select style="display: block;" name="selectUCC">
       <?php foreach ($UCC as $k => $v): ?>
        <option type="input" value="<?php echo $v["ID_UCC"] ?>" required><?php echo $v["NOMBRE"] ?></option>
        <?php endforeach ?>

</select>
<br> -->
       <label> TIPO DE VENTA</label>
       <select style="display: block;" name="selectTipo_venta">
       <?php foreach ($tipo_v as $k => $v): ?>
        <option type="input" value="<?php echo $v["ID_TIPO_VENTA"] ?>" required><?php echo $v["NOMBRE"] ?></option>
        <?php endforeach ?>

</select>
<br>
<label> Sucursal </label>
<select style="display: block;" name="selectSucursales" >
  <?php foreach ($sucursales as $p => $q): ?>
    <option type="input"  value="<?php echo $q["ID_SUCURSAL"] ?>" required><?php echo $q["NOMBRE_S"] ?></option>
  <?php endforeach ?>
</select> 

       <input type="submit" name="editar" value="Agregar insumo" />
</form>
 
  </div>

</body>