<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> Data Uang Masuk </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_spb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Finance/save_pmb'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Pembayaran<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pmb" name="no_pmb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_pembayaran']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['realname']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <hr class="divider"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Voucher ID</th>
                                <th>Jenis Voucher</th>
                                <th>Jenis Barang</th>
                                <th>Amount</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tbody id="boxDetailVoucher">

                                </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                    <select id="vc_id" name="vc_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_vc(this.value);">
                                    </select>
                                </td>
                                <td><input type="text" id="jenis_voucher" name="jenis_voucher" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="jenis_barang" name="jenis_barang" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="amount_vc" name="amount_vc" class="form-control myline" readonly="readonly"/></td>
                                <td><input type="text" id="keterangan_vc" name="keterangan_vc" class="form-control myline" readonly="readonly" onkeyup="this.value = this.value.toUpperCase()"></td>      
                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail_vc();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="divider"/>
            <?php if ($header['status']==0) { ?>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Amount</th>
                                <th>Jenis Pembayaran</th>
                                <th>Bank Pembayaran</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetailUm">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row">&nbsp;</div>
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                <h4 align="center">Detail Uang Masuk</h4>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Jenis Pembayaran</th>
                                <th>Bank Pembayaran</th>
                                <th>Rekening Pembayaran</th>
                                <th>Amount</th>
                                <th>Keterangan</th> 
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                 $total=0;
                                  foreach($myData as $v){ 
                                ?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$v->jenis_pembayaran;?></td>
                                        <td><?=$v->bank_pembayaran;?></td>
                                        <td><?=$v->rekening_pembayaran;?></td>
                                        <td><?=number_format($v->nominal,0,',','.');?></td>
                                        <td><?=$v->keterangan;?></td>
                                    </tr>
                                    <?php 
                                    $no++; 
                                    $total=$v->nominal+$total; 
                                    } 
                                    ?>
                                    <tr>
                                        <td colspan="4">Total Amount</td>
                                        <td><?=number_format($total,0,',','.');?></td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <?php 
            }
            ?>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($header['status']==0) { ?>
                    <a href="javascript:;" class="btn green" onclick="simpanData_um();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <?php } ?>                        
                    <a href="<?php echo base_url('index.php/Finance/pembayaran'); ?>" class="btn blue-hoki"> 
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
function load_vc(){
    $.ajax({
        url: "<?php echo base_url('index.php/finance/get_vc_list'); ?>",
        async: false,
        type: "POST",
        dataType: "html",
        success: function(result) {
            $('#vc_id').html(result);
        }
    })
}

function get_data_vc(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_data_voucher'); ?>",
            async: false,
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#jenis_voucher').val(result['jenis_voucher']);
                $('#jenis_barang').val(result['jenis_barang']);
                $('#amount_vc').val(result['amount']);
                $('#keterangan_vc').val(result['keterangan']);
            }
        });
    }
}

function loadDetail_vc(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/load_detail_pembayaran'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetailVoucher').html(result);     
        }
    });
}

function saveDetail_vc(){
    if($.trim($("#vc_id").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Finance/save_detail_pembayaran'); ?>',
            data:{
                id:$('#id').val(),
                vc_id:$('#vc_id').val(),
                amount:$('#amount').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_vc(<?php echo $header['id'];?>);
                    $("#vc_id").select2("val", "");
                    $("#jenis_voucher").val('');
                    $("#jenis_barang").val('');
                    $("#amount_um").val('');
                    $("#keterangan").val('');
                    $('#message').html("");
                    $('.alert-danger').hide();
                    load_vc();
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail_vc(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Finance/delete_detail_pembayaran'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_vc(<?php echo $header['id'];?>);
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}

// DIBAWAH CODINGAN UANG MASUK
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function get_data_um(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_data_um'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#jenis_pembayaran').val(result['jenis_pembayaran']);
            $('#bank_pembayaran').val(result['bank_pembayaran']);
            $('#amount_um').val(result['amount']);
            $('#keterangan_um').val(result['keterangan']);
        }
    });
    }
}

function loadDetail_um(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/load_detail_um'); ?>',
        data:{
                id:id,
                um_id:$('#id').val()
            },
        success:function(result){
            $('#boxDetailUm').html(result);     
        }
    });
}

function saveDetail_um(){
    if($.trim($("#um_id").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Finance/save_detail_um'); ?>',
            data:{
                id:$('#id').val(),
                um_id:$('#um_id').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_um(<?php echo $header['id'];?>);
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail_um(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Finance/delete_detail_um'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_um(<?php echo $header['id'];?>);
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
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
    loadDetail_vc(<?php echo $header['id']; ?>);
    loadDetail_um(<?php echo $header['id']; ?>);
    load_vc();
});
</script>
      