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
            if( ($group_id==1 || $group_id==21)||($hak_akses['add_spb']==1) ){
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
                            No. SPB BB<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_bobbin']; ?>">
                            
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
                    <div class="row">
                        <div class="col-md-4">
                            Pemohon
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" style="margin-bottom: 5px" readonly name="nama_pemohon" value="<?php echo $header['pemohon'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px" readonly name="jenis_packing" value="<?php echo $header['nama_jenis'] ?>">

                            <input type="hidden" name="id_jenis" id="id_jenis" value="<?php echo $header['jenis_packing'] ?>">
                        </div>
                    </div>
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
                        <table class="table table-bordered table-striped table-hover" id="tabel_bobbin">
                            <thead>
                                <th>No</th>
                                <th>Nomor Bobbin</th>
                                <th>Jumlah</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                        <?php if($header['status']==0) { ?>
                            <tr>
                                <td style="text-align:center"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="id_size_1" name="details[1][id_size]">
                                <td>
                                    <select id="jenis_size_1" name="details[1][jenis_size]" placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom: 5px;" onchange="check(1);">
                                        <option value=""></option>
                                        <?php foreach ($jenis_size as $row) {
                                            echo '<option value="'.$row->id.'">('.$row->bobbin_size.") ".$row->keterangan."</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="text" id="qty_1" name="details[1][qty]" class="form-control myline"></td>
                                <td style="text-align:center">
                                    <a id="add_1" href="javascript:;" class="btn btn-xs btn-circle green" onclick="create_new_input(1);" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="del_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                            </tr>
                        <?php }else{ $no=0; foreach ($myDetail as $row) { $no++;
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.$row->bobbin_size.'</td>';
                                    echo '<td>'.$row->jumlah.'</td>';
                                    echo '<td>'.$row->keterangan.'</td>';
                                    echo '<tr>';
                            }
                        } ?>
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
function check(id){
    var check = check_duplicate();
    if(check){

    }else{
        alert('Inputan tidak boleh sama !');
        $('#jenis_size_'+id).select2('val','');
    }
}

function check_duplicate(){
    var valid = true;
        $.each($("select[name$='[jenis_size]']"), function (index1, item1) {
            $.each($("select[name$='[jenis_size]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item bobbin ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function create_new_input(id){
    if($('#qty_'+id).val()==''){
        alert('Jumlah tidak boleh kosong !');
    }else{
        var new_id = id+1;
        $("#id_size_"+id).val($('#jenis_size_'+id).val());
        $("#jenis_size_"+id).prop('disabled', true);
        $("#qty_"+id).prop('readonly', true);
        $("#del_"+id).removeClass('disabled');
        $("#add_"+id).hide();
        $("#no_tabel_"+id).prop('readonly', true);

        $("#tabel_bobbin>tbody").append(
            '<tr>'+
                '<td style="text-align:center"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<input type="hidden" id="id_size_'+new_id+'" name="details['+new_id+'][id_size]">'+
                '<td>'+
                    '<select id="jenis_size_'+new_id+'" name="details['+new_id+'][jenis_size]" placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom: 5px;" onchange="check('+new_id+');">'+
                        '<option value=""></option>'+
                        '<?php foreach ($jenis_size as $row) { print('<option value="'.$row->id.'">('.$row->bobbin_size.") ".$row->keterangan."</option>"); } ?>'+
                    '</select>'+
                '</td>'+
                '<td><input type="text" id="qty_'+new_id+'" name="details['+new_id+'][qty]" class="form-control myline"></td>'+
                '<td style="text-align:center">'+
                    '<a id="add_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle green" onclick="create_new_input('+new_id+');" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="del_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Hapus </a>'+
                '</td>'+
            '</tr>');
        $('#jenis_size_'+new_id).select2();
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
      