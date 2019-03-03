<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/matching'); ?>"> Matching PO - DTR </a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmDetail" 
                              id="frmDetail">
                            <input type="hidden" id="id_modal" name="id_modal">
                            <div class="row">
                                <div class="col-md-4">
                                    Pilih Invoice <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="invoice_id" name="invoice_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_invoice(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Harga<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="harga_invoice" name="harga_invoice" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Pilih Uang Masuk <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="um_id" name="um_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_um(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nominal<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="harga_um" name="harga_um" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Pilih Invoice Hutang <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <select id="invoice_min" name="invoice_min" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_invoice_min(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nominal Hutang<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="hutang" name="hutang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Sisa Invoice
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="sisa_invoice" name="sisa_invoice" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Sisa Uang Masuk
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="sisa_um" name="sisa_um" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Sisa Hutang
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="sisa_hutang" name="sisa_hutang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onclick="saveDetail();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Invoice
                        </div>
                        <div class="tools">
                        <?php
                            if( ($group_id==1)||($hak_akses['input_invoice']==1) ){
                        ?>
                        <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="javascript:;" onclick="input();"> <i class="fa fa-plus"></i> Input Invoice</a>
                        <?php } ?>
                        </div>    
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Trx</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Sisa</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_invoice = 0;
                                    $total_sisa = 0;
                                    foreach ($details_invoice as $row){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        if($row->jenis_trx == 0){
                                        $sisa = $row->total - $row->paid;
                                            echo '<td style="background-color: green; color: white;"><i class="fa fa-arrow-circle-up"></i></td>';
                                        $total_invoice += $row->total;
                                        $total_sisa += $sisa;    
                                        }else{
                                        $sisa = $row->total - $row->used_hutang;
                                            echo '<td style="background-color: red; color: white;"><i class="fa fa-arrow-circle-down"></i></td>';
                                        $total_invoice += -$row->total;
                                        $total_sisa += -$sisa;
                                        }
                                        echo '<td>'.$row->no_invoice.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->total,0,',','.').'</td>';
                                        echo '<td>'.number_format($sisa,0,',','.').'</td>';
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="3"><strong>Total Harga </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total_invoice,0,',','.'); ?></strong>
                                        </td>
                                        <td><strong><?php echo number_format($total_sisa,0,',','.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Uang Masuk
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis<br>Pembayaran</th>
                                    <th>Bank<br>Pembayaran</th>
                                    <th>Nomor Cek/<br>Rekening</th>
                                    <th>Currency</th> 
                                    <th>Nominal</th>
                                    <th>Sisa</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_nominal = 0;
                                    $total_sisa_um = 0;
                                    foreach ($details_um as $row){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$row->jenis_pembayaran.'</td>';
                                        echo '<td>'.$row->bank_pembayaran.'</td>';
                                        echo '<td>'.$row->nomor.'</td>';
                                        echo '<td>'.$row->currency.'</td>';
                                        $sisa = $row->nominal - $row->paid;
                                        echo '<td style="text-align:right;">'.number_format($row->nominal,0,',', '.').'</td>';
                                        echo '<td>'.number_format($sisa,0,',','.').'</td>';
                                        echo '</tr>';
                                        $total_nominal += $row->nominal;
                                        $total_sisa_um += $sisa;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="5"><strong>Total Harga </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total_nominal,0,',','.'); ?></strong>
                                        </td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total_sisa_um,0,',','.'); ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                          
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Detail Matching Invoice
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-striped table-hover">
                                <thead style="border: 1px solid #000;">
                                    <th colspan="3" style="text-align: center; border-right: 1px solid #000;">Invoice</th>
                                    <th colspan="3" style="text-align: center; border-right: 1px solid #000;">Uang Masuk</th>
                                    <th colspan="3" style="text-align: center; border-right: 1px solid #000;" >Hutang</th>
                                    <th colspan="3" style="text-align: center;">Details</th>
                                </thead>
                                <thead>
                                    <th>No</th>
                                    <th>No. Invoice</th>
                                    <th style="border-right:1px solid #000;">Total<br>Invoice</th>
                                    <th>Jenis<br>Pembayaran</th>
                                    <th>Nomor Cek<br>/Rekening</th>
                                    <th style="border-right:1px solid #000;">Total<br>Nominal</th>
                                    <th>No.<br>Invoice Hutang</th>
                                    <th>Nominal<br>Hutang</th>
                                    <th style="border-right:1px solid #000;">Hutang<br>Dipotong</th>
                                    <th>UM<br>Digunakan</th>
                                    <th>Sisa<br>Invoice</th>
                                    <th>Sisa<br>UM</th>
                                </thead>
                                <tbody id="boxDetailUm">
                                    <?php
                                        $no = 1;
                                        foreach ($details_matching as $row){
                                            echo '<tr>';
                                            echo '<td style="text-align:center;">'.$no.'</td>';
                                            echo '<td>'.$row->no_invoice.'</td>';
                                            echo '<td style="border-right:1px solid #000;">'.number_format($row->total,0,',', '.').'</td>';
                                            echo '<td>'.$row->jenis_pembayaran.'</td>';
                                            echo '<td>'.$row->nomor.'</td>';
                                            echo '<td style="border-right:1px solid #000;">'.number_format($row->nominal,0,',', '.').'</td>';
                                            echo '<td>'.$row->no_hutang.'</td>';
                                            echo '<td>'.number_format($row->total_hutang,0,',','.').'</td>';
                                            echo '<td style="border-right:1px solid #000;">'.number_format($row->used_hutang,0,',', '.').'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->paid,0,',', '.').'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->sisa_invoice,0,',', '.').'</td>';
                                            echo '<td style="text-align:right;">'.number_format($row->sisa_um,0,',', '.').'</td>';
                                            echo '</tr>';
                                            $no++;
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <a href="<?php echo base_url('index.php/Finance/matching'); ?>" class="btn blue-hoki"> 
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
<script>
function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function load_invoice_plus(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_invoice_list_plus'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#invoice_id').html(result);
        }
    })
}

