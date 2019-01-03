<!DOCTYPE html>
<html >

   <body>
    <div class="container" style="margin-left: 13%">
    <h1>Informes de compras</h1>

    <form id="buscar" method="GET" action=" <?php echo base_url();?>index.php/Informes/informesCompras2 ">

    	<label>De:</label>
        <input type="date" id="query1" name="query1" value="<?php echo date("Y-m-d");?>">
        <label>Hasta:</label>
        <input type="date" id="query2" name="query2" value="<?php echo date("Y-m-d");?>">
                 <input type="hidden" id="id_sucursal" name="id_sucursal" value="<?php echo $this->session->userdata('ID_SUCURSAL');?>">

        <input  type="submit"  id="buscar" value="buscar" class="btn UCM">
 </form>

 

 <br> <br>


             
   <a href="<?php echo base_url(); ?>index.php/Informes/informesCompras" class="btn btn-danger" >Volver</a></div>
</body>       
</html>