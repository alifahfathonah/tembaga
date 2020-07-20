<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG'); ?>"> Gudang FG </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/bpb_list'); ?>"> BPB FG List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['bpb_list']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="formedit" id="formedit"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span id="message">&nbsp;</span>
                                    </div>
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-md-4">
                                    No. BPB <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="no_bpb" name="no_bpb" 
                                        class="form-control myline" style="margin-bottom:5px" readonly>

                                    <input type="hidden" id="id" name="id">
                                    <input type="hidden" id="produksi_fg_id" name="produksi_fg_id">
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-4">
                                    Jenis Barang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select  id="jenis_barang" name="jenis_barang" placeholder="Silahkan pilih..."
                                    class="form-control myline select2me" style="margin-bottom:5px">
                                        <option value=""></option>
                                        <?php 
                                    foreach($jenis_barang as $jb){
                                    ?>
                                        <option value="<?=$jb->id;?>"><?='('.$jb->kode.') '.$jb->jenis_barang;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control input-small myline" style="margin-bottom:5px; float:left;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="simpandata" onClick="simpandata();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
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
                    <i class="fa fa-file-excel-o"></i>BPB FG List
                </div>
                <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Tanggal</a>  
                </div>                
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:10px;">No</th>
                    <th>Tanggal</th>
                    <th>No. BPB</th>
                    <th>No. Produksi</th>
                    <th>Jenis Barang</th>
                    <th>Jenis Packing</th>
                    <th>Pengirim</th>
                    <th>Jumlah <br>Item</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_bpb_fg;?></td>
                        <td><?php echo $data->no_produksi; ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td>
                            <?php if($data->jenis_packing_id == 1){ ?>
                            BOBBIN
                            <?php } else if($data->jenis_packing_id == 2){ ?>
                            KERANJANG
                            <?php } else if($data->jenis_packing_id == 3){ ?>
                            KARDUS
                            <?php } else if($data->jenis_packing_id == 4){ ?>
                            ROLL
                            <?php } ?>                     </td>
                        <td><?php echo $data->pengirim; ?></td>                       
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Waiting review</div>';
                                }else if($data->status==1){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Approved</div>';
                                }else if($data->status==9){ 
                                    echo '<div style="background-color:red; padding:4px; color:white">Rejected</div>';
                                }
                            ?>
                        </td>                        
                        <td style="text-align:center"> 
                            <?php
                                if(($group_id==1 || $hak_akses['edit_bpb']==1) && $data->status==0){
                                    echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/GudangFG/proses_bpb/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-book"></i> Tanggapi &nbsp; </a>';
                                }
                                    echo '<a class="btn btn-circle btn-xs blue" style="margin-bottom:4px" href="javascript:;" onclick="editData('.$data->id.')"> <i class="fa fa-pencil"></i> Edit </a>';
                                if($group_id==1 || $hak_akses['print_bpb']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangFG/print_bpb/'.$data->id.'"style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
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
<script type="text/javascript">
function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/GudangFG/get_bpb'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#id').val(result['id']);
            $('#no_bpb').val(result['no_bpb_fg']);
            $('#jenis_barang').select2('val',result['jenis_barang_id']);
            $('#tanggal').val(result['tanggal']);
            $('#produksi_fg_id').val(result['produksi_fg_id']);
            
            $("#myModal").find('.modal-title').text('Edit DTR');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function searchFilter(){
    var id=$('#tanggal_filter').val();
    window.location = '<?php echo base_url('index.php/GudangFG/bpb_list_filter/');?>'+id;
}

function simpandata(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#produksi_fg_id").val()) == 0){
            $('#simpandata').text('Please Wait ...').prop("onclick", null).off("click");
            $('#message').html("");
            $('.alert-danger').hide();
            $('#formedit').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/update_jb_bpb");
            $('#formedit').submit(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Jenis Barang harus diisi!");
        $('.alert-danger').show();
    }else {
            $('#simpandata').text('Please Wait ...').prop("onclick", null).off("click");
            $('#message').html("");
            $('.alert-danger').hide();
            $('#formedit').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/update_jb_bpb");
            $('#formedit').submit(); 
    };
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script> 
<script>
$(function(){
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
    window.location = '<?=base_url();?>index.php/GudangFG/bpb_list/'+s+'/'+e;
}
</script>      