<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Retur'); ?>"> Retur </a> 
        </h5>          
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    No. Retur <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_retur" name="no_retur" readonly="readonly" 
                                        class="form-control myline" style="margin-bottom:5px">
                                    
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal Potong Hutang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal_potong" name="tanggal_potong" class="form-control myline input-small" class="form-control myline input-small" style="margin-bottom:5px;float:left;"  value="<?=date('Y-m-d');?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpandata();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Retur List
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/Retur/add').'"> '
                        .'<i class="fa fa-plus"></i> Input Retur </a>';
                    }
                ?>                    
                </div>
            </div>
            
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Retur</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Jenis Barang</th>
                    <th>Penimbang</th>
                    <th>Jumlah <br>Items</th>
                    <th>Tipe <br>Retur</th>
                    <th>Pemenuhan</th>
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
                        <td style="background-color: "><?php echo $data->no_retur; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo $data->penimbang; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo (($data->jenis_retur==0)? "Ganti Barang": "Ganti Voucher"); ?></td>
                        <?php echo (($data->spb_id==0 && $data->flag_taken==0)? "<td style='background-color:orange; color: white;'>Belum ada pengganti": "<td style='background-color:green; color: white;'>Sudah ada pengganti"); ?></td>
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
                                if( ($group_id==1 || $hak_akses['view_retur']==1)/* && $data->ready_to_ttr>0*/){
                                    echo '<a class="btn btn-circle btn-xs green-seagreen" href="'.base_url().'index.php/Retur/view/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-book"></i> View &nbsp; </a>';
                                }                                                      
                                if($group_id==1 || $hak_akses['print_retur']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Retur/print/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                                }
                                if(($group_id==1 || $hak_akses['create_invoice']==1) && $data->jenis_retur==1 && $data->status==1 && $data->flag_taken==0){
                                    echo '<a class="btn btn-circle btn-xs blue" style="margin-bottom:4px" onclick="editData('.$data->id.')"> &nbsp; <i class="fa fa-pencil"></i> Create Pelunasan Hutang &nbsp; </a>';
                                }
                                if(($group_id==1 || $hak_akses['edit']==1) && $data->status==0){
                                     echo '<a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/Retur/edit/'.$data->id.'" style="margin-bottom:4px"><i class="fa fa-edit"></i> Edit &nbsp;</a> ';
                                }
                                if(($group_id==1 || $hak_akses['delete']==1) && $data->status!=1){
                                     echo '<a class="btn btn-circle btn-xs red" href="'.base_url().'index.php/Retur/delete/'.$data->id.'" style="margin-bottom:4px" onclick="return confirm(\'Anda yakin menghapus transaksi ini?\');"><i class="fa fa-trash"></i> Delete &nbsp;</a> ';
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
function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Retur/get_retur_jb'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#no_retur').val(result['no_retur']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Hutang Retur');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function simpandata(){
    if($.trim($("#tanggal_potong").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{    
        $('#message').html("");
        $('.alert-danger').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Retur/save_potong_piutang");
        $('#formku').submit(); 
    };
};

$(function(){
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);

    $("#tanggal_potong").datepicker({
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