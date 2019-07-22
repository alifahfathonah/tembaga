<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/hasil_produksi2'); ?>"> Input Hasil Produksi 2 </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1 || $group_id == 21)||($hak_akses['add_produksi']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Ingot/save_produksi2'); ?>">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Masak <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="no_produksi" name="no_masak" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onclick="get_detail_produksi(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($no_produksi_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->no_produksi.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Produksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_prd" name="tgl_prd" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Tipe Apolo
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tipe_apolo" name="tipe_apolo" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb_rongsok" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            Total Rongsok <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="total_rongsok" name="total_rongsok" readonly="readonly" placeholder="Total Berat Rongsok" 
                                class="form-control myline" style="margin-bottom:5px">
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
            </div>
            <div class="row">&nbsp;</div>
                <div class="row">                            
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                INGOT <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="ingot_balok" name="ingot"
                                                    class="form-control myline" placeholder="ingot/batang" style="margin-bottom:5px; width:110px;" required="required">
                                            </div>
                                            <div class="col-md-2">
                                                <span>Batang</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="ingot_berat" name="berat_ingot"
                                                    class="form-control myline" placeholder="kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">
                                            </div>
                                            <div class="cold-md-1">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                BS <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="bs" name="bs"
                                                    class="form-control myline" placeholder="bs/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                SUSUT  <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="susut" name="susut"
                                                    class="form-control myline" placeholder="susut/kg" style="margin-bottom:5px; width:100px;"  required="required" readonly="readonly">
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                AMPAS <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="ampas" name="ampas"
                                                    class="form-control myline" placeholder="ampas/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">     
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                SERBUK <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="serbuk" name="serbuk"
                                                    class="form-control myline" placeholder="serbuk/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">     
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                BS SERVICE
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="bs_service" name="bs_service"
                                                    class="form-control myline" placeholder="bs/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            MULAI <font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="time" id="mulai" name="mulai"
                                                class="form-control myline" placeholder="jam mulai" style="margin-bottom:5px; width:130px;"  required="required" >
                                        </div>
                                        <div class="col-md-4">
                                            <input type="time" id="selesai" name="selesai"
                                                class="form-control myline" placeholder="jam selesai" style="margin-bottom:5px; width:130px;"  required="required" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Kayu <font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="kayu" name="kayu"
                                                class="form-control myline" placeholder="Kayu/Batang" style="margin-bottom:5px; width:120px;"  required="required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            GAS  <font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="gas" name="gas"
                                                class="form-control myline" placeholder="Gas/m3" style="margin-bottom:5px; width:120px;"  required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-md-2">&nbsp; &nbsp; <a href="javascript:;" class="btn green" onclick="simpanData();"><i class="fa fa-floppy-o"></i> Save </a>
                                </div>    
                            </div>
                        </div>
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
function hitung_susut(){
    var susut = Number(Number($('#total_rongsok').val()) - (Number($('#ingot_berat').val()) + Number($('#bs_service').val()) + Number($('#bs').val()) + Number($('#ampas').val()) + Number($('#serbuk').val())));
    $('#susut').val(susut.toFixed(2));
}

function get_detail_produksi(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/ingot/get_detail_produksi'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#no_spb").val(result['no_spb']);
            $('#tgl_prd').val(result['tgl_prd']);
            $('#tipe_apolo').val(result['tipe_apolo']);
            $("#total_rongsok").val(Number(result['total_rongsok']).toFixed(2)); 
            hitung_susut();
        } 
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#ingot_balok").val()) == ""){
        $('#message').html("Silahkan Input Batang Ingot!");
        $('.alert-danger').show();
    }else if($.trim($("#ingot_berat").val()) == ""){
        $('#message').html("Silahkan Input Berat Ingot!");
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
      