<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/edit'); ?>"> Edit PO Rongsok </a> 
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
                    <h3 align="center"><b> Konfirmasi Close PO Rongsok</b></h3>
                    <hr class="divider" />
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
                                    Keterang Close PO <font color="#f00">*</font>
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
            if( ($group_id==1)||($hak_akses['edit']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/BeliRongsok/update'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline input-small" style="margin-bottom:5px; float: left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php
                            if ($header['status']==0){
                            ?>
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" 
                                value="<?php echo $header['term_of_payment']; ?>">
                            <?php
                            } else {
                            ?>
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px"
                                value="<?php echo $header['term_of_payment']; ?>" readonly="readonly" onkeyup="this.value = this.value.toUpperCase()">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?= $header['remarks'];?></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                        <?php
                        if ($header['status']==0){
                        ?>
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                            <option value=""></option>
                                <?php
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['supplier_id'])? 'selected="selected"': '').'>'.$row->nama_supplier.'</option>';
                                    }
                                ?>
                             </select>
                        <?php
                        }else {
                        ?>
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px"
                                value="<?php echo $header['nama_supplier']; ?>"  readonly="readonly">
                            <input type="hidden" id="supplier_id" name="supplier_id" value="<?php echo $header['supplier_id'];?>">
                        <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>                 
                    
                    <?php if($this->session->userdata('user_ppn')==1){?>
                    <div class="row">
                        <div class="col-md-2">
                            PPN
                        </div>
                        <div class="col-md-4">
                            <select id="ppn" name="ppn" class="form-control myline" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="1" <?=($header['ppn']==1)? 'selected':'';?>>Yes</option>
                                <option value="0" <?=($header['ppn']==0)? 'selected':'';?>>No</option>
                            </select>
                        </div>
                    </div>
                    <?php } else{ ?>
                    <div class="row">
                        <div class="col-md-4">
                            PPN
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="ppn" name="ppn" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="0">
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
                <div class="col-md-12">
                <center><h2>Pemenuhan PO</h2></center>
                <hr class="divider">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item Rongsok</th>
                                <th>Unit of Measure</th>
                                <th>Jumlah</th>
                                <th>Bruto</th>
                                <th>Netto</th>
                                <th>Jumlah TTR</th>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                $qty = 0;
                                $bruto = 0;
                                $netto = 0;
                                $ttr = 0;
                                foreach ($list_detail as $row){
                                $no++;
                            echo '<tr>';
                            echo '<td style="text-align:center">'.$no.'</td>';
                            echo '<td>'.$row->nama_item.'</td>';
                            echo '<td>'.$row->uom.'</td>';
                            echo '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
                            echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                            echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                            echo '<td>'.$row->jml_ttr.'</td>';
                            echo '</tr>';
                            $qty += $row->qty;
                            $bruto += $row->bruto;
                            $netto += $row->netto;
                            $ttr += $row->jml_ttr;                            
                            }
                            ?>
                            </tbody>
                            <tr>
                                <td colspan="3" style="text-align: right; font-weight: bold;">Total</td>
                                <td><?=$qty;?></td>
                                <td><?=number_format($bruto,0,',','.');?></td>
                                <td style="background-color: green; color: white;"><?=number_format($netto,0,',','.');?></td>
                                <td><?=$ttr;?></td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                <center><h2>Pembayaran Voucher</h2></center>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nomor Voucher</th>
                                <th>Tanggal</th>
                                <th>Amount</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                $total = 0;
                                foreach ($list_voucher as $v){
                                $no++;
                            echo '<tr>';
                            echo '<td style="text-align:center">'.$no.'</td>';
                            echo '<td>'.$v->no_voucher.'</td>';
                            echo '<td>'.$v->tanggal.'</td>';
                            echo '<td style="text-align:right">'.number_format($v->amount,0,',','.').'</td>';
                            echo '<td>'.$v->keterangan.'</td>';
                                if($v->status==0){ 
                                    echo '<td style="background-color:bisque; padding:4px">Belum Dibayar</td>';
                                }else if($v->status==1){ 
                                    echo '<td style="background-color:green; color:white; padding:4px">Sudah Dibayar</td>';
                                }
                            echo '<td>';
                            if($v->status==0){
                                echo '<a href="'.base_url().'index.php/BeliRongsok/delete_voucher/'.$v->id.'" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm(\'Anda yakin menghapus transaksi ini?\');"><i class="fa fa-trash-o"></i> Delete</a>';
                            }
                            echo '</td>';
                            $total += $v->amount;                            
                            }
                            ?>
                            </tbody>
                            <tr>
                                <td colspan="3" style="text-align: right; font-weight: bold;">Total</td>
                                <td style="background-color: green; color: white;"><?=number_format($total,0,',','.');?></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>" class="btn blue-hoki"> 
                                <i class="fa fa-angle-left"></i> Kembali </a>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
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
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
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
    
    loadDetail(<?php echo $header['id']; ?>);
});
</script>