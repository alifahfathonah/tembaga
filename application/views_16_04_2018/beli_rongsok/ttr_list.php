<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/ttr_list'); ?>"> TTR List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['ttr_list']==1) ){
        ?>
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
                                    No. Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_voucher" name="no_voucher" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="Auto Generate">
                                    
                                    <input type="hidden" id="id" name="id">
                                    <input type="hidden" id="po_id" name="po_id">
                                </div>
                            </div>                             
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('d-m-Y'); ?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Jenis Barang
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="jenis_barang" name="jenis_barang" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="RONGSOK">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    No. PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_po" name="no_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal_po" name="tanggal_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Supplier
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nama_supplier" name="nama_supplier" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Nilai PO (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nilai_po" name="nilai_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Down Payment/ DP (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nilai_dp" name="nilai_dp" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Sisa Pembayaran (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="amount" name="amount" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Keterangan
                                </div>
                                <div class="col-md-7">
                                    <textarea id="keterangan" name="keterangan" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>                                                                       
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpanData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
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
                    <i class="fa fa-beer"></i>TTR List
                </div>                
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. TTR</th>
                    <th>Tanggal</th>
                    <th>No. PO</th>
                    <th>Supplier</th>
                    <th>No. Reff/ DTR</th>                    
                    <th>Jumlah <br>Items</th>
                    <th>Broto (Kg)</th>
                    <th>Netto (Kg)</th>
                    <th>Jmlh <br>Afkiran</th>
                    <th>Jmlh <br>Pengepakan</th>
                    <th>Jmlh <br>Lain-lain</th>
                    <th>Voucher <br>Pelunasan</th>
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
                        <td style="background-color: "><?php echo $data->no_ttr; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->no_dtr; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:right"><?php echo number_format($data->bruto,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->netto,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_afkiran,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_pengepakan,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_lain,0,',','.'); ?></td>
                        <td style="text-align:center">
                            <?php
                                if( ($group_id==1 || $hak_akses['create_voucher_pelunasan']==1)  && $data->flag_bayar==0){
                                    echo '<a class="btn btn-circle btn-xs green" href="javascript:;" onclick="createVoucher('.$data->id.');"
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php                                
                                if($group_id==1 || $hak_akses['print_ttr']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliRongsok/print_ttr/'.$data->id.'" 
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
function createVoucher(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliRongsok/create_voucher_pelunasan'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            //console.log(result);
            $('#no_po').val(result['no_po']);
            $('#tanggal_po').val(result['tanggal']);
            $('#nama_supplier').val(result['nama_supplier']);
            $('#nilai_po').val(result['nilai_po']);
            $('#nilai_dp').val(result['nilai_dp']);
            
            $('#amount').val(result['sisa']);
            $('#keterangan').val('');
            $('#id').val(result['id']);
            $('#po_id').val(result['po_id']);
            
            $('#message').html("");
            $('.alert-danger').hide(); 
            
            $("#myModal").find('.modal-title').text('Create Voucher Pelunasan');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#amount").val()) == "" || $("#amount").val()=="0"){
        $('#message').html("Amount harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{    
        $('#message').html("");
        $('.alert-danger').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliRongsok/save_voucher_pelunasan");
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
    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         