<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_SuratJalan/'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_SuratJalan/edit_surat_jalan'); ?>"> Edit Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['edit_surat_jalan']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/R_SuratJalan/update_surat_jalan'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" maxlength="25"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sj_resmi']; ?>" onkeyup="this.value = this.value.toUpperCase()">
                            
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
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <?php if ($header['r_invoice_id'] > 0 && $header['r_sj_id'] == 0){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice" name="no_invoice" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice_resmi']; ?>">
                            
                            <input type="hidden" id="id_inv" name="id_inv" value="<?php echo $header['r_invoice_id']; ?>">
                        </div>
                    </div>
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
                            CV <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_cv" name="nama_cv" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                                <input type="hidden" id="m_cv_id" name="m_cv_id" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['m_cv_id']; ?>">
                        </div>
                    </div>
                <?php } else if($header['r_invoice_id'] > 0 && $header['r_sj_id'] > 0){ ?>    
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
                            CV <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_cv_id" name="m_cv_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onchange="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($cv_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_cv_id'])? 'selected="selected"': '').'>'.$row->nama_cv.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>   
                <?php } else if($header['r_so_id'] > 0){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_so']; ?>">
                            
                            <input type="hidden" id="id_inv" name="id_inv" value="<?php echo $header['r_so_id']; ?>">
                            <input type="hidden" name="id_invoice_resmi" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal SO.
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tgl_so" id="tgl_so" class="form-control myline input-small" style="margin-bottom:5px; float: left;" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo date('d-m-Y', strtotime($header['tgl_so'])) ?>" readonly="readonly">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            CV <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_cv_id" name="m_cv_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onchange="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($cv_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_cv_id'])? 'selected="selected"': '').'>'.$row->nama_cv.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>  
                <?php
                } else if($header['r_po_id'] > 0){
                ?>  
                    <div class="row">
                        <div class="col-md-4">
                            No. Purchase Order
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="id_inv" name="id_inv" value="<?php echo $header['r_po_id']; ?>">
                            <input type="hidden" name="id_invoice_resmi" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tgl_po" id="tgl_po" class="form-control myline input-small" style="margin-bottom:5px; float: left;" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])) ?>" readonly="readonly">
                        </div>
                    </div> 
                <?php } else if($header['jenis_surat_jalan'] == 'SURAT JALAN CV KE CUSTOMER'){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onchange="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>  
                <?php } ?>
                <?php if($header['r_sj_id'] == 0 && $header['r_so_id'] == 0 && $header['r_invoice_id'] == 0){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onchange="get_alamat(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>    
                <?php } ?>                
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
                    <?php if($header['r_bpb_id'] > 0){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_bpb" name="no_bpb"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_bpb']; ?>" onkeyup="this.value=this.value.toUpperCase()">
                            <input type="hidden" name="bpb_id" id="bpb_id" value="<?= $header['bpb_id'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal. BPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_bpb" name="tanggal_bpb" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal_bpb'])); ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
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
                            <select id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
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
                                   style="margin-bottom:5px" value="<?php echo $header['no_kendaraan']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
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
                                <th align="center">Action</th>
                            </thead>
                            <tbody id="boxDetail">
                                
                            </tbody>
                            <tfoot id="tfoot" style="display: none;">
                                <td align="center">#<input type="hidden" name="d_id" id="d_id"></td>
                                <td>
                                    <select name="barang_id" id="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px; top: auto; bottom: auto;">
                                        <option value=""></option>'
                                        <?php foreach ($jenis_barang as $value){  ?>
                                            <option value="<?= $value->id ?>"><?= '('.$value->kode.') '.$value->jenis_barang ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="uom" id="uom" readonly></td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="bruto" id="bruto"></td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="netto" id="netto"></td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="no_packing" id="no_packing" readonly></td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="nomor_bobbin" id="nomor_bobbin"></td>
                                <td><input type="text" class="form-control myline" style="margin-bottom:5px" name="line_remarks" id="line_remarks"></td>
                                <td>
                                    <a class="btn btn-circle btn-xs blue" href="javascript:;" style="margin-bottom:4px" id="btnUpdate"> &nbsp; <i class="fa fa-save"></i> Update &nbsp; </a>
                                </td>
                            </tfoot>
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
                                    $bruto = 0;
                                    $netto = 0;
                                    foreach ($list_sj_detail as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no ;?></td>
                                    <td>
                                    <?php echo '<select name="details['.$no.'][barang_id]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px; top: auto; bottom: auto;" onchange="window.scrollTo(0, 150);">
                                        <option value=""></option>';
                                        foreach ($jenis_barang as $value){ 
                                            echo '<option value="'.$value->id.'" '.(($value->id==$row->jenis_barang_id)? 'selected="selected"': '').'>'.$value->nama_item.'</option>';
                                         } 
                                        '</select>';?>
                                    </td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" value="'.$row->uom.'">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][bruto]" value="'.$row->bruto.'">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][netto]" value="'.$row->netto.'">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][no_packing]" value="'.$row->no_packing.'">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][line_remarks]" value="'.$row->line_remarks.'">';?></td>
                                </tr>
                                <?php
                                    $no++;
                                    $bruto += $row->bruto;
                                    $netto += $row->netto;
                                    }
                                ?>
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                                    <td style="background-color: green; color: white;"><?= $bruto;?></td>
                                    <td style="background-color: green; color: white;"><?= $netto;?></td>
                                    <td colspan="2"></td>
                                </tr>
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
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <a href="<?php echo base_url('index.php/R_SuratJalan/'); ?>" class="btn blue-hoki"> 
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
function loadDetail(id){
    $.ajax({
        type: "POST",
        // dataType: 'json',
        url: '<?= base_url("index.php/R_SuratJalan/load_detail_fg") ?>',
        data: {
            id: id,
        },
        success: function(result) {
            $('#boxDetail').html(result);
        }
    });
}

