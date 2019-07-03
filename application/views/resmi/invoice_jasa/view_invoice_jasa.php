<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <a href="<?php echo base_url('index.php/R_InvoiceJasa'); ?>"><i class="fa fa-angle-right"></i> View Invoice</a>
            <i class="fa fa-angle-right"></i> 
            View Invoice 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> View Invoice</b></h3>
        <hr class="divider" />
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
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
            if( ($group_id==9)||($hak_akses['view']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice Jasa <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_inv_jasa" name="no_inv_jasa"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice_jasa']; ?>" readonly="readonly">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan Resmi <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sj_resmi']; ?>" readonly="readonly">

                            <input type="hidden" id="id_sj" name="id_sj" value="<?php echo $header['sjr_id']; ?>">
                        </div>
                    </div>
                    <?php if($jenis_invoice == 'INVOICE CV KE CUSTOMER'){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Purchase Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>" readonly="readonly">

                            <input type="hidden" id="id_so" name="id_so" value="<?php echo $header['r_t_so_id']; ?>">
                        </div>
                    </div>
                    <?php } else if ($jenis_invoice == 'INVOICE KMP KE CV'){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order Resmi <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_so']; ?>" readonly="readonly">

                            <input type="hidden" id="id_so" name="id_so" value="<?php echo $header['r_t_so_id']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal"
                                class="form-control myline input-small" style="margin-bottom:5px; float:left;"
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['nama_customer'];?>" readonly="readonly">

                            <input type="hidden" name="customer_id" value="<?php echo $header['customer_id'];?>">
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
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" class="form-control myline" style="margin-bottom: 5px;" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly"><?php echo $header['remarks'];?></textarea>
                        </div>
                    </div>
                </div>              
            </div>
            

            <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Detail Invoice Jasa
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Total Amount</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($myDetail as $row) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no ?></td>
                                    <td><?php echo $row->jenis_barang ?></td>
                                    <td><?php echo number_format($row->amount,2,'.',',') ?></td>
                                    <td><?php echo number_format($row->sum_bruto,2,'.',',') ?></td>
                                    <td><?php echo number_format($row->sum_netto,2,'.',',') ?></td>
                                    <td><?php echo number_format($row->sum_total_amount,2,'.',',') ?></td>
                                    <td><?php echo $row->line_remarks ?></td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/R_InvoiceJasa/'); ?>" class="btn blue-hoki"> 
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>