<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/view_invoice'); ?>"> View Invoice</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Detail Invoice</b></h3>
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
            if( ($group_id==1)||($hak_akses['view_invoice']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice" name="no_invoice"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice']; ?>" readonly>

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                <?php if($header['id_retur'] == 0){?>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/view_so/<?php echo $header['id_sales_order']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Sales Order &nbsp; </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/view_surat_jalan/<?php echo $header['id_surat_jalan']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View SJ &nbsp; </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Matching<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px;" 
                                value="<?php echo $header['no_matching']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/matching_invoice/<?php echo $header['flag_matching']; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Matching &nbsp; </a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_retur']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Retur/view/<?php echo $header['id_retur']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Retur &nbsp; </a>
                        </div>
                    </div>
                <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Direktur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_direktur" name="nama_direktur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_direktur']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term Of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['term_of_payment'];?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo"
                                class="form-control input-small myline" style="margin-bottom:5px;  float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_jatuh_tempo'])); ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly><?php echo strip_tags($header['keterangan']); ?></textarea>                           
                        </div>
                    </div>
                    <?php if($this->session->userdata('user_ppn')==1){?>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Bank <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px" disabled>
                            <option value=""></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['bank_id'])? 'selected="selected"': '').'>'.$row->nama_bank.'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Rekening <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_rek" name="no_rek" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_rekening']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-2">
                            Currency
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="currency" name="currency" class="form-control myline" readonly="readonly" value="<?=$header['currency'];?>">
                        </div>
                        <div id="show_kurs">
                            <div class="col-md-2">
                                Kurs
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="kurs" name="kurs" class="form-control myline" readonly="readonly" value="<?=$header['kurs'];?>">
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Surat Jalan</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Qty</th>
                                            <th>Netto (UOM)</th>
                                            <th>Amount</th>
                                            <th>Total</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $ppn = 0;
                                            $ppn1 = 0;
                                            $total_all = 0;
                                            foreach ($detailInvoice as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->qty.'</td>';
                                                echo '<td>'.number_format($row->netto,2,',','.').' '.$row->uom.'</td>';
                                                echo '<td>'.number_format($row->harga,2,',','.').'</td>';
                                                echo '<td>'.number_format($row->total_harga,2,',','.').'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $total_all += $row->total_harga;
                                            }
                                            if($header['flag_ppn']==1 && $header['currency']=='IDR'){
                                                $ppn1 = $total_all - $header['diskon'] - $header['add_cost'];
                                                $ppn = round($ppn1*10/100,0);
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold;">Total</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_all,2,',','.');?></td>
                                            <td></td>
                                        </tr>
                                        <input type="hidden" name="total" id="total" value="<?= $total_all ?>">
                                        <input type="hidden" name="flag_ppn" id="flag_ppn" value="<?= $header['flag_ppn'] ?>">
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Biaya</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <td>Harga Total Invoice</td>
                                            <td><?=$header['currency'].' '.number_format($total_all,2,',','.');?></td>
                                        </tr>
                                        <tr>
                                            <td>Diskon</td>
                                            <td>(<i class="fa fa-minus"></i>)
                                                <label id="lblDiskon"><?=number_format($header['diskon'],0,',','.');?></label>
                                                <input type="text" name="diskon" id="diskon" value="<?=number_format($header['diskon'],2,',','.');?>" style="display: none;"  onkeyup="getComa(this.value, this.id)"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Tambahan</td>
                                            <td>(<i class="fa fa-minus"></i>)
                                                <label id="lblCost"><?=number_format($header['add_cost'],0,',','.');?></label>
                                                <input type="text" name="cost" id="cost" value="<?=number_format($header['add_cost'],2,',','.');?>" style="display: none;"  onkeyup="getComa(this.value, this.id)"></td>
                                        </tr>
                                        <tr>
                                            <td>Materai</td>
                                            <td>(<i class="fa fa-plus"></i>)
                                                <label id="lblMaterai"><?=number_format($header['materai'],0,',','.');?></label>
                                                <input type="text" name="materai" id="materai" value="<?=number_format($header['materai'],2,',','.');?>" style="display: none;"  onkeyup="getComa(this.value, this.id)"> </td>
                                        </tr>
                                        <tr>
                                            <td>Pajak</td>
                                            <td>(<i class="fa fa-plus"></i>) <?=number_format($ppn,2,',','.');?></td>
                                        </tr>
                                        <?php 
                                        $total_bersih = 0;
                                        $total_bersih = $total_all - $header['diskon'] - $header['add_cost'] + $header['materai'] + $ppn;
                                        ?>
                                        <tr>
                                            <td style="text-align: right;"><strong>Total Bersih</strong></td>
                                            <td style="background-color: green; color: white;"><?=$header['currency'].' '.number_format($total_bersih,2,',','.');?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php if($header['id_retur']==0){?>
                <hr class="divider">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Matching Uang Masuk</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>No Uang Masuk</th>
                                            <th>Jenis<br>Pembayaran</th>
                                            <th>Bank<br>Pembayaran</th>
                                            <th>Rekening Pembayaran /<br>Nomor Cek</th>
                                            <th>Currency</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $total_all = 0;
                                            foreach ($matching as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->no_uang_masuk.'</td>';
                                                echo '<td>'.$row->jenis_pembayaran.'</td>';
                                                echo '<td>'.$row->bank_pembayaran.'</td>';
                                                echo '<td>'.$row->rekening_pembayaran.$row->nomor_cek.'</td>';
                                                echo '<td>'.$row->currency.'</td>';
                                                echo '<td>'.number_format($row->nominal,0,',','.').'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $total_all += $row->nominal;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="6" style="text-align: right; font-weight: bold;">Total</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_all,0,',','.');?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
                        <a href="javascript:;" class="btn green" onclick="simpanData();" id="btnSimpan" style="display: none;"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        <a href="javascript:;" class="btn green" onclick="editData();" id="btnEdit"> 
                        <i class="fa fa-pencil"></i> Edit </a>
                        <a href="<?php echo base_url('index.php/Finance/invoice'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php if($header['flag_matching'] == 0){ ?>
                        <a href="<?php echo base_url(); ?>index.php/Finance/delete_invoice/<?php echo $header['id']; ?>" class="btn red" onclick="return confirm('Anda yakin menghapus transaksi ini?');"><i class="fa fa-trash-o"></i> Delete 
                            </a>
                    <?php } ?>
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
    function getComa(value, id){
        angka = value.toString().replace(/\./g, "");
        $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    }

    function editData(){
        $('#no_invoice').removeAttr('readonly');
        $('#term_of_payment').removeAttr('readonly');
        $('#tanggal').removeAttr('readonly');
        $('#tgl_jatuh_tempo').removeAttr('readonly');
        $('#remarks').removeAttr('readonly');
        $('#bank_id').removeAttr('disabled');
        $('#nama_direktur').removeAttr('readonly');

        $('#lblMaterai').hide();
        $('#lblCost').hide();
        $('#lblDiskon').hide();
        $('#materai').show();
        $('#cost').show();
        $('#diskon').show();

        $('#btnSimpan').show();
        $('#btnEdit').hide();
    }

    function simpanData(){
        if($.trim($("#tanggal").val()) == ""){
            $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#no_invoice").val()) == ""){
            $('#message').html("Nomor Invoice harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#tgl_jatuh_tempo").val()) == ""){
            $('#message').html("Tanggal jatuh tempo harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#term_of_payment").val()) == ""){
            $('#message').html("Term of payment harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else{
            result = confirm('Anda yakin untuk menyimpannya ?');
            if(result){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/Finance/cek_no_invoice_update'); ?>",
                    data: {
                        id: $('#id').val(),
                        no_invoice: $('#no_invoice').val(),
                        tanggal: $('#tanggal').val()
                    },
                    cache: false,
                    success: function(result) {
                        var res = result['type'];
                        if(res=='duplicate'){
                            $('#message').html("Nomor Invoice sudah ada, tolong coba lagi!");
                            $('.alert-danger').show();
                        }else{
                            $('#formku').attr('action', '<?= base_url("index.php/Finance/update_invoice") ?>');
                            $('#formku').submit();
                        }
                    }
                });
            } 
        }
    }

    $(function(){
        $("#tanggal").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
            buttonImageOnly: true,
            buttonText: "Select date",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        }); 

        $("#tgl_jatuh_tempo").datepicker({
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