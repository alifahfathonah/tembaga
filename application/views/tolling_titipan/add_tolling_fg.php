<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/po_list'); ?>"> PO Tolling </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/add_tolling_fg'); ?>"> Input Purchase Order </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Tolling/save_tolling_fg'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO Tolling<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php if($this->session->userdata('user_ppn')==1){ ?>
                            <input type="text" id="no_po" name="no_po" class="form-control myline" style="margin-bottom:5px" placeholder="Silahkan isi Nomor PO ..." onkeyup="this.value = this.value.toUpperCase()">
                            <?php }else{ ?>
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"
                                value="Auto generate">
                            <?php } ?>
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
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="top" id="top" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" >        
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details Tolling</a>
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
                            <select id="jenis_barang" name="jenis_barang" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <option value="WIP">WIP</option>
                                <option value="FG">Finish Good</option>
                            </select>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Marketing
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="marketing" id="marketing" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $this->session->userdata('realname'); ?>">

                            <input type="hidden" name="marketing_id" id="marketing_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PPN
                        </div>
                        <div class="col-md-8">
                            <?php
                            if($user_ppn == 0){
                            ?>
                                <input type="text" id="ppn" name="ppn" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="NO PPN">
                            
                            <?php                
                            }else{
                            ?>
                                <input type="text" id="ppn" name="ppn" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="PPN 10%">
                            <?php
                            }
                            ?>
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
        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
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
      