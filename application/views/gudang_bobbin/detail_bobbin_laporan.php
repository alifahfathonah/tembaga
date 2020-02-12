<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Stok Opname 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/StokOpname/'); ?>"> Scan FG</a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/GudangBobbin/update_laporan'); ?>">  
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
                <div class="col-md-5">
                    <div class="row">
                        <?php if($header['jenis']==0){
                                echo '<div style="background-color:green; color:white; padding:4px">Ready</div>';
                            }else if($header['jenis']==1){
                                echo '<div style="background-color:blue; color:white; padding:4px">Used</div>';
                            }else if($header['jenis']==2){
                                echo '<div style="background-color:yellow; color:black; padding:4px">Delivered</div>';
                            }else if($header['jenis']==3){
                                echo '<div style="background-color:orange; color:white; padding:4px">Booked</div>';
                            }  ?>
                    </div>
                </div>     
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nomor Bobbin</th>
                                <th>Netto</th>
                                <th></th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td><input type="text" id="no_bobbin" name="no_bobbin" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" onchange="get_packing(this.value);"></td>
                                    <input type="hidden" name="id_bobbin" id="id_bobbin"><!-- ID GUDANG -->
                                    <td><input type="text" id="netto" name="netto" class="form-control myline" /></td>
                                    <td style="text-align:center">
                                         <a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(0);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
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
                    <a href="<?php echo base_url('index.php/GudangBobbin/laporan_bulanan'); ?>" class="btn blue-hoki"> 
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
        url:'<?php echo base_url('index.php/GudangBobbin/load_detail_bobbin_stok'); ?>',
        data:{
            id: id,
        },
        success:function(result){
            $('#boxDetail').html(result);  
        }
    });
}

function get_packing(no){
    $('#no_bobbin').attr('readonly', true);
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/get_bobbin'); ?>",
        type: "POST",
        data : {nomor_bobbin: no},
        success: function (result){
            if (result!=null){
                $("#no_bobbin").val(result['nomor_bobbin']);
                $("#id_bobbin").val(result['id']);
                $("#netto").val(result['berat']);
                check_duplicate(result['id']);
            } else {
                check_duplicate(result['id']);
                $('#no_bobbin').attr('readonly', false);
            }
        }
    });
}

function check_duplicate(no){
    id= $('#id').val();
    // tanggal: $('#tanggal').val();
    $.ajax({
        url: "<?php echo base_url('index.php/GudangBobbin/check_duplicate'); ?>",
        type: "POST",
        data : {
            id: id,
            no: no,
            // tanggal: tanggal,
        },
        success: function (result){
            console.log(result);
            if (result['response'] == "ok"){
                create_new_input();

                $('#message').html("");
                $('.alert-danger').hide();
            } else {
                $('#message').html("Nomor bobbin sudah tersimpan, tolong coba lagi!");
                $('.alert-danger').show();

                $("#no_bobbin").val('');
                $('#no_bobbin').focus();
                $("#id_bobbin").val('');
                $("#netto").val('');
            }
        }
    });
}

function create_new_input(){
    // console.log("new_input");
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/GudangBobbin/save_detail_bobbin_stok'); ?>",
        data: {
            id: $('#id').val(),
            bobbin_id: $('#id_bobbin').val()
        },
        cache: false,
        success: function(result) {
            console.log(result);
            var res = result['response'];
            if(res=='success'){
                loadDetail($("#id").val());
                $('#no_bobbin').attr('readonly', false);
                $("#no_bobbin").val('');
                $('#no_bobbin').focus();
                $("#id_bobbin").val('');
                $("#netto").val('');
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
            url: "<?php echo base_url('index.php/GudangBobbin/delete_detail_bobbin_stok'); ?>",
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
    $('#no_bobbin').focus();
});
</script>