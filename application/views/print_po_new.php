<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <title>Untitled Document</title> -->
</head>
<style>
	@media print
	{
		table { page-break-after:auto }
		tr    { page-break-inside:avoid; page-break-after:auto;}
		td    { page-break-inside:avoid; page-break-after:auto; }
		thead { display:table-header-group }
		tfoot { display:table-footer-group; }
	}
</style>
<body>
	<table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
		<thead>
			<tr>
				<th align="left" colspan="5">
					<?php if($this->session->userdata('user_ppn')==1){ ?>
					<h2>PT. KAWAT MAS PRAKASA<br></h2>
			        <p>
			            JL. HALIM PERDANA KUSUMA NO. 51 Kebon Besar Batu Ceper Tangerang<br>
			            TLP. : (021) 5523547, 5453625 - 26  FAX. (021) 5523548<br>
			            Email : kawatmas@kawatmas.co.id<br>
			        </p>
			    	<?php } ?>
			        <h2 align="center"><u>SURAT PESANAN</u></h2>
	        		<h3 align="center" style="margin-top: -20px;">PURCHASE ORDER</h3>
				</th>
			</tr>
			<tr>
				<th width="10%" style="border-left:1px solid; border-top:1px solid; border-bottom: 1px solid;">NO.</th>
	            <th style="border-top:1px solid; border-bottom: 1px solid;">URAIAN / DESCRIPTION</th>
	            <th style="border-top:1px solid; border-bottom: 1px solid;" width="15%">QUANTITY</th>
	            <th style="border-top:1px solid; border-bottom: 1px solid;" align="right">UNIT PRICE</th>
	            <th style="border-right:1px solid; border-top:1px solid; border-bottom: 1px solid;" align="right">SUB TOTAL</th>
			</tr>
		</thead>
		<?php for($i=0;$i<50;$i++){ ?>
			<tr>
                <td width="10%" style="border-left:1px solid;" align="center"><?= $i ?>.</td>
                <td><?= "nama item ke- ".$i ?></td>
                <td><?= "qty item ke- ".$i ?></td>
                <td><?= "harga item ke- ".$i ?></td>
                <td style="border-right:1px solid;"><?= "sub item ke- ".$i ?></td>
            </tr>
		<?php } ?>
		<tfoot>
			<tr>
				<td style="border-left:1px solid; border-right:1px solid;" colspan="5">&nbsp;</td>
			</tr>
			<tr>
                <td style="border-left:1px solid; border-bottom:1px solid;" colspan="2"></td>
                <td style="border-bottom:1px solid;">DISC : &nbsp; &nbsp;0</td>
                <td style="border-bottom:1px solid;">PPN  : &nbsp; &nbsp;10%</td>
                <td style="border-right:1px solid; border-bottom:1px solid;">&nbsp;</td>
            </tr>
			<!-- <tr>
				<td style="border-left:1px solid; border-top:1px solid; border-bottom: 1px solid;" colspan="2" align="right">TOTAL</td>
				<td style="border-top:1px solid; border-bottom: 1px solid;"><?= $i ?></td>
				<td style="border-top:1px solid; border-bottom: 1px solid;"></td>
				<td style="border-right:1px solid; border-top:1px solid; border-bottom: 1px solid;"><?= $i ?></td>
			</tr> -->
			<tr>
				<td colspan="2" style="border-bottom: 1px solid;">Total Harga</td>
				<td colspan="3" rowspan="2">: VALUE</td>
			</tr>
			<tr>
				<td>Total Value</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: 1px solid;">Pembayaran</td>
				<td colspan="3" rowspan="2">: VALUE</td>
			</tr>
			<tr>
				<td>Payment</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: 1px solid;">Penyerahan</td>
				<td colspan="3" rowspan="2">: VALUE</td>
			</tr>
			<tr>
				<td>Delivery</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: 1px solid;">Keterangan</td>
				<td colspan="3" rowspan="2">: VALUE</td>
			</tr>
			<tr>
				<td>Remark</td>
			</tr>
			<tr>
				<td colspan="5">
					<u>Harap kembalikan copy dari surat pesanan ini setelah disetujui dan di tanda-tangani.</u><br>
            		Kindly return the copies duly signed acceptan
				</td>
			</tr>
			<tr>
				<td colspan="2"><u>Disetujui oleh,</u><br>Approved by</td>
				<td colspan="2"></td>
				<td><u>Hormat kami</u><br>Your faithfully</td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: 1px solid;">Tanggal</td>
				<td colspan="3" rowspan="2">: VALUE</td>
			</tr>
			<tr>
				<td>Date</td>
			</tr>
			<tr>
				<td colspan="5">NB : Harap dicantumkan nomor PO kami pada faktur.</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>