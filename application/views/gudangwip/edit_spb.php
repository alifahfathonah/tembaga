<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang WIP
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot'); ?>"> Create SPB WIP </a> 
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
              id="formku" action="<?php echo base_url('index.php/GudangWIP/update_spb'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB WIP<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_wip']; ?>">
                            
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
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <?php 
                    if($header['flag_produksi']!=0){
                        if($header['flag_produksi']==2){
                            $jenis='ROLLING (INGOT)';
                        }else if($header['flag_produksi']==3){
                            $jenis='CUCI (KAWAT HITAM)';
                        }else if($header['flag_produksi']==4){
                            $jenis='TOLLING';
                        }else if($header['flag_produksi']==5){
                            $jenis='KIRIM KE RONGSOK';
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Keperluan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="keperluan" name="keperluan" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $jenis; ?>">
                                
                            <input type="hidden" name="flag_produksi" value="<?php echo $header['flag_produksi'];?>">
                        </div>
                    </div>
                    <?php } ?>
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
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Nama Item WIP</th>
                                <th>UOM</th>
                                <th>Quantity</th>
                                <th>Berat (Kg)</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                <select id="barang_id" name="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">
                                    <option value=""></option>
                                <?php foreach ($list_barang as $value){
                                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                                    }?>
                                </select>
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="qty_item" name="qty" class="form-control myline"/></td>
                                <td><input type="text" id="berat" name="berat" class="form-control myline"/></td>
                                <td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/GudangWIP/spb_list'); ?>" class="btn blue-hoki"> 
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
        url:'<?php echo base_url('index.php/GudangWIP/load_detail'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangWIP/get_uom'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    });
    }
}

function saveDetail(){
    if($.trim($("#barang_id").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty_item").val()) == ""){
        $('#message').html("Silahkan isi kuantitas barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#berat").val()) == ""){
        $('#message').html("Silahkan isi berat barang!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangWIP/save_detail'); ?>',
            data:{
                id:$('#id').val(),
                barang_id:$('#barang_id').val(),
                qty:$('#qty_item').val(),
                uom: $('#uom').val(),
                berat: $('#berat').val(),
                line_remarks:$('#line_remarks').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#barang_id').select2('val', '');
                    $('#uom').val('');
                    $('#berat').val('');
                    $('#qty_item').val('');
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
            url:'<?php echo base_url('index.php/GudangWIP/delete_detail'); ?>',
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
      