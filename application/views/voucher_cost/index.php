<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <a href="<?php echo base_url('index.php/VoucherCost'); ?>"> Voucher Cost </a>
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
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    No. Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_voucher" name="no_voucher" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="Auto generate">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Group Cost <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select id="group_cost_id" name="group_cost_id" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cost(this.value);">
                                        <option value=""></option>
                                        <?php
                                            foreach ($list_group_cost as $row){
                                                echo '<option value="'.$row->id.'">'.$row->nama_group_cost.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Cost <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select id="cost_id" name="cost_id" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                        <option value=""></option>
                                    </select>
                                    <input type="text" id="nm_cost" name="nm_cost" style="margin-bottom:5px" class="form-control myline hidden" disabled="disabled" placeholder="Nama Cost" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Keterangan
                                </div>
                                <div class="col-md-7">
                                    <textarea id="remarks" name="remarks" rows="3"
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span id="message">&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; margin-bottom: 5px;text-align: center">
                              <span>
                                Data Uang Keluar <!--Padding is optional-->
                              </span>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Uang Keluar
                                </div>
                                <div class="col-md-7">
                                <?php if($this->session->userdata('user_ppn')==1){?>
                                    <input type="text" id="no_uk" name="no_uk" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nomor Uang Keluar ...">
                                <?php }else{ ?>
                                    <input type="text" id="no_uk" name="no_uk" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="Auto Generate">
                                <?php } ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Giro
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nomor_giro" name="nomor_giro" 
                                        class="form-control myline" style="margin-bottom:5px" placeholder="Nomor Giro ...">   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Bank
                                </div>
                                <div class="col-md-7">
                                    <select id="bank_id" name="bank_id" class="form-control myline select2me"
                                    data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                    <?php
                                        foreach ($bank_list as $row){
                                            echo '<option value="'.$row->id.'">'.$row->kode_bank.' ('.$row->nomor_rekening.')</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal Jatuh Tempo
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal_jatuh" name="tanggal_jatuh" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Currency
                                </div>
                                <div class="col-md-7">
                                    <select id="currency" name="currency" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                                    <option value="IDR">IDR</option>
                                    <option value="USD">USD</option>
                                    </select>         
                                </div>
                            </div>
                            <div class="row" id="show_kurs">
                                <div class="col-md-5">
                                    Kurs
                                </div>
                                <div class="col-md-7">
                                    <input type="number" id="kurs" name="kurs" class="form-control myline" value="1" style="margin-bottom:5px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Amount (Rp)<font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="amount" name="amount" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="simpandata" onClick="simpandata();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

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
                    <i class="fa fa-beer"></i>Voucher Cost
                </div>
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" onclick="newData()">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Voucher</th> 
                    <th>Tanggal</th> 
                    <th>Nama Cost</th>  
                    <th>Nama Group Cost</th>   
                    <th>Keterangan</th>
                    <th>Amount (Rp)</th> 
                    <th>Actions</th>
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
                        <td><?php echo $data->nomor; ?></td>
                        <td style="text-align:center"><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_trx; ?></td>
                        <td><?php echo $data->nama_group_cost; ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td style="text-align:right"><?php echo number_format($data->amount,0,',','.'); ?></td>
                        <td style="text-align:center">                             
                            <?php 
                                if( ($group_id==1)||($hak_akses['print']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/VoucherCost/print_voucher/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs blue-ebonyclay" style="margin-bottom:4px" target="_blank"><i class="fa fa-print"></i> Print &nbsp; </a> 
                            <?php }?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
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
    $('#group_cost_id').select2('val', '');
    $('#cost_id').select2('val', '');
    $('#amount').val('');
    $('#remarks').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Voucher Cost');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#amount").val()) == ""){
        $('#message').html("Amount harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#group_cost_id").val()) == ""){
        $('#message').html("Silahkan pilih group cost!");
        $('.alert-danger').show(); 
    }else if(($.trim($("#cost_id").val()) == "") && ($.trim($("#group_cost_id").val()) == "")){
        $('#message').html("Silahkan pilih nama cost!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/BeliRongsok/get_no_uang_keluar'); ?>",
            data: {
                no_uk: $('#no_uk').val(),
                tanggal: $('#tanggal').val(),
                bank_id: $('#bank_id').val()
            },
            cache: false,
            success: function(result) {
                var res = result['type'];
                if(res=='duplicate'){
                    $('#message').html("Nomor Uang Keluar sudah ada, tolong coba lagi!");
                    $('.alert-danger').show();
                }else{
                    $('#simpandata').text('Please Wait ...').prop("onclick", null).off("click");
                    $('#message').html("");
                    $('.alert-danger').hide();
                    $('#formku').attr("action", "<?php echo base_url(); ?>index.php/VoucherCost/save");
                    $('#formku').submit(); 
                }
            }
        });                                 
    };
};

function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(1);
    }
}

function get_cost(id){   
    if (id == 3) {
        $('#cost_id').attr('disabled','disabled');
        $('#cost_id').addClass('hidden');
        $('#nm_cost').attr('disabled',false);
        $('#nm_cost').removeClass('hidden');
    } else {
        $('#cost_id').val('');
        $('#cost_id').removeAttr('disabled');
        $('#cost_id').removeClass('hidden');
        $('#nm_cost').attr('disabled','disabled');
        $('#nm_cost').addClass('hidden');
        $.ajax({
            url: "<?php echo base_url('index.php/VoucherCost/get_cost_list'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "html",
            success: function(result) {
                $('#cost_id').html(result);
            }
        });
    }
}

$(function(){ 
    $('#show_kurs').hide(); 
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    }); 
    
    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         