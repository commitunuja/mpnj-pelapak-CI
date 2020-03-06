
<div class="col-12">
<h3>Data Transaksi</h3>


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Transaksi</th>
            <th>Tgl Transaksi</th>
            <th>Waktu</th>
            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($transaksi->num_rows() > 0){
            $no1=1;
            foreach ($transaksi->result() as $t) {
                ?>
                <tr>
                    <td><?=$no1?></td>
                    <td><?=$t->kode_transaksi?></td>
                    <td><?= date('d, F Y', strtotime($t->waktu_transaksi))?></td>
                    <td><?= date('H : i', strtotime($t->waktu_transaksi))?></td>
                    <td>
 
                        <!-- Modal -->
                        <a href="<?=base_url('pelapak/detail/'.$t->id_transaksi)?>" class="btn btn-info btn-sm">Detail</a> 


                    </td>
                </tr>
                <?php

                $no1++;
            
            }
        }
        ?>
    </tbody>
</table>

</div>