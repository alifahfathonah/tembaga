<div class="row">
   <div class="col-md-12 alert-warning alert-dismissable">
      <h5 style="color:navy">
         <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
         <i class="fa fa-angle-right"></i> Produksi Ingot
         <i class="fa fa-angle-right"></i> 
         <a href="<?php echo base_url('index.php/Ingot'); ?>"> Create Produksi </a> 
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
      id="formku" action="<?php echo base_url('index.php/Ingot/update_hasil'); ?>">
      <div class="row">
         <div class="col-md-5">
            <div class="row">
               <div class="col-md-4">
                  No. Produksi <font color="#f00">*</font>
               </div>
               <div class="col-md-8">
                  <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                     class="form-control myline" style="margin-bottom:5px" 
                     value="<?php echo $header['no_produksi']; ?>">
                  <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                  <input type="hidden" id="id_bpb_wip" name="id_bpb_wip" value="<?php echo $header['id_bpb_wip']; ?>">
                  <input type="hidden" id="id_bpb_ampas" name="id_bpb_ampas" value="<?php echo $header['id_bpb_ampas']; ?>">
                  <input type="hidden" id="id_dtr" name="id_dtr" value="<?php echo $header['id_dtr']; ?>">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  No. Produksi <font color="#f00">*</font>
               </div>
               <div class="col-md-8">
                  <input type="text" id="no_produksi" name="no_produksi" readonly="readonly"
                     class="form-control myline" style="margin-bottom:5px" 
                     value="<?php echo $header['no_spb_rongsok']; ?>">
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
                  Jenis Barang <font color="#f00">*</font>
               </div>
               <div class="col-md-8">
                  <input type="text" id="jenis_barang" name="jenis_barang" 
                     class="form-control myline" style="margin-bottom:5px; float:left;" value="<?php echo $header['jenis_barang']; ?>" readonly="readonly">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  Catatan Edit
               </div>
               <div class="col-md-8">
                  <textarea id="modified_remarks" name="modified_remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?php echo $header['modified_remarks'];?></textarea>
               </div>
            </div>
         </div>
         <div class="col-md-2">&nbsp;</div>
         <div class="col-md-5">
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
            <div class="row">
               <div class="col-md-4">
                  Tipe Apolo
               </div>
               <div class="col-md-8">
                  <input type="text" id="nama_penimbang" name="nama_penimbang" 
                     class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                     value="<?php echo $header['tipe_apolo']; ?>">
               </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Total Rongsok <font color="#f00">*</font>
                </div>
                <div class="col-md-8">
                  <input type="text" id="total_rongsok" name="total_rongsok" readonly="readonly" placeholder="Total Berat Rongsok" class="form-control myline" style="margin-bottom:5px; background-color: green; color: white; font-weight: bold;" value="<?php echo $header['total_rongsok'];?>">
                </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  Catatan
               </div>
               <div class="col-md-8">
                  <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['remarks']; ?></textarea>                           
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
                           <div class="col-md-4">
                              INGOT <font color="#f00">*</font>
                           </div>
                           <div class="col-md-4">
                              <input type="text" id="ingot_balok" name="ingot"
                                 class="form-control myline" placeholder="ingot/batang" style="margin-bottom:5px; width:120px;" required="required" value="<?php echo $header['ingot'];?>">
                           </div>
                           <div class="col-md-4">
                              <input type="text" id="ingot_berat" name="berat_ingot"
                                 class="form-control myline" placeholder="kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['berat_ingot'];?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              BS <font color="#f00">*</font>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="bs" name="bs"
                                 class="form-control myline" placeholder="bs/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['bs'];?>" <?=($header['status_dtr']==1)? "readonly" : '';?>>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="bs_old" name="bs_old" class="form-control myline" style="margin-bottom: 5px; width: 100px;" value="<?php echo $header['bs']?>" readonly="readonly">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              SUSUT  <font color="#f00">*</font>
                           </div>
                           <div class="col-md-6">
                              <input type="text" id="susut" name="susut"
                                 class="form-control myline" placeholder="susut/kg" style="margin-bottom:5px; width:100px;"  required="required" readonly="readonly" value="<?php echo $header['susut'];?>">
                           </div>
                        </div>
                <?php if($header['status_ampas'] == 0){ ?>
                        <div class="row">
                           <div class="col-md-4">
                              AMPAS <font color="#f00">*</font>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="ampas" name="ampas"
                                 class="form-control myline" placeholder="ampas/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['ampas'];?>"> 
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="ampas_old" name="ampas_old" class="form-control myline" style="margin-bottom: 5px; width: 100px;" value="<?php echo $header['ampas']?>" readonly="readonly">
                           </div>
                        </div>
                <?php }else{ ?>
                        <div class="row">
                           <div class="col-md-4">
                              AMPAS <font color="#f00">*</font>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="ampas" name="ampas"
                                 class="form-control myline" placeholder="ampas/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['ampas'];?>" readonly="readonly"> 
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="ampas_old" name="ampas_old" class="form-control myline" style="margin-bottom: 5px; width: 100px;" value="<?php echo $header['ampas']?>" readonly="readonly">
                           </div>
                        </div>
                <?php } ?>
                        <div class="row">
                           <div class="col-md-4">
                              SERBUK <font color="#f00">*</font>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="serbuk" name="serbuk"
                                 class="form-control myline" placeholder="serbuk/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['serbuk'];?>">     
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="serbuk_old" name="serbuk_old" class="form-control myline" style="margin-bottom: 5px; width: 100px;" value="<?php echo $header['serbuk']?>" readonly="readonly">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              BS SERVICE<font color="#f00">*</font>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="bs_service" name="bs_service"
                                 class="form-control myline" placeholder="bs/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()" value="<?php echo $header['bs_service'];?>" <?=($header['status_dtr']==1)? "readonly" : '';?>>
                           </div>
                           <div class="col-md-3">
                              <input type="text" id="bs_service_old" name="bs_service_old" class="form-control myline" style="margin-bottom: 5px; width: 100px;" value="<?php echo $header['bs_service']?>" readonly="readonly">
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
                                 class="form-control myline" placeholder="jam mulai" style="margin-bottom:5px; width:130px;"  required="required" value="<?php echo $header['mulai'];?>">
                           </div>
                           <div class="col-md-4">
                              <input type="time" id="selesai" name="selesai"
                                 class="form-control myline" placeholder="jam selesai" style="margin-bottom:5px; width:130px;"  required="required" value="<?php echo $header['selesai'];?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              Kayu <font color="#f00">*</font>
                           </div>
                           <div class="col-md-6">
                              <input type="text" id="kayu" name="kayu"
                                 class="form-control myline" placeholder="Kayu/Batang" style="margin-bottom:5px; width:120px;"  required="required" value="<?php echo $header['kayu'];?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              GAS  <font color="#f00">*</font>
                           </div>
                           <div class="col-md-6">
                              <input type="text" id="gas" name="gas"
                                 class="form-control myline" placeholder="Gas/m3" style="margin-bottom:5px; width:120px;"  required="required" value="<?php echo $header['gas'];?>">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
               <div class="col-md-12">
                  <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                  <i class="fa fa-floppy-o"></i> Simpan </a>
                  <a href="<?php echo base_url('index.php/Ingot/hasil_produksi'); ?>" class="btn blue-hoki"> 
                  <i class="fa fa-angle-left"></i> Kembali </a>
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
    var susut = Number(Number($('#total_rongsok').val()) - (Number($('#ingot_berat').val()) + Number($('#bs').val()) + Number($('#ampas').val()) + Number($('#serbuk').val())));
    $('#susut').val(susut);
}

function simpanData(){
   if($.trim($("#tanggal").val()) == ""){
      $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
      $('.alert-danger').show(); 
   }else if($.trim($("#jenis_barang").val()) == ""){
      $('#message').html("Silahkan pilih jenis barang!");
      $('.alert-danger').show(); 
   }else if($.trim($("#modified_remarks").val()) == ""){
      $('#message').html("Isi Catatan Edit");
      $('.alert-danger').show(); 
   }else{     
      $('#formku').submit(); 
   };
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
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