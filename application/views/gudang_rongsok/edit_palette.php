<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/gudang_rongsok'); ?>"> Gudang Rongsok </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
        
        ?>      
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Edit Palette
                </div>
                <div class="tools">
                                 
                </div>
            </div>
            <div class="portlet-body">
                <input type="text" name="no_palette" id="no_palette" class="form-control myline" style="float: left; width: 50%; margin-right: 10px;" placeholder="Silahkan Isi Nomor Palette...">
                <a href="javascript:;" onclick="cari($('#no_palette').val())" class="btn blue">Cari</a>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-default" id="detail_palette" style="display: none;">
            <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangRongsok/update_palette'); ?>">  
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 align="center" style="font-weight: bold;">Detail Surat Jalan</h4>
                        <div class="table-scrollable">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th style="width:40px">No</th>
                                    <th>Nama Item</th>
                                    <th>No Palette</th>
                                    <th>Bruto</th>
                                    <th>Berat</th>
                                    <th></th>
                                    <th>Netto (UOM)</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody id="boxDetail">
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn green" onclick="simpanData();"><i class="fa fa-floppy-o"></i> Simpan </a> 
                    </div>    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_"+id).val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
}

function cari(id){
    if(id!=''){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangRongsok/load_palette'); ?>',
            data:"id="+ id,
            success:function(result){
                $("#detail_palette").show();
                $('#boxDetail').html(result);
            }
        });
    }
}

// function myCurrency(evt) {
//     var charCode = (evt.which) ? evt.which : event.keyCode;
//     if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
//         return false;
//     return true;
// }

// function getComa(value, id, no){
//     angka = value.toString().replace(/\,/g, "");
//     $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
// }

function simpanData(){
    $('#formku').submit();
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>