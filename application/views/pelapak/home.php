<section class="content-header">
    <h1> Dashboard <small>Control panel </small> </h1>
    <div class="container-fluid">

        <div class="row" style="margin-top: 50px">
            
            <a class="col-sm-3 text-center btn btn-primary" href="<?=base_url('pelapak/produk')?>">
            <br>
            <?php
                $produk = $this->db->where('pelapak_id', $this->session->userdata('id_pelapak'))->get('produk');
                ?>

            <i class="fa fa-archive" style="font-size: 100px" aria-hidden="true"></i>
            <br>
            <b>Produk</b>
                <span class="badge badge-pill badge-primary"><?=$produk->num_rows()?></span>
                
                <br>
                <br>
            </a>

            <div class="col-sm-1"></div>

            <a class="col-sm-3 text-center btn btn-warning" href="<?=base_url('pelapak/transaksi')?>">
            <br>
            <?php
                $transaksi = $this->db->where('pelapak_id', $this->session->userdata('id_pelapak'))->get('transaksi_detail');
                ?>

                <i class="fa fa-cart-plus" style="font-size: 100px"  aria-hidden="true"></i>
            
            <br>
                <b>Transaksi</b>
                <span class="badge badge-pill badge-warning"><?=$transaksi->num_rows()?></span>
                <br>
                <br>
            </a>

            <div class="col-sm-1"></div>

            
            <a class="col-sm-3 text-center btn btn-info" href="<?=base_url('pelapak/rekening')?>">
            <br>
            <?php
                $rek = $this->db->where('pelapak_id', $this->session->userdata('id_pelapak'))->get('rekening_pelapak');
                ?>

            <i class="fa fa-book" style="font-size: 100px" aria-hidden="true"></i>
            <br>
            <b>Rekening</b>
                <span class="badge badge-pill badge-primary"><?=$rek->num_rows()?></span>
                <br>
                <br>
            </a>

            <a class="col-sm-11 text-center btn btn-success" href="<?=base_url('pelapak/withdraw')?>" style="margin-top: 40px">
            <br>
                <?php
                    $pelapak = $this->db->where('id_pelapak', $this->session->userdata('id_pelapak'))->get('pelapak')->row_array();
                ?>

            <i class="fa fa-money" style="font-size: 100px" aria-hidden="true"></i>
            <br>
            <b>Saldo anda : </b>
                <span class="badge badge-pill badge-primary"><?=rupiah($pelapak['saldo'])?></span>
                <br>
                <br>
            </a>

            <div class="col-sm-1"></div>

        </div>
    </div>
</section>

