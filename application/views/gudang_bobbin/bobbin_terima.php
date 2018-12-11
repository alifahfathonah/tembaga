<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/bobbin_terima'); ?>">  Gudang Bobbin Terima Barang </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>

        <!-- <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Finishgood/save_finishgood'); ?>">                            
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
                            No Penerimaan <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                                   
                            <input type="text" id="no_permintaan" name="no_penerimaan" 
                                class="form-control myline" style="margin-bottom:5px;">

                        </div>


                    </div> 


                      <div class="col-md-6">

                       <div class="col-md-12">
                            Nama Customer <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px;">
                        </div> 


                         


                </div>    



                </div>

              

                </div>

             

   </form> -->


  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i> Bobbin Terima Barang 
                </div>
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangBobbin/add_penerimaan_bobbin"> <i class="fa fa-plus"></i> Ajukan Terima Bobbin</a>              
                </div>             
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
          
            <th>Nomor Bobbin</th>
            <th>Type/Ukuran</th>
            <th>Kode</th>
            <th>Qty</th>
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
      