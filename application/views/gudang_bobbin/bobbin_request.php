<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Gudangbobbinrequest'); ?>">  Gudang Bobbin Request </a> 
        </h5>          
    </div>
</div>
  <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="collapse well" id="form_add" >
    <form class="eventInsForm" method="post" target="_self" name="formku" 
    id="formku" action="<?php echo base_url('index.php/GudangBobbin/save_surat_peminjaman'); ?>">                            
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-md-12">
                            Nama Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <select  id="supplier_id" name="supplier_id" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php 
                                foreach($list_supplier as $sl){
                                ?>
                                <option value="<?=$sl->id;?>"><?=$sl->nama_supplier;?> </option>
                                <?php } ?>    
                            </select>        
                        </div>
                    </div>

                    <div class="col-md-6">
                       <div class="col-md-12">
                            No. Surat Peminjaman<font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="no" name="no" readonly="readonly" value="Auto Generate" 
                                class="form-control myline" style="margin-bottom:5px;">
                        </div> 
                         <div class="col-md-12">
                            No. SPB Bobbin<font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <select  id="spb_id" name="spb_id" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php 
                                foreach($list_spb as $spb){
                                ?>
                                <option value="<?=$spb->id;?>"><?=$spb->no_spb_bobbin;?> </option>
                                <?php } ?>    
                            </select>        
                        </div>
                        <div class="col-md-12 text-right">
                            &nbsp; &nbsp; <a href="javascript:;" onclick="simpanData()" class="btn green" >  
                            <i class="fa fa-floppy-o"></i> Buat Surat </a>
                        </div>  
                    </div>    
                </div>
            </div>
        </div>
    </form>
</div>
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>  Bobbin Request
                </div> 
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
                    <i class="fa fa-plus"></i> Buat Surat Peminjaman</a>
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>No. Surat Peminjaman</th>
            <th>No. Surat Jalan</th>
            <th>Nama Customer</th>
            <th>Jumlah Item</th>
            <th>Actions</th>
       </tr>
     </thead>
     <tbody>
        <?php 
          $no = 0;
          foreach ($list_peminjam as $row) {
            $no++;
        ?>
          <tr>
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td><?php echo $row->no_surat_peminjaman; ?></td>
            <td><?php echo $row->no_surat_jalan; ?></td>
            <td><?php echo $row->nama_customer; ?></td>
            <td style="text-align: center"><?php echo $row->jumlah_item; ?></td>
            <td style="text-align:center">
              <?php
                if($group_id==1 || $hak_akses['print_spb']==1){
                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bobbin_request/'.$row->id.'" 
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

function get_spb(){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliBobbin/get_spb'); ?>",
        type: "POST",
        data: {id: id},
        dataType: "json",
        success: function(result) {
            $('#uom_'+nmr).val(result['uom']);
            $('#wip_id_'+nmr).val(id);
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
        dateFormat: 'dd-mm-yy'
    });       
});
</script>
      