<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/surat_jalan'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/edit_surat_jalan'); ?>"> Edit Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit_surat_jalan']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/SalesOrder/save_revisi_sj'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sales_order" name="no_sales_order" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="so_id" name="so_id" value="<?php echo $header['sales_order_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly="readonly">
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
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $header['id_customer'];?>" readonly="readonly">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Kendaraan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="type_kendaraan" id="type_kendaraan" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['no_kendaraan']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="type_kendaraan" id="type_kendaraan" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $header['type_kendaraan']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    *Jika tidak ada revisi, kosong kan saja
                    <div class="table-scrollable">
                    <?php if($header['jenis_barang']=='FG'){?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%">Nama Item</th>
                                <th>UOM</th>
                                <th style="width: 15%">No. Packing</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Revisi Netto</th>
                                <th>Bobbin</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php
                                $no=1;
                                foreach ($details as $row){
                                    echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$row->jenis_barang;?></td>
                                    <td><?=$row->uom;?></td>
                                    <td><?=$row->no_packing;?></td>
                                    <td><?=$row->bruto;?></td>
                                    <td><?=$row->netto;?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][netto_r]" value="'.$row->netto_r.'">';?></td>
                                    <td><?=$row->nomor_bobbin;?></td>
                                    <td><?=$row->line_remarks;?></td>
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php } else if($header['jenis_barang']=='WIP'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Netto (Kg)</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }else{
                    ?>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>No Palette</th>
                                <th>Nama Item</th>
                                <th style="width: 6%;">UOM</th>
                                <th style="width: 8%;">Qty</th>
                                <th style="width: 8%;">Bruto</th>
                                <th style="width: 8%;">Netto (Kg)</th>
                                <th style="width: 6%;">Berat<br>Palette</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <a href="<?php echo base_url('index.php/SalesOrder/surat_jalan'); ?>" class="btn blue-hoki"> 
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
function simpanData(){
    if($.trim($("#remarks").val()) == ""){
        $('#message').html("Catatan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{   
        $('#formku').submit(); 
    };
};
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>