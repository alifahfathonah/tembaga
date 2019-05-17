<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pengiriman Ampas  
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/PengirimanAmpas/create_dta'); ?>"> Create Daftar Timbang Ampas </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtr']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/PengirimanAmpas/save_dta'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTA <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dta" name="no_dta" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto Generate">
                            <!-- <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>"> -->

                        </div>
                    </div>
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
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Barang yang Dikirim <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jb_id" name="jb_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                        <?php foreach ($rongsok as $value){ 
                            echo "<option value='".$value->id."'>".$value->nama_item."</option>";
                        }?>
                            </select>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">  
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="AMPAS">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
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
                                class="form-control myline" style="margin-bottom:5px"></textarea>                           
                        </div>
                    </div>
                    
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Jenis Barang</th>
                                <th>UOM</th>
                                <th>Berat</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                    <td width="25%">
                                        <select id="jenis_barang_1" name="details[1][jenis_barang]" class="form-control myline select2me" data-placeholder="Pilih..." style="margin-bottom:5px;" onChange="get_uom(this.value,1);">
                                            <option value=""></option>
                                            <?php foreach ($rongsok as $value){ 
                                                echo "<option value='".$value->id."'>".$value->nama_item." (".$value->kode_rongsok.")</option>";
                                            }?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="details[1][jenis_barang_id]" id="jenis_barang_id_1">
                                    <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="berat_1" name="details[1][berat]" class="form-control myline"></td>
                                    <td><input type="text" id="ket_1" name="details[1][ket]" class="form-control myline"></td>
                                    <td style="text-align:center">
                                        <a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input(1);" style="margin-top:5px" id="save_1"><i class="fa fa-plus"></i> Tambah </a>
                                        <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
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
                        <i class="fa fa-floppy-o"></i> Create DTA </a>

                    <a href="<?php echo base_url('index.php/PengirimanAmpas/gudang_ampas'); ?>" class="btn blue-hoki"> 
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
function create_new_input(id){
    if($.trim($("#jenis_barang_id_"+id).val()) == ""){
        $('#message').html("Silahkan Pilih item rongsok!");
        $('.alert-danger').show(); 
    }else if($('#berat_'+id).val()==''){
        $('#message').html("Berat tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $("#jenis_barang_"+id).attr('disabled','disabled');
        $("#save_"+id).attr('disabled','disabled');
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_barang>tbody").append(
        '<tr>'+
            '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
            '<td width="25%">'+
                '<select id="jenis_barang_'+new_id+'" name="details['+new_id+'][jenis_barang]" class="form-control myline select2me" data-placeholder="Pilih..." style="margin-bottom:5px;" onChange="get_uom(this.value,'+new_id+');">'+
                        '<option value=""></option>'+
                        '<?php foreach($rongsok as $value){ print('<option value="'.$value->id.'">'.$value->nama_item.' ('.$value->kode_rongsok.')</option>');}?>'+
                '</select>'+
            '</td>'+
            '<input type="hidden" name="details['+new_id+'][jenis_barang_id]" id="jenis_barang_id_'+new_id+'">'+
            '<td><input type="text" id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
            '<td><input type="text" id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline"></td>'+
            '<td><input type="text" id="ket_'+new_id+'" name="details['+new_id+'][ket]" class="form-control myline"></td>'+
            '<td style="text-align:center">'+
                '<a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input('+new_id+');" style="margin-top:5px" id="save_'+new_id+'"><i class="fa fa-plus"></i> Tambah </a>'+
                '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
            '</td>'+
        '</tr>');
        $('#jenis_barang_'+new_id).select2();
    }
}

// function get_data(id){
//     $("#produksi_id_"+id).val($("#id_produksi_"+id).val());
//     var id_produksi = $("#id_produksi_"+id).val();
//     console.log(id_produksi);
//     if(id_produksi!=''){    
//         var check = check_duplicate();
//         if(check){
//         $.ajax({
//             url: "<?php echo base_url('index.php/PengirimanAmpas/get_data_bs'); ?>",
//             async: false,
//             type: "POST",
//             data: "id="+id_produksi,
//             dataType: "json",
//             success: function(result) {
//                 console.log(id);
//                 $('#berat_'+id).val(result['berat']);
//                 $('#uom_'+id).val(result['uom']);
//             }
//         });
//         } else {
//             alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
//             $("#id_produksi_"+id).val('');
//             $("#produksi_id_"+id).val('');
//         }
//     }
// }

function get_uom(id, nmr){
    if($.trim($('#jenis_barang_'+nmr).val())!=''){
        $.ajax({
            url: "<?php echo base_url('index.php/BeliRongsok/get_uom_po'); ?>",
            type: "POST",
            data: {iditem: id},
            dataType: "json",
            success: function(result) {
                $('#uom_'+nmr).val(result['uom']);
                $('#jenis_barang_id_'+nmr).val(result['id']);
            }
        });
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
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
});
</script>
      