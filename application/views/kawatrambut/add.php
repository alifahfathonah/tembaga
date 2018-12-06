<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/add_produksi'); ?>">  Kawat Rambut </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>

        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Kawatrambut/save_addkawatrambut'); ?>">                            
             <div class="row">
                <div class="col-md-12">


                   <div class="row">
                       

                        <div class="col-md-12">
                            Tanggal <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <input type="text" id="berat" name="berat" 
                                class="form-control myline " style="margin-bottom:5px;float:left;">
                        </div>

                        <div class="col-md-12">
                            Barcode <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                           <input type="text" id="barcode" name="barcode" 
                                class="form-control myline " style="margin-bottom:5px;float:left;"> 

                        </div>

                </div>

               <div class="row">
                                    <div class="col-md-2">&nbsp;</div>
                                    <div class="col-md-12">
                                        &nbsp; &nbsp; <a href="#" class="btn green" onclick="simpanData()">  
                                            <i class="fa fa-floppy-o"></i> Save </a>
                                    </div>    
                                </div>


                </div>

             

   </form>

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
      