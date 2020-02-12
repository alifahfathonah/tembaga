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

			$AB1_h = 0;
			$AB2_h = 0;
			$AR_h = 0;
			$TR_h = 0;
			$BB_h = 0;
			$BC_h = 0;
			$CT_h = 0;
			$BL_h = 0;
			$DH_h = 0;
			$PB_h = 0;
			$PRT_h = 0;
			$DD_h = 0;
			$DB_h = 0;
			$DK_h = 0;
			$IR_h = 0;
			$LT_h = 0;
			$SC_h = 0;
			$SCJ_h = 0;

			$AB1_count = 0;
			$AB2_count = 0;
			$AR_count = 0;
			$TR_count = 0;
			$BB_count = 0;
			$BC_count = 0;
			$CT_count = 0;
			$BL_count = 0;
			$DH_count = 0;
			$PB_count = 0;
			$PRT_count = 0;
			$DD_count = 0;
			$DB_count = 0;
			$DK_count = 0;
			$IR_count = 0;
			$LT_count = 0;
			$SC_count = 0;
			$SCJ_count = 0;
			foreach ($detailLaporan as $key => $row) {	
			$no++;			
		?>
			<tr>
				<td style=" border-right: 1px solid #000; border-bottom: 1px solid;"><?= $no;?></td>
				<td style=" border-right: 1px solid #000; border-bottom: 1px solid;"><?=$row->nama_sup_cust; ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->AB1 == null)? '' : number_format($row->AB1,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->AB2 == null)? '' : number_format($row->AB2,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->AR == null)? '' : number_format($row->AR,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->TR == null)? '' : number_format($row->TR,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->BB == null)? '' : number_format($row->BB,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->BC == null)? '' : number_format($row->BC,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->CT == null)? '' : number_format($row->CT,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->BL == null)? '' : number_format($row->BL,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->DH == null)? '' : number_format($row->DH,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->PB == null)? '' : number_format($row->PB,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->PRT == null)? '' : number_format($row->PRT,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->DD == null)? '' : number_format($row->DD,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->DB == null)? '' : number_format($row->DB,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->DK == null)? '' : number_format($row->DK,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->IR == null)? '' : number_format($row->IR,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->LT == null)? '' : number_format($row->LT,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->SC == null)? '' : number_format($row->SC,2,'.',','); ?></td>
				<td style=" text-align: right; border-right: 1px solid #000; border-bottom: 1px solid;"><?=($row->SCJ == null)? '' : number_format($row->SCJ,2,'.',','); ?></td>
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

				$AB1_h += $row->AB1_h;
				$AB2_h += $row->AB2_h;
				$AR_h += $row->AR_h;
				$TR_h += $row->TR_h;
				$BB_h += $row->BB_h;
				$BC_h += $row->BC_h;
				$CT_h += $row->CT_h;
				$BL_h += $row->BL_h;
				$DH_h += $row->DH_h;
				$PB_h += $row->PB_h;
				$PRT_h += $row->PRT_h;
				$DD_h += $row->DD_h;
				$DB_h += $row->DB_h;
				$DK_h += $row->DK_h;
				$IR_h += $row->IR_h;
				$LT_h += $row->LT_h;
				$SC_h += $row->SC_h;
				$SCJ_h += $row->SCJ_h;

				$total += $row->total;
			}
		?>
			<tr>
				<th colspan="2" style="text-align: right;border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Grand Total Berat</th>
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
			<tr>
				<th colspan="2" style="text-align: right;border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Grand Total Harga</th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AB1_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AB2_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($AR_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($TR_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BB_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BC_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($CT_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($BL_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DH_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($PB_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($PRT_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DD_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DB_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($DK_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($IR_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($LT_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($SC_h,2,',','.');?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($SCJ_h,2,',','.');?></th>
                <?php $total_harga =$AB1_h+$AB2_h+$AR_h+$TR_h+$BB_h+$BC_h+$CT_h+$BL_h+$DH_h+$PB_h+$PRT_h+$DD_h+$DB_h+$DK_h+$IR_h+$LT_h+$SC_h+$SCJ_h;?>
                <th style="text-align: right; border-top: 1px solid; border-bottom: 1px solid;"><?=number_format($total_harga,2,',','.');?></th>
            </tr>

			<tr>
				<th colspan="2" style="text-align: right;border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Rata rata</th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($AB1_h>0 && $AB1 > 0)? number_format($AB1_h/$AB1,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($AB2_h>0 && $AB2 > 0)? number_format($AB2_h/$AB2,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($AR_h>0 && $AR > 0)? number_format($AR_h/$AR,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($TR_h>0 && $TR > 0)? number_format($TR_h/$TR,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($BB_h>0 && $BB > 0)? number_format($BB_h/$BB,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($BC_h>0 && $BC > 0)? number_format($BC_h/$BC,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($CT_h>0 && $CT > 0)? number_format($CT_h/$CT,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($BL_h>0 && $BL > 0)? number_format($BL_h/$BL,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($DH_h>0 && $DH > 0)? number_format($DH_h/$DH,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($PB_h>0 && $PB > 0)? number_format($PB_h/$PB,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($PRT_h>0 && $PRT > 0)? number_format($PRT_h/$PRT,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($DD_h>0 && $DD > 0)? number_format($DD_h/$DD,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($DB_h>0 && $DB > 0)? number_format($DB_h/$DB,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($DK_h>0 && $DK > 0)? number_format($DK_h/$DK,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($IR_h>0 && $IR > 0)? number_format($IR_h/$IR,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($LT_h>0 && $LT > 0)? number_format($LT_h/$LT,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($SC_h>0 && $SC > 0)? number_format($SC_h/$SC,2,',','.'): '';?></th>
                <th style="text-align: right; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;"><?=($SCJ_h>0 && $SCJ > 0)? number_format($SCJ_h/$SCJ,2,',','.'): '';?></th>
                <th style="text-align: right; border-top: 1px solid; border-bottom: 1px solid;"></th>
            </tr>
		</tbody>
	</table>
</body>
</html>