function load_invoice_minus(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_invoice_list_minus'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#invoice_min').html(result);
        }
    })
}

function get_data_invoice(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_data_invoice'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#harga_invoice').val(numberWithCommas(result['total']-result['paid']));
                const myHutang = $('#hutang').val();
                const newHutang = myHutang.replace(/\./g, '');
                const myInv = $('#harga_invoice').val();
                const Inv = myInv.replace(/\./g, '');
                const newInv = (Inv - newHutang);
                const myUm = $('#harga_um').val();
                const newUm = myUm.replace(/\./g, '');
                const sisa  = (newInv-newUm);
                if(sisa>0){
                    $('#sisa_invoice').val(numberWithCommas(sisa));
                    $('#sisa_um').val(0);
                    $('#sisa_hutang').val(0);
                }else{
                    var sisa1 = (newUm-newInv);
                    if(sisa1 > newUm){
                        const hutang = (sisa1 - newUm);
                        $('#sisa_hutang').val(numberWithCommas(hutang));
                    }else{
                        $('#sisa_um').val(numberWithCommas(sisa1));
                        $('#sisa_invoice').val(0);
                    }
                }
            }
        });
    }
}

function get_data_invoice_min(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_data_hutang'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result){
                $('#hutang').val(numberWithCommas(result['total']-result['used_hutang']));
                const myHutang = $('#hutang').val();
                const newHutang = myHutang.replace(/\./g, '');
                const myInv = $('#harga_invoice').val();
                const Inv = myInv.replace(/\./g, '');
                const newInv = (Inv - newHutang);
                const myUm = $('#harga_um').val();
                const newUm = myUm.replace(/\./g, '');
                const sisa  = (newInv-newUm);
                if(sisa>0){
                    $('#sisa_invoice').val(numberWithCommas(sisa));
                    $('#sisa_um').val(0);
                    $('#sisa_hutang').val(0);
                }else{
                    var sisa1 = (newUm-newInv);
                    if(sisa1 > newUm){
                        const hutang = (sisa1 - newUm);
                        $('#sisa_hutang').val(numberWithCommas(hutang));
                    }else{
                        $('#sisa_um').val(numberWithCommas(sisa1));
                        $('#sisa_invoice').val(0);
                    }
                }
            }
        });
    }
}

function load_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_um_list'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#um_id').html(result);
        }
    })
}

function get_data_um(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_um'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#harga_um').val(numberWithCommas(result['nominal']-result['paid']));
                const myHutang = $('#hutang').val();
                const newHutang = myHutang.replace(/\./g, '');
                const myInv = $('#harga_invoice').val();
                const Inv = myInv.replace(/\./g, '');
                const newInv = (Inv - newHutang);
                const myUm = $('#harga_um').val();
                const newUm = myUm.replace(/\./g, '');
                const sisa  = (newInv-newUm);
                if(sisa>0){
                    $('#sisa_invoice').val(numberWithCommas(sisa));
                    $('#sisa_um').val(0);
                    $('#sisa_hutang').val(0);
                }else{
                    var sisa1 = (newUm-newInv);
                    if(sisa1 > newUm){
                        const hutang = (sisa1 - newUm);
                        $('#sisa_hutang').val(numberWithCommas(hutang));
                    }else{
                        $('#sisa_um').val(numberWithCommas(sisa1));
                        $('#sisa_invoice').val(0);
                    }
                }
            }
        });
    }
}

// function simpan_matching(id){
//     $.ajax({
//         url: "<?php echo base_url('index.php/Finance/simpan_matching'); ?>",
//         type: "POST",
//         data : {dtr_id: id,po_id: $('#po_id').val()},
//         success: function (result){            
//             if(result['type_message']=="sukses"){
//                 alert(result['message']);
//                 location.reload();
//             }else{
//                 alert(result['message']);
//             }
//         }
//     });
// };

function input(){        
    $("#myModal").find('.modal-title').text('Input Matching');
    $("#myModal").modal('show',{backdrop: 'true'});
    $("#id_modal").val(<?php echo $header['id'];?>);
    load_invoice_plus(<?php echo $header['id'];?>);
    load_invoice_minus(<?php echo $header['id'];?>);
    load_um(<?php echo $header['id'];?>);
}

function saveDetail(){
    if($.trim($("#harga_invoice").val()) == ""){
        $('#message').html("Invoice harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga_um").val()) == ""){
        $('#message').html("Uang Masuk harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/add_matching");
        $('#frmDetail').submit(); 
    }
}
</script>