<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/edit_dtr'); ?>"> Edit Data Timbang Rongsok (DTR) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['edit_dtr']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/BeliRongsok/re_dtr'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTR <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_dtr']; ?>">

                            <input type="hidden" name="id" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
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
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_supplier']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['penimbang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Rejected By
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['rejected_name']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Reject Remarks
                        </div>
                        <div class="col-md-8">
                            <textarea id="reject_remarks" name="reject_remarks" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['reject_remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Item Rongsok</th>
                                <th>UOM</th>
                                <th>Jumlah</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Berat Pallete</th>
                                <th></th>
                                <th width="15%">No. Pallete</th>
                                <th>Keterangan</th>
                                <th>Print</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][nama_item]" '
                                            . 'class="form-control myline" value="'.$row->nama_item.'" '
                                            . 'readonly="readonly">';
                                    
                                    echo '<input type="hidden" name="myDetails['.$no.'][id]" value="'.$row->id.'">';
                                    echo '<input type="hidden" id="rongsok_id_'.$no.'" value="'.$row->rongsok_id.'";?>';                                    
                                    echo '</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][uom]" '
                                            . 'class="form-control myline" value="'.$row->uom.'" '
                                            . 'readonly="readonly"></td>';                                    
                                    echo '<td><input type="text" id="qty_'.$no.'" name="myDetails['.$no.'][qty]" '
                                            . 'class="form-control myline" value="'.number_format($row->qty,0,',','.').'" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>';
                                    echo '<td><input type="number" id="bruto_'.$no.'" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->bruto.'"></td>';
                                    
                                    echo '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->netto.'" readonly="readonly"></td>';
                                    echo '<td><input type="text" id="berat_palette_'.$no.'" name="myDetails['.$no.'][berat_palette]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->berat_palette.'"></td>';
                                    
                                    echo '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('.$no.');"> <i class="fa fa-dashboard"></i> Timbang </a></td>';
                                    
                                    echo '<td><input type="text" id="no_pallete_'.$no.'" name="myDetails['.$no.'][no_pallete]" value="'.$row->no_pallete.'" '
                                            . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][line_remarks]" value="'.$row->line_remarks.'"'
                                            . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                    echo '<td style="text-align:center"><a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Print </a></td>';
                                    echo '</tr>';
                                    $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Update DTR </a>

                    <a href="<?php echo base_url('index.php/BeliRongsok/dtr_list'); ?>" class="btn blue-hoki"> 
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
function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    $('#formku').submit(); 
};

function printBarcode(id){
    const r = $('#rongsok_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const bp = $('#berat_palette_'+id).val();
    const n = $('#netto_'+id).val();
    const np = $('#no_pallete_'+id).val();
    console.log(id+' | '+r+' | '+b+' | '+bp+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/BeliRongsok/print_barcode_rongsok?r='+r+'&b='+b+'&bp='+bp+'&n='+n+'&np='+np,'_blank');
}
</script>
      