<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> App Voucher Resmi 
            <a href="<?php echo base_url('index.php/ProsesResmi/voucher'); ?>">Voucher Resmi </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        
        <div class="row">
          
              
            
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Surat Jalan
                </div>
                <!--div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" onclick="newData()">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div-->
            </div>
            
             <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    
                    <th style="width:50px;">No</th>
                    <th>Kode Barcode</th>  
                    <th>Description</th>
                    <th>Created</th>
                    <th>Print</th>
                   
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>

                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->kode_barcode; ?></td>
                        <td><?php echo $data->description; ?></td>
                        <td><?php echo $data->date; ?></td>
                        <td> <a href="<?= base_url().'index.php/ProsesResmi/print_invoice/'.$data->id ;?>" target="_blank">Print</a></td>
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
            </div>


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

function newData(){
    $('#kode_voucher').val('');
    $('#id_app_resmi').val('');
    $('#name').val('');
    $('#amount').val('');
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Kode Voucher');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
   
   
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/ProsesResmi/save_voucher");
        $('#formku').submit();                                  
 


}

</script>         