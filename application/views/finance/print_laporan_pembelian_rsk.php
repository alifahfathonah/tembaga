<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembelian</title>
</head>
<body onload="window.print()">
	<table width="100%" style="page-break-after: auto;">
		<tr>
			<td align="center">
				<h4>Laporan Detail Pembelian per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="2" cellspacing="0" style="font-size: 13px;">
		<thead>
			<tr>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">No</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid; width: 15%;">Nama Supplier</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">ABCW1</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">ABCW2</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">A-Rbt</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Travo</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B B</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B C</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">C.TAPE</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BL</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D H</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">P B</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">PRT</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D D</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D B</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D K</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">I R</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">L T</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">S C</th>
                <th style="border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">SCJ</th>
                <th style="text-align: center; border-top: 1px solid; border-bottom: 1px solid;">Total Berat</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$no = 0;
			$total = 0;
			$AB1 = 0;
			$AB2 = 0;
			$AR = 0;
			$TR = 0;
			$BB = 0;
			$BC = 0;
			$CT = 0;
			$BL = 0;
			$DH = 0;
			$PB = 0;
			$PRT = 0;
			$DD = 0;
			$DB = 0;
			$DK = 0;
			$IR = 0;
			$LT = 0;
			$SC = 0;
			$SCJ = 0;
			foreach ($detailLaporan as $key => $row) {	
			$no++;			
		?>
			<tr>
				<td style=" border-right: 1px solid #000; border-bottom: 1px solid;"><?= $no;?></td>
				<td style=" border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->nama_sup_cust; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->AB1; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->AB2; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->AR; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->TR; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->BB; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->BC; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->CT; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->BL; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->DH; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->PB; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->PRT; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->DD; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->DB; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->DK; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->IR; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->LT; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->SC; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->SCJ; ?></td>
				<td align="right" style=" border-right: 1px solid #000; border-bottom: 1px solid;"><?= number_format($row->total,2,'.',','); ?></td>
			</tr>
		<?php
				$AB1 += $row->AB1;
				$AB2 += $row->AB2;
				$AR += $row->AR;
				$TR += $row->TR;
				$BB += $row->BB;
				$BC += $row->BC;
				$CT += $row->CT;
				$BL += $row->BL;
				$DH += $row->DH;
				$PB += $row->PB;
				$PRT += $row->PRT;
				$DD += $row->DD;
				$DB += $row->DB;
				$DK += $row->DK;
				$IR += $row->IR;
				$LT += $row->LT;
				$SC += $row->SC;
				$SCJ += $row->SCJ;
				$total += $row->total;
			} 
		?>
			<tr>
				<th colspan="2" style=" border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AB1,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AB2,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AR,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($TR,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BB,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BC,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($CT,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BL,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DH,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($PB,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($PRT,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DD,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DB,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DK,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($IR,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($LT,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($SC,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($SCJ,2,',','.');?></th>
                <th style="text-align: right; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($total,2,',','.');?></th>
            </tr>
		</tbody>
	</table>
</body>
</html>