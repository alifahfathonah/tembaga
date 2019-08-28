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
			$total_rata += $row->rata2;
			$grand_netto += $row->netto;
			$grand_amount += $row->total_amount;
			$grand_rata += $row->rata2;
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

			$no = 1;
			foreach ($ingotRendah as $key => $v) {
				echo 
					"<tr>
						<td align='center'>".$no."</td>
						<td align='center'>".$v->sumber."</td>
						<td>".$v->supplier."</td>
						<td align='right'>".number_format($v->netto,2,'.',',')."</td>
						<td align='right'>".number_format($v->total,2,'.',',')."</td>
						<td align='right'>".number_format($v->rata2,2,'.',',')."</td>
					</tr>";

				$ingot_netto += $v->netto;
				$ingot_amount += $v->total;
				$ingot_rata += $v->rata2;
			}

			$grand_grand_netto = $grand_netto + $ingot_netto;
			$grand_grand_amount = $grand_amount + $ingot_amount;
			$grand_grand_rata = $grand_rata + $ingot_rata;

			echo 
				"<tr>
					<td align='right' colspan='3'><b>Grand Total</b></td>
					<td align='right'><b>".number_format($grand_grand_netto,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_grand_amount,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_grand_rata,2,'.',',')."</b></td>
				</tr>";

		?>
		</tbody>
	</table>
</body>
</html>