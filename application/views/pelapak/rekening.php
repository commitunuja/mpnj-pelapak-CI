
<div class="col-12">
<h3>Data Rekening</h3>


<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm">Create</a>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buar Rekening Baru</h5>
                    
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?=base_url('pelapak/tambah_rekening')?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for=""><b> Nama Bank </b></label>
                            <input type="text" name="nama_bank" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""><b> Nomer Rekening </b></label>
                            <input type="number" name="nomor_rekening" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label for=""><b> Atas Nama </b></label>
                            <input type="atas_nama" name="atas_nama" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
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


<br><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Bank</th>
            <th>Nomor Rekening</th>
            <th>Atas Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($rekening_pelapak->num_rows() > 0){
            $no1=1;
            foreach ($rekening_pelapak->result() as $t) {
                ?>
                <tr>
                    <td><?=$no1?></td>
                    <td><?=$t->nama_bank?></td>
                    <td><?=$t->nomor_rekening?></td>
                    <td><?=$t->atas_nama?></td>
                  
                    <td>
                        
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$t->id_rekening?>">
                            <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="hapus<?=$t->id_rekening?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                        <a href="<?=base_url('pelapak/hapus_rekening/'.$t->id_rekening)?>" class="btn btn-danger">Iya</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$t->id_rekening?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="edit<?=$t->id_rekening?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nama Bank : <?=$t->nama_bank?></h5>
                                           
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="<?=base_url('pelapak/update_rekening/'.$t->id_rekening)?>" method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12">

                                                    <div class="form-group">
                                                        <label for=""><b> Nama Bank </b></label>
                                                        <input type="text" name="nama_bank" value="<?=$t->nama_bank?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for=""><b> Nomer Rekening </b></label>
                                                        <input type="number" name="nomor_rekening" value="<?=$t->nomor_rekening?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for=""><b> Atas Nama </b></label>
                                                        <input type="atas_nama" name="atas_nama" value="<?=$t->atas_nama?>" required class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
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