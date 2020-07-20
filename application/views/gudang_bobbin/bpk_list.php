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
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <input type="text" id="tgl_start" name="tgl_start" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col-md-1">
                                S/D
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_end" name="tgl_end" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-2">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
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
            <i class="fa fa-beer"></i>Peminjaman BP & Kardus
        </div> 
            <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Tanggal</a>    
            </div>
        <!-- <div class="tools">
        <?php
            if( ($group_id==1)||($hak_akses['add']==1) ){
        ?>
            <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
            <i class="fa fa-plus"></i> Buat Surat Peminjaman</a>
        <?php } ?>
        </div>  -->               
    </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>No. Surat Jalan</th>
            <th>Tanggal</th>
            <th>Nama</th>
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
            <td><?php echo $row->no_surat_jalan; ?></td>
            <td><?php echo $row->tanggal; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td style="text-align: center"><?php echo $row->jumlah; ?></td>
            <td style="text-align:center">
              <?php
                if($group_id==1 || $hak_akses['print']==1){
                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bpk/'.$row->id.'" 
                        style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>';
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






<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
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
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });        
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });    
  window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
function filterData(){
    var s=$('#tgl_start').val();
    var e=$('#tgl_end').val();
    window.location = '<?=base_url();?>index.php/GudangBobbin/bpk_list/'+s+'/'+e;
}
</script>