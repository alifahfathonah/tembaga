<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> App Resmi Barcode 
            <a href="<?php echo base_url('index.php/ProsesResmi/barcode'); ?>">Create Barcode Resmi </a>
        </h4>          
    </div>
</div>
<div class="row"> </div>
<p></p>
<div class="row">                            
    <div class="col-md-12"> 
                
                 <br><br><br>

                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku" action="<?= base_url()?>index.php/ProsesResmi/save_barcode">   
                              <input type="hidden" name="id" value="<?= $detail[0]->id;?>">                         
                            <div class="row">
                                <div class="col-md-4">
                                    Kode Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input  type="text" id="kode_voucher" name="kode_voucher" 
                                        class="form-control myline" style="margin-bottom:5px" value="<?= $detail[0]->kode_voucher;?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    ID APP RESMI <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input  type="text" id="id_app_resmi" name="id_app_resmi"
                                        class="form-control myline" style="margin-bottom:5px" value="<?= $detail[0]->id_app_resmi;?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    Create Barcode  <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input  type="text" id="name" name="kode_barcode" 
                                        class="form-control myline" style="margin-bottom:5px" value="BC.000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Description <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="description" name="description" 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div> 
                            

                            <div class="footer">                        
                                <button type="submit" class="btn blue" onClick="simpandata();">Simpan</button>
                                <button type="reset" class="btn default" data-dismiss="modal">Reset</button>
                            </div>


                        </form>
                    </div>
                    
                
            

     </div>
</div>


<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}



</script>         