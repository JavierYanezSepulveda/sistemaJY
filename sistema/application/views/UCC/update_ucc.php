<body>     
  <div class="container" style="margin-left: 13%">
      <h2>Editar UCC</h2>

    
<form id="form" name="form" action="<?=base_url()?>index.php/Ucc/editarUCC/<?=$id?>" method="POST">
            <input type="button" class="btn btn-default" style="margin-left: 70%" value="volver" name="volver" onclick="history.back()" /><br>

       <label for="NOMBRE" >Nombre</label>
       <input type="input" name="NOMBRE" value="<?=$NOMBRE?>" required/><br />
       <label for="NUMERO_UCC">Código</label>
       <input type="input" name="NUMERO_UCC" value="<?=$NUMERO_UCC?>"required/><br />
       <label for="ANEXO">Anexo</label>
       <input type="input" name="ANEXO" value="<?=$ANEXO?>"/><br />

       <input type="submit" class="btn btn-default" name="editar" value="Actualizar UCC" />
</form>
 
  </div>

</body>