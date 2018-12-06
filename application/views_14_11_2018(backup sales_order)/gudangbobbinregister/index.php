<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbinregister'); ?>">  Gudang Bobbin Register </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>

         <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Kawatrambut/save_kawatrambut'); ?>">                            
             <div class="row">
                <div class="col-md-12">


                   <div class="row">
                        <div class="col-md-6">

                        <div class="col-md-12">
                            Tanggal <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>

                        <div class="col-md-12">
                            Jenis Barang <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <select  id="jenis_barang" name="no_bpb" 
                                class="form-control myline" style="margin-bottom:5px" onchange="pilih_data(this.value)">
                                <?php 
                                foreach($jenis_barang_list as $jenis_barang){
                                ?>
                                <option value="<?php echo $jenis_barang->id ?>"><?php echo $jenis_barang->jenis_barang ?> </option>
                                <?php } ?>    
                            </select>        

                        </div>


                    </div> 


                      <div class="col-md-6">

                       <div class="col-md-12">
                            Milik <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <input type="text" id="milik" name="milik" 
                                class="form-control myline" style="margin-bottom:5px;">
                        </div> 


                            <div class="row">
                                    <div class="col-md-2">&nbsp;</div>
                                    <div class="col-md-12">
                                        &nbsp; &nbsp; <a href="<?= base_url();?>index.php/gudangbobbinregister/add" class="btn green">  
                                            <i class="fa fa-floppy-o"></i> Pilih </a>
                                    </div>    
                                </div>


                </div>    



                </div>

              

                </div>

             

   </form>


  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>  Bobbin Register
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>Ukuran Bobbin</th>
            <th>Berat</th>
            <th>Barcode</th>
           
       </tr>
     </thead>
     <tbody>




     </tbody>   
   </table>
</div>
</div>
</div>





<script>
function simpanData(){
        
        $('#formku').submit(); 
    
};
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });       
});
</script>
      