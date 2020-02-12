<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang BB
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangBobbin/view_spb'); ?>"> View Surat Permintaan Barang (SPB) BB</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Detail Bobbin</b></h3>
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
                            Nomor Bobbin<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_bobbin']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_packing']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Bobbin Size
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['bobbin_size']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Berat
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['berat']; ?>">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Owner
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_owner']; ?>">   
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Status
                        </div>
                        <div class="col-md-8">
                            <?php 
                            if($header['status']==0){
                                echo '<div style="background-color:green; color:white; padding:4px">Ready</div>';
                            }else if($header['status']==1){
                                echo '<div style="background-color:blue; color:white; padding:4px">Used</div>';
                            }else if($header['status']==2){
                                echo '<div style="background-color:yellow; color:white; padding:4px">Delivered</div>';
                            }else if($header['status']==3){
                                echo '<div style="background-color:orange; color:white; padding:4px">Booked</div>';
                            }  
                        ?>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Dipinjam
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['peminjam']; ?>">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No Surat Jalan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['no_sj']; ?>">   
                        </div>
                    </div>
                </div>  
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/GudangBobbin'); ?>" class="btn blue-hoki"><i class="fa fa-angle-left"></i> Kembali </a>
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
      