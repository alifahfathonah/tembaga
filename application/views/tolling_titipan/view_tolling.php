<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Tolling FG </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/edit'); ?>"> Edit Tolling Finish Good </a> 
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_tolling_fg'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Tolling FG <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_tolling_fg']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB FG <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb']; ?>">

                            <input type="hidden" id="no_spb_fg" name="no_spb_fg" value="<?php echo $header['no_spb_fg'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['nama_marketing']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supplier" name="supplier" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['nama_customer']; ?>">
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
                            Netto Yang Di terima
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="netto" name="netto" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['netto']; ?>">
                        </div>
                    </div>                  
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Status Dikirim</th>
                                <th>Nama Item FG</th>
                                <th>UOM</th>
                                <th>Bruto</th>
                                <th>Netto</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($details as $row){
                            ?>
                            <tr>
                            <td><?php echo $no;?></td>
                            <td style="text-align:center">
                            <?php
                                if($row->flag_taken==0){
                                    echo '<div style="background:red;color:white;"> <span class="fa fa-times"></span> Belum Dikirim</div>';
                                }else if($row->flag_taken==1){
                                    echo '<div style="background:green;color:white;"><span class="fa fa-check"></span> Sudah Dikirim</div>';
                                }
                            ?>
                            </td>
                            <td><?php echo $row->jenis_barang;?></td>
                            <td><?php echo $row->uom;?></td>
                            <td><?php echo $row->bruto;?></td>
                            <td><?php echo $row->netto;?></td>
                            <td><?php echo $row->keterangan;?></td>
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
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">                        
                    <a href="<?php echo base_url('index.php/Tolling/tolling_fg'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
            <?php
                if($header['status']==0){
            ?> 
                    <a href="<?php echo base_url('index.php/Tolling/add_surat_jalan'); ?>" class="btn green"><i class="fa fa-plus"></i> Buat Surat Jalan </a>
            <?php
                }
            ?>
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
});
</script>