<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood'); ?>"> Pembelian Finish Good</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood/create_dtbj'); ?>"> Create Data Timbang Barang Jadi (DTBJ) </a> 
        </h5>          
    </div>
</div>

<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtbj']==1) ){
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
              id="formku">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTBJ <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtbj" name="no_dtbj"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= $header['no_dtbj'];?>" readonly>

                            <input type="hidden" id="id" name="id" value="<?= $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?= $header['tanggal'];?>" readonly>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>  -->            
                    <div class="row">
                        <div class="col-md-4">
                            No. SJ <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" placeholder="Nomor Surat Jalan ..."
                                class="form-control myline" style="margin-bottom:5px" readonly
                                value="<?=$header['no_sj'];?>">
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?=$header['nama_supplier'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?=$header['nama_jenis_packing'];?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item Finish Good</th>
                                <th>UOM</th>
                                <th>Bruto</th>
                                <th>Berat Palette</th>
                                <th>Netto (Kg)</th>
                                <th style="width:20%">No. Packing</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <?php 
                            $no = 0; $bruto = 0; $berat = 0 ; $netto = 0;
                            foreach ($details as $row) { 
                            $no++;
                            echo '<tr>'.
                                '<td style="text-align: center;"><div id="no_tabel_'.$no.'">'.$no.'</div></td>'.
                                '<input type="hidden" id="fg_id_'.$no.'" value="'.$row->jenis_barang_id.'">'.
                                '<td><input type="text" id="name_rongsok_'.$no.'" class="form-control myline" value="'.$row->jenis_barang.'" readonly></td>'.
                                '<td><input type="text" id="uom" class="form-control myline" readonly="readonly" value="'.$row->uom.'"></td>'.
                                '<td><input type="text" id="bruto_'.$no.'" class="form-control myline" value="'.$row->bruto.'" readonly></td>'.
                                '<td><input type="number" id="berat_bobbin_'.$no.'" class="form-control myline" value="'.$row->berat_bobbin.'" readonly></td>
                                <td><input type="text" id="netto_'.$no.'" class="form-control myline" value="'.$row->netto.'" readonly="readonly"></td>
                                <td><input type="text" id="no_packing_'.$no.'" class="form-control myline" readonly value="'.$row->no_packing.'"></td>'.
                                '<td style="text-align:center">
                                    <a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('.$no.');" style="margin-top:5px;"><i class="fa fa-print"></i> Print </a>'.
                                '</td>'.
                            '</tr>';
                            $bruto += $row->bruto;
                            $berat += $row->berat_bobbin;
                            $netto += $row->netto;
                            }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_bruto" class="form-control" readonly="readonly" value="<?=$bruto;?>"></td>
                                    <td><input type="text" id="total_berat" class="form-control" readonly="readonly" value="<?=$berat;?>"></td>
                                    <td><input type="text" id="total_netto" class="form-control" readonly="readonly" value="<?=$netto;?>"></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/BeliFinishGood/dtbj_list'); ?>" class="btn blue-hoki"> 
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
function printBarcode(id){
    const fg = $('#fg_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const bb = $('#berat_bobbin_'+id).val();
    const n = $('#netto_'+id).val();
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bb+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/BeliFinishGood/print_barcode?fg='+fg+'&b='+b+'&bb='+bb+'&n='+n+'&np='+np,'_blank');
}
</script>