<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood'); ?>"> Pembelian Finish Good </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood/dtbj_list'); ?>"> DTBJ List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['dtbj_list']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <div class="collapse well" id="form_add" >
    <form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?php echo base_url('index.php/BeliFinishGood/save_header_dtbj'); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            Tanggal 
                            <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                            </div>
                            <div class="col-md-12">
                            Supplier 
                                <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <select  id="supplier_id" name="supplier_id" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="0">**TIDAK ADA SUPPLIER**</option>
                                    <?php 
                                        foreach($supplier_list as $jb){
                                    ?>
                                    <option value="<?=$jb->id;?>"><?=$jb->nama_supplier;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                            No DTBJ
                                <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <?php if($this->session->userdata('user_ppn')==1){?>
                                    <input type="text" id="no_dtbj" name="no_dtbj" class="form-control myline" style="margin-bottom:5px" placeholder="Nomor DTBJ...">
                                <?php }else{ ?>
                                    <input type="text" id="no_dtbj" name="no_dtbj" readonly="readonly"
                                        class="form-control myline" style="margin-bottom:5px" 
                                        value="Auto Generate">
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                            Packing <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <select  id="packing" name="packing" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <?php 
                                    foreach($packing as $p){
                                    ?>
                                    <option value="<?=$p->id;?>"><?=$p->jenis_packing;?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                            <div class="col-md-12 text-right">
                            &nbsp; &nbsp; 
                                <a href="javascript:;" id="simpanData" onclick="simpanData()" class="btn green" >
                                    <i class="fa fa-floppy-o"></i> Create DTBJ </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Data Timbang Barang Jadi (DTBJ) List
                </div>
                <div class="tools">  
                <?php if(($group_id==1)||($hak_akses['create_dtbj']==1)){
                    // echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/BeliFinishGood/create_dtbj').'"> <i class="fa fa-plus"></i> Create DTBJ</a>';
                    echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add"><i class="fa fa-plus"></i> Create DTBJ</a>';
                }
                ?>
                </div>           
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. DTBJ</th>
                    <th>Tanggal</th>
                    <th>No. PO</th>
                    <th>Supplier</th>
                    <th>Penimbang</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
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
                        <td style="background-color: "><?php echo $data->no_dtbj; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->penimbang; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->remarks; ?></td>
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
                                // if(($group_id==1 || $hak_akses['edit_dtbj']==1) && $data->status==9){
                                //     echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliFinishGood/edit_dtbj/'.$data->id.'" 
                                //         style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a> ';
                                // }else if ($data->status==0 && (strpos($data->remarks, 'SISA PRODUKSI') || strpos($data->remarks, 'TRANSFER KE RONGSOK')) !== false){
                                //     echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliFinishGood/proses_dtbj/'.$data->id.'" 
                                //         style="margin-bottom:4px"> &nbsp; <i class="fa fa-refresh"></i> Proses &nbsp; </a> ';
                                // }
                                if ($data->status==0 && $data->jumlah_item != 0 /**&& ($data->supplier_id==0 || $data->flag_gudang == 0)**/){
                                    echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliFinishGood/proses_dtbj/'.$data->id.'" style="margin-bottom:4px"> &nbsp; <i class="fa fa-refresh"></i> Proses &nbsp; </a> ';
                                }
                                if ($data->status==0 && $data->jumlah_item==0){
                                    echo '<a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/BeliFinishGood/create_dtbj/'.$data->id.'" style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp;</a> ';
                                }else{
                                    echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliFinishGood/edit_dtbj/'.$data->id.'" style="margin-bottom:4px">&nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>';
                                }
                                if ($data->status==0|| $data->status==9){
                                    echo '<a class="btn btn-circle btn-xs red" href="'.base_url().'index.php/BeliFinishGood/delete_dtbj/'.$data->id.'" style="margin-bottom:4px" onclick="return confirm(\'Anda yakin menghapus transaksi ini?\');"> &nbsp; <i class="fa fa-trash"></i> Delete &nbsp;</a> ';
                                }
                                if($group_id==1 || $hak_akses['print_dtbj']==1){
                                    echo '<a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/BeliFinishGood/view_dtbj/'.$data->id.'" style="margin-bottom:4px"> &nbsp; <i class="fa fa-book"></i> View &nbsp;</a> ';
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliFinishGood/print_dtbj/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliFinishGood/print_dtbj_global/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print Global&nbsp; </a> ';
                                    if($data->po_id>0){
                                        echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliFinishGood/print_dtbj_harga/'.$data->id.'" style="margin-bottom:4px" target="_blank">&nbsp;<i class="fa fa-print"></i>Print (Harga)&nbsp; </a> ';
                                    }
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
function simpanData(){
    if($.trim($("#no_dtbj").val()) == ""){
        $('#message').html("Nomor DTBJ harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Supplier harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/BeliFinishGood/get_no_dtbj'); ?>",
            data: {
                no_dtbj: $('#no_dtbj').val(),
                tanggal: $('#tanggal').val()
            },
            cache: false,
            success: function(result) {
                var res = result['type'];
                if(res=='duplicate'){
                    $('#message').html("Nomor sudah ada, tolong coba lagi!");
                    $('.alert-danger').show(); 
                }else{
                    $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                    $('#formku').submit(); 
                }
            }
        });
    }
};
$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
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