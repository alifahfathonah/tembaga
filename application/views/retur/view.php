<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Retur 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/retur/view'); ?>"> View Retur</a> 
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
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_retur']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                            <input type="hidden" id="spb_id" name="spb_id" value="<?php echo $header['spb_id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly><?php echo  $header['remarks']; ?></textarea>                           
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
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="m_customer_id" name="m_customer_id" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?= (($this->session->userdata('user_ppn') == 1)? $header['pic'] : $header['pic_kh']) ?>">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing_id" name="jenis_packing_id" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_packing']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Type Retur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="type_retur" name="type_retur" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" disabled>
                                <option value=""></option>
                                <?php
                                echo '<option value="0"'.((0==$header['jenis_retur'])? 'selected="selected"': '').'>Ganti Barang</option>';
                                echo '<option value="1"'.((1==$header['jenis_retur'])? 'selected="selected"': '').'>Mengurangi Hutang</option>';
                                ?>
                            </select>
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
                                <th>Nama Item</th>
                                <th>Nomor Packing</th>
                                <th>Bruto</th>
                                <th>Netto</th>
                                <th>No. Bobbin / Keranjang</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $total = 0;
                                foreach ($myDetail as $row){ 
                            ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo '<label class="lbl_alias">'.$row->jenis_barang.'</label>';
                                    echo '<input type="hidden" style="display: none;" class="id_retur_detail" name="details['.$no.'][id_retur_detail]" value="'.$row->id.'">';
                                    echo '<input type="hidden" style="display: none;" name="details['.$no.'][old_item]" value="'.$row->jenis_barang_id.'">';
                                    echo '<input type="hidden" style="display: none;" name="details['.$no.'][no_packing]" value="'.$row->no_packing.'">';
                                    echo '<select name="details['.$no.'][nama_item]" class="form-control select2me myline jb_alias" data-placeholder="Pilih..." style="margin-bottom:5px; display:none;">
                                            <option value="0" data-id="0">TIDAK ADA ALIAS</option>';
                                            foreach ($jenis_barang as $value){
                                            echo '<option value="'.$value->id.'">('.$value->kode.') '.$value->jenis_barang.'</option>';
                                            }
                                        echo '</select>';
                                    ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td style="text-align:right"><?php echo number_format($row->bruto,2,',','.');
                                    echo '<input type="text" style="display: none;" class="form-control myline jb_alias" name="details['.$no.'][bruto]" value="'.$row->bruto.'">'
                                    ?></td>
                                    <td style="text-align:right"><?php echo number_format($row->netto,2,',','.'); echo '<input type="text" style="display: none;" class="form-control myline jb_alias" name="details['.$no.'][netto]" value="'.$row->netto.'">' ?></td>
                                    <td><?php echo $row->nomor_bobbin; ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
            <?php
                                    $total += $row->netto;
                                    $no++;
                                }
                            ?>
                            </tbody>
                            <tr>
                                <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                <td><?=number_format($total,2,',','.');?></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1 || $hak_akses['approve']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn green" id="approveData" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" id="rejectData" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                        if( ($group_id==1 || $hak_akses['approve']==1) && $header['status']=="1" && $header['spb_id']==0 && $header['flag_taken']==0){
                            echo '<a href="javascript:;" class="btn green" id="updateData" onclick="updateData();" style="display:none;"> '
                                .'<i class="fa fa-check"></i> Update </a> ';
                            echo '<a href="javascript:;" class="btn blue" onclick="editData();" id="btnEdit">' 
                                .'<i class="fa fa-pencil"></i> Edit </a>';
                        }

                        if(($group_id==1 || $hak_akses['approve']==1) && $header['spb_id']>0 && $header['flag_taken']==0){
                            echo '<a href="javascript:;" class="btn red" onclick="closeRETUR();">
                                    <i class="fa fa-ban"></i> CLOSE RETUR </a>';
                        }

                        if(($group_id==1 || $hak_akses['approve']==1) && $header['flag_taken']>0){
                            echo '<a href="javascript:;" class="btn green" id="OpenSJ" onclick="OpenSJ();"> '
                                .'<i class="fa fa-refresh"></i> Open SJ </a> ';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/Retur'); ?>" class="btn blue-hoki"> 
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
function editData(){
    $('#type_retur').prop('disabled', false);
    $('.jb_alias').show();

    $('#updateData').show();
    $('#btnEdit').hide();
}

function closeRETUR(){
    var r=confirm("Anda yakin me-close retur ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Retur/close_retur");    
        $('#formku').submit();
    }
}

function approveData(){
    var r=confirm("Anda yakin meng-approve permintaan retur barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Retur/approve");    
        $('#formku').submit(); 
    }
};

function OpenSJ(){
    var r=confirm("Anda yakin ingin menambah Surat Jalan ?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Retur/open_sj_retur");    
        $('#formku').submit(); 
    }
};

function updateData(){
    var r=confirm("Anda yakin meng-approve permintaan retur barang ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Retur/update_type");    
        $('#formku').submit(); 
    }
};

function showRejectBox(){
    var r=confirm("Anda yakin me-reject permintaan retur barang ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject Permintaan Retur Barang');
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Retur/reject");
        $('#frmReject').submit(); 
    }
}

</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
      