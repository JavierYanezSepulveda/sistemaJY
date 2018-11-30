<body>     
  <div class="container">
      <h2>Crear nueva UCC</h2>

      <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
      <?php echo validation_errors(); ?>

      <?php echo form_open(base_url().'index.php/Ucc/add'); ?>

       <label for="NOMBRE">Nombre</label>
       <input type="input" name="NOMBRE" /><br />
       <label for="NUMERO_UCC">Código</label>
       <input type="input" name="NUMERO_UCC" /><br />
       <label for="ANEXO">Anexo</label>
       <input type="input" name="ANEXO" /><br />

       <input type="submit" name="submit" value="Añadir UCC" />

      <?php echo form_close();?>


  </div>

</body>