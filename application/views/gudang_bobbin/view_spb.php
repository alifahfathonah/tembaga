<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang BB
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangBobbin/view_spb'); ?>"> View Surat Permintaan Barang (SPB) BB</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB BB</b></h3>
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
                            No. SPB BB<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb_bobbin']; ?>">

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
                                value="<?php echo date('d-m-Y', strtotime($myData['created_at'])); ?>">
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
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['rejected_name']; ?>">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($myDetail as $row) { $no++;
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.$row->bobbin_size.'</td>';
                                    echo '<td>'.$row->jumlah.'</td>';
                                    echo '<td>'.$row->keterangan.'</td>';
                                    echo '<tr>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if ($myData['status']==0) { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-scrollable">
                                <table class="table table-bordered table-striped table-hover" id="tabel_bobbin">
                                    <thead>
                                        <th>No</th>
                                        <th>Nomor Bobbin</th>
                                        <th>Berat</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody id="boxDetail">
                                    <tr>
                                        <td style="text-align:center"><div id="no_tabel_1">1</div></td>
                                        <input type="hidden" id="id_bobbin_1" name="details[1][id_bobbin]">
                                        <td><input type="text" id="nomor_bobbin_1" name="details[1][nomor_bobbin]" class="form-control myline" onchange="getBobbin(1);"  autofocus onfocus="this.value = this.value;" onkeyup="this.value = this.value.toUpperCase()"></td>
                                        <td><input type="text" id="berat_1" name="details[1][berat]" class="form-control myline" readonly="readonly"></td>
                                        <td style="text-align:center"><a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    
                <?php } else { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB BB</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nomor Bobbin</th>
                                            <th>Berat</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $no = 1;
                                            foreach ($list_barang as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->nomor_bobbin.'</td>';
                                                echo '<td>'.$row->berat.' kg</td>';
                                                if($row->status==0){
                                                    echo '<td style="background-color:green; color:white; padding:4px">Ready</td>';
                                                }else if($row->status==1){
                                                    echo '<td style="background-color:blue; color:white; padding:4px">Used</td>';
                                                }else if($row->status==2){
                                                    echo '<td style="background-color:yellow; color:white; padding:4px">Delivered</td>';
                                                }else if($row->status==3){
                                                    echo '<td style="background-color:orange; color:white; padding:4px">Booked</td>';
                                                }
                                                echo '</tr>';
                                                $no++;
                                            }
                                        ?>
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
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/GudangBobbin/spb_list'); ?>" class="btn blue-hoki"> 
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
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/approve_spb");    
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangBobbin/reject_spb");
        $('#frmReject').submit(); 
    }
}

function check_duplicate(id){
    var valid = true;
        $.each($("input[name$='[nomor_bobbin]']"), function (index1, item1) {
            $.each($("input[name$='[nomor_bobbin]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
    return valid;
}

function getBobbin(id){
    var no = $("#nomor_bobbin_"+id).val();
    const new_id = id + 1;
    if(no!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/GudangBobbin/get_bobbin'); ?>",
                type: "POST",
                data : {nomor_bobbin: no},
                success: function (result){
                    if (result!=null){
                        $("#id_bobbin_"+id).val(result['id']);
                        $("#berat_"+id).val(result['berat']);
                        $("#btn_"+id).removeClass('disabled');
                        $("#nomor_bobbin_"+id).prop('readonly', true);
                        create_new_input(id);
                        $('#nomor_bobbin_'+new_id).focus();
                    } else {
                        alert('Nomor Bobbin tidak ditemukan, silahkan ulangi kembali');
                        $("#nomor_bobbin_"+id).val('');
                    }
                }
            });
        } else {
            //alert('Inputan pallete tidak boleh sama dengan inputan sebelumnya!');
            $("#nomor_bobbin_"+id).val('');
        }
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item bobbin ini?");
    if (r==true){
        $('#nomor_bobbin_'+id).closest('tr').remove();
        }
}

function create_new_input(id){
       var new_id = id+1;
        $("#tabel_bobbin>tbody").append('<tr>'+
            '<tr>'+
                '<td style="text-align:center"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<input type="hidden" id="id_bobbin_'+new_id+'" name="details['+new_id+'][id_bobbin]">'+
                '<td><input type="text" id="nomor_bobbin_'+new_id+'" name="details['+new_id+'][nomor_bobbin]" class="form-control myline" onchange="getBobbin('+new_id+');"  autofocus onfocus="this.value = this.value;" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                '<td><input type="text" id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" readonly="readonly"></td>'+
                '<td style="text-align:center"><a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>'+
            '</tr>');
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
      