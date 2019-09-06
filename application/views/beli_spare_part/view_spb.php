<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Sparepart
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/view_spb'); ?>"> View Surat Permintaan Barang (SPB) Sparepart</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB Sparepart</b></h3>
        <hr class="divider" />
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
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
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <?php
            if( ($group_id==1)||($hak_akses['view_spb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB Sparepart<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb_sparepart']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Pemohon
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Request By
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="request" name="request" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $myData['request_by']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $myData['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                    <?php
                        if($myData['status']=="9"){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Rejected By
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rejected_by" name="rejected_by" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['reject_name']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Reject Remarks
                        </div>
                        <div class="col-md-8">
                            <textarea id="reject_remarks" name="reject_remarks" rows="3" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $myData['reject_remarks']; ?></textarea>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>              
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center">Detail SPB Sparepart dan Ketersediaan (Kuantitas dan Stok)</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Quantity (UOM)</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Qty Tersedia</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($myDetail as $row){
                                            $stok = $row->total_qty_in - $row->total_qty_out;
                                            $status = (($stok > 0)) ? 1 : 0;
                                            ($status) ? $stat = '<div style="background:green;color:white;"><span class="fa fa-check"></span> OK </div>' : $stat = '<div style="background:red;color:white;"> <span class="fa fa-times"></span> NOK</div>';
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->nama_item.'</td>';
                                                echo '<td>'.$row->qty.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '<td>'.$stat.'</td>';
                                                echo '<td>'.$stok.'</td>';
                                                echo '</tr>';
                                                $no++;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <?php if ($myData['status']==0) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB Sparepart</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Keterangan</th>
                                            <th>Menu</th>
                                        </thead>
                                        <tbody id="boxSavedItem">
                                            
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td><div id="no_tabel_1">1</div><input type="hidden" id="spb_id_1" name="details[1][spb_detail_id]"/></td>
                                                <td><select id="barang_1" class="form-control" placeholder="pilih jenis barang" name="details[1][jenis_barang]" onchange="get_uom(this.value)">
                                                    <option value=""></option>
                                                    <?php foreach($list_barang as $v){
                                                        echo '<option value="'.$v->id.'">'.$v->nama_item.'</option>';
                                                    } ?>
                                                </select>
                                                </td>
                                                <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                                <td><input type="text" id="qty_1" name="details[1][qty]" class="form-control myline"/></td>
                                                <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                                
                                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB Sparepart</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->nama_produk;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                <?php } ?>

                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn green" id="approveData" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/BeliSparePart/spb_list'); ?>" class="btn blue-hoki"> 
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
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#approveData').text('Please Wait ...').prop("onclick", null).off("click");
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/approve_spb");  
        $('#formku').submit(); 
    }
};

function showRejectBox(){
    var r=confirm("Anda yakin me-reject permintaan barang ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject Permintaan Barang');
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/reject_spb");
        $('#frmReject').submit(); 
    }
}

function check_duplicate(){
    var valid = true;
        $.each($("input[name$='[id_barang]']"), function (index1, item1) {
            $.each($("input[name$='[id_barang]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliSparePart/get_uom_spb'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom_1').val(result['uom']);
        }
    });
}

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/BeliSparePart/load_detail_saved_item'); ?>",
        data: "id="+ id,
        success:function(result){
            $('#boxSavedItem').html(result);     
        }
    });
}

function saveDetail(){
    //console.log('ID = '+$('#id').val()+', iv id ='+$('#barang_1').val()+', qty ='+$('#qty_1').val());
    if($.trim($("#barang_1").val()) == ""){
        console.log('BARANG kosong');
        $('#message').html("Silahkan pilih Nama barang !");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty_1").val()) == ""){
        console.log('KUANTITAS kosong');
        $('#message').html("Silahkan tulis Kuantitas !");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/save_detail_spb_sparepart_keluar'); ?>',
            data:{
                t_spb_sparepart_id:$('#id').val(),
                jenis_inventory_id:$('#barang_1').val(),
                uom:$('#uom_1').val(),
                qty:$('#qty_1').val(),
                keterangan:$('#keterangan_1').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    console.log('SUKSES TAMBAH');
                    loadDetail(<?php echo $myData['id'];?>);
                    $('#barang_1').val(''); // set the value to blank with empty quotes
                    $('#uom_1').val('');
                    $('#qty_1').val('');
                    $('#keterangan_1').val('');
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus pemenuhan SPB Sparepart ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/delete_spb_sparepart_keluar'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    console.log('BERHASIL DELETE');
                    loadDetail(<?php echo $myData['id'];?>);
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}

</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
$(function(){    
    loadDetail(<?php echo $myData['id']; ?>);
});
</script>
      