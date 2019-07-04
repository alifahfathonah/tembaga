<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang WIP
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/view_spb'); ?>"> View Surat Permintaan Barang (SPB) WIP</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB WIP</b></h3>
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
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB WIP<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb_wip']; ?>">

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
                        <?php if($myData['flag_produksi']==2){
                                $flag_produksi = 'ROLLING';
                            }else if($myData['flag_produksi']==3){
                                $flag_produksi = 'CUCI';
                            }else if($myData['flag_produksi']==5){
                                $flag_produksi = 'KIRIM KE RONGSOK';
                            }else{
                                $flag_produksi = 'LAINNYA';
                            } ?>
                        <div class="col-md-4">
                            Keperluan
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="keperluan" class="form-control myline" style="margin-bottom:5px" readonly="readonly"  value="<?=$flag_produksi;?>">
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
                                <h4 align="center">Detail SPB WIP dan Ketersediaan (Kuantitas dan Stok)</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Quantity (UOM)</th>
                                            <th>Berat (Kg)</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Qty Tersedia</th>
                                            <th>Stok Tersedia (Kg)</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $qty_spb = 0;
                                            $berat_spb = 0;
                                            foreach ($myDetail as $row){
                                            $qty = ($row->total_qty_in - $row->total_qty_out);
                                            $berat = ($row->total_berat_in - $row->total_berat_out);
                                            $status = (($qty>=$row->qty) && ($berat>=$row->berat)) ? 1 : 0;
                                            ($status) ? $stat = '<div style="background:green;color:white;"><span class="fa fa-check"></span> OK </div>' : $stat = '<div style="background:red;color:white;"> <span class="fa fa-times"></span> NOK</div>';
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->qty.' '.$row->uom.'</td>';
                                                echo '<td>'.number_format($row->berat,2,',','.').'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '<td>'.$stat.'</td>';   
                                                echo '<td class="bg-primary">'.$qty.'</td>'; 
                                                echo '<td class="bg-primary">'.$berat.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $qty_spb += $row->qty;
                                                $berat_spb += $row->berat;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Total :</strong></td>
                                            <td><?=$qty_spb;?></td>
                                            <td><?=number_format($berat_spb,2,',','.');?></td>
                                            <td colspan="4"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <?php if ($myData['status']==0 || $myData['status']==4) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB WIP yang Sudah Di Penuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $qty=0; $berat=0; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->jenis_barang;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                                <td><?=number_format($v->berat,2,',','.');?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $qty += $v->qty; 
                                            $berat += $v->berat;
                                            } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                                                <td style="background-color: green; color: white;"><?=number_format($qty,0,',','.');?></td>
                                                <td style="background-color: green; color: white;"><?=number_format($berat,2,',','.');?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB WIP</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                            <th>Menu</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div id="no_tabel_1">1</div><input type="hidden" id="spb_id_1" name="details[1][spb_detail_id]"/></td>
                                                <td><select id="barang_1" class="form-control select2me myline" placeholder="pilih jenis barang" name="details[1][jenis_barang]" onchange="getBarang(1)">
                                                    <option value=""></option>
                                                    <?php foreach($list_barang as $v){
                                                        echo '<option value="'.$v->id.'">'.$v->jenis_barang.'</option>';
                                                    } ?>
                                                </select>
                                                <input type="hidden" name="details[1][id_barang]" id="barang_id_1">
                                                </td>
                                                <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                                <td><input type="text" id="qty_1" name="details[1][qty]" class="form-control myline"/></td>
                                                <td><input type="text" id="berat_1" name="details[1][berat]" class="form-control myline" /></td>
                                                <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                                <td style="text-align:center">
                                                    <a id="btn_add_1" href="javascript:;" class="btn btn-xs btn-circle green" onclick="create_new_input(1);" style="margin-top:5px"><i class="fa fa-plus"></i> Add </a>
                                                    <a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                                                <td><input type="text" id="qty" name="qty" class="form-control myline" readonly="readonly" value="0"></td>
                                                <td><input type="text" id="berat" name="berat" class="form-control myline" readonly="readonly" value="0"></td>
                                                <td colspan="2"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                        </div>
                    </div>
                <?php }else if($myData['status']==3){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB WIP yang Sudah Di Penuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->jenis_barang;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB WIP</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $qty = 0; $berat = 0;
                                            foreach($detailFulfilment as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->jenis_barang;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                                <td><?=number_format($v->berat,2,',','.');?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php $no++; $qty += $v->qty; $berat += $v->berat; } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                                                <td><?=$qty;?></td>
                                                <td><?=number_format($berat,2,',','.');?></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                <?php }else if($myData['status']==1){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">SPB WIP yang Di Penuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $qty = 0; $berat = 0; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->jenis_barang;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $qty += $v->qty;
                                            $berat += $v->berat;
                                            } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                                                <td><?=number_format($qty,0,',', '.');?></td>
                                                <td><?=number_format($berat,0,',', '.');?></td>
                                                <td></td>
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
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && ($myData['status']=='3' || $myData['status']=='1')){
                            echo '<a href="javascript:;" class="btn blue" onclick="tambahData();"> '
                                .'<i class="fa fa-plus"></i> Tambah </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['save_spb']==1) && ($myData['status']=="0" || $myData['status']=="4")){
                            echo '<a href="javascript:;" class="btn green" onclick="saveData();"> '
                                .'<i class="fa fa-check"></i> Save </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn red" onclick="rejectFulfilment();"> '
                                .'<i class="fa fa-ban"></i> Reject Pemenuhan </a>';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                        if($myData['status']==9){
                            echo '<a href="javascript:;" class="btn blue-ebonyclay" onclick="inputUlang();">'
                                .'<i class="fa fa-refresh"></i> Input Ulang </a>';
                        }
                    ?>
                    <?php if($myData['flag_produksi']==3 || $myData['flag_produksi']==1) { ?>
                    <a href="<?php echo base_url('index.php/GudangWIP/spb_list/CUCI'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/GudangWIP/spb_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php } ?>
                    <?php if($group_id==1 || $hak_akses['print_spb']==1){ ?>
                    <a class="btn btn-circle blue-ebonyclay" href="<?php echo base_url('index.php/GudangWIP/print_spb_fulfilment/').$myData['id'];?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
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
function inputUlang(){
    $('#formku').attr("action", "<?php echo base_url();?>index.php/GudangWIP/input_ulang_spb");
    $('#formku').submit();
}

function tambahData(){
    $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangWIP/tambah_spb");    
    $('#formku').submit(); 
}

function rejectFulfilment(){
    var r=confirm("Anda yakin me-reject pemenuhan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangWIP/reject_fulfilment");    
        $('#formku').submit(); 
    }
}

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangWIP/approve_spb");    
        $('#formku').submit(); 
    }
};

