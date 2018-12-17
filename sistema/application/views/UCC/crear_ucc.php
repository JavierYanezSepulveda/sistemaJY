<body>     
  <div class="container" style="margin-left: 13%" >
      <h2>Crear nueva UCC</h2>

      <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
      <?php echo validation_errors(); ?>

      <?php echo form_open(base_url().'index.php/Ucc/add'); ?>
            <input type="button" class="btn btn-default" style="margin-left: 70%" value="volver" name="volver" onclick="history.back()" /><br>

       <label for="NOMBRE" >Nombre</label>
       <input type="input" name="NOMBRE" required/><br />
       <label for="NUMERO_UCC" >Código</label>
       <input type="input" name="NUMERO_UCC" required/><br />
       <label for="ANEXO">Anexo</label>
       <input type="input" name="ANEXO" /><br />

       <input type="submit" class="btn btn-default" name="submit" value="Añadir UCC" />

      <?php echo form_close();?>


  </div>

</body>