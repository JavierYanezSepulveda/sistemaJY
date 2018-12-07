<script>
         
         var cantidad = 1;   
         var producto = 1;
         
         
     </script>
     
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
       <div class="col s1 m4 l2">
       <label> TIPO DE VENTA</label>
       <select style="display: block;" name="selectTipo_venta"  >
       <?php foreach ($tipo_v as $k => $v): ?>
        <option type="input" value="<?php echo $v["ID_TIPO_VENTA"] ?>" required><?php echo $v["NOMBRE"] ?></option>
        <?php endforeach ?>

</select>
</div>
<br>

  <div id="seccionProductos"></div>
  <div id="total"></div>
  <div id="jsAux"></div>

       <input type="button" name="editar" id="addItem" value="+ Agregar producto" class="btn btn-default " />
       <br>
       <br>
       <label>Finalizar venta</label>
       <br>
       <input type="submit" value="Finalizar venta" class="btn btn-default" "/>
</form>
 
  </div>

</body>


<script type="text/javascript">
  $("#addItem").on("click", function(event){
    var productos = <?php echo json_encode($productos) ?>;
    var tpl = "";
   
    tpl += "<div class=\"row newProduct\" ><div class=\"col s12 m6 l4\"><select class=\"browser-default select-producto\" name=\""+producto+"\"+x id=\"producto\"+x value=\""+productos.ID_PRODUCTO+"\">";
    for(var i = 0; i < productos.length; i++){
      tpl += "<option id=\"prod"+productos[i].ID_PRODUCTO+"\" value=\""+productos[i].ID_PRODUCTO+"\" valor=\""+productos[i].PRECIO_V+"\" data-valor=\""+productos[i].PRECIO_V+"\">"+productos[i].NOMBRE+"</option>";
    }
    tpl += "</select></div><div class=\"col s12 m6 l4 input-field\"><input type=\"number\" class=\"valor\" name=\"cantidad"+cantidad+"\"><label for=\"\">Cantidad</label></div></div>";
    cantidad++;
    producto++;
   
    // console.log(tpl);
    $("#seccionProductos").append(tpl);

    script = '<script>var total = 0; $(".valor").on("keyup", function(e){';
    script += 'var largo = ($(".newProduct").length); total = 0;' ;
    script += '$.each($(".newProduct"), function( index, elemento ) {';
    script += 'var id = $(elemento).children("div").children("select").val();';
    script += 'total += parseInt($(elemento).children("div").children(".valor").val())*parseInt($("#prod"+id).data("valor"));';
    script += '}); $("#total").html(total); });';
    script += '\n';
    script += '$(".select-producto").on("change", function(e){';
    script += 'var largo = ($(".newProduct").length); total = 0;' ;
    script += '$.each($(".newProduct"), function( index, elemento ) {';
    script += 'var id = $(elemento).children("div").children("select").val();';
    script += 'total += parseInt($(elemento).children("div").children(".valor").val())*parseInt($("#prod"+id).data("valor"));';
    script += '}); $("#total").html(total); })<\/script>';
    $("#jsAux").html(script);
    

  });
   

</script>