function saveData(){
    var r=confirm("Anda yakin menyimpan permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/GudangWIP/save_spb_fulfilment");    
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangWIP/reject_spb");
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

function getBarang(id){
    $("#barang_id_"+id).val($("#barang_"+id).val());
    var id_barang = $("#barang_"+id).val();
    var spb = $("#id").val();
    if(id_barang!=''){    
        // var check = check_duplicate();
        // if(check){
            $.ajax({
                url: "<?php echo base_url('index.php/GudangWIP/get_uom_view_spb'); ?>",
                type: "POST",
                data : {
                    id: id_barang,
                    spb_id: spb
                },
                success: function (result){
                    if (result!=null){
                        $("#spb_id_"+id).val(result['id']);
                        // console.log(result['id']);
                        $("#uom_"+id).val(result['uom']);
                        // $("#btn_"+id).removeClass('disabled');
                        $("#barang_"+id).attr('disabled','disabled');
    
                        // create_new_input(id);
                    } else {
                        alert('Gagal menambahkan, silahkan ulangi kembali');
                        $("#barang_"+id).val('');
                    }
                }
            });
        // } else {
        //     alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
        //     $("#barang_"+id).val('');
        // }
    }
}


function create_new_input(id){
    if($.trim($("#berat_"+id).val()) == ""){
        alert('Berat Belum Di Input !');
    }else{
       var new_id = id+1;
       $("#qty").val(Number($('#qty').val())+Number($('#qty_'+id).val()));
       $("#berat").val(Number($('#berat').val())+Number($('#berat_'+id).val()));
       $('#btn_'+id).removeClass('disabled');
       $('#btn_add_'+id).attr('disabled','disabled').hide();
        $("#tabel_barang>tbody").append('<tr><td><div id="no_tabel_'+new_id+'">'+new_id+'</div><input id="spb_id_'+new_id+'" name="details['+new_id+'][spb_detail_id]" type="hidden"></td><td><select id="barang_'+new_id+'" class="form-control" placeholder="pilih jenis barang" name="details['+new_id+'][jenis_barang]" onchange="getBarang('+new_id+')"><option value=""></option><?php foreach($list_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?></select><input name="details['+new_id+'][id_barang]" id="barang_id_'+new_id+'" type="hidden"></td><td><input id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="qty_'+new_id+'" name="details['+new_id+'][qty]" class="form-control myline" type="text"></td><td><input id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" type="text"></td><td><input id="keterangan_'+new_id+'" name="details['+new_id+'][keterangan]" class="form-control myline" type="text" onkeyup="this.value = this.value.toUpperCase()"></td><td style="text-align:center"><a id="btn_add_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle green" onclick="create_new_input('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Add </a><a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td></tr>');
        $('#barang_'+new_id).select2();
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
       $("#qty").val(Number($('#qty').val())-Number($('#qty_'+id).val()));
       $("#berat").val(Number($('#berat').val())-Number($('#berat_'+id).val()));
        $('#no_tabel_'+id).closest('tr').remove();
    }
}

</script>
      