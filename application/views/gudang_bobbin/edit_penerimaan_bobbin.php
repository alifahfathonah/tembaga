<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG'); ?>"> Create SPB Bobbin </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/GudangBobbin/update_spb'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Penerimaan<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_penerimaan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['created_at'])); ?>">
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
                            No. Surat Jalan
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" style="margin-bottom: 5px" readonly name="nama_pemohon" value="<?php echo $header['surat_jalan'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="jenis_packing" value="<?php echo $header['nama_customer'] ?>">

                            <input type="hidden" name="id_jenis" id="id_jenis" value="<?php echo $header['nama_customer'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Peminjaman
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="jenis_packing" value="<?php echo $header['no_surat_peminjaman'] ?>">

                            <input type="hidden" name="id_jenis" id="id_jenis" value="<?php echo $header['no_surat_peminjaman'] ?>">
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
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nomor Bobbin</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/GudangBobbin/spb_list'); ?>" class="btn blue-hoki"> 
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
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/GudangBobbin/load_detail_penerimaan'); ?>',
        data:{
            id: id
        },
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_berat(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/get_berat'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#berat').val(result['berat']);
        }
    });
    }
}

function saveDetail(){
    if($.trim($("#id_bobbin").val()) == ""){
        $('#message').html("Silahkan pilih nomor bobbin!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangBobbin/save_penerimaan_bobbin_detail'); ?>',
            data:{
                id_spb_bobbin:$('#id').val(),
                id_bobbin:$('#id_bobbin').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
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

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangBobbin/delete_detail'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
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
    
    loadDetail(<?php echo $header['id']; ?>);
});
</script>
      