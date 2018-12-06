<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/view'); ?>"> View Data Pengajuan Pembelian </a> 
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
        
        <?php
            if( ($group_id==1)||($hak_akses['view']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pengajuan" name="no_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_pengajuan']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tgl Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tgl_pengajuan'])); ?>">
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Kebutuhan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-3">                       
                            <input type="text" id="jenis_kebutuhan" name="jenis_kebutuhan" class="form-control myline" 
                                   style="margin-bottom:5px" readonly="readonly" 
                                   value="<?php echo (($myData['jenis_kebutuhan']==1)? 'Segera': 'Tanggal'); ?>">
                        </div>
                        <div class="col-md-5" id="boxTanggal" <?php echo (($myData['jenis_kebutuhan']==1)? 'style="display:none"': ''); ?>>
                            <input type="text" id="tgl_spare_part" name="tgl_spare_part" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tgl_sparepart_dibutuhkan'])); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3">
                            Keterangan
                        </div>
                        <div class="col-md-9">
                            <textarea id="keterangan" name="keterangan" rows="3" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $myData['remarks']; ?></textarea>
                        </div>
                    </div>
                    <?php
                        if($myData['status']=="9"){
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            Rejected By
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="rejected_by" name="rejected_by" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['approve_name']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Reject Remarks
                        </div>
                        <div class="col-md-9">
                            <textarea id="reject_remarks" name="reject_remarks" rows="3" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $myData['reject_remarks']; ?></textarea>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($myDetail as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>'.$row->nama_item.'</td>';
                                    echo '<td>'.$row->uom.'</td>';
                                    echo '<td style="text-align:right">'.$row->qty.'</td>';
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
                        if( ($group_id==1 || $hak_akses['approve']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/BeliSparePart'); ?>" class="btn blue-hoki"> 
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
function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan pembelian ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/approve");    
        $('#formku').submit(); 
    }
};

function showRejectBox(){
    var r=confirm("Anda yakin me-reject permintaan pembelian ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject Permintaan Pembelian');
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/reject");
        $('#frmReject').submit(); 
    }
}

</script>
      