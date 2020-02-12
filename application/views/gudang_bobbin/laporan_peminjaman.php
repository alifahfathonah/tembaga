<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/laporan_peminjaman'); ?>"> Laporan Peminjaman </a> 
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
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Customer
                                </div>
                                <div class="col-md-7">
                                    <select id="customer_id" name="customer_id" class="form-control myline select2me"
                                    data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                    <?php
                                        foreach ($customer_list as $row){
                                            echo '<option value="'.$row->id.'">'.(($this->session->userdata('user_ppn') == 1)? $row->nama_customer : $row->nama_customer_kh).'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    L
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="l" name="l" class="form-control myline" placeholder="Input Stok L">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    M
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="m" name="m" class="form-control myline" placeholder="Input Stok M">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    S
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="s" name="s" class="form-control myline" placeholder="Input Stok S">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    T
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="t" name="t" class="form-control myline" placeholder="Input Stok T">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    K
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="k" name="k" class="form-control myline" placeholder="Input Stok K">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    D
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="d" name="d" class="form-control myline" placeholder="Input Stok D">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    KRJ
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="krj" name="krj" class="form-control myline" placeholder="Input Stok KRJ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    BP
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="bp" name="bp" class="form-control myline" placeholder="Input Stok BP">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="saveData" onClick="saveData();">Simpan</button>
                        <button type="button" class="btn blue" id="updateData" onClick="updateData();" style="display: none;">Update</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
  
   <div class="col-md-12" style="margin-top: 10px;"> 
        <h3>Laporan Peminjaman</h3>
        <hr class="divider">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'">'.(($this->session->userdata('user_ppn') == 1)? $row->nama_customer : $row->nama_customer_kh).'</option>';
                                    }
                                ?>
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
            <br>
            <div class="row">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Stok Awal Laporan List
                        </div> 
                        <div class="tools">
                            <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" onclick="showModal()"><i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>               
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>L</th>
                            <th>M</th>
                            <th>S</th>
                            <th>T</th>
                            <th>K</th>
                            <th>D</th>
                            <th>KRJ</th>
                            <th>BP</th>
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
                                <td><?php echo $data->nama_customer; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                <td><?=$data->L;?></td>
                                <td><?=$data->M;?></td>
                                <td><?=$data->S;?></td>
                                <td><?=$data->T;?></td>
                                <td><?=$data->K;?></td>
                                <td><?=$data->D;?></td>
                                <td><?=$data->KRJ;?></td>
                                <td><?=$data->BP;?></td>
                                <td style="text-align:center">
                                    <a class="btn btn-circle btn-xs blue" onclick="editData(<?=$data->id;?>)" style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a>
                                    <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangBobbin/delete_laporan_peminjaman/<?php echo $data->id;?>" onclick="return confirm('Anda yakin menghapus transaksi ini?');" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-trash"></i> Hapus &nbsp; </a>
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
function showModal(){
    $('#customer_id').select2('val','');
    $('#l').val('');
    $('#m').val('');
    $('#s').val('');
    $('#t').val('');
    $('#k').val('');
    $('#d').val('');
    $('#krj').val('');
    $('#bp').val('');
    $('#saveData').show();
    $('#updateData').hide();

    $("#myModal").find('.modal-title').text('Tambah Data Stok Awal Laporan');
    $("#myModal").modal('show',{backdrop: 'true'});
}

function saveData(){
    if($.trim($("#customer_id").val()) == ""){
        $('#message').html("Customer harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/save_laporan_peminjaman");
        $('#formku').submit(); 
    };
};

function editData(id){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/get_peminjaman_data'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#saveData').hide();
            $('#updateData').show();
            $('#id').val(result['id']);
            $('#customer_id').select2('val',result['customer_id']);
            $('#tanggal').val(result['tanggal']);
            $('#l').val(result['L']);
            $('#m').val(result['M']);
            $('#s').val(result['S']);
            $('#t').val(result['T']);
            $('#k').val(result['K']);
            $('#d').val(result['D']);
            $('#krj').val(result['KRJ']);
            $('#bp').val(result['BP']);

            $('#message').html("");
            $('.alert-danger').hide(); 
            
            $("#myModal").find('.modal-title').text('Edit Data');
            $("#myModal").modal('show',{backdrop: 'true'});
        }
    });
}

function updateData(){
    if($.trim($("#customer_id").val()) == ""){
        $('#message').html("Customer harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/update_laporan_peminjaman");
        $('#formku').submit(); 
    };
};

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
        window.open('<?php echo base_url();?>index.php/GudangBobbin/print_laporan_peminjaman?ts='+s+'&te='+e+'&l='+l,'_blank');
    };
};
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