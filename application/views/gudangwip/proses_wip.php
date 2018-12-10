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

<form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangWIP/save_proses_wip'); ?>">                            
<div class="row">&nbsp;</div>
<div class="row">
    <div class="col-md-12">
             <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi WIP <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input id="no_produksi" name="no_produksi" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="Auto generate" type="text">
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
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Proses <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_masak" name="jenis_masak" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="pilih_data(this.value)">
                                <option value=""></option>
                                <?php 
                                foreach($pil_masak as $k=>$pm){
                                ?>
                                <option value="<?php echo $k; ?>"><?php echo $pm; ?> </option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div>
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
                            KETERANGAN
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

<hr class="divider"/>

<h4 class="text-center">Hasil Masak WIP</h4>
<!-- kolom isian hasil produksi wip-->
<div class="row"> 
    <div id="div_kawat_hitam_masuk" class="hidden disabled">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Jumlah Kawat Hitam"/>
                                <input type="hidden" value="6" name="id_jenis_barang">
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="qty_keras_in" name="keras" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Keras"/>
                                <label> Kg </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="berat_bs_in" name="bs" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat BS"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <br/>
                <br/>
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Proses Masukan Kawat Hitam </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="div_kawat_merah_masuk" class="hidden disabled">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="qty_km_in" name="qty_km" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Jumlah Kawat Merah"/>
                                <input type="hidden" value="5" name="id_jenis_barang">
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" id="berat_km_in" name="berat_km" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Merah"/>
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
                                <input type="text" id="berat_susut_in" name="susut" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Susut"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <br/><br/>
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Proses Masukan Kawat Merah </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</form> 
   
          


<script>
function pilih_data(id){
    if(id == 'CUCI'){
        $('#div_kawat_hitam_masuk').addClass('hidden disabled');
        $('#div_kawat_merah_masuk').removeClass('hidden disabled');
    } else {
        $('#div_kawat_merah_masuk').addClass('hidden disabled');
        $('#div_kawat_hitam_masuk').removeClass('hidden disabled');
    }
}


function simpanData(){
        $('#formku').submit(); 
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
      