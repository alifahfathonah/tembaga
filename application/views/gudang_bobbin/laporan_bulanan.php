<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/laporan_status'); ?>"> Laporan Bobbin </a> 
        </h5>          
    </div>
</div>
   <div class="row">&nbsp;</div>
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
  
   <div class="col-md-12" style="margin-top: 10px;"> 
        <h3>Laporan Bulanan</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_cost(this.value);">
                                    <option></option>
                                    <option value="0">Bobbin Kosong (Ready)</option>
                                    <option value="1">Bobbin Isi (Used)</option>
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
            <hr class="divider">
            <div class="collapse well" id="form_add">
                <form class="eventInsForm" method="post" target="_self" name="formku" 
                id="formku" action="<?php echo base_url('index.php/GudangBobbin/add_laporan'); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    Tanggal 
                                    <font color="#f00">*</font>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="tanggal_filter" name="tanggal_filter" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('01-m-Y'); ?>">
                                            &nbsp; &nbsp; 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    Jenis Status <font color="#f00">*</font>
                                </div>
                                <div class="col-md-12">
                                    <select id="jenis_status" name="jenis_status" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                            <option></option>
                                            <option value="0">Bobbin Kosong (Ready)</option>
                                            <option value="1">Bobbin Isi (Used)</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                                <div class="col-md-12">
                                    <a href="javascript:;" onclick="addLaporan()" class="btn green" >
                                        <i class="fa fa-plus"></i> Input 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="row">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Stok Awal Laporan List
                        </div> 
                        <div class="tools">
                            <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>               
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Tanggal</th>
                            <th>Jenis Status</th>
                            <th>Jumlah</th>
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
                                <td><?php
                                if($data->jenis==0){
                                    echo '<div style="background-color:green; color:white; padding:4px">Ready</div>';
                                }else if($data->jenis==1){
                                    echo '<div style="background-color:blue; color:white; padding:4px">Used</div>';
                                }else if($data->jenis==2){
                                    echo '<div style="background-color:yellow; color:black; padding:4px">Delivered</div>';
                                }else if($data->jenis==3){
                                    echo '<div style="background-color:orange; color:white; padding:4px">Booked</div>';
                                }
                                ?></td>
                                <td style="text-align:center"><?=$data->jumlah?></td>
                                <td><?php echo $data->realname; ?></td>
                                <td style="text-align:center">
                                    <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangBobbin/detail_bobbin_laporan/<?php echo $data->id;?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a>
                                    <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangBobbin/delete_laporan/<?php echo $data->id;?>" onclick="return confirm('Anda yakin menghapus transaksi ini?');" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-trash"></i> Hapus &nbsp; </a>
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
function simpanData(){
    if($.trim($("#laporan").val()) == ""){
        $('#message').html("Laporan harus diisi, tidak boleh kosong!");
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
        window.open('<?php echo base_url();?>index.php/GudangBobbin/print_laporan_bulanan?ts='+s+'&te='+e+'&l='+l,'_blank');
    };
};

function addLaporan(){
    if($.trim($("#tanggal_filter").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#jenis_status").val()) == ""){
        $('#message').html("Jenis Status harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $('#formku').submit();
    }
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
    $("#tanggal_filter").datepicker({
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