<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembelian</title>
</head>
<body onload="window.print()"><strong>PT. KAWAT MAS PRAKASA</strong><br>

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
                <th style="border-top: 1px solid; border-bottom: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid; width: 15%;">Nama Barang</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid;">No. Bukti</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid; width: 20%;">Supplier</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid;">Sumber</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid;">Netto</th>
                <th style="text-align: center; border-top: 1px solid; border-bottom: 1px solid;">Harga</th>
                <th style="text-align: center; border-top: 1px solid; border-bottom: 1px solid;">Total Harga</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$last_series = '';
			$last_sumber = '';
			$grand_total = 0;
			$total_netto = 0;
			$netto_seluruh = 0;
			$total_amount_seluruh = 0;
			$grand_total_sumber = 0;
			$grand_netto_sumber = 0;
			$grand_grand_total = 0;
			$grand_grand_netto = 0;
			foreach ($detailLaporan as $key => $row) {
				if ($last_series != '') {
					if ($last_series != $row->kode_rongsok) {
						echo 
							"<tr>
								<td colspan='6'></td>
								<td align='right' style='border-top: 1px solid;'><b>".number_format($total_netto,2,'.',',')."</b></td>
								<td></td>
								<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_total,2,'.',',')."</b></td>
							</tr>";
						if ($last_sumber == $row->sumber) {
							echo 
								"<tr>
									<td colspan='9'><b><u>".$row->kode_rongsok."</u></b></td>
								</tr>";
						} else {
							$last_series = '';
						}							
						$grand_total = 0;
						$total_netto = 0;
					}
				} else {
					echo 
						"<tr>
							<td colspan='9'><b><u>".$row->kode_rongsok."</u></b></td>
						</tr>";
				}

				if ($last_sumber != '') {
					if ($last_sumber != $row->sumber) {
						echo 
							"<tr>
								<td colspan='5'></td>
								<td><b>Grand Total</b></td>
								<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_netto_sumber,2,'.',',')."</b></td>
								<td></td>
								<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_total_sumber,2,'.',',')."</b></td>
							</tr>";
						$grand_total_sumber = 0;
						$grand_netto_sumber = 0;
					}

					if ($last_series == '') {
							echo 
								"<tr>
									<td colspan='9'><b><u>".$row->kode_rongsok."</u></b></td>
								</tr>";
						}
				}
				
		?>
			<tr>
				<td><?= $row->kode_rongsok; ?></td>
				<td><?= $row->nama_item; ?></td>
				<td><?= $row->no_ttr; ?></td>
				<td><?= $row->tgl_ttr; ?></td>
				<td><?= $row->nama_sup_cust; ?></td>
				<td><?= $row->sumber; ?></td>
				<td align="right"><?= number_format($row->netto,2,'.',','); ?></td>
				<td align="right"><?= number_format($row->amount,2,'.',','); ?></td>
				<td align="right"><?= number_format($row->total_amount,2,'.',','); ?></td>
			</tr>
		<?php
				$total_netto += $row->netto;
				$grand_total += $row->total_amount;
				$last_series = $row->kode_rongsok;
				$last_sumber = $row->sumber;
				$grand_netto_sumber += $row->netto;
				$grand_total_sumber += $row->total_amount;
				$netto_seluruh += $row->netto;
				$total_amount_seluruh += $row->total_amount;
			} 
			echo 
				"<tr>
					<td colspan='6'></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($total_netto,2,'.',',')."</b></td>
					<td></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_total,2,'.',',')."</b></td>
				</tr>";
			echo 
				"<tr>
					<td colspan='5'></td>
					<td><b>Grand Total</b></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_netto_sumber,2,'.',',')."</b></td>
					<td></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($grand_total_sumber,2,'.',',')."</b></td>
				</tr>";
			echo 
				"<tr>
					<td colspan='5'></td>
					<td><b>Grand Total</b></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($netto_seluruh,2,'.',',')."</b></td>
					<td></td>
					<td align='right' style='border-top: 1px solid;'><b>".number_format($total_amount_seluruh,2,'.',',')."</b></td>
				</tr>";
		?>
		</tbody>
	</table>
</body>
</html>