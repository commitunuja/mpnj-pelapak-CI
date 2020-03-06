
<div class="col-12">
<h1>Kode : <?=$transaksi['kode_transaksi']?> </h1>

<br><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Ekspedisi</th>
            <th>Ongkir</th>
            <th>Sub Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($transaksi_detail->num_rows() > 0){
            $no1=1;
            foreach ($transaksi_detail->result() as $t) {
                ?>
                <tr>
                    <td><?=$no1?></td>
                    <td><?php
                        $produk = $this->db->where('id_produk', $t->produk_id)->get('produk')->row_array();
                        echo $produk['nama_produk'];
                    ?></td>
                    <td>
                        <?=rupiah($t->harga_jual) ?>
                    </td>
                    <td>
                        <?=$t->jumlah?>
                    </td>
                    <td>
                        <b><?=$t->kurir?></b> (<?=$t->service?>) <i>(<?=$t->etd?>) Hari</i>
                    </td>
                    <td>
                        <?=rupiah($t->ongkir)?>
                    </td>
                    <td>
                        <?=rupiah($t->sub_total)?>
                    </td>
                    <td>
                        <small class="" style="padding: 5px 10px; border: 1px solid #777; border-radius: 10px;">
                            <?=$t->status_order?>
                        </small>
                    </td>
                    
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$t->id_transaksi_detail?>">
                          <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="hapus<?=$t->id_transaksi_detail?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda yakin, data akan dihapus ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <a href="<?=base_url('pelapak/hapus_transaksi/'.$t->id_transaksi_detail."?to=".$transaksi['id_transaksi'])?>" class="btn btn-danger">Iya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
                       
                       
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?=$t->id_transaksi_detail?>">
                          Konfirmasi
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="detail<?=$t->id_transaksi_detail?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <table width="100%" class="table">
                                                <tr>
                                                    <th>
                                                        Nama Produk
                                                    </th>
                                                    <td>
                                                        <?= $produk['nama_produk'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Harga
                                                    </th>
                                                    <td>
                                                        <?=rupiah($t->harga_jual) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Jumlah
                                                    </th>
                                                    <td>
                                                    <?=$t->jumlah?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Ekspedisi
                                                    </th>
                                                    <td>
                                                        <b><?=$t->kurir?></b> (<?=$t->service?>) <i>(<?=$t->etd?>) Hari</i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total Bayar
                                                    </th>
                                                    <td>
                                                    <?=rupiah($t->sub_total) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Harga Jual
                                                    </th>
                                                    <td>
                                                        <?=$t->harga_jual?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <td>
                                                        <small class="" style="padding: 5px 10px; border: 1px solid #777; border-radius: 10px;">
                                                            <?=$t->status_order?>
                                                        </small>
                                                    </td>
                                                </tr>
                                               

                                                <?php
                                                    if($t->status_order == 'sukses'){
                                                        ?>
                                                            <span class="btn btn-success btn-sm"><?=$t->status_order?></span>
                                                        <?php
                                                    }else{
                                                ?>
                                                    <tr>
                                                        <th>Konfirmasi</th>
                                                        <th>
                                                            <div class="form-group">
                                                                    <input type="hidden" id="id_transaksi_detail<?=$t->id_transaksi_detail?>" value="<?=$t->id_transaksi_detail?>">
                                                                    <select class="form-control" name="status_order" id="status_order<?=$t->id_transaksi_detail?>" required>
                                                                        <option value="" readonly> -- Pilih Salah Satu -- </option>
                                                                        
                                                                        <option value="packing">Packing</option>
                                                                        <option value="dikirim">Dikirim</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                        </th>
                                                    </tr>

                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#status_order<?=$t->id_transaksi_detail?>').change(function(){ 
                                                                var id = $('#id_transaksi_detail<?=$t->id_transaksi_detail?>').val();
                                                                var value = $(this).val();
                                                                $.ajax({
                                                                    url : "<?php echo base_url('pelapak/status_order/'.$t->id_transaksi_detail);?>",
                                                                    method : "POST",
                                                                    data : {status_order: value},
                                                                    async : true,
                                                                    dataType : 'json',
                                                                    success: function(data){
                                                                        window.location.reload()
                                                                    }
                                                                });
                                                                return false;
                                                            }); 
                                                        })
                                                        </script>
                                                    <?php } ?>
                                               
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </td>
                </tr>
                <?php

                $no1++;
            
            }
        }
        ?>
        

          
    </tbody>
</table>

<br>
<a href="<?=base_url('pelapak/transaksi')?>" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>

</div>