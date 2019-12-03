<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/create_spb'); ?>"> Create Surat Permintaan Barang (SPB)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1 || $group_id == 21)||($hak_akses['create_spb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Ingot/save_spb_rsk'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?=$header['no_spb'];?>">
                            <input type="hidden" id="id" name="id" value="<?=$header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Rongsok yang Dibutuhkan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jumlah" name="jumlah" 
                                class="form-control myline" style="margin-bottom:5px; background: green; color: white;" readonly="readonly" value="<?php echo $header['jumlah']; ?> KG">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Jenis SPB
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_spb" name="jenis_spb" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;">
                                <option></option>
                                <option value="0" <?=(($header['jenis_spb']==0)? 'selected="selected"' : '""');?>>SDM</option>
                                <option value="5" <?=(($header['jenis_spb']==5)? 'selected="selected"' : '""');?>>Kirim Rongsok</option>
                                <option value="6" <?=(($header['jenis_spb']==6)? 'selected="selected"' : '""');?>>SO</option>
                                <option value="7" <?=(($header['jenis_spb']==7)? 'selected="selected"' : '""');?>>Retur</option>
                                <option value="8" <?=(($header['jenis_spb']==8)? 'selected="selected"' : '""');?>>Repacking</option>
                                <option value="10" <?=(($header['jenis_spb']==10)? 'selected="selected"' : '""');?>>Tali Rolling</option>
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Pemohon
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks'];?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%;">Nama Item Rongsok</th>
                                <th>UOM</th>
                                <th>Netto</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="rongsok_id_1" name="myDetails[1][rongsok_id]" value="">
                                <td><select id="name_rongsok_1" name="myDetails[1][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value,1);">
                                    <option value=""></option>
                                    <?php foreach ($list_rongsok as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?='('.$value->kode_rongsok.') '.$value->nama_item;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td><input type="text" id="uom_1" name="myDetails[1][uom]" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="netto_1" name="myDetails[1][netto]" class="form-control myline" maxlength="10"></td>
                                <td><input type="text" name="myDetails[1][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
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
                        <i class="fa fa-floppy-o"></i> Create SPB </a>

                    <a href="<?php echo base_url('index.php/Ingot'); ?>" class="btn blue-hoki"> 
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
function get_uom(id, nmr){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Ingot/get_uom'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#rongsok_id_'+nmr).val(id);
                $('#uom_'+nmr).val(result['uom']);
                console.log($('#rongsok_id_'+nmr).val());
            }
        });
    }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#remarks").val()) == ""){
        $('#message').html("Catatan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').submit(); 
    };
};

function saveDetail(id){
    if($.trim($("#name_rongsok_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama item rongsok!");
        $('.alert-danger').show();
    }else if($.trim($("#netto_"+id).val()) == ""){
        $('#message').html("Jumlah netto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $("#name_rongsok_"+id).attr('disabled','disabled');
        $("#save_"+id).attr('disabled','disabled');
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_dtr>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<input type="hidden" id="rongsok_id_'+new_id+'" name="myDetails['+new_id+'][rongsok_id]" value="">'+
                '<td><select id="name_rongsok_'+new_id+'" name="myDetails['+new_id+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value,'+new_id+');">'+
                    '<option value=""></option>'+
                    '<?php foreach($list_rongsok as $v){ print('<option value="'.$v->id.'">'.$v->nama_item.'</option>');}?>'+
                '</select>'+
                '</td>'+
                '<td><input type="text" id="uom_'+new_id+'" name="myDetails['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
                '<td><input type="text" id="netto_'+new_id+'" name="myDetails['+new_id+'][netto]" class="form-control myline" maxlength="10" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>'+
                '<td><input type="text" name="myDetails['+new_id+'][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>'+
            '</tr>'
        );
        $('#name_rongsok_'+new_id).select2();
    }
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
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
});
</script>
      