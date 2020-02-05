<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/bobbin_trx'); ?>"> Gudang Bobbin Transaksi </a> 
        </h5>          
    </div>
</div>
   <div class="row">&nbsp;</div>
      <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
            <div class="collapse well" id="form_add">
                <form class="eventInsForm" method="post" target="_self" name="formku" 
                id="formku" action="<?php echo base_url('index.php/GudangBobbin/add_laporan'); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    Tanggal 
                                    <font color="#f00">*</font>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('01-m-Y'); ?>">
                                            &nbsp; &nbsp; 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    Jenis Status <font color="#f00">*</font>
                                </div>
                                <div class="col-md-12">
                                    <select id="jenis_status" name="jenis_status" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                            <option></option>
                                            <option value="3">Bobbin Isi (Used)</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                                <div class="col-md-12">
                                    <a href="javascript:;" onclick="addLaporan()" class="btn green" >
                                        <i class="fa fa-plus"></i> Input 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        <div class="col-md-12" style="margin-top: 10px;"> 
        <div class="portlet box yellow-gold">
          <div class="portlet-title">
              <div class="caption">
                  <i class="fa fa-beer"></i> Bobbin Transaksi 
              </div>
              <div class="tools">
              <?php
                  if( ($group_id==1)||($hak_akses['add']==1) ){
              ?>
                  <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangBobbin/add_trx_bobbin"> <i class="fa fa-plus"></i> Tambah Transaksi Bobbin</a>  
              <?php } ?>            
              </div>             
          </div> 
          <div class="portlet-body"> 
           <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
             <thead>
              <tr>
                <th style="text-align: center">No</th>
                <th>Tanggal</th>
                <th>Jumlah Item</th>
                <th style="text-align: center">Actions</th>
               </tr>
             </thead>
             <tbody>
                <?php
                $no = 0;
                foreach ($list_bobbin as $row) {
                $no++;
                ?>
                <tr>
                  <td style="text-align: center"><?php echo $no; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                  <td><?php echo $row->jumlah?></td>
                  <td style="text-align:center">
                    <?php
                      if(($group_id==1 || $hak_akses['view_spb']==1) && $row->jumlah > 0){
                  ?>
                  <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/GudangBobbin/view_trx_bobbin/<?php echo $row->id; ?>" 
                     style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                 
                  <?php   
                      }
                      if(($group_id==1 || $hak_akses['print']==1) && $row->jumlah > 0){
                          echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bobbin_trx/'.$row->id.'" 
                              style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                      }
                  ?>
                  </td>
                </tr>
                <?php 
                }
                ?>
              </tbody>   
            </table>
          </div>
        </div>
      </div>
<script>
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