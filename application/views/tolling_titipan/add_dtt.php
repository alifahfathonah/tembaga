<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/dtt_list'); ?>"> DTT Tolling </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/add_tolling_fg'); ?>"> Input Data Timbang Tolling (DTT)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['create_dtr']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Tolling/save_dtt'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTT<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_po" id="no_po" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="Auto Generate">        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="customer_id" name="customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cp(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details DTT</a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_barang" name="jenis_barang" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="getBobbin(this.value);">
                                <option value=""></option>
                                <option value="WIP">WIP</option>
                                <option value="FG">Finish Good</option>
                            </select>   
                        </div>
                    </div>
                    <div class="row hidden" id="show_packing">
                        <div class="col-md-4">
                            Jenis Packing<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="packing" name="packing" disabled placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom:5px">
                                <?php 
                                foreach($packing as $p){
                                ?>
                                <option value="<?=$p->id;?>"><?=$p->jenis_packing;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>                           
                        </div>
                    </div>         
                </div>          
            </div>
            
        </form>
        
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
<script>
function getBobbin(id){
    if(id == 'FG'){
        $('#show_packing').removeClass('hidden');
        $('#packing').prop("disabled", false);
    }else{
        $('#show_packing').addClass('hidden');
        $('#packing').prop("disabled", true);
    }
}
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#customer_id").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function get_cp(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Tolling/get_cp'); ?>",
        data: {id: id},
        cache: false,
        success: function(result){
            $("#contact_person").val(result['pic']);
        } 
    });
}
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