<!DOCTYPE html>
<html>
<head>
	<title>Laporan Bahan Pembantu dan Pelumas</title>
</head>
<body onload="window.print()">
	<table width="100%" style="page-break-after: auto;">
		<tr>
			<td align="center">
				<h4><u>Laporan Bahan Pembantu dan Pelumas</u><br>Peride: <?= $periode ?></h4>
			</td>
		</tr>
	</table>
	<table width="100%" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" border="1">
		<thead>
			<tr>
				<th style="text-align: center;" rowspan="2">No.</th>
				<th style="text-align: center;" rowspan="2">Kode</th>
				<th style="text-align: center;" rowspan="2">Nama Barang</th>
				<th style="text-align: center;" rowspan="2">Unit</th>
				<th style="text-align: center;" >Stock Awal</th>
				<th style="text-align: center;" >Pemasukan</th>
				<th style="text-align: center;" >Pemakaian</th>
				<th style="text-align: center;" >Stock Akhir</th>
			</tr>
			<tr>
				<th style="text-align: center;">Qty</th>
				<th style="text-align: center;">Qty</th>
				<th style="text-align: center;">Qty</th>
				<th style="text-align: center;">Qty</th>
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
			$grand_total_saldo_qty = 0;
			$grand_total_saldo_amount = 0;
			$grand_total_qty_masuk = 0;
			$grand_total_amount_masuk = 0;
			$grand_total_qty_keluar = 0;
			$grand_total_amount_keluar = 0;
			$grand_total_qty_sisa = 0;
			$grand_total_amount_sisa = 0;
			foreach ($detailLaporan as $key => $row) {
				$group = substr($row->kode, 0, 2);
				if ($last_group != '') {
				if ($group != $last_group) {
					echo 
						"<tr>
							<td colspan='4' align='right'><b>Total</b></td>
							<td align='right'><b>".number_format($total_saldo_qty_group,2,'.',',')."</b></td>
							<td align='right'><b>".number_format($total_qty_masuk,2,'.',',')."</b></td>
							<td align='right'><b>".number_format($total_qty_keluar,2,'.',',')."</b></td>
							<td align='right'><b>".number_format($total_qty_sisa,2,'.',',')."</b></td>
						</tr>
						<tr>
							<td colspan='12'>&nbsp;</td>
						</tr>";

					$no = 1;
					$total_saldo_qty_group = 0;
					$total_saldo_amount_group = 0;
					$total_qty_masuk = 0;
					$total_amount_masuk = 0;
					$total_qty_keluar = 0;
					$total_rata2 = 0;
					$total_amount_keluar = 0;
					$total_qty_sisa = 0;
					$total_amount_sisa = 0;
				}
			}

				echo 
					"<tr>
						<td align='center'>".$no."</td>
						<td>".$row->kode."</td>
						<td>".$row->nama_item."</td>
						<td>".$row->uom."</td>
						<td align='right'>".number_format($row->saldo_qty,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_masuk,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_keluar,2,'.',',')."</td>
						<td align='right'>".number_format($row->qty_sisa,2,'.',',')."</td>
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
				// $total_rata2 = $total_amount_sisa / $total_qty_sisa;


				$grand_total_saldo_qty += $row->saldo_qty;
				$grand_total_saldo_amount += $row->saldo_amount;
				$grand_total_qty_masuk += $row->qty_masuk;
				$grand_total_amount_masuk += $row->amount_masuk;
				$grand_total_qty_keluar += $row->qty_keluar;
				$grand_total_amount_keluar += $row->amount_keluar;
				$grand_total_qty_sisa += $row->qty_sisa;
				$grand_total_amount_sisa += $row->amount_sisa;
			}

			echo 
				"<tr>
					<td colspan='4' align='right'><b>Total</b></td>
					<td align='right'><b>".number_format($total_saldo_qty_group,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($total_qty_masuk,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($total_qty_keluar,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($total_qty_sisa,2,'.',',')."</b></td>
				</tr>
				<tr>
					<td colspan='12'>&nbsp;</td>
				</tr>";

			echo 
				"<tr>
					<td colspan='4' align='right'><b> Grand Total</b></td>
					<td align='right'><b>".number_format($grand_total_saldo_qty,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_total_qty_masuk,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_total_qty_keluar,2,'.',',')."</b></td>
					<td align='right'><b>".number_format($grand_total_qty_sisa,2,'.',',')."</b></td>
				</tr>
				<tr>
					<td colspan='12'>&nbsp;</td>
				</tr>";
		?>
		</tbody>
	</table>
</body>
</html>