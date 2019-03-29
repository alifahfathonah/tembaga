<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/edit_dtr'); ?>"> Review TTR </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['review_ttr']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="#">  
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
                            No TTR
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="auto generate if approved">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Afkir
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="jumlah_afkir" name="jumlah_afkir" 
                                class="form-control myline" style="margin-bottom:5px" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Packing
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="jumlah_packing" name="jumlah_packing" 
                                class="form-control myline" style="margin-bottom:5px" value="0">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Lain Lain
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="jumlah_lain" name="jumlah_lain" 
                                class="form-control myline" style="margin-bottom:5px" value="0">
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
                                <th>Bruto (Kg)</th>
                                <th>Berat Palette</th>
                                <th>Netto (Kg)</th>
                                <th>No. Pallete</th>
                                <th>Keterangan</th>
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
                                    echo '</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][uom]" '
                                            . 'class="form-control myline" value="'.$row->uom.'" '
                                            . 'readonly="readonly"></td>';
                                    
                                    echo '<td><input type="text" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.number_format($row->bruto,2,'.',',').'" '
                                            . 'readonly="readonly"></td>';

                                    echo '<td><input type="text" id="berat_'.$no.'" name="myDetails['.$no.'][berat]" '
                                            . 'class="form-control myline" maxlength="10" value="'.number_format($row->berat_palette,2,'.',',').'" '
                                            . 'readonly="readonly"></td>';
                                    
                                    echo '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.number_format($row->netto,2,'.',',').'" '
                                            . 'readonly="readonly"></td>';
                                    
                                    echo '<td><input type="text" name="myDetails['.$no.'][no_pallete]" value="'.$row->no_pallete.'" '
                                            . 'class="form-control myline" readonly="readonly"></td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][line_remarks]" value="'.$row->line_remarks.'"'
                                            . 'class="form-control myline" readonly="readonly"></td>';
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
                    <a href="javascript:;" class="btn green" onclick="approveTTR(<?=$header['id'];?>);"> 
                        <i class="fa fa-check"></i> Terima TTR </a>
                    <a href="javascript:;" class="btn red" onclick="rejectTTR(<?=$header['id'];?>);"> 
                        <i class="fa fa-times"></i> Tolak TTR </a>
                    <?php if(substr($header['no_dtr'],0,5)=='DTR-T'){?>
                    <a href="<?php echo base_url('index.php/Tolling/ttr_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url('index.php/BeliRongsok/ttr_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php } ?>
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
function approveTTR(id_ttr){
    const jumlah_afkir = $('#jumlah_afkir').val();
    const jumlah_packing = $('#jumlah_packing').val();
    const jumlah_lain = $('#jumlah_lain').val();
    $.ajax({
        url: "<?php echo base_url('index.php/BeliRongsok/approve_ttr'); ?>",
        type: "POST",
        data : {
            id: id_ttr,
            jumlah_afkir: jumlah_afkir,
            jumlah_packing: jumlah_packing,
            jumlah_lain: jumlah_lain
        },
        success: function (result){
            if(result['status']){
                alert(result['message']);
                setTimeout(function(){
                    if($('#no_dtr').val().substring(0, 5)=='DTR-T'){
                        window.location="<?=base_url('index.php/Tolling/ttr_list');?>";
                    }else{
                    window.location="<?=base_url('index.php/BeliRongsok/ttr_list');?>";
                    }
                },1000);
            }
        }
    });

}

function rejectTTR(id_ttr){
    var r=confirm("Anda yakin akan menolak TTR ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliRongsok/reject_ttr'); ?>',
            data:{id:id_ttr},
            success:function(result){
                if(result['status']){
                    alert(result['message']);
                    setTimeout(function(){
                        window.location="<?=base_url('index.php/BeliRongsok/ttr_list');?>";
                    },1000);
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}
</script>
      