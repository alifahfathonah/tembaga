<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/view_spb'); ?>"> View Surat Permintaan Barang (SPB)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB</b></h3>
        <hr class="divider" />
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
            if( ($group_id==1)||($hak_akses['view_spb']==1) ){
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                            <input type="hidden" id="id_pi" name="id_pi" value="<?php echo $myData['id_pi']; ?>">
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
                    </div>                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">                       
                            <input type="text" id="no_produksi" name="no_produksi" class="form-control myline" 
                                   style="margin-bottom:5px" readonly="readonly" 
                                   value="<?php echo $myData['no_produksi']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Rongsok yang Dibutuhkan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jumlah" name="jumlah" 
                                class="form-control myline" style="margin-bottom:5px; background: green; color: white;" readonly="readonly" value="<?php echo $myData['jumlah']; ?> KG">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            Jenis Barang
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['jenis_barang']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            Nama Pemohon
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['pic']; ?>">
                        </div>
                    </div>
                    <?php if($myData['status']==1){?>
                    <div class="row">
                        <div class="col-md-3">
                            Tipe Apolo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="tipe_apolo" name="tipe_apolo" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['tipe_apolo']; ?>">
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row">
                        <div class="col-md-3">
                            Tipe Apolo <font color="#f00">*</font>
                        </div>
                        <div class="col-md-6">
                            <select id="id_apolo" name="id_apolo" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px; ">
                                <option></option>
                                <?php
                                foreach ($apolo as $row) {
                                echo "<option value='".$row->id."'".(($row->id==$myData['id_apolo'])? "selected='selected'":"").">".$row->tipe_apolo."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <a style="margin-top:5px;" href="javascript:;" class="btn btn-circle btn-xs green" onclick="editApolo();"><i class="fa fa-check"></i> Save </a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-3">
                            Catatan
                        </div>
                        <div class="col-md-9">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $myData['remarks']; ?></textarea>                           
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
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['reject_name']; ?>">
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
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center">Detail SPB dan Ketersediaan Stok</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Stok Tersedia</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $total = 0;
                                            $stok = 0;
                                            foreach ($myDetail as $row){
                                            ($row->qty <= $row->stok) ? $stat = '<div style="background:green;color:white;"><span class="fa fa-check"></span> OK </div>' : $stat = '<div style="background:red;color:white;"> <span class="fa fa-times"></span> NOK</div>';
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->nama_item.'</td>';
                                                echo '<td>'.$row->uom.'</td>';
                                                echo '<td>'.number_format($row->qty,2,',','.').'</td>';
                                                echo '<td>'.$row->line_remarks.'</td>';
                                                echo '<td>'.$stat.'</td>';   
                                                echo '<td>'.number_format($row->stok,2,',','.').'</td>'; 
                                                echo '</tr>';
                                                $no++;
                                                $total += $row->qty;
                                                $stok += $row->stok;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="3" style="text-align: right;"><strong>Total Permintaan</strong></td>
                                            <td><?=number_format($total,2,',','.');?></td>
                                            <td colspan="2" style="text-align: right;"></td>
                                            <td><strong><?=number_format($stok,2,',','.');?></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <?php if ($myData['status']==0 || $myData['status']==4) { ?>
                        <?php if($myData['status']==4){?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>No Pallete</th>
                                            <th>Netto</th>
                                            <th>UOM</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $total_netto = 0; foreach($detailSPBFulfilment as $v) { ?>
                                            <tr>
                                                <td><?=$no;?></td>
                                                <td><?=$v->nama_item;?></td>
                                                <td><?=$v->no_pallete;?></td>
                                                <td><?=number_format($v->netto,2,',','.');?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->line_remarks;?></td>
                                                <?php
                                                if($v->so_id!=0){
                                                echo '<td style="background-color: green; color: white">Sudah di Kirim</td>';
                                                echo '<td></td>';
                                                }else{
                                                    echo '<td>Belum Dikirim</td>';
                                                    echo '<td><a href="'.base_url().'index.php/Ingot/delSPBSudahDipenuhi/'.$v->id.'/'.$myData['id'].'" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm("Anda yakin menghapus transaksi ini?");"><i class="fa fa-trash-o"></i> Delete</a></td>';
                                                }?>
                                            </tr>
                                            <?php 
                                            $total_netto += $v->netto;
                                            $no++; } ?>
                                            <tr>
                                                <td colspan="3"> Total</td>
                                                <td><?=number_format($total_netto,2,',','.');?></td>
                                                <td colspan="4"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemilihan Pallete</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>No Pallete</th>
                                            <th>Nama Item</th>
                                            <th>Netto</th>
                                            <th>UOM</th>
                                            <th>Keterangan</th>
                                            <th>Menu</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div id="no_tabel_1">1</div><input type="hidden" id="ttr_id_1" name="details[1][ttr_id]"/><input type="hidden" id="dtr_id_1" name="details[1][dtr_id]"/><input type="hidden" id="id_rongsok_1" name="details[1][id_rongsok]"></td>
                                                <td><input type="text" id="no_pallete_1" name="details[1][no_pallete]" class="form-control myline" onchange="getRongsok(1);"  autofocus onfocus="this.value = this.value;"></td>
                                                <td><input type="text" id="nama_item_1" name="details[1][nama_item]" class="form-control myline" readonly="readonly" /></td>
                                                <td><input type="text" id="netto_1" name="details[1][netto]" class="form-control myline" readonly="readonly" /></td>
                                                <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                                <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" readonly="readonly"></td>
                                                <td style="text-align:center"><a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>
                                            </tr>
                                        </tbody>
                                            <thead>
                                                <th colspan="3">Total Netto</th>
                                                <th><input type="text" id="total_netto" class="form-control" readonly="readonly" value="0"></th>
                                                <th colspan="3"></th>
                                            </thead>
                                    </table>
                                </div>

                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB Rongsok yang Sudah Dipenuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>No Pallete</th>
                                            <th>Netto</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $tb = 0;
                                            $tn = 0;
                                            foreach ($detailSPBFulfilment as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->nama_item.'</td>';
                                                echo '<td>'.$row->no_pallete.'</td>';
                                                echo '<td>'.number_format($row->netto,2,',','.').' '.$row->uom.'</td>';
                                                echo '<td>'.$row->line_remarks.'</td>';
                                                if($row->so_id!=0){
                                                echo '<td style="background-color: green; color: white">Sudah di Kirim</td>';
                                                echo '<td></td>';
                                                }else{
                                                    echo '<td>Belum Dikirim</td>';
                                                    echo '<td><a href="'.base_url().'index.php/Ingot/delSPBSudahDipenuhi/'.$row->id.'/'.$myData['id'].'" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm("Anda yakin menghapus transaksi ini?");"><i class="fa fa-trash-o"></i> Delete</a></td>';
                                                }
                                                $tn += $row->netto;
                                                $no++;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td style="background-color: green; color: white;"><?=number_format($tn,2,',','.');?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB</h4>
                            <div class="row">
                                <div class="col-md-2">
                                    Tanggal Keluar <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="tanggal_keluar" name="tanggal_keluar" class="form-control myline input-small" style="margin-bottom:5px; float: left;" value="<?php echo date('d-m-Y'); ?>">
                                </div>
                            </div>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>No Pallete</th>
                                            <th>Netto</th>
                                            <th>UOM</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $total_netto = 0; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_1"><?=$no;?></div></td>
                                                <td><?=$v->nama_item;?></td>
                                                <td><?=$v->no_pallete;?></td>
                                                <td><?=$v->netto;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->line_remarks;?></td>
                                                <?php
                                                    echo '<td><a href="'.base_url().'index.php/Ingot/delPemenuhan/'.$v->id.'/'.$myData['id'].'" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm("Anda yakin menghapus transaksi ini?");"><i class="fa fa-trash-o"></i> Delete</a></td>';
                                                ?>
                                            </tr>
                                            <?php 
                                            $total_netto += $v->netto;
                                            $no++; } ?>
                                            <tr>
                                                <td colspan="3"> Total</td>
                                                <td style="background-color: green; color: white;"><?=number_format($total_netto,2,',','.');?></td>
                                                <td colspan="3"></td>
                                            </tr>
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
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn red" onclick="rejectFulfilment();"> '
                                .'<i class="fa fa-ban"></i> Reject Pemenuhan </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/Ingot/spb_list'); ?>" class="btn blue-hoki"> 
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
function editApolo(){
    const id = $('#id').val();
    const id_ap = $('#id_apolo').val();
    const id_pi = $('#id_pi').val();
    window.location= '<?php echo base_url(); ?>index.php/Ingot/edit_apolo?id_ap='+id_ap+'&id_pi='+id_pi+'&id='+id;
}

function saveFulfilment(){
    var r=confirm("Anda yakin meng-save permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Ingot/save_fulfilment");    
        $('#formku').submit(); 
    }
};

function rejectFulfilment(){
    var r=confirm("Anda yakin me-reject pemenuhan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Ingot/reject_fulfilment");    
        $('#formku').submit(); 
    }
};

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Ingot/approve_spb");    
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Ingot/reject_spb");
        $('#frmReject').submit(); 
    }
}

function check_duplicate(id){
    var valid = true;
        $.each($("input[name$='[no_pallete]']"), function (index1, item1) {
            $.each($("input[name$='[no_pallete]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
    return valid;
}

function getRongsok(id){
    var no = $("#no_pallete_"+id).val();
    const new_id = id + 1;
    if(no!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/Ingot/get_rongsok'); ?>",
                type: "POST",
                data : {no_pallete: no},
                success: function (result){
                    if (result!=null){
                        $("#dtr_id_"+id).val(result['id']);
                        $("#ttr_id_"+id).val(result['ttr_id']);
                        $("#nama_item_"+id).val(result['rongsokname']);
                        $("#id_rongsok_"+id).val(result['id_rongsok']);
                        $("#uom_"+id).val(result['uom']);
                        $("#netto_"+id).val(result['netto']);
                        $("#keterangan_"+id).val(result['line_remarks']);
                        $("#btn_"+id).removeClass('disabled');
                        const total = (parseFloat($('#total_netto').val()) + parseFloat(result['netto']));
                        $('#total_netto').val(total);
                        create_new_input(id);
                        $('#no_pallete_'+new_id).focus();
                    } else {
                        alert('No pallete tidak ditemukan, silahkan ulangi kembali');
                        $("#no_pallete_"+id).val('');
                    }
                }
            });
        } else {
            //alert('Inputan pallete tidak boleh sama dengan inputan sebelumnya!');
            $("#no_pallete_"+id).val('');
        }
    }
}


function create_new_input(id){
       var new_id = id+1;
        $("#tabel_pallete>tbody").append('<tr><td><div id="no_tabel_'+new_id+'">'+new_id+'</div><input type="hidden" id="ttr_id_'+new_id+'" name="details['+new_id+'][ttr_id]"/><input type="hidden" id="dtr_id_'+new_id+'" name="details['+new_id+'][dtr_id]"/><input type="hidden" id="id_rongsok_'+new_id+'" name="details['+new_id+'][id_rongsok]"></td><td><input id="no_pallete_'+new_id+'" name="details['+new_id+'][no_pallete]" class="form-control myline" onchange="getRongsok('+new_id+');" type="text"></td><td><input type="text" id="nama_item_'+new_id+'" name="details['+new_id+'][nama_item]" class="form-control myline" readonly="readonly" /></td><td><input id="netto_'+new_id+'" name="details['+new_id+'][netto]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="keterangan_'+new_id+'" name="details['+new_id+'][keterangan]" class="form-control myline" readonly="readonly" type="text"></td><td style="text-align:center"><a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td></tr>');
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item pallete ini?");
    if (r==true){
        const total = $('#total_netto').val();
        $('#total_netto').val(parseFloat(total) - parseFloat($('#netto_'+id).val()));
        $('#no_pallete_'+id).closest('tr').remove();
        }
}

// $(window).load(function() {
//     $('#no_pallete_1').focus();
// });
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tanggal_keluar").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });       
});
</script>