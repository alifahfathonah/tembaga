<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> Uang Masuk </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/voucher_list'); ?>"> List Uang Masuk</a> 
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">      

        <?php
            if( ($group_id==1)||($hak_akses['voucher_list']==1) ){
        ?>
        
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>List Uang Masuk
                </div>                
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nomor Cek/Rekening</th> 
                    <th>Tanggal</th> 
                    <th>Nama Customer</th>
                    <th>Jenis Pembayaran</th>  
                    <th>Bank Pembayaran</th>  
                    <th>Nominal</th>                    
                    <th>Tgl Cair</th> 
                    <th>Keterangan</th><!-- 
                    <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->rekening_pembayaran.$data->nomor_cek; ?></td>
                        <td style="text-align:center"><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->jenis_pembayaran; ?></td>
                        <td><?php echo $data->bank_pembayaran; ?></td>
                        <td style="text-align:right"><?php echo number_format($data->nominal,0,',','.'); ?></td>
                        <td style="text-align:center"><?php echo date('d-m-Y', strtotime($data->tgl_cair)); ?></td>
                        <td><?php echo $data->keterangan; ?></td>             <!--            
                        <td style="text-align:center">                             
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/view_voucher/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                        </td> -->
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
            </div>
        </div>
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
       