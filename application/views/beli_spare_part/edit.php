<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/edit'); ?>"> Edit Data Pengajuan Pembelian </a> 
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
              id="formku" action="<?php echo base_url('index.php/BeliSparePart/update'); ?>">                            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pengajuan" name="no_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_pengajuan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                            <input type="hidden" id="status" name="status" value="<?php echo $myData['status']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tgl Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tgl_pengajuan'])); ?>">
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Kebutuhan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-3">
                            <select id="jenis_kebutuhan" name="jenis_kebutuhan" class="form-control myline" 
                                    style="margin-bottom:5px" onclick="showTanggal(this.value);">
                                <option value=""></option>
                                <option value="1" <?php echo (($myData['jenis_kebutuhan']==1)? 'selected="selected"': ''); ?>>Segera</option>
                                <option value="0" <?php echo (($myData['jenis_kebutuhan']==0)? 'selected="selected"': ''); ?>>Tanggal</option>
                            </select>
                        </div>
                        <div class="col-md-5" id="boxTanggal" <?php echo (($myData['jenis_kebutuhan']==1)? 'style="display:none"': ''); ?>>
                            <input type="text" id="tgl_spare_part" name="tgl_spare_part" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tgl_sparepart_dibutuhkan'])); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3">
                            Keterangan
                        </div>
                        <div class="col-md-9">
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="form-control myline" style="margin-bottom:5px" 
                                onkeyup="this.value = this.value.toUpperCase()"><?php echo $myData['remarks']; ?></textarea>
                        </div>
                      </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item Spare Part</th>
                                <th>Unit of Measure</th>
                                <th>Jumlah</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tbody id="boxDetail">
                                    
                                </tbody>
                        <tr>
                            <td style="text-align:center">+</td>
                            <td>
                            <select id="sparepart_id" name="sparepart_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">
                            <option value=""></option>
                                    <?php
                                    foreach ($list_sparepart as $value){
                                        echo "<option value='".$value->id."'>".$value->nama_item."</option>";
                                    } ?>
                            </select>
                            </td>
                            <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                            <td><input type="text" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="3"></td>
                            <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail()" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                        </tr>
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
                        
                    <a href="<?php echo base_url('index.php/BeliSparePart'); ?>" class="btn blue-hoki"> 
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
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&& (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function showTanggal(nilai){
    if(nilai=="0"){
        $('#boxTanggal').show();
    }else{
        $('#boxTanggal').hide();
    }
}

function simpanData(){
    if($.trim($("#jenis_kebutuhan").val()) == ""){
        $('#message').html("Silahkan pilih jenis kebutuhan!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/BeliSparePart/load_detail'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliSparePart/get_uom'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    })
}

function saveDetail(){
    if($.trim($("#sparepart_id").val()) == ""){
        $('#message').html("Silahkan pilih nama spare part!");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty").val()) == ""){
        $('#message').html("Jumlah spare part tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/save_detail'); ?>',
            data:{
                id:$('#id').val(),
                sparepart_id:$('#sparepart_id').val(),
                qty:$('#qty').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $("#sparepart_id").select2("val", "");
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

function updateDetail(id){
    if($.trim($("#sparepart_id_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama spare part!");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty_"+id).val()) == ""){
        $('#message').html("Jumlah spare part tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/update_detail'); ?>',
            data:{
                detail_id:$('#detail_id_'+id).val(),
                sparepart_id:$('#sparepart_id_'+id).val(),
                qty:$('#qty_'+id).val()
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
    var r=confirm("Anda yakin menghapus item spare part ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/delete_detail'); ?>',
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

function editDetail(id){
    $('#btnEdit_'+id).hide();
    $('#lbl_item_'+id).hide();
    $('#lbl_uom_'+id).hide();
    $('#lbl_qty_'+id).hide();
    
    $('#btnUpdate_'+id).show();
    $('#sparepart_id_'+id).show();
    $('#uom_'+id).show();
    $('#qty_'+id).show();
}

</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_spare_part").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });
    loadDetail(<?php echo $myData['id']; ?>);
});
</script>
      