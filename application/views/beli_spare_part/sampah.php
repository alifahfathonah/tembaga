
                        <?php
                        $no = 1;
                        foreach ($detailLaporan as $row){
                            echo '<tr>';
                            echo '<td style="text-align:center">'.$no.'</td>';
                            echo '<td>'.$row->nama_produk.'</td>';
                            echo '<td>'.$row->jumlah.'</td>';
                            echo '<td>'.$row->bruto_masuk.'</td>';
                            echo '<td>'.$row->netto_masuk.'</td>';
                            echo '<td>'.$row->bruto_keluar.'</td>';
                            echo '<td>'.$row->netto_keluar.'</td>';
                        ?>
                        <td><?php
                        if($group_id==1 || $hak_akses['view_spb']==1){
                        ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/BeliSparePart/view_detail_laporan/<?php echo $row->tanggal.'/'.$row->id;?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> Detail &nbsp; </a>
                        <?php
                            }
                        echo '</td>';
                        }
                        ?>