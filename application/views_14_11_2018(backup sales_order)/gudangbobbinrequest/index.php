<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Gudangbobbinrequest'); ?>">  Gudang Bobbin Request </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>

       <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Gudangbobbinrequest/save_bobbinrequest'); ?>">                            
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
                            No Pengiriman <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                                   
                            <input type="text" id="no_pengiriman" name="no_pengiriman" 
                                class="form-control myline" style="margin-bottom:5px;">

                        </div>


                    </div> 


                      <div class="col-md-6">

                       <div class="col-md-12">
                            No Permintaan <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                            <input type="text" id="no_permintaan" name="no_permintaan" 
                                class="form-control myline" style="margin-bottom:5px;">
                        </div> 


                         <div class="col-md-12">
                            Keterangan <font color="#f00">*</font>
                        </div>

                        <div class="col-md-12">
                              <input type="text" id="keterangan" name="keterangan" 
                                class="form-control myline" style="margin-bottom:5px;">
                        </div> 


                </div>    



                </div>

              

                </div>

             

   </form>


        <!--div class='row'>
            <div class='col-md-6'>&nbsp;</div>                   
            <div class='col-md-6'>&nbsp; &nbsp; <a href='javascript:;' class='btn green' onclick='simpanData();'><i class='fa fa-floppy-o'></i> Pilih </a>
            </div>
        </div-->


  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>  Bobbin Request
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            
            <th>Jenis Packing</th>
            <th>Type/ukuran</th>
            <th>Qty Permintaan</th>
            <th>Qty Dikirim</th>
            
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
      