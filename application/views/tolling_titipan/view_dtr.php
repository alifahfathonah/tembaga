<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/view_dtr'); ?>"> Review Data Timbang Rongsok (DTR) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['view_dtr']==1) ){
        ?> 
        
        
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
                        No. Sales Order 
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="no_sales_order" name="no_sales_order" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['no_sales_order']; ?>">

                        <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                    </div>
                </div>                    
                <div class="row">
                    <div class="col-md-4">
                        Catatan
                    </div>
                    <div class="col-md-8">
                        <textarea id="remarks" name="remarks" rows="2" readonly="readonly" class="form-control myline"
                            style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                    </div>
                </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-5"> 
                <div class="row">
                    <div class="col-md-4">
                        Customer
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="nama_customer" name="nama_customer" 
                            class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                            value="<?php echo $header['nama_customer']; ?>">
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
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <?php
                            if($header['status']==0){
                                echo '<a href="javascript:;" class="btn btn-xs btn-circle green" onclick="approve('.$header['id'].');"> '
                                . '<i class="fa fa-check"></i> Approve </a> &nbsp; ';
                                echo '<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="reject('.$header['id'].');"> '
                                . '<i class="fa fa-check"></i> Reject </a>';
                            }else if($header['status']==1){
                                echo '<div style="color:green; display:inline">Approved </div> by '.$header['approved_name'];
                            }else if($header['status']==9){
                                echo '<div style="color:red; display:inline">Rejected </div> by '.$header['rejected_name'].'<br>';
                                echo '<i>Rejected remarks :</i><br>';
                                echo $header['reject_remarks'];
                            }
                        ?>
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
                            <th>No. Pallete</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center">'.$no.'</td>';
                                echo '<td>'.$row->nama_item.'</td>';
                                echo '<td>'.$row->uom.'</td>';                                    
                                echo '<td style="text-align:right">'.$row->qty.'</td>';
                                echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';                                
                                echo '<td>'.$row->no_pallete.'</td>';
                                echo '<td>'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                            <tr>
                                <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($bruto,0,',','.'); ?></strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($netto,0,',','.'); ?></strong></td>
                                <td></td>
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
                <a href="<?php echo base_url('index.php/Tolling/dtr_list'); ?>" class="btn blue-hoki"> 
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

                            <input type="hidden" id="dtr_id" name="dtr_id">
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

<script>
function approve(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/approve'); ?>",
        type: "POST",
        data : {dtr_id: id},
        success: function (result){
            if(result['type_message']=="sukses"){
                alert(result['message']);
                location.reload();
            }else{
                alert(result['message']);
            }
        }
    });
};

function reject(id){
    var r=confirm("Anda yakin me-reject DTR ini?");
    if (r==true){
        $('#dtr_id').val(id);
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject DTR');
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Tolling/reject");
        $('#frmReject').submit(); 
    }
}
</script>
      