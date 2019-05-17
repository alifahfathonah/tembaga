<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Ampas
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/PengirimanAmpas/view_spb'); ?>"> View Surat Permintaan Barang (SPB) Ampas</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Permintaan SPB Ampas</b></h3>
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
                            No. SPB Ampas<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb_ampas']; ?>">

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
                                <h4 align="center">Detail SPB Ampas dan Ketersediaan (Kuantitas dan Stok)</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Netto</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Stok Tersedia (Kg)</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($myDetail as $row){
                                            $status = ($row->stok>0) ? 1 : 0;
                                            ($status) ? $stat = '<div style="background:green;color:white;"><span class="fa fa-check"></span> OK </div>' : $stat = '<div style="background:red;color:white;"> <span class="fa fa-times"></span> NOK</div>';
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '<td>'.$stat.'</td>';
                                                //total qty
                                                if ($row->stok==0) {
                                                echo '<td style="background:red;color:white;"> 0 </td>';
                                                } else {
                                                echo '<td class="bg-primary">'.$row->stok.'</td>';
                                                }
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
                            <h4 align="center">Pemenuhan SPB Ampas</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Netto (Kg)</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="boxSavedItem">
                                            
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td><div id="no_tabel_1">+</div><input type="hidden" id="tsfd_id" name="details[1][spb_detail_id]"/></td>
                                                <td><select id="barang_1" class="form-control" placeholder="pilih jenis barang" name="details[1][jenis_barang]" onchange="get_stok(this.value)">
                                                    <option value=""></option>
                                                    <?php foreach($list_barang as $v){
                                                        echo '<option value="'.$v->rongsok_id.'">'.$v->nama_item.'</option>';
                                                    } ?>
                                                </select>
                                                <input type="hidden" name="details[1][id_barang]" id="barang_id_1">
                                                </td>
                                                <td><input type="text" id="uom" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                            <!--    <td><input type="text" id="qty_1" name="details[1][qty]" class="form-control myline"/></td>-->
                                            <!--    <td><select id="no_packing_1" class="form-control" placeholder="pilih nomor packing" name="details[1][no_packing]">
                                                    <option value=""></option>
                                                    <?php// foreach($no_packing as $v){
                                                        //echo '<option value="'.$v->id.'">'.$v->no_packing.'</option>';
                                                    } ?>
                                                </select>-->
                                                </td>
                                                <td><input type="text" id="berat" name="details[1][berat]" class="form-control myline" onkeyup="getComa(this.value, this.id);"/></td>
                                                <td><input type="text" id="keterangan_1" name="details[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                                <td style="text-align:center">
                                                    <a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                                    <!--<a id="btn_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>-->
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                <?php }else if($myData['status']==3){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Permintaan SPB Ampas</h4>
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
                            <h4 align="center">SPB WIP yang Sudah Di Penuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $qty = 0; $berat = 0; foreach($detailFulfilment as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->nama_item;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $berat += $v->berat;
                                            } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                                                <td style="background-color: green; color: white;"><?=number_format($berat,0,',', '.');?></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB Ampas</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Netto (UOM)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $total_netto=0; foreach($detailSPB as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->nama_item;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $total_netto += $v->berat; } ?>
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
                <?php }else if($myData['status']==1){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Permintaan SPB Ampas</h4>
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
                            <h4 align="center">SPB WIP yang Di Penuhi</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>
                                            <th>UOM</th>
                                            <th>Berat (kg)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $qty = 0; $berat = 0; foreach($detailFulfilment as $v) { ?>
                                            <tr>
                                                <td><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                                <td><?=$v->nama_item;?></td>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $berat += $v->berat;
                                            } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                                                <td style="background-color: green; color: white;"><?=number_format($berat,0,',', '.');?></td>
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
                        if( ($group_id==1 || $hak_akses['save_spb']==1) && ($myData['status']=="0" || $myData['status']=="4")){
                            echo '<a href="javascript:;" class="btn green" onclick="saveData();"> '
                                .'<i class="fa fa-check"></i> Save </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['approve_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn green" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_spb']==1) && $myData['status']=="3"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/PengirimanAmpas/spb_list'); ?>" class="btn blue-hoki"> 
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
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
 /*   $('#barang_1').change(function() { // When the select is changed
        var id_barang=$(this).val(); // Get the chosen value
        console.log(id_barang);
        $.ajax({
            type: "POST",
            url: "<?php //echo base_url('index.php/GudangFG/get_no_packing'); ?>", // The new PHP page which will get the option value, process it and return the possible options for second select
            data: {id: id_barang}, // Send the slected option to the PHP page
        });
    });*/
function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function get_stok(id){
    $.ajax({
        url: "<?php echo base_url('index.php/PengirimanAmpas/get_stok'); ?>",
        type: "POST",
        data: {id: id},
        dataType: "json",
        success: function(result) {
            const stok = result['berat_masuk']-result['berat_keluar'];
            $('#uom').val('Stok = '+numberWithCommas(stok));
        }
    });
}

function saveData(){
    var r=confirm("Anda yakin menyimpan permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/PengirimanAmpas/save_spb_fulfilment");    
        $('#formku').submit(); 
    }
};

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/PengirimanAmpas/approve_spb");    
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/GudangFG/reject_spb");
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

/*function getBarang(id){
    $("#barang_id_"+id).val($("#barang_"+id).val());
    var id_barang = $("#barang_"+id).val();
    console.log(id_barang);
    if(id_barang!=''){    
        var check = check_duplicate();
        if(check){
            $.ajax({
                url: "<?php// echo base_url('index.php/GudangFG/get_uom_spb'); ?>",
                type: "POST",
                data : {id: id_barang},
                success: function (result){
                    if (result!=null){
                        $("#spb_id_"+id).val(result['id']);
                        $("#uom_"+id).val(result['uom']);
                        $("#btn_"+id).removeClass('disabled');
                        $("#barang_"+id).attr('disabled','disabled');
    
                        create_new_input(id);
                    } else {
                        alert('Gagal menambahkan, silahkan ulangi kembali');
                        $("#barang_"+id).val('');
                    }
                }
            });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
            $("#no_pallete_"+id).val('');
        }
    }
}*/

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/PengirimanAmpas/load_detail_saved_item'); ?>",
        data: "id="+ id,
        success:function(result){
            $('#boxSavedItem').html(result);     
        }
    });
}

