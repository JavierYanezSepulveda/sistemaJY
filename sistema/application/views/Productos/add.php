<body>     
  <div id="someDiv" class="container" style="margin-left: 13%">
      <h2>Añadir nuevo producto</h2>

      <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
      <?php echo validation_errors(); ?>

      <?php echo form_open(base_url().'index.php/Productos/add'); ?>
      <input type="button" class="btn btn-default" style="margin-left: 70%" value="volver" name="volver" onclick="history.back()" /><br>
       <label for="NOMBRE">Nombre</label>
       <input type="input" name="NOMBRE" required><br />

       <label for="PRECIO">Precio</label>
       <input type="number" name="PRECIO_V" required><br />

       
       
        
        <label>Estado</label>
            <select class="form-control" id="selectEstado"name="selectEstado">
                <option  type ="input"value="Activo">Activo</option>
                <option  type ="input"value="Inactivo">Inactivo</option>
               
         </select><br>
         

   
  


       <label>Insumo</label>
        <select  class="form-control"  id="selectInsumo" name ="selectInsumo">
       <?php foreach ($insumos as $v):?>     
        <option type ="input" name="selectInsumo" value="<?php echo $v["ID_INSUMO"]?> "><?php echo $v["NOMBRE_I"] ?></option>  <br />
        <?php endforeach ?> </select>
        <br>
        <input type="submit" name="submit" value="Añadir producto" class="btn btn-default"/>

      <?php echo form_close();?>


  </div>
<!-- Begin page content -->
</body>
</html>


