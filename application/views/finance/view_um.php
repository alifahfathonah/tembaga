<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> View Uang Masuk</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Konfirmasi Uang Masuk</b></h3>
        <hr class="divider" />
        <div class="modal fade" id="updateModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="frmUpdate" 
                              id="frmUpdate">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Update Remarks <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="update_remarks" name="update_remarks" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                    
                                    <input type="hidden" id="headers_id" name="header_id">
                                    <input type="hidden" id="tanggal_cek_baru" name="tanggal_cek_baru">
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="updateData();">Update</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
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
                        if($myData['status']=="9"){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Rejected By
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rejected_by" name="rejected_by" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['realname']; ?>">
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
                    <div class="divider"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control myline" value="Gagal di Cairkan" style="margin-bottom:5px; text-align: center; background-color: red; color: white; font-weight: bold;">
                            </div>
                        </div>
                    <hr class="divider" />
                    <?php
                    }else if ($myData['status']==1) { 
                    echo '<div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control myline" value="Approved at '.$myData["tgl_cair"].'" style="margin-bottom:5px; text-align: center; background-color: green; color: white; font-weight: bold;">
                            </div>
                        </div>
                    <hr class="divider" />';
                    }?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['nama_customer']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?php echo date('d-m-y'); ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nominal (<?php echo $myData['currency'];?>)
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nominal" name="nominal" 
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo number_format($myData['nominal'],0,',','.');?>" readonly="readonly">
                        </div>
                    </div>
            <?php if($myData['jenis_pembayaran']!='Cash'){ 
                    if($myData['jenis_pembayaran']=='Giro'){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            Bank Pembayaran<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="bank_pembayaran" name="bank_pembayaran" class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['bank_pembayaran']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Rekening Pembayaran<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rekening_pembayaran" name="rekening_pembayaran" class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['rekening_pembayaran']; ?>" readonly="readonly">
                        </div>
                    </div>
                <?php } //TUTUP IF GIRO ?>
                <div class="row">&nbsp;</div>
            </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis" name="jenis" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['jenis_pembayaran']; ?>">
                        </div>
                    </div>
                    <?php if($myData['jenis_pembayaran']=='Giro'){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            Bank <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_bank" name="nama_bank" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['kode_bank']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Bank
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_bank" name="nama_bank" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['nama_bank']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Rekening
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_rek" name="no_rek" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['nomor_rekening']; ?>">
                        </div>
                    </div>
                    <?php }// END IF GIRO 
                    if($myData['jenis_pembayaran'] == 'Cek' || $myData['jenis_pembayaran'] == 'Cek MUNDUR'){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Bank Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_bank" name="nama_bank" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['bank_pembayaran']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Cek
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nomor_cek" name="nomor_cek" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['nomor_cek']; ?>">
                        </div>
                    </div>
                    <?php 
                    }// END IF CEK OR CEK MUNDUR
                if($myData['jenis_pembayaran'] == 'Cek Mundur'){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Cek Mundur
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_cek" name="tanggal_cek" readonly="readonly"
                                class="form-control myline input-small" style="margin-bottom:5px" value="<?php echo $myData['tgl_cair']; ?>">
                        </div>
                    </div>
                    <?php
                }//END IF CEK MUNDUR
            } else {// END IF CASH?>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis" name="jenis" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['jenis_pembayaran']; ?>">
                        </div>
                    </div>
            <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $myData['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <hr class="divider" />
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1 || $hak_akses['reject_um']==1) && $myData['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Gagal Cair </a>';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/Finance'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php if( ($group_id==1 || $hak_akses['edit_um']==1) && $myData['jenis_pembayaran']=='Cek Mundur' && $myData['status']==9){
                            echo '<a href="javascript:;" class="btn green" id="editData" onclick="editData();"> 
                        <i class="fa fa-pencil"></i> Edit Cek Mundur </a>';
                        }
                    ?>
                    <a href="javascript:;" onclick="showUpdateBox();" class="btn blue" id="saveData" style="display: none;"><i class="fa fa-check"></i> Update </a>
                </div>    
            </div>
        </form>
            <?php if($myData['replace_id'] > 0){?>
            <h3 align="center"><b> Detail Cek Baru</b></h3>
            <hr class="divider" />
            <div class="row">
                <div class="col-md-4">
                    Nama Bank
                </div>
                <div class="col-md-8">
                    <input type="text" id="nama_bank_replace" name="nama_bank_replace" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $dataReplace['bank_pembayaran']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nomor Cek
                </div>
                <div class="col-md-8">
                    <input type="text" id="no_cek_replace" name="no_cek_replace" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $dataReplace['nomor_cek']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nominal (<?php echo $dataReplace['currency'];?>)
                </div>
                <div class="col-md-8">
                    <input type="text" id="nominal_replace" name="nominal_replace" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $dataReplace['nominal']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Keterangan
                </div>
                <div class="col-md-8">
                    <input type="text" id="ket_replace" name="ket_replace" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?php echo $dataReplace['keterangan']; ?>">
                </div>
            </div>
        <?php
                }//END IF REPLACE_ID

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
    $("#editData").hide();
    $("#tanggal_cek").attr("readonly", false);
    $("#tanggal_cek").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
            buttonImageOnly: true,
            buttonText: "Select date",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    $("#saveData").show();
}

function showUpdateBox(){
    var r=confirm("Anda yakin untuk merevisi Cek ini?");
    if (r==true){
        $('#headers_id').val($('#id').val());
        $('#tanggal_cek_baru').val($('#tanggal_cek').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#updateModal").find('.modal-title').text('Update Cek Mundur');
        $("#updateModal").modal('show',{backdrop: 'true'}); 
    }
}

function updateData(){
    if($.trim($("#tanggal_cek").val()) == ""){
        $('#message').html("Reject remarks harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmUpdate').attr("action", "<?php echo base_url(); ?>index.php/Finance/update_um");
        $('#frmUpdate').submit(); 
    }
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Finance/reject_um");
        $('#frmReject').submit(); 
    }
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    hitungSubTotal();
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>