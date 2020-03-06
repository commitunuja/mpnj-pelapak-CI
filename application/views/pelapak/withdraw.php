
<div class="col-12">
<h3>Withdraw</h3>

<div class="alert alert-info"> 
    
    <div class="card-body">
        <h4 class="card-title">Saldo</h4>
        <p class="card-text"><?=rupiah($pelapak['saldo'])?></p>

       
    </div>

    
</div>

<div class="text-right">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#saldowithdraw">
        Withdraw
    </button>
    
    <!-- Modal -->
    <div class="modal fade text-left" id="saldowithdraw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog text-left" role="document">
            <div class="modal-content text-left">
                <div class="modal-header">
                    <h5 class="modal-title">Withdraw Sekarang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('pelapak/simpan_withdraw/'.$this->session->userdata('id_pelapak'))?>" method="post">
                        <div class="form-group">
                          <label for="">Saldo Anda</label>
                          <input type="number" value="<?=$pelapak['saldo']?>" id="saldo-anda" readonly class="form-control" aria-describedby="helpId">
                          
                        </div>
                        <div class="form-group" id="fg-withdraw">
                          <label for="">Masukkan nominal yang akan diambil : </label>
                          <input type="number" name="nominal" id="withdraw" required class="form-control is-invalid" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Tidak boleh melebihi saldo anda !</small>
                        </div>
                        <div class="form-group">
                            <label for=""><b> Transfer ke rekening : </b></label>
                            <select name="rekening_pelapak_id" class="form-control" required>
                                <option value="" readonly>-- Pilih Salah Satu --</option>
                                <?php 
                                $rekening = $this->db->where('pelapak_id', $this->session->userdata('id_pelapak'))->get('rekening_pelapak');
                                if($rekening->num_rows() > 0){
                                    foreach ($rekening->result() as $rek) {
                                        ?>
                                            <option value="<?=$rek->id_rekening?>"><?=$rek->nama_bank?> | <b><?=$rek->nomor_rekening?></b> | (<?=$rek->atas_nama?>) </option>
                                        <?php
                                    } 
                                } ?>
                            </select>
                        </div>        
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" id="submit-withdraw" disabled class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="row" style="margin: 20px">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tgl</th>
                <th>Nominal</th>
                <th>Ke Rekening</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($withdraw->num_rows() > 0){
                    $no11=1;
                    foreach ($withdraw->result() as $w) {
                        ?>
                            <tr>
                                <td><?=$no11?></td>
                                <td><?=date('d, F Y', strtotime($w->tgl))?></td>
                                <td><?=rupiah($w->nominal)?></td>
                                <td>
                                    <?php
                                        $rek = $this->db->where('id_rekening', $w->rekening_pelapak_id)->get('rekening_pelapak')->row_array();
                                        ?>
                                        <?=$rek['nama_bank']?> | <b><?=$rek['nomor_rekening']?></b> | (<?=$rek['atas_nama']?>)
                                </td>
                                <td>
                                    <small class="" style="padding: 5px 10px; border: 1px solid #777; border-radius: 10px;">
                                        <?=$w->status?>
                                    </small>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#batal<?=$w->id_withdraw?>" class="btn btn-warning btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Batalkan</a>
                                    
                                    <div class="modal fade" id="batal<?=$w->id_withdraw?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                
                                                <div class="modal-body">
                                                    <h4>Apakah anda yakin untuk membatalkan ?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    <a href="<?=base_url('pelapak/batal_withdraw/'.$w->id_withdraw)?>" type="button" class="btn btn-warning">Iya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        $no11++;
                    }
                }else{
                    ?>
                    
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>


</div>

<script>

    $(document).ready(function(){
        $('#withdraw').keyup(function(e){
            e.preventDefault();
            var jumlah = parseInt($(this).val())
            var saldo = parseInt($('#saldo-anda').val())

            if(jumlah > saldo ){
                $('#fg-withdraw').addClass('has-error');
                $('#fg-withdraw').removeClass('has-success');
                $('#submit-withdraw').attr('disabled', true)
            }else{
                $('#fg-withdraw').addClass('has-success');
                $('#fg-withdraw').removeClass('has-error');
                $('#submit-withdraw').attr('disabled', false)
            }
        })
    })
</script>