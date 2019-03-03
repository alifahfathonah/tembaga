<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP'); ?>"> Gudang WIP </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/proses_bpb'); ?>"> Proses BPB </a>  
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['edit_bpb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangWIP/approve_bpb'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. BPB WIP<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_bpb" name="no_bpb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_bpb']; ?>">
                            <input type="hidden" name="id_hasil_wip" value="<?=$header['hasil_wip_id'];?>">
                            <input type="hidden" name="id_bpb_wip" value="<?=$header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['created'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_prod" name="no_prod_ingot" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_produksi_ingot']; ?>">
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
            <h4 class="text-center">Daftar Barang BPB WIP</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Barang WIP</th>
                                <th>UOM</th>
                                <th>Jumlah</th>
                                <th>Berat (Kg)</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'<input type="hidden" name="details['.$no.'][id_spb_detail]" value="'.$row->spb_wip_detail_id.'"></td>';
                                    echo '<td><input type="text" name="details['.$no.'][jenis_barang]" '
                                            . 'class="form-control myline" value="'.$row->jenis_barang.'" '
                                            . 'readonly="readonly"><input type="hidden" name="details['.$no.'][id_jenis_barang]" value="'.$row->jenis_barang_id.'">';
                                    
                                    echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';                                    
                                    echo '</td>';
                                    echo '<td><input type="text" name="details['.$no.'][uom]" '
                                            . 'class="form-control myline" value="'.$row->uom.'" '
                                            . 'readonly="readonly"></td>';                                    
                                    echo '<td><input type="text" name="details['.$no.'][qty]" '
                                            . 'class="form-control myline" value="'.$row->qty.'" '
                                            . 'readonly="readonly"></td>';
                                    
                                    echo '<td><input type="text" id="berat_'.$no.'" name="details['.$no.'][berat]" '
                                            . 'class="form-control myline" maxlength="10" value="'.number_format($row->berat,0,',','.').'" readonly="readonly"></td>';
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
                        <i class="fa fa-check"></i> Terima BPB </a>

                    <a href="<?php echo base_url('index.php/GudangWIP/bpb_list'); ?>" class="btn blue-hoki"> 
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
    var r =confirm('Apakah anda yakin ingin menerima BPB WIP ini?');
    if(r){
        $('#formku').submit(); 
    }
};
</script>
      