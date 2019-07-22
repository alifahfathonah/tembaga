<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/add_produksi'); ?>"> Gudang WIP </a> 
        </h5>          
    </div>
</div>

<form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?php echo base_url('index.php/GudangWIP/update_proses_wip'); ?>">
<div class="row">&nbsp;</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi WIP <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input id="no_produksi" name="no_produksi" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?=$header['no_produksi_wip'];?>" type="text">

                            <input type="hidden" name="id_thw" value="<?=$header['id'];?>">
                            <input type="hidden" name="id_thm" value="<?=$header['hasil_masak_id'];?>">
                            <input type="hidden" name="id_bpb" value="<?=$header['id_bpb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?=$header['tanggal'];?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Proses <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input id="jenis_masak" name="jenis_masak" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?=$header['jenis_masak'];?>" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_barang" name="jenis_barang" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="pilih_data(this.value,6)">
                                <option value=""></option>
                                <?php 
                                foreach($jenis_barang as $k){
                                ?>
                                <option value="<?=$k->id;?>" <?php echo (($header['jenis_barang_id']==$k->id)? 'selected': '');?>><?=$k->jenis_barang;?></option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div>
                    <!-- <div class="row hidden disabled" id="div_spb_rolling">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="id_spb_ingot" name="id_spb" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="get_data(this.value,2);">
                                <option value=""></option>
                                <?php
                                foreach($spb_ingot as $v){
                                ?>
                                <option value="<?php echo $v->id; ?>"><?php echo $v->no_spb_wip; ?> </option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div> -->
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input id="nama_pic" name="nama_pic" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $this->session->userdata('realname');?>" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="row"> 
    <div id="div_kawat_hitam_masuk">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Hitam </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['qty'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Hitam </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['berat'];?>" readonly placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Hitam </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['qty_keras'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Hitam </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['keras'];?>" readonly placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>BS </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['bs'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>BS Ingot </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['bs_ingot'];?>" readonly placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Hitam </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['qty_keras'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Hitam </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['keras'];?>" readonly placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="divider"/>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Simpan</a>
                </div>
            </div>
        </div>
    </div>
</form> 
<script>
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal tidak boleh kosong!");
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
});
</script>