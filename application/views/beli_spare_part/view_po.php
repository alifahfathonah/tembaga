<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>"> PO List </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/view_po'); ?>"> View Purchase Order (PO) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['view_po']==1) ){
        ?>
        <div class="row">
            <div class="col-md-5">
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
                        Tanggal PO 
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="tanggal" name="tanggal" readonly="readonly" 
                            class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                            value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        No Pengajuan 
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="no_pengajuan" name="no_pengajuan" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['no_pengajuan']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Tgl Pengajuan 
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo date('d-m-Y', strtotime($header['tgl_pengajuan'])); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Yang Mengajukan 
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="created_name" name="created_name" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['pemohon']; ?>">
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
                        <input type="text" id="supplier" name="supplier" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['nama_supplier']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Contact Person
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['pic']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Term of Payment <font color="#f00">*</font>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="term_of_payment" name="term_of_payment" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['term_of_payment']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        Discount
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="diskon" name="diskon" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['diskon'].'%'; ?>">
                    </div>
                    <div class="col-md-2">
                        PPN
                    </div>
                    <?php
                    if($header['ppn'] == 1){
                        $ppn = 'Yes';
                    }else{
                        $ppn = 'No';
                    }
                    ?>
                    <div class="col-md-4">
                        <input type="text" id="ppn" name="ppn" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $ppn; ?>">
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            Materai
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="materai" name="materai" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['materai']; ?>">
                        </div>
                    </div>
            </div>              
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-scrollable">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th style="width:40px">No</th>
                            <th>Nama Item Spare Part</th>
                            <th>Unit of Measure</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center">'.$no.'</td>';
                                echo '<td>'.$row->nama_item.'</td>';
                                echo '<td>'.$row->uom.'</td>';
                                echo '<td style="text-align:right">'.number_format($row->amount,0,',', '.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->qty,0,',', '.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->total_amount,0,',', '.').'</td>';
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
                <?php
                    if( ($group_id==1 || $hak_akses['close_po']==1) && $header['status']!=1){
                        echo '<a href="javascript:;" class="btn red-sunglo" onclick="closePO();"> 
                            <i class="fa fa-lock"></i> Close PO </a>';
                    }
                ?>

                <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>" class="btn blue-hoki"> 
                    <i class="fa fa-angle-left"></i> Kembali </a>
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
function closePO(){
    var r=confirm("Anda yakin ingin close PO ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/close_po'); ?>',
            data:"id="+ $('#id').val(),
            success:function(result){
                if(result['message_type']=="sukses"){
                    window.location.href = "<?php echo base_url('index.php/BeliSparePart/po_list'); ?>";
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}
</script>
      