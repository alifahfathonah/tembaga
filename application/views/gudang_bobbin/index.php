<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Bobin'); ?>"> Kelola Bobin </a>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Bobbin <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nomor_bobbin" name="nomor_bobbin" readonly="readonly" 
                                        class="form-control myline" style="margin-bottom:5px">
                                    
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Tipe <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control myline" name="tipe" onchange="get_packing(this.value)" id="tipe_edit" placeholder="Silahkan pilih" style="margin-bottom: 5px;">
                                        <option value=""></option>
                                        <?php foreach ($size_list as $v) {
                                            echo '<option value="'.$v->id.'">'.$v->bobbin_size.' ('.$v->jenis_packing.')</option>';
                                        }?>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Urut <font color="#f00">*</font><br/>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nomor_urut_edit" name="nomor_urut_edit" maxlength="10"
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Milik <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control myline" name="owner" id="milik_edit" placeholder="Silahkan pilih" style="margin-bottom:5px">
                                        <option value=""></option>
                                        <?php foreach ($owner_list as $v) {
                                            echo '<option value="'.$v->id.'">'.$v->kode_owner.' ('.$v->nama_owner.')</option>';
                                        }?>
                                    </select>
                                    <input type="hidden" name="id_packing" id="id_packing">
                                    <input type="hidden" name="bobbin_s" id="bobbin_s">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Berat (Kg) <font color="#f00">*</font><br/>
                                    <a href="javascript:;" class="btn btn-circle btn-xs blue" onclick="hitung_berat()"><i class="fa fa-dashboard"></i> Hitung </a>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="berat_edit" name="berat" maxlength="10"
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Status <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control myline" name="status_edit" id="status_edit" placeholder="Silahkan pilih" style="margin-bottom:5px">
                                        <option value="0" style="background-color: green; color: white;">Ready</option>
                                        <option value="1" style="background-color: blue; color: white;">Used</option>
                                        <option value="2" style="background-color: yellow; color: white;">Delivered</option>
                                        <option value="3" style="background-color: orange; color: white;">Booked</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Last Modified
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="last_modified" name="last_modified" readonly 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpandata();">Simpan</button>
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
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message_index">&nbsp;</span>
                </div>
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
        <div id="form_add" class="collapse well">
        <form class="eventInsForm" method="post" target="_self" name="formbobbin" 
              id="formbobbin" action="<?php echo base_url('index.php/GudangBobbin/save'); ?>">  
            <div class="row">
                <div class="col-md-5">
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
                            Tipe <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select required="required" class="form-control myline select2me" name="tipe" onchange="get_packing_2(this.value)" placeholder="Silahkan pilih" style="margin-bottom:5px" >
                                <option value=""></option>
                                <?php foreach ($size_list as $v) {
                                    echo '<option value="'.$v->id.'">'.$v->bobbin_size.' ('.$v->jenis_packing.')</option>';
                                }?>
                            </select>
                        </div>
                            <input type="hidden" name="id_packing_2" id="id_packing_2">
                            <input type="hidden" name="bobbin_s2" id="bobbin_s2">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Bobbin <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input required="required" type="text" id="nomor_b2" name="nomor_b" placeholder="Nomor Bobbin ..." 
                                class="form-control myline" style="margin-bottom:5px" value="" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Milik <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select required="required" class="form-control myline select2me" name="owner" placeholder="Silahkan pilih" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php foreach ($owner_list as $v) {
                                    echo '<option value="'.$v->id.'">'.$v->kode_owner.' ('.$v->nama_owner.')</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Berat <font color="#f00">*</font>
                            <a href="javascript:;" class="btn btn-circle btn-sm blue" onclick="hitung_berat()"><i class="fa fa-dashboard"></i> Hitung </a>
                        </div>
                        <div class="col-md-8">
                            <input required="required" type="number" id="berat" name="berat" placeholder="Berat Bobbin/Keranjang" 
                                class="form-control myline" style="margin-bottom:5px" value="">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="javascript:;" class="btn green" onclick="simpanBobbin();"> 
                                <i class="fa fa-floppy-o"></i> Simpan Bobbin </a>
                        </div>    
                    </div> 
                </div>
            </div>
        </form>
        <hr class="divider"/>
    </div>
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="filter" 
        id="filter">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-8">
                                <select  id="jb" name="jb" placeholder="Silahkan pilih..."
                                    class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="0">Ready</option>
                                    <option value="1">Used</option>
                                    <option value="2">Delivered</option>
                                    <option value="3">Booked</option>  
                                </select> 
                            </div>
                            <div class="col-md-4">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>
    </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Data Bobin
                </div>
                <div class="tools">
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Status</a>
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                ?>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
                        <i class="fa fa-plus"></i> Tambah</a>
                <?php
                    }  
                ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nomor Bobin</th>
                    <th>Jenis Packing</th>   
                    <th>Ukuran</th>
                    <th>Berat (Kg)</th>
                    <th>Pemilik</th>
                    <th>Status</th> 
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
                        <td><?php echo $data->nomor_bobbin; ?></td>
                        <td><?php echo $data->jenis_packing; ?></td>
                        <td><?php echo $data->bobbin_size; ?></td>
                        <td style="text-align:right"><?php echo $data->berat; ?></td>
                        <td><?php echo $data->nama_owner; ?></td>
                        <td style="text-align:center">
                        <?php 
                            if($data->status==0){
                                echo '<div style="background-color:green; color:white; padding:4px">Ready</div>';
                            }else if($data->status==1){
                                echo '<div style="background-color:blue; color:white; padding:4px">Used</div>';
                            }else if($data->status==2){
                                echo '<div style="background-color:yellow; color:black; padding:4px">Delivered</div>';
                            }else if($data->status==3){
                                echo '<div style="background-color:orange; color:white; padding:4px">Booked</div>';
                            }  
                        ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==1)||($hak_akses['edit']==1) ){
                            ?>
                            <a class="btn btn-circle btn-xs green" onclick="editData(<?php echo $data->id; ?>)" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }
                                if( ($group_id==1)||($hak_akses['view']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/view/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs blue" style="margin-bottom:4px">
                                <i class="fa fa-book"></i> View </a>
                            <?php }if( ($group_id==1)||($hak_akses['delete']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/GudangBobbin/delete/<?php echo $data->id; ?>" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');">
                                <i class="fa fa-trash-o"></i> Hapus </a>
                            <?php } if( ($group_id==1)||($hak_akses['delete']==1) ){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/GudangBobbin/print_barcode_bobbin?id=<?php echo $data->id; ?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php } ?>
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
var dsState;


function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanBobbin(){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/cek_bobbin_unique'); ?>",
        async: false,
        type: "POST",
        data: {
            nomor_urut:$('#nomor_b2').val(),
            bobbin_size:$('#bobbin_s2').val()
        },
        dataType: "json",
        success: function(result) {
            if(result['message_type']=='sukses'){
                $('#formbobbin').submit();
            }else if(result['message_type']=='error'){
                $('#message_index').html("Nomor Bobbin ada yang sama!");
                $('.alert-danger').show(); 
            }
        }
    });
}

