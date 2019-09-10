<!DOCTYPE html>
<html>
<head>
	<title>Laporan Bahan Pembantu dan Pelumas</title>
</head>
<body onload="window.print()">
	<table width="100%" style="page-break-after: auto;">
		<tr>
			<td align="center">
				<h4>Laporan Bahan Pembantu dan Pelumas</h4>
			</td>
		</tr>
	</table>
	<table width="100%" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" border="1">
		<thead>
			<tr>
				<th style="text-align: center;">No.</th>
				<th style="text-align: center;">Kode</th>
				<th style="text-align: center;">Nama Item</th>
				<th style="text-align: center;">Qty Saldo</th>
				<th style="text-align: center;">Total Saldo</th>
				<th style="text-align: center;">Qty Masuk</th>
				<th style="text-align: center;">Total Masuk</th>
				<th style="text-align: center;">Qty Keluar</th>
				<th style="text-align: center;">Rata<sup>2</sup></th>
				<th style="text-align: center;">Total Keluar</th>
				<th style="text-align: center;">Qty Sisa</th>
				<th style="text-align: center;">Sisa Saldo</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$no = 1;
			$group = '';
			$last_group = '';
			$total_saldo_qty_group = 0;
			$total_saldo_amount_group = 0;
			$total_qty_masuk = 0;
			$total_amount_masuk = 0;
			$total_qty_keluar = 0;
			$total_rata2 = 0;
			$total_amount_keluar = 0;
			$total_qty_sisa = 0;
			$total_amount_sisa = 0;
			foreach ($detailLaporan as $key => $row) {
				$group = substr($row->kode, 0, 2);

				if ($group != $last_group) {
					echo "
						<tr>
							<td colspan='3' align='right'>Total</td>
							<td align='right'>".number_format($total_saldo_qty_group,2,'.',',')."</td>
							<td align='right'>".number_format($total_saldo_amount_group,2,'.',',')."</td>
							<td align='right'>".number_format($total_qty_masuk,2,'.',',')."</td>
							<td align='right'>".number_format($total_amount_masuk,2,'.',',')."</td>
							<td align='right'>".number_format($total_qty_keluar,2,'.',',')."</td>
							<td align='right'>".number_format($total_rata2,2,'.',',')."</td>
							<td align='right'>".number_format($total_amount_keluar,2,'.',',')."</td>
							<td align='right'>".number_format($total_qty_sisa,2,'.',',')."</td>
							<td align='right'>".number_format($total_amount_sisa,2,'.',',')."</td>
						</tr>
						<tr>
							<td colspan='12'>&nbsp;</td>
						</tr>
					";

					$no = 1;
					$total_saldo_qty_group = 0;
					$total_saldo_amount_group = 0;
				}

				echo 
					"<tr>
						<td align='center'>".$no."</td>
						<td>".$row->kode."</td>
						<td>".$row->nama_item."</td>
						<td align='right'>".number_format($row->saldo_qty,2,'.',',')."</td>
						<td align='right'>".number_format($row->saldo_amount,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_masuk,2,'.',',')."</td>
						<td align='right'>".number_format($row->amount_masuk,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_keluar,2,'.',',')."</td>
						<td align='right'>".number_format($row->rata2,2,'.',',')."</td>
						<td align='right'>".number_format($row->amount_keluar,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_sisa,2,'.',',')."</td>
						<td align='right'>".number_format($row->amount_sisa,2,'.',',')."</td>
					</tr>";
				$no++;
				$last_group = $group;
				$total_saldo_qty_group += $row->saldo_qty;
				$total_saldo_amount_group += $row->saldo_amount;
				$total_qty_masuk += $row->qty_masuk;
				$total_amount_masuk += $row->amount_masuk;
				$total_qty_keluar += $row->qty_keluar;
				$total_amount_keluar += $row->amount_keluar;
				$total_qty_sisa += $row->qty_sisa;
				$total_amount_sisa += $row->amount_sisa;
				$total_rata2 = $total_amount_sisa / $total_qty_sisa;
			}
		?>
		</tbody>
	</table>
</body>
</html>