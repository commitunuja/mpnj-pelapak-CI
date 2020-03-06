<h3>Profile</h3>

<table width="100%" class="table">
	<tr>
		<th>
			Username
		</th>
		<td>
			<?=$pelapak['username']?>
		</td>
	</tr>
	<tr>
		<th>
			Status Official
		</th>
		<td>
        <?=$pelapak['status_official']?>
		</td>
	</tr>
	<tr>
		<th>
			Nama Toko
		</th>
		<td>
        <?=$pelapak['nama_toko']?>
		</td>
	</tr>
	<tr>
		<th>
			Alamat Toko
		</th>
		<td>
        <?=$pelapak['alamat_toko']?>
		</td>
	</tr>
	<tr>
		<th>
			Alamat Lengkap
		</th>
		<td>
        <?=$pelapak['alamat']?>
		</td>
	</tr>
	<tr>
		<th>
			Kode Pos
		</th>
		<td>
        <?=$pelapak['kode_pos']?>
		</td>
	</tr>
	<tr>
		<th>
			Nomor Handphone
		</th>
		<td>
        <?=$pelapak['nomor_hp']?>
		</td>
	</tr>
	<tr>
		<th>
			Email
		</th>
		<td>
        <?=$pelapak['email']?>
		</td>
	</tr>
	<tr>
		<th>
			Rating
		</th>
		<td>
        <?=$pelapak['rating']?>
		</td>
	</tr>

	<tr>
		<th>
			Status
		</th>
		<td>
        <?=$pelapak['status']?>
		</td>
    </tr>
    <tr>
		<th>
			Tgl Daftar
		</th>
		<td>
        <?=date('d, F Y', strtotime($pelapak['created_at']))?>
		</td>
    </tr>
   

</table>
