<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_TollingResmi/view_tolling'); ?>"> Review Data Timbang Rongsok (DTR) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==9)||($hak_akses['view_tolling']==1) ){
        ?> 
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4">
                        No. Invoice <font color="#f00">*</font>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['no_invoice_resmi']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        No. Surat Jalan <font color="#f00">*</font>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="no_dtr" name="no_dtr" readonly="readonly"
                            class="form-control myline" style="margin-bottom:5px" 
                            value="<?php echo $header['no_sj_resmi']; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-5"> 
                <div class="row">
                    <div class="col-md-4">
                        Customer
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="nama_customer" name="nama_customer" 
                            class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                            value="<?php echo $header['nama_cv']; ?>">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-4">
                        Jenis Barang
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="jenis_barang" name="jenis_barang" 
                            class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                            value="<?php echo $header['jenis_barang']; ?>">
                    </div>
                </div>
            </div>              
        </div>
        <hr>
        <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Data <?php echo $header['no_dtr_resmi'];?>
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>No</th>
                            <th>Nama Item Rongsok</th>
                            <th>UOM</th>
                            <th>Jumlah</th>
                            <th>Bruto (Kg)</th>
                            <th>Netto (Kg)</th>
                            <th>No. Pallete</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($dtr_detail as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center">'.$no.'</td>';
                                echo '<td>'.$row->nama_item.'</td>';
                                echo '<td>'.$row->uom.'</td>';                                    
                                echo '<td style="text-align:right">'.$row->qty.'</td>';
                                echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';                                
                                echo '<td>'.$row->no_pallete.'</td>';
                                echo '<td>'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                            <tr>
                                <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($bruto,0,',','.'); ?></strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($netto,0,',','.'); ?></strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-word-o"></i>Data <?php echo $header['no_ttr_resmi'];?>
                    </div>
                    <div class="tools">    
                    
                    </div>    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>No</th>
                            <th>Nama Item Rongsok</th>
                            <th>UOM</th>
                            <th>Jumlah</th>
                            <th>Bruto (Kg)</th>
                            <th>Netto (Kg)</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($ttr_detail as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center">'.$no.'</td>';
                                echo '<td>'.$row->nama_item.'</td>';
                                echo '<td>'.$row->uom.'</td>';                                    
                                echo '<td style="text-align:right">'.$row->qty.'</td>';
                                echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                                echo '<td>'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                            <tr>
                                <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($bruto,0,',','.'); ?></strong></td>
                                <td style="text-align:right"><strong><?php echo number_format($netto,0,',','.'); ?></strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('index.php/R_TollingResmi'); ?>" class="btn blue-hoki"> 
                    <i class="fa fa-angle-left"></i> Kembali </a>
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