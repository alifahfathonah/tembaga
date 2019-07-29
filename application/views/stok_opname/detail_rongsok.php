<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Stok Opname 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/StokOpname/'); ?>"> Scan Rongsok</a>
        </h4>          
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
              id="formku" action="<?php echo base_url('index.php/StokOpname/update_rongsok'); ?>">  
              <input type="hidden" name="id" id="id" value="<?= $header['id'] ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d', strtotime($header['tanggal'])); ?>">
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
                                <th>No. Palette</th>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Netto</th>
                                <th>Keterangan</th>
                                <th></th>
                            </thead>
                            <tbody id="boxDetail">
                                
                                 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td><input type="text" id="no_palette" name="no_palette" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" onchange="get_palette(this.value);"></td>
                                    <input type="hidden" name="rongsok_id" id="rongsok_id"><!-- ID GUDANG -->
                                    <input type="hidden" name="dtr_detail_id" id="dtr_detail_id"><!-- ID GUDANG -->
                                    <td><input type="text" id="nama_barang" name="nama_barang" class="form-control myline"></td>
                                    <td><input type="text" id="uom" name="uom" class="form-control myline"></td>
                                    </td>
                                    <td><input type="text" id="netto" name="netto" class="form-control myline" /></td>
                                    <td><input type="text" id="keterangan" name="keterangan" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                    <td style="text-align:center">
                                         <a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                 </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <!-- <a href="javascript:;" class="btn blue-ebonyclay" id="refreshData" onclick="refreshData();"> 
                        <i class="fa fa-refresh"></i> Refresh </a> -->
                    <a href="<?php echo base_url('index.php/StokOpname/report'); ?>" class="btn blue-hoki"> 
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
function loadDetail(id){
    id = $('#id').val();
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/StokOpname/load_detail_rongsok'); ?>',
        data:{
            id: id,
        },
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}
function get_palette(no){
    $.ajax({
        url: "<?php echo base_url('index.php/StokOpname/get_palette'); ?>",
        type: "POST",
        data : {no: no},
        success: function (result){
            // console.log(result);
            if (result!=null){
                $("#nama_barang").val(result['jenis_barang']);
                $("#dtr_detail_id").val(result['id']);
                $("#rongsok_id").val(result['rongsok_id']);
                $("#uom").val(result['uom']);
                $("#netto").val(result['netto']);
                $("#keterangan").val(result['keterangan']);
                // const total_old = (parseFloat($('#total_netto').val()) + parseFloat(result['netto']));
                // const total = total_old.toFixed(2);
                // $('#total_netto').val(total);
                check_duplicate(no);
                // $('#no_packing_'+id).prop('readonly',true);

            } else {
                check_duplicate(no);
                // $('#message').html("No pallete tidak ditemukan, silahkan ulangi kembali");
                // $('.alert-danger').show();
                // $("#no_packing").val('');
                // $('#no_packing').focus();
                // $("#nama_barang").val('');
                // $("#dtr_detail_id").val('');
                // $("#rongsok_id").val('');
                // $("#uom").val('');
                // $("#netto").val('');
                // $("#keterangan").val('');
            }
        }
    });
}

function check_duplicate(no){
    console.log(no);
    $.ajax({
        url: "<?php echo base_url('index.php/StokOpname/check_duplicate'); ?>",
        type: "POST",
        data : {no: no},
        success: function (result){
            console.log(result);
            if (result['response'] == "ok"){
                create_new_input();

                $('#message').html("");
                $('.alert-danger').hide();
            } else {
                $('#message').html("Nomor packing sudah tersimpan, tolong coba lagi!");
                $('.alert-danger').show();

                $("#no_palette").val('');
                $('#no_palette').focus();
                $("#nama_barang").val('');
                $("#rongsok_id").val('');
                $("#dtr_detail_id").val('');
                $("#uom").val('');
                $("#netto").val('');
                $("#keterangan").val('');
            }
        }
    });
}

function create_new_input(){
    console.log("new_input");
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/StokOpname/save_detail_rongsok'); ?>",
        data: {
            id: $('#id').val(),
            dtr_detail_id: $('#dtr_detail_id').val(),
            no_palette: $('#no_palette').val(),
            rongsok_id: $('#rongsok_id').val(),
            netto: $('#netto').val(),
            keterangan: $('#keterangan').val(),
        },
        cache: false,
        success: function(result) {
            console.log(result);
            var res = result['response'];
            if(res=='success'){
                loadDetail($("#id").val());
                $("#no_palette").val('');
                $('#no_palette').focus();
                $("#nama_barang").val('');
                $("#dtr_detail_id").val('');
                $("#rongsok_id").val('');
                $("#uom").val('');
                $("#netto").val('');
                $("#keterangan").val('');
            }else{
                // $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                // $('#message').html("");
                // $('.alert-danger').hide(); 
                // $('#formku').submit();
            }
        }
    });
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus packing ini?");
    if (r==true){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/StokOpname/delete_detail_fg'); ?>",
            data: {
                id: id,
            },
            cache: false,
            success: function(result) {
                var res = result['response'];
                if(res=='success'){
                    loadDetail($("#id").val());
                }else{
                    // $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                    // $('#message').html("");
                    // $('.alert-danger').hide(); 
                    // $('#formku').submit();
                }
            }
        });
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

function refreshData(){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/StokOpname/refreshData'); ?>",
        data: {
            id: $('#id').val(),
        },
        cache: false,
        success: function(result) {
            var res = result['response'];
            if(res=='success'){
                loadDetail($("#id").val());
            }else{
                // $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                // $('#message').html("");
                // $('.alert-danger').hide(); 
                // $('#formku').submit();
            }
        }
    });
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
        dateFormat: 'yy-mm-dd'
    });

    loadDetail($("#id").val());
    $('#no_packing').focus();
});
</script>