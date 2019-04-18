<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <a href="<?php echo base_url('index.php/R_Matching'); ?>"><i class="fa fa-angle-right"></i> Matching Invoice</a>
            <i class="fa fa-angle-right"></i> 
            Create Invoice
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['add']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/R_Matching/save_invoice'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice Resmi <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice" name="no_invoice" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice FG <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="invoice_id" name="invoice_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_jumlah(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($list_invoice_fg as $row){
                                        echo '<option value="'.$row->id.'">'.$row->no_invoice.'</option>';
                                    }
                                ?>
                            </select>
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
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_pembuat" name="nama_pembuat" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah (Kg)
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="qty" name="qty" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Persentase (%)
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="persentase" id="persentase" class="form-control myline" style="margin-bottom: 5px" onkeyup="hitungTotal()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Total (Kg)
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="total" id="total" class="form-control myline" style="margin-bottom: 5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
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
function hitungTotal(){
    var jumlah = $("#qty").val();
    var persentase = $("#persentase").val();
    var total = 0;

    total = (Number(jumlah) * Number(persentase)/100) + Number(jumlah);

    $("#total").val(total);
}

function get_jumlah(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/R_Matching/get_jumlah'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#qty').val(result['netto_invoice']);     
        }
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    } else if($.trim($("#no_invoice").val()) == ""){
        $('#message').html("No Invoice harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    } else if($.trim($("#qty").val()) == ""){
        $('#message').html("Jumlah harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
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