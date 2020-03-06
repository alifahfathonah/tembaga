<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/index'); ?>">Gudang FG</a> 
        </h5>          
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                <button class="close" data-close="alert"></button>
                <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
            </div>
        </div>
    </div>
   <div class="col-md-12" style="margin-top: 10px;"> 
        <h3>Laporan Produksi FG</h3>
        <hr class="divider">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Jenis Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="0">Global</option>
                                <option value="1">TMS</option>
                                <option value="2">KMP</option>
                                <option value="3">Indoka</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Awal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_start" name="tgl_start" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('01-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Akhir <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_end" name="tgl_end" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-search"></i> Proses </a>
                        </div>    
                    </div>
                </div>        
            </div>
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
                                <div class="col-md-4">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('Y-m-01'); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                   Jenis Barang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="jenis_barang_id" name="jenis_barang_id" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                        <option value=""></option>
                                        <?php
                                            foreach ($jb as $row){
                                                echo '<option value="'.$row->id.'">'.$row->jenis_barang.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Netto <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="netto" name="netto" class="form-control myline" style="margin-bottom:5px" placeholder="Netto ...">                                                                       
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="prosesStok();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="divider">
            <div class="row">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Stok Awal Laporan List
                        </div> 
                        <div class="tools">
                            <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" onclick="createStokAwal();"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>               
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Tipe</th>
                            <th>Netto</th>
                            <th>Dibuat Oleh</th> 
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
                                <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                <td><?php echo $data->nama; ?></td>
                                <td><?=($data->tipe==0)? 'Stok Awal' : 'Koreksi';?></td>
                                <td style="text-align:center"><?php echo number_format($data->netto,2,',','.'); ?></td>
                                <td><?php echo $data->realname; ?></td>
                                <td style="text-align:center">
                                    <a class="btn btn-circle btn-xs blue" onclick="editData(<?=$data->id;?>);" style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a>
                                    <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangFG/delete_stok/<?php echo $data->id;?>/1" onclick="return confirm('Anda yakin menghapus transaksi ini?');" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-trash"></i> Hapus &nbsp; </a>
                                </td>
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
<script type="text/javascript">
var dsState;

function createStokAwal(){
    $('#netto').val('');
    $('#customer_id').val('');
    $('#id').val('');
    dsState = "Input";

    $("#myModal").find('.modal-title').text('Create Stok Awal');
    $("#myModal").modal('show',{backdrop: 'true'});
}

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/GudangFG/edit_stok'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#tipe_laporan').select2('val',result['tipe']);
            $('#netto').val(result['netto']);
            $('#tanggal').val(result['tanggal']);
            $('#customer_id').select2('val',result['customer_id']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Rongsok');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function simpanData(){
    if($.trim($("#laporan").val()) == ""){
        $('#message').html("Laporan harus dipilih, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tgl_start").val()) == ""){
        $('#message').html("Tanggal Awal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tgl_end").val()) == ""){
        $('#message').html("Tanggal Akhir harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        var l=$('#laporan').val();
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.open('<?php echo base_url();?>index.php/GudangFG/print_laporan_produksi_fg?l='+l+'&ts='+s+'&te='+e,'_blank');
    };
}

function prosesStok(){
    if($.trim($("#tanggal").val()) == ""){
        $('#msg_voucher').html("Tanggal harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show();
    }else if($.trim($("#jenis_barang_id").val()) == ""){
        $('#msg_voucher').html("Jenis Barang harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show();
    }else if($.trim($("#netto").val()) == "" || $("#netto").val()=="0"){
        $('#msg_voucher').html("Netto harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show();
    }else{
        if(dsState=="Input"){
            $('#msg_voucher').html("");
            $('#box_error_voucher').hide();
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/save_stok_laporan");
            $('#formku').submit(); 
        }else{
            $('#msg_voucher').html("");
            $('#box_error_voucher').hide();
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/update_stok_laporan");
            $('#formku').submit(); 
        }
    };
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });    
});
</script>