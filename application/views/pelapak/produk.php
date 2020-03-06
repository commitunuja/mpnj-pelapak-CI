
<div class="col-12">
<h3>Data Transaksi</h3>


<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm">Create</a>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Produk Baru</h5>
                    
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?=base_url('pelapak/tambah_produk')?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for=""><b> Nama produk </b></label>
                            <input type="text" name="nama_produk" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>

                    <div class="col-sm-12">    
                        <div class="form-group">
                            <label for=""><b> Kategori Produk </b></label>
                            <select name="kategori_produk_id" class="form-control" required >
                                <option value="" readonly>-- Pilih Salah Satu --</option>
                                <?php 
                                $type = $this->db->get('kategori_produk')->result();
                                foreach ($type as $ty) {
                                    ?>
                                        <option value="<?=$ty->id_kategori_produk?>"><?=$ty->nama_kategori?></option>
                                        <?php
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b> Satuan </b></label>
                            <input type="text" name="satuan" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                        <div class="form-group">
                            <label for=""><b> Berat </b></label>
                            <input type="number" name="berat" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b> Harga Modal </b></label>
                            <input type="number" name="harga_modal" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label for=""><b> Harga Jual </b></label>
                            <input type="number" name="harga_jual" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><b> Diskon </b></label>
                            <input type="number" name="diskon" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><b> Stok </b></label>
                            <input type="number" name="stok" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for=""><b> Deskripsi </b></label>
                            <textarea name="keterangan" id="" cols="30" rows="5" required class="form-control" placeholder="Deskripsi produk"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Tipe Produk</label>
                            <select name="tipe_produk" class="form-control" required>
                                <option value="" readonly>-- Pilih Salah Satu --</option>
                                <option value="single">Single</option>
                                <option value="varian">Varian</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for=""><b> Foto </b></label>
                        <input type="file" name="foto[]" multiple required class="form-control" placeholder="" aria-describedby="helpId">
                        <small>gambar harus berekstensi .jpg, .png atau .gif. Maximal 5 Mb.</small>
                    </div> -->
                    
                   
                    
                    
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>


<br><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Tipe </th>
            <th>Pelapak</th>
            <th>Terjual</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($produk->num_rows() > 0){
            $no1=1;
            foreach ($produk->result() as $t) {
                ?>
                <tr>
                    <td><?=$no1?></td>
                    <td><?=$t->nama_produk?></td>
                    <td><?=$t->tipe_produk?></td>
                    <td><?php
                         
                         $pelapak = $this->db->where('id_pelapak', $t->pelapak_id)->get('pelapak')->row_array();
                         echo $pelapak['username'];
                         
                    ?></td>
                    <td><?=$t->terjual?></td>
                    <td>
                    <?php
                         
                         $kategori = $this->db->where('id_kategori_produk', $t->kategori_produk_id)->get('kategori_produk')->row_array();
                         echo $kategori['nama_kategori'];
                    ?>
                    </td>
                    <td>
                        <a href="<?=base_url('pelapak/hapus_produk/'.$t->id_produk)?>" class="text-white btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$t->id_produk?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="edit<?=$t->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Produk : <?=$t->nama_produk?></h5>
                                           
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?=base_url('pelapak/update_produk/'.$t->id_produk)?>" method="post" enctype="multipart/form-data">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""><b> Nama produk </b></label>
                                                    <input type="text" name="nama_produk" value="<?=$t->nama_produk?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">    
                                                <div class="form-group">
                                                    <label for=""><b> Kategori Produk </b></label>
                                                    <select name="kategori_produk_id" class="form-control" required >
                                                        <option value="" readonly>-- Pilih Salah Satu --</option>
                                                        <?php 
                                                        $type = $this->db->get('kategori_produk')->result();
                                                        foreach ($type as $ty) {
                                                            ?>
                                                                <option value="<?=$ty->id_kategori_produk?>" <?= $ty->id_kategori_produk==$t->kategori_produk_id ? 'selected' : '' ?>><?=$ty->nama_kategori?></option>
                                                                <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for=""><b> Satuan </b></label>
                                                    <input type="text" name="satuan" value="<?=$t->satuan?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                
                                                <div class="form-group">
                                                    <label for=""><b> Berat </b></label>
                                                    <input type="number" name="berat" value="<?=$t->berat?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for=""><b> Harga Modal </b></label>
                                                    <input type="number" name="harga_modal" value="<?=$t->harga_modal?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>

                                            </div>
                                            <div class="col-sm-3">

                                                <div class="form-group">
                                                    <label for=""><b> Harga Jual </b></label>
                                                    <input type="number" name="harga_jual" value="<?=$t->harga_jual?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""><b> Diskon </b></label>
                                                    <input type="number" name="diskon" value="<?=$t->diskon?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""><b> Stok </b></label>
                                                    <input type="number" name="stok" value="<?=$t->stok?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""><b> Deskripsi </b></label>
                                                    <textarea name="keterangan" id="" cols="30" rows="5" required class="form-control" placeholder="Deskripsi produk"><?=$t->keterangan?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Tipe Produk</label>
                                                    <select name="tipe_produk" class="form-control" required>
                                                        <option value="" readonly>-- Pilih Salah Satu --</option>
                                                        <option value="single" <?= $t->tipe_produk=='single' ? 'selected' : '' ?>>Single</option>
                                                        <option value="varian" <?= $t->tipe_produk=='varian' ? 'selected' : '' ?>>Varian</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?=$t->id_produk?>">
                          Detail
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="detail<?=$t->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Produk</h5>
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
                                                    <?=$t->nama_produk?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    slug
                                                </th>
                                                <td>
                                                    <?=$t->slug?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Satuan
                                                </th>
                                                <td>
                                                    <?=$t->satuan?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Berat
                                                </th>
                                                <td>
                                                    <?=$t->berat?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Harga Modal
                                                </th>
                                                <td>
                                                    <?=$t->harga_modal?>
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
                                                    Diskon
                                                </th>
                                                <td>
                                                    <?=$t->diskon?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Stok
                                                </th>
                                                <td>
                                                    <?=$t->stok?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Keterangan
                                                </th>
                                                <td>
                                                    <?=$t->keterangan?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th>
                                                    Tipe Produk
                                                </th>
                                                <td>
                                                    <?=$t->tipe_produk?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Pelapak
                                                </th>
                                                <td>
                                                <?php
                                                    $pelapak = $this->db->where('id_pelapak', $t->pelapak_id)->get('pelapak')->row_array();
                                                    echo $pelapak['username'];
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Wishlist
                                                </th>
                                                <td>
                                                    <?=$t->wishlist?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Terjual
                                                </th>
                                                <td>
                                                    <?=$t->terjual?>
                                                </td>
                                            </tr>
                                           
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- tambah foto -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#foto<?=$t->id_produk?>">
                          Foto
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="foto<?=$t->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Foto Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $foto = $this->db->where('produk_id', $t->id_produk)->get('foto_produk');
                                        
                                        if($foto->num_rows() > 0){
                                                ?>
                                            <table class="table"> 
                                                <tr>
                                                    <th>#</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php $no=1;
                                                 foreach ($foto->result() as $f) {
                                                     ?>
                                                        <tr>
                                                            <th>
                                                                <?=$no?>
                                                            </th>
                                                            <td>
                                                              
                                                                <img src="<?=base_url('asset/foto_produk/'.$f->foto_produk)?>" width="100">
                                                                          
                                                            </td>
                                                            <td>
                                                                <a href="<?=base_url('pelapak/hapus_foto/'.$f->id_foto_produk."?foto=".$f->foto_produk)?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        $no++;
                                                    }  ?>
                                            </table>
                                            <hr>
                                            <form action="<?=base_url('pelapak/tambah_foto/'.$t->id_produk)?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for=""><b> Foto </b></label>
                                                    <input type="file" name="foto" required class="form-control" placeholder="" aria-describedby="helpId">
                                                    <small>gambar harus berekstensi .jpg, .png atau .gif. Maximal 5 Mb.</small>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Simpan
                                                </button>
                                            </form>
                                            <?php
                                        }else{
                                            ?>
                                                <!-- <small><i>Foto tidak ada</i></small> -->
                                                <form action="<?=base_url('pelapak/tambah_foto/'.$t->id_produk)?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for=""><b> Foto </b></label>
                                                    <input type="file" name="foto" required class="form-control" placeholder="" aria-describedby="helpId">
                                                    <small>gambar harus berekstensi .jpg, .png atau .gif. Maximal 5 Mb.</small>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Simpan
                                                </button>
                                            </form>
                                            <?php
                                        } ?>
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

</div>