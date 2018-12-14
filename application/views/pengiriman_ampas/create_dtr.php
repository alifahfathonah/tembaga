<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pengiriman Ampas  
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/PengirimanAmpas/create_dtr'); ?>"> Create DTR Ampas </a> 
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
              id="formku" action="<?php echo base_url('index.php/PengirimanAmpas/save_dtr'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTR <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
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
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">  
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
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
                                class="form-control myline" style="margin-bottom:5px"readonly>BARANG BS TRANSFER KE RONGSOK</textarea>                           
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
                                <th>No. Produksi</th>
                                <th>Berat</th>
                                <th>UOM</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                    <td>
                                        <select id="id_produksi_1" name="details[1][id_produksi]" class="form-control myline" data-placeholder="Pilih..." style="margin-bottom:5px" onChange="get_data(1);">
                                            <option value=""></option>
                                        <?php foreach ($list_bs as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->no_produksi;?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="details[1][produksi_id]" id="produksi_id_1">
                                    <td><input type="text" id="berat_1" name="details[1][berat]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                    <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input(1);" style="margin-top:5px" id="save_1"><i class="fa fa-plus"></i> Tambah </a>
                                    <td style="text-align:center"><a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>
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
                        <i class="fa fa-floppy-o"></i> Create DTR </a>

                    <a href="<?php echo base_url('index.php/PengirimanAmpas'); ?>" class="btn blue-hoki"> 
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
        $("#id_produksi_"+id).attr('disabled','disabled');
        $("#save_"+id).attr('disabled','disabled');
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_barang>tbody").append(
        '<tr>'+
            '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
            '<td>'+
                '<select id="id_produksi_'+new_id+'" name="details['+new_id+'][id_produksi]" class="form-control myline" data-placeholder="Pilih..." style="margin-bottom:5px" onChange="get_data('+new_id+');">'+
                    '<option value=""></option>'+
            '<?php foreach ($list_bs as $value){ print('<option value="'.$value->id.'";>'.$value->no_produksi.'</option>'); } ?>'+
                '</select>'+
            '</td>'+
            '<input type="hidden" name="details['+new_id+'][produksi_id]" id="produksi_id_'+new_id+'">'+
            '<td><input type="text" id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" readonly="readonly"></td>'+
            '<td><input type="text" id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
            '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input('+new_id+');" style="margin-top:5px" id="save_'+new_id+'"><i class="fa fa-plus"></i> Tambah </a>'+
            '<td style="text-align:center"><a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>'+
            '</td>'+
        '</tr>');
    }

    function check_duplicate(){
    var valid = true;
        $.each($("select[name$='[id_produksi]']"), function (index1, item1) {
            $.each($("select[name$='[id_produksi]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_data(id){
    $("#produksi_id_"+id).val($("#id_produksi_"+id).val());
    var id_produksi = $("#id_produksi_"+id).val();
    console.log(id_produksi);
    if(id_produksi!=''){    
        var check = check_duplicate();
        if(check){
        $.ajax({
            url: "<?php echo base_url('index.php/PengirimanAmpas/get_data_bs'); ?>",
            async: false,
            type: "POST",
            data: "id="+id_produksi,
            dataType: "json",
            success: function(result) {
                console.log(id);
                $('#berat_'+id).val(result['berat']);
                $('#uom_'+id).val(result['uom']);
            }
        });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
            $("#id_produksi_"+id).val('');
            $("#produksi_id_"+id).val('');
        }
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
      