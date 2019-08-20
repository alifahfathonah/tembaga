<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/surat_jalan_keluar'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/add_surat_jalan_keluar'); ?>"> Edit Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit_surat_jalan']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_surat_jalan_keluar'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO Tolling <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['po_id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sales_order" name="no_sales_order" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb']; ?>">

                            <input type="hidden" id="spb_id" name="spb_id" value="<?php echo $header['spb_id'];?>">
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
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_supplier" name="nama_supplier" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_supplier']; ?>">
                            <input type="hidden" id="supplier_id" name="supplier_id" value="<?php echo $header['supplier_id'];?>" readonly="readonly">
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
                            Status SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php
                                if($header['status_spb']==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($header['status_spb']==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($header['status_spb']==2){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($header['status_spb']==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                            <input type="hidden" name="status_spb" value="<?php echo $header['status_spb'];?>">
                        </div>
                    </div>
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
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_type_kendaraan(this.value);">
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
                            No. Kendaraan <font color="#f00">*</font>
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
                                <th style="width: 20%">Nama Item</th>
                                <th style="width: 15%">Nama Item Alias</th>
                                <th style="width: 18%">No. Packing</th>
                                <th>Bruto</th>
                                <th>Berat Bobbin</th>
                                <th>Netto(Kg)</th>
                                <th>Bobbin</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php $no=0; $bruto = 0; $netto = 0; $berat = 0;
                                foreach ($list_produksi as $row) { $no++;
                                echo '<tr id="row_'.$no.'">'.
                                    '<td style="text-align: center;">'.$no.'</td>'.
                                    '<td>('.$row->kode.') '.$row->jenis_barang.'</td>'.
                                    '<input type="hidden" name="details['.$no.'][id_barang]" id="id_barang_'.$no.'" value="'.$row->gudang_id.'">'.
                                    '<input type="hidden" id="jenis_barang_id_'.$no.'" name="details['.$no.'][jenis_barang_id]" value="'.$row->jenis_barang_id.'" data-id="'.$row->ukuran.'">'.
                                    '<td><input type="text" id="barang_alias_'.$no.'" name="details['.$no.'][barang_alias]" class="form-control myline" placeholder="Nama Barang Alias ..." onkeyup="this.value = this.value.toUpperCase()"></td>'.
                                    '<td><input type="text" class="form-control myline" style="margin-bottom:5px" id="no_packing_'.$no.'" name="details['.$no.'][no_packing]" value="'.$row->no_packing.'" data-id="'.$row->ukuran.'" readonly="readonly">'.
                                    '</td>'.
                                    '<td><input type="text" id="bruto_'.$no.'" name="details['.$no.'][bruto]" class="form-control myline" readonly="readonly" value="'.$row->bruto.'"></td>'.
                                    '<td><input type="text" id="berat_'.$no.'" name="details['.$no.'][berat]" class="form-control myline" readonly="readonly" value="'.$row->berat_bobbin.'"></td>'.
                                    '<td><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" class="form-control myline" readonly="readonly" value="'.$row->netto.'"></td>'.
                                    '<td><input type="text" id="bobbin_'.$no.'" name="details['.$no.'][bobbin]" class="form-control myline" readonly="readonly" value="'.$row->nomor_bobbin.'"></td>'.
                                    '<td style="text-align:center">'.
                                    '<a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('.$no.');" style="margin-top:5px;"><i class="fa fa-print"></i> Print </a>'.
                                    '<a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs red" onclick="delete_row('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Delete </a>'.
                                    '</td>'.
                                '</tr>'; 
                                $bruto += $row->bruto;
                                $berat += $row->berat_bobbin;
                                $netto += $row->netto;
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="bruto" value="<?=$bruto;?>" readonly="readonly"></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="berat" value="<?=$berat;?>" readonly="readonly"></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="netto" value="<?=$netto;?>" readonly="readonly"></td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    <?php } else if($header['jenis_barang']=='WIP'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th width="20%">Nama Item</th>
                                <th width="20%">Nama Alias</th>
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Netto (Kg)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                            <?php
                            $no = 0;
                            $qty = 0;
                            $netto = 0;
                            foreach ($list_produksi as $row) {
                                $no++;
                                echo '<tr id="row_'.$no.'">'.
                                    '<td style="text-align: center;">'.$no.'</td>'.
                                    '<td>('.$row->kode.')'.$row->jenis_barang.'</td>'.
                                    '<input type="hidden" name="details['.$no.'][id_barang]" id="id_barang_'.$no.'" value="'.$row->id_gudang.'">'.
                                    '<input type="hidden" id="jenis_barang_id_'.$no.'" name="details['.$no.'][jenis_barang_id]" value="'.$row->jenis_barang_id.'">'.
                                    '<td><input type="text" id="barang_alias_'.$no.'" name="details['.$no.'][barang_alias]" class="form-control myline" placeholder="Nama Barang Alias ..." onkeyup="this.value = this.value.toUpperCase()"></td>'.
                                    '<td><input type="text" id="uom_'.$no.'" name="details['.$no.'][uom]" class="form-control myline" readonly="readonly" value="'.$row->uom.'"></td>'.
                                    '<td><input type="text" id="bruto_'.$no.'" name="details['.$no.'][qty]" class="form-control myline" readonly="readonly" value="'.$row->qty.'"></td>'.
                                    '<td><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" class="form-control myline" readonly="readonly" value="'.$row->berat.'"></td>'.
                                    '<td style="text-align:center">'.
                                    '<a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs red" onclick="delete_row('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Delete </a>'.
                                    '</td>'.
                                '</tr>'; 
                                $qty += $row->qty;
                                $netto += $row->berat;
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="bruto" value="<?=$qty;?>" readonly="readonly"></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="netto" value="<?=$netto;?>" readonly="readonly"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php
                    }else if($header['jenis_barang']=='RONGSOK'){
                    ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 15%;">Nama Item</th>
                                <th style="width: 15%;">Nama Alias</th>
                                <th style="width: 15%;">No Palette</th>
                                <th>Bruto</th>
                                <th>Berat<br>Palette</th>
                                <th>Netto (Kg)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php $no=0; 
                                $bruto = 0; $netto = 0; $berat = 0;
                                foreach ($list_produksi as $row) { $no++;
                                echo '<tr id="row_'.$no.'">'.
                                    '<td style="text-align: center;">'.$no.'</td>'.
                                    '<input type="hidden" name="details['.$no.'][id_barang]" id="id_barang_'.$no.'" value="'.$row->id.'">'.
                                    '<input type="hidden" id="jenis_barang_id_'.$no.'" name="details['.$no.'][jenis_barang_id]" value="'.$row->rongsok_id.'">'.
                                    '<td>'.$row->jenis_barang.'</td>'.
                                    '<td><input type="text" id="barang_alias_'.$no.'" name="details['.$no.'][barang_alias]" class="form-control myline" placeholder="Nama Barang Alias ..." onkeyup="this.value = this.value.toUpperCase()"></td>'.
                                    '<td><input type="text" id="no_palette_'.$no.'" name="details['.$no.'][no_palette]" class="form-control myline" readonly="readonly" value="'.$row->no_pallete.'"></td>'.
                                    '<input type="hidden" id="qty_'.$no.'" name="details['.$no.'][qty]" class="form-control myline" readonly="readonly" value="0">'.
                                    '<td><input type="text" id="bruto_'.$no.'" name="details['.$no.'][bruto]" class="form-control myline" readonly="readonly" value="'.$row->bruto.'"></td>'.
                                    '<td><input type="text" id="berat_'.$no.'" name="details['.$no.'][berat_palette]" class="form-control myline" readonly="readonly" value="'.$row->berat_palette.'"></td>'.
                                    '<td><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" class="form-control myline" readonly="readonly" value="'.$row->netto.'"></td>'.
                                    '<td><a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcodeRsk('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Print </a>'.
                                    '<a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs red" onclick="delete_row('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Delete </a></td>'.
                                    '</td>'.
                                '</tr>';
                                $bruto += $row->bruto;
                                $berat += $row->berat_palette;
                                $netto += $row->netto;
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="bruto" value="<?=$bruto;?>" readonly="readonly"></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="berat" value="<?=$berat;?>" readonly="readonly"></td>
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="netto" value="<?=$netto;?>" readonly="readonly"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php
                    }else if($header['jenis_barang']=='AMPAS'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th width="20%">Nama Item</th>
                                <th width="20%">Barang Alias</th>
                                <th>UOM</th>
                                <th>Netto (Kg)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                            <?php
                            $no = 0;
                            $qty = 0;
                            $netto = 0;
                            foreach ($list_produksi as $row) {
                                $no++;
                                echo '<tr id="row_'.$no.'">'.
                                    '<td style="text-align: center;">'.$no.'</td>'.
                                    '<td>('.$row->kode_rongsok.') '.$row->nama_item.'</td>'.
                                    '<input type="hidden" name="details['.$no.'][id_barang]" id="id_barang_'.$no.'" value="'.$row->id_gudang.'">'.
                                    '<input type="hidden" id="jenis_barang_id_'.$no.'" name="details['.$no.'][jenis_barang_id]" value="'.$row->rongsok_id.'">'.
                                    '<td><input type="text" id="barang_alias_'.$no.'" name="details['.$no.'][barang_alias]" class="form-control myline" placeholder="Nama Barang Alias ..." onkeyup="this.value = this.value.toUpperCase()"></td>'.
                                    '<td><input type="text" id="uom_'.$no.'" name="details['.$no.'][uom]" class="form-control myline" readonly="readonly" value="'.$row->uom.'"></td>'.
                                    '<td><input type="text" id="netto_'.$no.'" name="details['.$no.'][netto]" class="form-control myline" readonly="readonly" value="'.$row->berat.'"></td>'.
                                    '<td style="text-align:center">'.
                                    '<a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs red" onclick="delete_row('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Delete </a>'.
                                    '</td>'.
                                '</tr>'; 
                                $netto += $row->berat;
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                    <input type="hidden" class="form-control" style="margin-bottom: 5px" id="bruto" value="<?=$qty;?>" readonly="readonly">
                                    <td><input type="text" class="form-control" style="margin-bottom: 5px" id="netto" value="<?=$netto;?>" readonly="readonly"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
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
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <a href="<?php echo base_url('index.php/Tolling/surat_jalan_keluar'); ?>" class="btn blue-hoki"> 
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
function delete_row(id){
        const bruto = $('#bruto_'+id).val();
        const netto = $('#netto_'+id).val();
        $('#bruto').val(Math.round((Number($('#bruto').val())-Number(bruto))*100)/100);
        $('#netto').val(Math.round((Number($('#netto').val())-Number(netto))*100)/100);
    $('#row_'+id).remove();
}

function genPacking(id){
    const str = $('#no_packing_'+id).val();
    const res = str.substring(7, 11);
    var ukuran = $('#barang_alias_id_'+id).find(':selected').attr('data-id');
    if(ukuran==0 || ukuran==undefined){
        var ukuran = $('#jenis_barang_id_'+id).attr('data-id');
    }
    const no_packing = str.replace(res, ukuran);
    $('#no_packing_'+id).val(no_packing);    
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{
        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
        $('#formku').submit(); 
    };
};

function check_duplicate(){
    var valid = true;
        $.each($("select[name$='[barang_id]']"), function (index1, item1) {
            $.each($("select[name$='[barang_id]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_data(id){
    $("#id_barang_"+id).val($("#barang_id_"+id).val());
    var id_barang = $("#barang_id_"+id).val();
    if(id_barang!=''){    
        var check = check_duplicate();
        if(check){
        $.ajax({
            url: "<?php echo base_url('index.php/SalesOrder/get_data_sj'); ?>",
            type: "POST",
            data: {
                id:id_barang,
                jenis_barang:$("#jenis_barang").val()
            },
            dataType: "json",
            success: function(result) {
                if ($("#jenis_barang").val()=="FG"){
                    $('#barang_alias_id_'+id).prop("disabled", false);
                    $('#jenis_barang_id_'+id).val(result['jenis_barang_id']);
                    $('#nama_barang_'+id).val(result['jenis_barang']);
                    $('#no_packing_'+id).val(result['no_packing']);
                    $('#bruto_'+id).val(result['bruto']);
                    $('#netto_'+id).val(result['netto']);
                    $('#qty_'+id).val(result['qty']);
                    $('#bobbin_'+id).val(result['nomor_bobbin']);
                }else if ($("#jenis_barang").val()=="WIP"){
                    $('#jenis_barang_id_'+id).val(result['jenis_barang_id']);
                    $('#uom_'+id).val(result['uom']);
                    $('#qty_'+id).val(result['qty']);
                    $('#netto_'+id).val(result['berat']);
                }else{
                    $('#nama_barang_'+id).val(result['jenis_barang']);
                    $('#jenis_barang_id_'+id).val(result['rongsok_id']);
                    $('#no_palette_'+id).val(result['no_pallete']);
                    $('#uom_'+id).val(result['uom']);
                    $('#qty_'+id).val(result['qty']);
                    $('#bruto_'+id).val(result['bruto']);
                    $('#netto_'+id).val(result['netto']);
                    $('#berat_palette_'+id).val(result['berat_palette']);
                }
            }
        });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
            $("#barang_id_"+id).select2("val", "");
            $("#id_barang_"+id).val('');
        }
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function get_type_kendaraan(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/SalesOrder/get_type_kendaraan'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#type_kendaraan").val(result['type_kendaraan']);
        } 
    });
}

function printBarcode(id){
    if($('#barang_alias_id_'+id).val() == "" || $('#barang_alias_id_'+id).val() == 0){
        var fg = $('#jenis_barang_id_'+id).val();
    }else{
        var fg = $('#barang_alias_id_'+id).val();
    }
    const b = $('#bruto_'+id).val();
    const n = $('#netto_'+id).val();
    const bp = b - n;
    const bb = bp.toFixed(2);
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bb+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/SalesOrder/print_barcode_fg?fg='+fg+'&b='+b+'&bb='+bb+'&n='+n+'&np='+np,'_blank');
}

function printBarcodeRsk(id){
    const rsk = $('#barang_alias_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const n = $('#netto_'+id).val();
    const bb = $('#berat_palette_'+id).val();
    const np = $('#no_palette_'+id).val();
    console.log(id+' | '+rsk+' | '+b+' | '+bb+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/SalesOrder/print_barcode_rsk?rsk='+rsk+'&b='+b+'&bb='+bb+'&n='+n+'&np='+np,'_blank');
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

    //loadDetail(<?php echo $header['id']; ?>);
});
</script> 