function newData(){
    $('#nama_bobin').val('');
    $('#ukuran').val('');
    $('#berat').val('0');

    $('#id').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Data Bobin');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/cek_bobbin_unique_id'); ?>",
        async: false,
        type: "POST",
        data: {
            id: $('#id').val(),
            nomor_urut:$('#nomor_urut_edit').val(),
            bobbin_size:$('#bobbin_s').val()
        },
        dataType: "json",
        success: function(result) {
            if(result['message_type']=='sukses'){           
                $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/update");
                $('#formku').submit();
            }else if(result['message_type']=='error'){
                $('#message').html("Nomor Bobbin ada yang sama!");
                $('.alert-danger').show(); 
            }
        }
    });
}

function get_packing_2(id){
    $.ajax({
            url: "<?php echo base_url('index.php/GudangBobbin/get_packing'); ?>",
            async: false,
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                    $('#id_packing_2').val(result['id_packing']);
                    $('#bobbin_s2').val(result['bobbin_size']);
            }
        });
}

function get_packing(id){
    $.ajax({
            url: "<?php echo base_url('index.php/GudangBobbin/get_packing'); ?>",
            async: false,
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#id_packing').val(result['id_packing']);
                $('#bobbin_s').val(result['bobbin_size']);
            }
        });
}

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#nomor_bobbin').val(result['nomor_bobbin']);
            $('#tipe_edit').val(result['m_bobbin_size_id']);
            $('#id_packing').val(result['m_jenis_packing_id']);
            $('#milik_edit').val(result['owner_id']);
            $('#berat_edit').val(result['berat']);
            $('#nomor_urut_edit').val(result['nomor_urut']);
            $('#status_edit').val(result['status']);
            $('#bobbin_s').val(result['bobbin_size']);
            $('#last_modified').val(result['modified_at']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Bobin');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});

function filterData(){
    var id=$('#jb').val();
    window.location = '<?php echo base_url('index.php/GudangBobbin/filter/');?>'+id;
}

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