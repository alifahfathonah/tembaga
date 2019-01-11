<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangBobbin'); ?>"> Surat Peminjaman Bobbin</a> 
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
              id="formku" action="<?php echo base_url('index.php/GudangBobbin/update_peminjaman_bobbin'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Peminjaman<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_peminjaman" name="no_surat_peminjaman" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_peminjaman']; ?>">
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
                            Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="supplier" value="<?php echo $header['nama_supplier'] ?>">

                            <input type="hidden" name="supplier_id" id="supplier_id" value="<?php echo $header['supplier_id'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_bobbin">
                            <thead>
                                <th>No</th>
                                <th>Nomor Bobbin</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                    <input type="hidden" id="po_id_1" name="myDetails[1][po_detail_id]" value="">
                                    <input type="hidden" id="wip_id_1" name="myDetails[1][wip_id]" value="">
                                    <td><select id="bobbin_1" name="myDetails[1][bobbin]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="check(this.value,1)">
                                        <option value=""></option>
                                        <?php foreach ($bobbin_booked as $value){ ?>
                                                <option value='<?=$value->id;?>'>
                                                    <?=$value->nomor_bobbin;?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                    </td>
                                    <td style="text-align:center"><a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                        <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>
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
                        
                    <a href="<?php echo base_url('index.php/GudangBobbin/bobbin_terima'); ?>" class="btn blue-hoki"> 
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
    id_peminjaman = $('#id_peminjaman').val();
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/GudangBobbin/load_detail_penerimaan'); ?>',
        data:{
            id: id,
            id_peminjaman: id_peminjaman
        },
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function check_duplicate(){
    var valid = true;
        $.each($("select[name$='[bobbin]']"), function (index1, item1) {
            $.each($("select[name$='[bobbin]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
    return valid;
}

function check(id, nmr){
    if($.trim($('#bobbin_'+nmr).val())!=''){    
        var check = check_duplicate();
        if (check) {}
    }
}

function saveDetail(id){
    if($.trim($("#bobbin_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nomor Bobbin!");
        $('.alert-danger').show(); 
    }else{
        $("#bobbin_"+id).attr('readonly','readonly');
        $("#save_"+id).attr('disabled','disabled');
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_bobbin>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<td><select id="bobbin_'+new_id+'" name="myDetails['+new_id+'][bobbin]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">'+
                    '<option value=""></option>'+
                    '<?php foreach($bobbin_booked as $v){ print('<option value="'.$v->id.'">'.$v->nomor_bobbin.'</option>');}?>'+
                '</select>'+
                '</td>'+
                '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>'+
            '</tr>'
        );
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangBobbin/delete_penerimaan_bobbin_detail'); ?>',
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
      