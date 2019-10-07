<!DOCTYPE html>
<html>
<head>
	<title>Rangking Pemasukan Rongok</title>
</head>
<body onload="window.print()">
	<table width="100%" style="page-break-after: auto;">
		<tr>
			<td align="center">
				<h4>Rangking Pemasukan Rongsok per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
			</td>
		</tr>
	</table>
	<table width="100%" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" border="1">
		<thead>
			<tr>
				<th style="text-align: center;">No.</th>
				<th style="text-align: center;">Sumber</th>
				<th style="text-align: center; width: 35%;">Supplier</th>
				<th style="text-align: center;">Netto</th>
				<th style="text-align: center;">Total</th>
				<th style="text-align: center;">Rata<sup>2</sup></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$no = 1;
			$grand_grand_netto = 0;
			$grand_grand_amount = 0;
			$grand_grand_rata = 0;
			$ingot_netto = 0;
			$ingot_amount = 0;
			$ingot_rata = 0;
			$grand_netto = 0;
			$grand_amount = 0;
			$grand_rata = 0;
			$total_netto = 0;
			$total_amount = 0;
			$total_rata = 0;
			$last_series = '';
			foreach ($detailLaporan as $key => $row) {
				if ($last_series != '') {
					if ($last_series != $row->sumber) {
						echo 
							"<tr>
								<td align='right' colspan='3'><b>Total</b></td>
								<td align='right'><b>".number_format($total_netto,2,'.',',')."</b></td>
								<td align='right'><b>".number_format($total_amount,2,'.',',')."</b></td>
								<td align='right'><b>".number_format($total_rata,2,'.',',')."</b></td>
							</tr>";
						$no = 1;
						$total_netto = 0;
						$total_amount = 0;
						$total_rata = 0;
					}
				}
				
		?>
		<tr>
			<td align="center"><?= $no ?></td>
			<td align="center"><?= $row->sumber ?></td>
			<td><?= $row->nama_sup_cust ?></td>
			<td align="right"><?= number_format($row->netto,2,'.',',') ?></td>
			<td align="right"><?= number_format($row->total_amount,2,'.',',') ?></td>
			<td align="right"><?= number_format($row->rata2,2,'.',',') ?></td>
		</tr>
		<?php 
			$last_series = $row->sumber;
			$total_netto += $row->netto;
			$total_amount += $row->total_amount;
			// $total_rata += $row->rata2;
			$total_rata = $total_amount / $total_netto;
			$grand_netto += $row->netto;
			$grand_amount += $row->total_amount;
			// $grand_rata += $row->rata2;
			$grand_rata = $grand_amount / $grand_netto;
			$no++;
			}

			echo 
				"<tr>
					<td align='right' colspan='3'><b>Total</b></td>
					<td align='right'><b>".number_format($total_netto,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($total_amount,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($total_rata,2,'.',',')."</b></td>
				</tr>";

			echo 
				"<tr>
					<td align='right' colspan='3'><b>Grand Total</b></td>
					<td align='right'><b>".number_format($grand_netto,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_amount,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_rata,2,'.',',')."</b></td>
				</tr>";

		?>
		</tbody>
	</table>
</body>
</html>