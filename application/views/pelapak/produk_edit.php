<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Edit Data Produk</h3>
            </div>
            <div class="box-body table-responsive">
                <form action="<?=base_url('pelapak/update_produk/'.$p['id_produk'])?>" method="post">
                    <div class="col-sm-12">
<!--                        http://localhost/mpnj-admin/pelapak/update_produk/2-->
                        <div class="form-group">
                            <label for=""><b> Nama produk </b></label>
                            <input type="text" name="nama_produk" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['nama_produk']?>">
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
                                    if ($ty->id_kategori_produk == $p['kategori_produk_id']) { ?>
                                        <option value="<?=$ty->id_kategori_produk?>" selected><?=$ty->nama_kategori?></option>
                                    <?php } else { ?>
                                        <option value="<?=$ty->id_kategori_produk?>"><?=$ty->nama_kategori?></option>
                                    <?php } ?>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b> Satuan </b></label>
                            <input type="text" name="satuan" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['satuan']?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b> Berat </b></label>
                            <input type="number" name="berat" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['berat']?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b> Harga Modal </b></label>
                            <input type="number" name="harga_modal" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['harga_modal']?>">
                        </div>

                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label for=""><b> Harga Jual </b></label>
                            <input type="number" name="harga_jual" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['harga_jual']?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><b> Diskon </b></label>
                            <input type="number" name="diskon" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['diskon']?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><b> Stok </b></label>
                            <input type="number" name="stok" required class="form-control" placeholder="" aria-describedby="helpId" value="<?=$p['stok']?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for=""><b> Deskripsi </b></label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" required class="form-control" placeholder="Deskripsi produk"><?=$p['keterangan']?></textarea>
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
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success btn-sm" name="simpan">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="self.history.back()">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>