function edit(id){
    $.ajax({
        type: "POST",
        url: "<?= base_url('index.php/R_SuratJalan/edit_detail_sj') ?>",
        data: {
            id: id,
        },
        success: function(result){
            
            $('#tfoot').show();
            $('html, body').animate({
                scrollTop: $("#tfoot").offset().top
            }, 1000);
            $('#d_id').val(result['data']['id']);
            $('#barang_id').select2('val', result['data']['jenis_barang_id']);
            $('#barang_id').val(result['data']['jenis_barang_id']);
            $('#uom').val(result['data']['uom']);
            $('#bruto').val(result['data']['bruto']);
            $('#netto').val(result['data']['netto']);
            $('#no_packing').val(result['data']['no_packing']);
            $('#nomor_bobbin').val(result['data']['nomor_bobbin']);
            $('#line_remarks').val(result['data']['line_remarks']);
        }
    });
}


function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
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

$('#btnUpdate').click(function(event){
    event.preventDefault();
    console.log('masuk');
    id = $('#d_id').val();
    barang_id = $('#barang_id').val();
    bruto = $('#bruto').val();
    netto = $('#netto').val();
    no_packing = $('#no_packing').val();
    nomor_bobbin = $('#nomor_bobbin').val();
    line_remarks = $('#line_remarks').val();

    if (barang_id == '') {
        $('#barang_id').focus();
        $('.alert-danger').show();
        $('#message').html("Silahkan pilih barang!");
    } else if (bruto == '') {
        $('#bruto').focus();
        $('.alert-danger').show();
        $('#message').html("Bruto tidak boleh kosong!");
    } else if (netto == '') {
        $('#netto').focus();
        $('.alert-danger').show();
        $('#message').html("Netto tidak boleh kosong!");
    } else if (no_packing == '') {
        $('#no_packing').focus();
        $('.alert-danger').show();
        $('#message').html("Nomor packing tidak boleh kosong!");
    // } else if (nomor_bobbin == '') {
    //     $('#nomor_bobbin').focus();
    //     $('.alert-danger').show();
    //     $('#message').html("Nomor bobbin tidak boleh kosong!");
    } else {
        console.log('atas ajax');
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url('index.php/R_SuratJalan/update_detail_sj') ?>",
            data: {
                id: id,
                barang_id: barang_id,
                bruto: bruto,
                netto: netto,
                no_packing: no_packing,
                nomor_bobbin: nomor_bobbin,
                line_remarks: line_remarks,
            },
            success: function(result){
                console.log(result);
                $('#tfoot').hide();
                loadDetail($('#id').val());
                $('html, body').animate({
                    scrollTop: $("#row_"+id).position().top
                }, 1000);
            }
        });

        
    }
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

    $("#tanggal_bpb").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 

    if ($('#jenis_barang').val() == 'FG') {
        loadDetail($('#id').val());
    }
});
</script>
      