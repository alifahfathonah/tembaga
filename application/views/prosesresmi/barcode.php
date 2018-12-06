

  <?php
            if($this->session->userdata('group_id')==6 || $this->session->userdata('group_id')==1){
        ?>




<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> App Resmi Barcode 
            <a href="<?php echo base_url('index.php/ProsesResmi/barcode'); ?>">Barcode Resmi </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    Kode Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input placeholder="Masuka nama barang..." type="text" id="kode_voucher" name="kode_voucher" 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    ID APP RESMI <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input placeholder="Masukan ID APP RESMI..." type="text" id="id_app_resmi" name="id_app_resmi"
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Barang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input placeholder="Masukan harga satuan..." type="text" id="name" name="name" 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Jumlah Barang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input placeholder="Masukan total harga..." type="text" id="amount" name="amount" 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div> 
                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpandata();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Barcode
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
                    <th>Kode Voucher</th> 
                    <th>Id App Resmi</th> 
                    <th>Name</th>  
                    <th>Amount</th>
                    <th>Created</th>
                    <th>Create Barcode</th>   
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
                        <td><?php echo $data->kode_voucher; ?></td>
                        <td><?php echo $data->id_app_resmi; ?></td>
                        <td><?php echo $data->name; ?></td>
                        <td><?php echo $data->amount; ?></td>
                        <td><?php echo $data->date; ?></td>
                        <td><a href="<?php echo base_url().'index.php/ProsesResmi/create_barcode/'.$data->id; ?>" >Create Barcode</a></td>
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
            </div>
        </div>



           <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Filter Barcode
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
                    <th>Kode Voucher</th> 
                    <th>Id App Resmi</th> 
                    <th>Kode Barcode</th>  
                    <th>Description</th>
                    <th>Created</th>
                   
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($filter_data as $data){
                            $no++;
                    ?>
                    <tr>

                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->id_app_voucher; ?></td>
                        <td><?php echo $data->id_app_resmi; ?></td>
                        <td><?php echo $data->kode_barcode; ?></td>
                        <td><?php echo $data->description; ?></td>
                        <td><?php echo $data->date; ?></td>
                        
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




<?php
}else{
?>

    <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>



<?php } ?>


