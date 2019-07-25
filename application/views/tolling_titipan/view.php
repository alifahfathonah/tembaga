<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/view'); ?>"> Edit Sales Order </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit']==1) ){
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
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id'];?>">
                            <input type="hidden" id="id_tso" name="id_tso" value="<?php echo $header['id']; ?>">
                            <input type="hidden" id="id_spb" name="id_spb" value="<?php echo $header['no_spb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal SO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_po" name="tanggal_po" readonly="readonly"
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])); ?>">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px;" readonly="readonly" value="<?php echo $header['nama_marketing'];?>">
                        </div>
                    </div> -->
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom: 5px;" readonly="readonly" value="<?php echo $header['nama_customer'];?>">
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
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['keterangan'];?></textarea>
                        </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th>No</th>
                                    <th style="width: 22%">Nama Item </th>
                                    <th style="width: 5%">Unit of Measure</th>
                                    <th>Harga (Rp)</th>
                                    <th>Netto (Kg)</th>
                                    <th>Sub Total (Rp)</th>
                                </thead>
                                <?php $no = 1 ; $netto = 0 ; $total = 0;
                                foreach ($detail as $row) { ?>
                                <tbody>
                                    <td><?= $no;?></td>
                                    <td><?= $row->jenis_barang;?></td>
                                    <td><?= $row->uom;?></td>
                                    <td><?= number_format($row->amount,0,',','.');?></td>
                                    <td><?= number_format($row->netto,2,',','.');?></td>
                                    <td><?= number_format($row->total_amount,0,',','.');?></td>
                                </tbody>
                                <?php $no++; $netto+= $row->netto; $total+= $row->total_amount; } ?>
                                <tr>
                                    <td colspan="4" style="font-weight: bold; text-align: right;">Total</td>
                                    <td style="background-color: green; color: white;"><?= number_format($netto,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?= number_format($total,0,',','.');?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/Tolling'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <?php if($header['status_spb']!=1){ ?>
                    <a href="javascript:;" onclick="closeSO();" class="btn red"> 
                                    <i class="fa fa-ban"></i> Close SO </a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="openSO();" class="btn green"> 
                                    <i class="fa fa-plus"></i> Open SO </a>
                    <?php } if($header['flag_sj']==1){?>
                    <a href="javascript:;" onclick="openSJ();" class="btn green"> 
                                    <i class="fa fa-car"></i> Open Untuk Buat Surat Jalan </a>
                    <?php } if($header['flag_invoice']==1){?>
                    <a href="javascript:;" onclick="openINV();" class="btn green"> 
                                    <i class="fa fa-money"></i> Open Untuk Buat Invoice </a>
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

<script type="text/javascript">
function closeSO(){
    var r=confirm("Anda yakin meng-close SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Tolling/close_so");    
        $('#formku').submit(); 
    }
};

function openSO(){
    var r=confirm("Anda yakin meng-Open SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Tolling/open_so");    
        $('#formku').submit(); 
    }
};

function openINV(){
    var r=confirm("Anda yakin meng-Open Invoice SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Tolling/open_inv");    
        $('#formku').submit(); 
    }
};

function openSJ(){
    var r=confirm("Anda yakin meng-Open Surat Jalan SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Tolling/open_sj");    
        $('#formku').submit(); 
    }
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>