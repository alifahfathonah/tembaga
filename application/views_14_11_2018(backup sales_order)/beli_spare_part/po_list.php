<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>"> PO List </a> 
        </h5>          
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
                                <div class="alert alert-danger display-hide" id="box_error_voucher">
                                    <button class="close" data-close="alert"></button>
                                    <span id="msg_voucher">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    No. Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_voucher" name="no_voucher" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="Auto Generate">
                                    
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>                             
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('d-m-Y'); ?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Jenis Barang
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="jenis_barang" name="jenis_barang" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="SPARE PART">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    No. PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_po" name="no_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal_po" name="tanggal_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Supplier
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nama_supplier" name="nama_supplier" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Nilai PO (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nilai_po" name="nilai_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Total Pembayaran Sebelumnya (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="jumlah_dibayar" name="jumlah_dibayar" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Jumlah Bayar (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="amount" name="amount" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Keterangan
                                </div>
                                <div class="col-md-7">
                                    <textarea id="keterangan" name="keterangan" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>                                                                       
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="prosesVoucher();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            if( ($group_id==1)||($hak_akses['po_list']==1) ){
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
                    <i class="fa fa-beer"></i>Purchase Order List
                </div>
                <div class="tools">    
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/BeliSparePart/po_list_outdated"> <i class="fa fa-minus"></i> PO LIST OUTDATED</a>              
                </div>  
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. PO</th>
                    <th>Tanggal</th>
                    <th>No. Pengajuan</th>
                    <th>Tgl Pengajuan</th>
                    <th>Yg Mengajukan</th>
                    <th>Supplier</th> 
                    <th>PPN</th> 
                    <th>Jumlah <br>Items</th>
                    <th>Status</th>
                    <th>Voucher <br>Pembayaran</th>
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
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo $data->no_po; ?></td>
                        <?php
                        if(strtotime($data->tanggal) < strtotime('-5 days')) {
                        ?>
                        <td style="background-color: red;"><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        } else {
                        ?>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        }
                        ?>
                        <td><?php echo $data->no_pengajuan; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tgl_pengajuan)); ?></td>
                        <td><?php echo $data->created_name; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td>
                        <?php 
                            echo (($data->ppn==1)? '<i class="fa fa-check"></i> Yes': '<i class="fa fa-times"></i> No');
                        ?>
                        </td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Draft</div>';
                                }else if($data->status==1){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Closed</div>';
                                }else if($data->status==2){ 
                                    echo '<div style="background-color:yellow; padding:4px;">Processing</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if($data->flag_pelunasan==0){
                                    if( ($group_id==1 || $hak_akses['create_voucher']==1)){
                                        echo '<a class="btn btn-circle btn-xs green" href="javascript:;" onclick="createVoucher('.$data->id.');"
                                            style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                    }
                                }else{
                                    echo '<small style="color:green"><i>Sudah Lunas</i></small>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $hak_akses['view_po']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/BeliSparePart/view_po/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-o"></i> View &nbsp; </a>
                            <?php
                                }
                                if($group_id==1 || $hak_akses['print_po']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/BeliSparePart/print_po/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php
                                }
                                if( ($group_id==1 || $hak_akses['create_lpb']==1)  && $data->ready_to_lpb>0){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/BeliSparePart/create_lpb/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-truck"></i> Create LPB &nbsp; </a>                                                      
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
<script>
function createVoucher(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliSparePart/create_voucher'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            //console.log(result);
            $('#no_po').val(result['no_po']);
            $('#tanggal_po').val(result['tanggal']);
            $('#nama_supplier').val(result['nama_supplier']);
            $('#nilai_po').val(result['nilai_po']);
            $('#jumlah_dibayar').val(result['jumlah_dibayar']);
            
            $('#amount').val(result['sisa']);
            $('#keterangan').val('');
            $('#id').val(result['id']);
            
            $('#msg_voucher').html("");
            $('#box_error_voucher').hide(); 
            
            $("#myModal").find('.modal-title').text('Create Voucher Pembayaran Spare Part');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function prosesVoucher(){
    if($.trim($("#tanggal").val()) == ""){
        $('#msg_voucher').html("Tanggal harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show(); 
    }else if($.trim($("#amount").val()) == "" || $("#amount").val()=="0"){
        $('#msg_voucher').html("Amount harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show();
    }else{    
        $('#msg_voucher').html("");
        $('#box_error_voucher').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/save_voucher_pembayaran");
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
    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         