function saveDetail(){
    if($.trim($("#barang_1").val()) == ""){
        $('#message').html("Silahkan pilih nama barang !");
        $('.alert-danger').show(); 
    }else if($.trim($("#berat").val()) == ""){
        $('#message').html("Netto belum diisi");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/PengirimanAmpas/save_detail_spb'); ?>',
            data:{
                spb_id:$('#id').val(),
                jenis_barang_id:$('#barang_1').val(),
                berat:$('#berat').val(),
                keterangan:$('#keterangan_1').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail(<?php echo $myData['id'];?>);
                    $('#barang_1').val(''); // set the value to blank with empty quotes
                    $('#uom').val('');
                    $('#berat').val('');
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
/*
function create_new_input(id){
       var new_id = id+1; 
        $("#tabel_barang>tbody").append('<tr><td><div id="no_tabel_'+new_id+'">'+new_id+'</div><input id="spb_id_'+new_id+'" name="details['+new_id+'][spb_detail_id]" type="hidden"></td><td><select id="barang_'+new_id+'" class="form-control" placeholder="pilih jenis barang" name="details['+new_id+'][jenis_barang]" onchange="getBarang('+new_id+')"><option value=""></option><?php //foreach($list_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?></select><input name="details['+new_id+'][id_barang]" id="barang_id_'+new_id+'" type="hidden"></td><td><input id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly" type="text"></td><td><input id="qty_'+new_id+'" name="details['+new_id+'][qty]" class="form-control myline" type="text"></td><td><input id="berat_'+new_id+'" name="details['+new_id+'][berat]" class="form-control myline" type="text"></td><td><input id="keterangan_'+new_id+'" name="details['+new_id+'][keterangan]" class="form-control myline" type="text" onkeyup="this.value = this.value.toUpperCase()"></td><td style="text-align:center"><a id="btn_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td></tr>');
}*/

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus pemenuhan SPB Ampas ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/PengirimanAmpas/delete_detail_spb'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
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
      