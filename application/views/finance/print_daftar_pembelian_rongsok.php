<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembelian Rongsok</title>
</head>
<body>
	<table width="100%" style="page-break-after: auto;">
		<tr>
			<td align="center">
				<h4>Daftar Pembelian Rongsok per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="2" cellspacing="0" style="font-size: 13px; border-collapse: collapse;" border="1">
		<thead>
			<tr>
				<td>No</td>
				<td>Keterangan</td>
			<?php foreach($header as $h){ ?>
				<td><?= $h->kode_rongsok ?></td>
			<?php } ?>
			</tr>
		</thead>
		<tbody>
		<?php
			$no = 1;
			foreach ($detailLaporan as $key => $row) {
		?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $row['nama_sup_cust']; ?></td>
			</tr>
		<?php 
				$no++;
			}
		?>
		</tbody>
	</table>
</body>
</html>