<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/view_spb'); ?>"> View Surat Permintaan Barang (SPB) FG</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB FG</b></h3>
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
                            No. SPB FG<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb']; ?>">

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
                    <?php if ($myData['status']==0 || $myData['status']==4) { ?>
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center">Detail SPB FG dan Ketersediaan (Kuantitas dan Stok)</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Netto (UOM)</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Qty Tersedia</th>
                                            <th>Stok Tersedia (Kg)</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($myDetail as $row){
                                            $total_qty = $row->total_qty;
                                            $total_netto = $row->total_netto;
                                            $status = ($row->total_netto > $row->netto) ? 1 : 0;
                                            ($status) ? $stat = '<div style="background:green;color:white;"><span class="fa fa-check"></span> OK </div>' : $stat = '<div style="background:red;color:white;"> <span class="fa fa-times"></span> NOK</div>';
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.number_format($row->netto,2,',','.').' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '<td>'.$stat.'</td>';
                                                //total qty
                                                if ($total_qty==0) {
                                                echo '<td style="background:red;color:white;"> 0 </td>';
                                                } else {
                                                echo '<td class="bg-primary">'.$total_qty.'</td>';
                                                }
                                                //total netto
                                                if ($total_netto==0) {
                                                echo '<td style="background:red;color:white;"> 0 '.$row->uom.'</td>';
                                                } else {
                                                echo '<td class="bg-primary">'.number_format($total_netto,2,',','.').' '.$row->uom.'</td>';
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
                    <hr class="divider"/>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB FG yang Sudah Dipenuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>No Packing</th>
                                            <th>Nomor Bobbin</th>
                                            <th>Bruto</th>
                                            <th>Netto (UOM)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $tb = 0;
                                            $tn = 0;
                                            foreach ($detailSPB as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->uom.'</td>';
                                                echo '<td>'.$row->no_packing.'</td>';
                                                echo '<td>'.$row->nomor_bobbin.'</td>';
                                                echo '<td>'.$row->bruto.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                $tb += $row->bruto;
                                                $tn += $row->netto;
                                                $no++;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="5">Total</td>
                                            <td style="background-color: green; color: white;"><?=$tb;?></td>
                                            <td style="background-color: green; color: white;"><?=$tn;?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB FG</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th style="width:20%">No Packing</th>
                                            <th style="width:20%">Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Netto</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div id="no_tabel_1">1</div></td>
                                                <td><input type="text" id="no_packing_1" name="details[1][no_packing]" class="form-control myline" onchange="get_packing(1);"></td>
                                                <input type="hidden" name="details[1][id_barang]" id="barang_id_1"><!-- ID GUDANG -->
                                                <td><input type="text" id="nama_barang_1" name="details[1][nama_barang]" class="form-control myline" readonly="readonly"></td>
                                                <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                                </td>
                                                <td><input type="text" id="netto_1" name="details[1][berat]" class="form-control myline" readonly="readonly" /></td>
                                                <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                                <td style="text-align:center">
                                                    <a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                            <thead>
                                                <th colspan="3">Total Netto</th>
                                                <th><input type="text" id="total_netto" class="form-control" readonly="readonly" value="0"></th>
                                                <th colspan="2"></th>
                                            </thead>
                                    </table>
                                </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Permintaan SPB FG</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>Netto (UOM)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($myDetail as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->uom.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                $no++;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB FG yang Sudah Dipenuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>No Packing</th>
                                            <th>Nomor Bobbin</th>
                                            <th>Bruto</th>
                                            <th>Netto (UOM)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $tb = 0;
                                            $tn = 0;
                                            foreach ($detailSPB as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->uom.'</td>';
                                                echo '<td>'.$row->no_packing.'</td>';
                                                echo '<td>'.$row->nomor_bobbin.'</td>';
                                                echo '<td>'.$row->bruto.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                $tb += $row->bruto;
                                                $tn += $row->netto;
                                                $no++;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="5">Total</td>
                                            <td style="background-color: green; color: white;"><?=$tb;?></td>
                                            <td style="background-color: green; color: white;"><?=$tn;?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB FG</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Netto (UOM)</th>
                                            <th>No Packing</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $total_netto=0; foreach($myDetailSaved as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->jenis_barang;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->netto;?></td>
                                                <td><?=$v->no_packing?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $total_netto += $v->netto; } ?>
                                        </tbody>
                                        <tbody>
                                            <td colspan="3">
                                                Total Netto (KG)
                                            </td>
                                            <td style="text-align:right; background-color:green; color:white"><strong><?php echo $total_netto;?></strong></td>
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
                        if( ($group_id==1 || $hak_akses['save_spb']==1) && ($myData['status']=="0" || $myData['status']=="4")){
                            echo '<a href="javascript:;" class="btn green" onclick="saveFulfilment();"> '
                                .'<i class="fa fa-check"></i> Save </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && ($myData['status']=='3')){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) &&  ($myData['status']=='3')){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                        if($myData['status']==9){
                            echo '<a href="javascript:;" class="btn blue-ebonyclay" onclick="inputUlang();">'
                                .'<i class="fa fa-refresh"></i> Input Ulang </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/GudangFG/spb_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php if($group_id==1 || $hak_akses['print_spb']==1){ ?>
                    <a class="btn btn-circle blue-ebonyclay" href="<?php echo base_url('index.php/GudangFG/print_spb_fulfilment/').$myData['id'];?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
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
 /*   $('#barang_1').change(function() { // When the select is changed
        var id_barang=$(this).val(); // Get the chosen value
        console.log(id_barang);
        $.ajax({
            type: "POST",
            url: "<?php //echo base_url('index.php/GudangFG/get_no_packing'); ?>", // The new PHP page which will get the option value, process it and return the possible options for second select
            data: {id: id_barang}, // Send the slected option to the PHP page
        });
    });*/
function saveFulfilment(){
    var r=confirm("Anda yakin meng-save permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/save_fulfilment");    
        $('#formku').submit(); 
    }
};

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/approve_spb");    
        $('#formku').submit(); 
    }
};

function inputUlang(){
    $('#formku').attr("action", "<?php echo base_url();?>index.php/GudangFG/input_ulang_spb");
    $('#formku').submit();
}

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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/reject_spb");
        $('#frmReject').submit(); 
    }
}

function check_duplicate(){
    var valid = true;
        $.each($("input[name$='[no_packing]']"), function (index1, item1) {
            $.each($("input[name$='[no_packing]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_packing(id){
    var no = $("#no_packing_"+id).val();
    const new_id = id + 1;
    if(no!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/GudangFG/get_packing'); ?>",
                type: "POST",
                data : {id: no},
                success: function (result){
                    if (result!=null){
                        $("#nama_barang_"+id).val(result['jenis_barang']);
                        $("#barang_id_"+id).val(result['id']);
                        $("#uom_"+id).val(result['uom']);
                        $("#netto_"+id).val(result['netto']);
                        $("#keterangan_"+id).val(result['keterangan']);
                        $("#btn_"+id).removeClass('disabled');
                        const total = (parseInt($('#total_netto').val()) + parseInt(result['netto']));
                        $('#total_netto').val(total);
                        create_new_input(id);
                        $('#no_packing_'+id).prop('readonly',true);
                        $('#no_packing_'+new_id).focus();
                    } else {
                        alert('No pallete tidak ditemukan, silahkan ulangi kembali');
                        $("#no_packing_"+id).val('');
                    }
                }
            });
        } else {
            //alert('Inputan pallete tidak boleh sama dengan inputan sebelumnya!');
            $("#no_packing_"+id).val('');
        }
    }
}

function create_new_input(id){
       var new_id = id+1; 
        $("#tabel_barang>tbody").append('<tr>'+
                '<td><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<td><input type="text" id="no_packing_'+new_id+'" name="details['+new_id+'][no_packing]" class="form-control myline" onchange="get_packing('+new_id+');"></td>'+
                '<input type="hidden" name="details['+new_id+'][id_barang]" id="barang_id_'+new_id+'">'+
                '<td><input type="text" id="nama_barang_'+new_id+'" name="details['+new_id+'][nama_barang]" class="form-control myline" readonly="readonly"></td>'+
                '<td><input type="text" id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
                '</td>'+
                '<td><input type="text" id="netto_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" readonly="readonly" /></td>'+
                '<td><input type="text" id="keterangan_'+new_id+'" name="details['+new_id+'][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                '<td style="text-align:center">'+
                '<a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                '</td>'+
            '</tr>');
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus packing ini?");
    if (r==true){
        const total = $('#total_netto').val();
        $('#total_netto').val(parseInt(total) - parseInt($('#netto_'+id).val()));
        $('#no_packing_'+id).closest('tr').remove();
        }
}

</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
      