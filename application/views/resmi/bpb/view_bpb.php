<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_BPB/'); ?>"> BPB </a> 
            <i class="fa fa-angle-right"></i> 
            Edit BPB
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($group_id==14) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/R_BPB/update_bpb'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_bpb" name="no_bpb" maxlength="25"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_bpb']; ?>" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly="readonly">
                        </div>
                    </div>
                    <?php if ($jenis_bpb == 'BPB RONGSOK') { ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Matching
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice" name="no_invoice" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice_resmi']; ?>">
                            
                            <input type="hidden" id="id_inv" name="id_inv" value="<?php echo $header['r_invoice_id']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO
                        </div>
                        <div class="col-md-8">
                            <!-- <select id="flag_po" name="flag_po" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($po_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->flag_sj==$header['id'])? 'selected="selected"': '').'>'.$row->no_po.'</option>';
                                    }
                                ?>
                            </select> -->
                            <input type="text" name="flag_po" id="flag_po" value="<?= $header['no_po'] ?>" class="form-control myline" style="margin-bottom: 5px;" readonly="readonly">
                        </div>
                    </div>   
                
                
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <!-- <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onchange="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select> -->
                            <input type="text" name="nama_customer" id="nama_customer" value="<?= $header['nama_customer'] ?>" class="form-control myline" style="margin-bottom: 5px;" readonly="readonly">
                            <input type="hidden" name="m_customer_id" id="m_customer_id" value="<?= $header['m_customer_id'] ?>" class="form-control myline" style="margin-bottom: 5px;" readonly="readonly">
                        </div>
                    </div>    
                           
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">

                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <select id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" readonly="readonly">
                                <option value=""></option>
                                <?php
                                    foreach ($type_kendaraan_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_type_kendaraan_id'])? 'selected="selected"': '').'>'.$row->type_kendaraan.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Kendaraan
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_kendaraan" id="no_kendaraan" class="form-control myline" 
                                   style="margin-bottom:5px" value="<?php echo $header['no_kendaraan']; ?>" readonly="readonly">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                    <?php if($header['jenis_barang']=='FG'){?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 19%">Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th style="width: 15%">No. Packing</th>
                                <th>Nomor Bobbin</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    foreach ($list_bpb_detail as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo $row->bruto; ?></td>
                                    <td><?php echo $row->netto; ?></td>
                                    <td><?php echo $row->nomor_bobbin; ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }else{
                    ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Nomor Pallete</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($list_bpb_detail as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->nama_item; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->bruto; ?></td>
                                    <td><?php echo $row->netto; ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" id="btnKembali" onclick="back()" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
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
function back(){
    jenis = $('#jenis_barang').val();
    if (jenis == 'FG') {
        window.location.href = '<?= base_url() ?>index.php/R_BPB/index/FG';
    } else {
        window.location.href = '<?= base_url() ?>index.php/R_BPB/index/Rongsok';
    }
}
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#no_bpb").val()) == ""){
        $('#message').html("Nomor BPB Harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#flag_po").val()) == ""){
        $('#message').html("Silahkan pilih PO!");
        $('.alert-danger').show();
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{   
        $('#formku').submit(); 
    };
};

function get_alamat(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/R_SuratJalan/get_alamat'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#alamat").val(result['alamat']);           
        } 
    });
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    // $("#tanggal").datepicker({
    //     showOn: "button",
    //     buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
    //     buttonImageOnly: true,
    //     buttonText: "Select date",
    //     changeMonth: true,
    //     changeYear: true,
    //     dateFormat: 'dd-mm-yy'
    // }); 
});
</script>
      