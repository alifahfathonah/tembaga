<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <a href="<?php echo base_url('index.php/Matching'); ?>"><i class="fa fa-angle-right"></i> Matching Invoice</a>
            <i class="fa fa-angle-right"></i> 
            Edit Invoice 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Matching Invoice</b></h3>
        <hr class="divider" />
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
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
        <?php
            if( ($group_id==9)||($hak_akses['view_spb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice Resmi<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice_resmi" name="no_invoice_resmi" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_invoice_resmi']; ?>" onkeyup="this.value = this.value.toUpperCase()">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice FG<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice_fg" name="no_invoice_fg" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_invoice']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal"
                                class="form-control myline input-small" style="margin-bottom:5px; float: left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="pic" name="pic" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah (Kg)
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="qty" name="qty" 
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jumlah']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            
            <div class="portlet box yellow-gold">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Data DTR
                    </div> 
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                            <th style="width:40px">No</th>
                            <th>No. DTR</th>
                            <th>Netto (Kg)</th>
                        </thead>
                        <tbody id="boxDetail0">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger display-hide" id="alert-danger2">
                        <button class="close" data-close="alert"></button>
                        <span id="message2">&nbsp;</span>
                    </div>
                </div>
            </div>
            <div class="portlet box green-seagreen">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Input DTR
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4">
                            Pilih DTR
                            <select class="form-control select2me myline" id="dtr_id" name="dtr_id" onchange="loadDetail(this.value);">
                                <!-- <?php foreach ($list_dtr as $row) {
                                ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->no_dtr ?></option>
                                <?php
                                } ?> -->
                            </select>
                        </div>    
                        <div class="col-md-2">
                        </div>                    
                    </div>
                    <div class="table-scrollable" id>
                        <table class="table table-striped table-bordered table-hover" id="sample_6">
                            <thead>
                                <th></th>
                                <th style="width:40px">No</th>
                                <th>Nama Item</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Berat Pallete (Kg)</th>
                                <th>Nomor Pallete</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Invoice DTR
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Berat Pallete (Kg)</th>
                                <th>Nomor Pallete</th>
                                <th>Keterangan</th>
                                <th style="text-align: center;">Action</th>
                            </thead>
                            <tbody id="boxDetail2">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <!-- <?php
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?> -->
                    <?php
                        if( ($group_id==9 || $hak_akses['update_invoice']==1)){
                            echo '<a href="javascript:;" class="btn green" onclick="saveData();"> '
                                .'<i class="fa fa-save"></i> Simpan </a> ';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/Matching/'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
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
function load_list_dtr(){
    $.ajax({
        url:'<?php echo base_url('index.php/Matching/load_list_dtr'); ?>',
        success:function(result){
            $('#boxDetail0').html(result);     
        }
    });
}

function load_dtr(){
    $.ajax({
        url: "<?php echo base_url('index.php/Matching/get_dtr_list'); ?>",
        async: false,
        type: "POST",
        dataType: "html",
        success: function(result) {
            $('#dtr_id').html(result);
        }
    })
}

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Matching/load_detail_dtr'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function saveData(){
    $('#message2').html("");
    $('#alert-danger2').hide(); 
    $('#formku').attr('action','<?php echo base_url(); ?>index.php/Matching/saveData');
    $('#formku').submit(); 
}

function saveDetail(id){
    $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Matching/save_invoice_detail'); ?>',
            data:{
                id_dtr:$('#dtr_id_'+id).val(),
                invoice_resmi_id:$('#id').val(),
                id_barang:$('#id_barang_'+id).val(),
                dtr_detail_id:$('#dtr_detail_id_'+id).val(),
                bruto:$('#bruto_'+id).val(),
                netto: $('#netto_'+id).val(),
                berat_pallete: $('#berat_palette_'+id).val(),
                keterangan: $('#line_remarks_'+id).val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    if (result['flag_taken'] == 1) {
                        $('#dtr_id').select2('val', '');  
                    } else {
                        $('#dtr_id').select2('val', result['id_dtr']);
                    }
                    load_list_dtr();
                    load_dtr();
                    loadDetail(result['id_dtr']);
                    loadDetailInvoice($('#id').val());
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
}

function hapusDetail(id){
    console.log(id);
    var dtr_id = $('#dtr_id_'+id).val();
    console.log(dtr_id)
    var r=confirm("Anda yakin menghapus item Rongsok ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Matching/delete_invoice_detail'); ?>',
            data:{
                id_dtr: dtr_id,
                id_dtr_detail:id
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    if (result['check'] == 0) {
                        $('#dtr_id').select2('val', result['dtr_id']);
                    }
                    load_list_dtr();
                    load_dtr();
                    loadDetail(result['dtr_id']);
                    loadDetailInvoice($('#id').val());
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}

function loadDetailInvoice(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Matching/load_detail_invoice'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail2').html(result);     
        }
    });
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
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
    load_list_dtr();
    load_dtr();
    loadDetailInvoice(<?php echo $header['id']; ?>);
});
</script>

      