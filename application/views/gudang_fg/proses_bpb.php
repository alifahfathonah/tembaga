<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG'); ?>"> Gudang FG </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/proses_bpb'); ?>"> Proses BPB </a>  
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
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
                        <form class="eventInsForm" method="post" target="_self" name="frmReject" 
                              id="frmReject">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Reject Remarks <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="reject_remarks" name="reject_remarks" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                    
                                    <input type="hidden" id="header_id" name="header_id">
                                    <input type="hidden" id="fg_id" name="fg_id">
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="rejectData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['edit_bpb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangFG/approve_bpb'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB FG<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_bpb" name="no_bpb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_bpb_fg']; ?>">
                            <input type="hidden" id="produksi_fg_id" name="produksi_fg_id" value="<?=$header['produksi_fg_id'];?>">
                            <input type="hidden" id="id" name="bpb_fg_id" value="<?=$header['id'];?>">
                            <input type="hidden" name="id_jenis_packing" value="<?=$header['jenis_packing_id']?>">
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
                            No. Produksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_prod" name="no_prod_ingot" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_laporan_produksi']; ?>">
                        </div>
                    </div>                    
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Nama Pengirim
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pengirim']; ?>">
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
                            <input type="hidden" name="id_jenis_barang" value="<?=$header['id_jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                           <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan']; ?></textarea>                          
                        </div>
                    </div>
                </div>              
            </div>

            <hr class="divider"/>
            <h4 class="text-center">Daftar Barang BPB FG</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                    <th>No</th>
                                    <th width="20%">Nama Barang</th>
                                    <th>No Produksi</th>
                                    <th width="20%">No Packing</th>
                                    <th>Bruto (kg)</th>
                                    <th>Netto (kg)</th>
                                    <th>Berat</th>
                                    <th>Nomor Bobbin</th>
                                <!-- <?php
                                if($packing=="KARDUS") {
                                ?>
                                    <th>No Produksi</th>
                                    <th>Bruto</th>
                                    <th>Netto (kg)</th>
                                    <th>Berat Bobbin</th>
                                        
                                <?php 
                                    } else if ($packing == "ROLL") {
                                ?> 
                                    <th>No Produksi</th>
                                    <th>Bruto</th>
                                    <th>Netto (kg)</th>
                                    <th>Berat Bobbin</th>
                                    <th>No Packing</th>      
                                
                                <?php 
                                    } else { //KARDUS
                                ?>        -->    
                                
                                <!-- <?php } ?> -->
                                
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $bruto = 0;
                                $netto = 0;
                                $berat = 0;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'
                                            <input type="hidden" name="details['.$no.'][id_bpb_fg_detail]" value="'.$row->id.'"</td>';
                                    
                                    // if($packing == 'KARDUS') {
                                    //         echo '<td><input type="text" name="details['.$no.'][jenis_barang]" '
                                    //                 . 'class="form-control myline" value="'.$row->jenis_barang.'" '
                                    //                 . 'readonly="readonly"><input type="hidden" name="details['.$no.'][id_jenis_barang]" value="'.$row->jenis_barang_id.'">';

                                    //         echo '<td><input type="text" name="details['.$no.'][bruto]" '
                                    //                 . 'class="form-control myline" value="'.$row->bruto.'" '
                                    //                 . 'readonly="readonly"></td>';   

                                    //         echo '<td><input type="text" name="details['.$no.'][netto]" '
                                    //                 . 'class="form-control myline" value="'.$row->netto.'" '
                                    //                 . 'readonly="readonly"></td>';

                                    //         echo '<td><input type="text" name="details['.$no.'][berat_bobbin]" '
                                    //                 . 'class="form-control myline" value="'.$row->berat_bobbin.'" '
                                    //                 . 'readonly="readonly"></td>';

                                    //         echo '<td><input type="text" name="details['.$no.'][no_packing]" '
                                    //                 . 'class="form-control myline" value="'.$row->no_packing_barcode.'" '
                                    //                 . 'readonly="readonly"></td>';
                                    
                                    // } else if ($packing == "ROLL") {
                                    //         echo '<td><input type="text" name="details['.$no.'][jenis_barang]" '
                                    //                 . 'class="form-control myline" value="'.$row->jenis_barang.'" '
                                    //                 . 'readonly="readonly"><input type="hidden" name="details['.$no.'][id_jenis_barang]" value="'.$row->jenis_barang_id.'">';

                                    //         echo '<td><input type="text" name="details['.$no.'][no_produksi]" '
                                    //                 . 'class="form-control myline" value="'.$row->no_produksi.'" '
                                    //                 . 'readonly="readonly"></td>';

                                    //         echo '<td><input type="text" name="details['.$no.'][netto]" '
                                    //                 . 'class="form-control myline" value="'.$row->netto.'" '
                                    //                 . 'readonly="readonly"></td>';

                                    //         echo '<td><input type="text" name="details['.$no.'][berat_bobbin]" '
                                    //                 . 'class="form-control myline" value="'.$row->berat_bobbin.'" '
                                    //                 . 'readonly="readonly"></td>';
                                            
                                    //         echo '<td><input type="text" name="details['.$no.'][no_packing]" '
                                    //                 . 'class="form-control myline" value="'.$row->no_packing_barcode.'" '
                                    //                 . 'readonly="readonly"></td>';
                                            
                                    // } else {

                                            echo '<td><input type="text" name="details['.$no.'][jenis_barang]" '
                                                    . 'class="form-control myline" value="'.$row->jenis_barang.'" '
                                                    . 'readonly="readonly"><input type="hidden" name="details['.$no.'][id_jenis_barang]" value="'.$row->jenis_barang_id.'">';
                                            
                                            echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                            echo '</td>';
                                            
                                            echo '<td><input type="text" name="details['.$no.'][no_produksi]" '
                                                    . 'class="form-control myline" value="'.$row->no_produksi.'" '
                                                    . 'readonly="readonly"></td>';
                                            
                                            echo '<td><input type="text" name="details['.$no.'][no_packing]" '
                                                    . 'class="form-control myline" value="'.$row->no_packing_barcode.'" '
                                                    . 'readonly="readonly"></td>';
                                            
                                            echo '<td><input type="text" name="details['.$no.'][bruto]" '
                                                    . 'class="form-control myline" value="'.$row->bruto.'" '
                                                    . 'readonly="readonly"></td>';                                    
                                            
                                            echo '<td><input type="text" name="details['.$no.'][netto]" '
                                                    . 'class="form-control myline" value="'.$row->netto.'" '
                                                    . 'readonly="readonly"></td>';

                                            echo '<td><input type="text" name="details['.$no.'][berat_bobbin]" '
                                                    . 'class="form-control myline" value="'.$row->berat_bobbin.'" '
                                                    . 'readonly="readonly"></td>';
                                            
                                            echo '<td><input type="text" id="no_bobbin_'.$no.'" name="details['.$no.'][no_bobbin]" '
                                                    . 'class="form-control myline" maxlength="20" value="'.$row->nomor_bobbin.'" readonly="readonly"><input type="hidden" name="details['.$no.'][id_bobbin]" value="'.$row->id_bobbin.'"></td>';
                                               

                                        //}
                                   
                                    echo '</tr>';
                                    $bruto += $row->bruto;
                                    $netto += $row->netto;
                                    $berat += $row->berat_bobbin;
                                    $no++;
                                }
                            ?>
                                <tr>
                                    <td colspan="4" style="text-align: right"><strong>Total :</strong></td>
                                    <td style="background-color: green; color: white;"><?=number_format($bruto,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($netto,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($berat,2,',','.');?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-check"></i> Terima BPB </a>

                    <a href="javascript:;" class="btn red" onclick="showRejectBox();"> 
                        <i class="fa fa-times"></i> Tolak BPB </a>

                    <a href="<?php echo base_url('index.php/GudangFG/bpb_list'); ?>" class="btn blue-hoki"> 
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

function simpanData(){
    var r =confirm('Apakah anda yakin ingin menerima BPB FG ini?');
    if(r){
        $('#formku').submit(); 
    }
};

function showRejectBox(){
    var r=confirm("Anda yakin me-reject BPB FG ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#fg_id').val($('#produksi_fg_id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject BPB FG');
        $("#myModal").modal('show',{backdrop: 'true'}); 
    }
}

function rejectData(){
    if($.trim($("#reject_remarks").val()) == ""){
        $('#message').html("Reject remarks harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/reject_bpb");
        $('#frmReject').submit(); 
    }
}
</script>
      