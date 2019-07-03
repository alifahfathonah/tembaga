<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }
        if($header['status']==1){
            echo 'PACKING LIST</h3>';
        }else{
            echo 'PACKING LIST SEMENTARA</h3>';
        }?>
    <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
        <tr>
            <td width="60%">
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                        <td>No. Surat Jalan</td>
                        <td>: <?php echo $header['no_surat_jalan']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Sales Order</td>
                        <td>: <?php echo $header['no_sales_order']; ?></td>
                    </tr>
                    <tr>
                        <td>No. PO</td>
                        <td>: <?php echo $header['no_po']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                    </tr>
                    <tr>
                        <td>Customer</td>
                        <td>: <?php echo $header['nama_customer']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Jenis Barang</td>
                        <td>: <?php echo $header['jenis_barang']; ?></td>
                    </tr> -->
                </table>
            </td>
            <td>&nbsp;</td>
            <td width="40%">
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                        <td>Tanggal SJ</td>
                        <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal SO</td>
                        <td>: <?php echo tanggal_indo($header['tanggal_so']); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $header['alamat'];?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">No. Kendaraan: <?php echo $header['no_kendaraan']; ?></td>
            <td colspan="3">Type Kendaraan: <?php echo $header['type_kendaraan']; ?></td>
            <td colspan="3">Catatan: <?php echo $header['remarks']; ?></td>
        </tr>
    </table>