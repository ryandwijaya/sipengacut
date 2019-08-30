<div class="row mb-1">
<div class="col-md-12">
<?php if ($this->session->userdata('session_level')=='admin'): ?>
<button class="btn btn-info btn-sm float-right"   onclick="printContent('print')"><i class="fa fa-print"></i></button>
<?php endif ?>
</div>
</div>
<div class="card" id="print">
	<div class="card-header">
		
	</div>
	<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
	<div class="card-body" style="font-size: 12pt" >
		<div class="row">
						<div class="col-md-12 text-center border">
							<div class="row">
								<div class="col-md-12">
									<img src="<?= base_url() ?>assets/images/logo_cina.png" alt="" width="100%">
								</div>
							</div>
							<br><br>
							<h3>JL. Jenderal Sudirman No.408-410, Pekanbaru. Telp : 0761 (26288)</h3>
						</div>
		</div>
					<hr style="border: 2px solid black;">
<div class="row">
	<div class="col-md-4 text-center border">
		<img src="<?= base_url() ?>uploads/<?= $pegawai['pegawai_foto'] ?>" alt="no image" width="200" height="200"><br>
		<span class="text-primary" title="nama pegawai"><?= $pegawai['pegawai_nama'] ?></span><br>
        <span class="text-default" title="jabatan"><?= $pegawai['jabatan_nama'] ?></span><br>
		<span class="text-default" title="nik"><?= $pegawai['pegawai_nik'] ?></span>
	</div>
	<div class="col-md-8 p-8">
		<table>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_nik'] ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_nama'] ?></td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_tempat_lahir'] ?> , <?= date_indo($pegawai['pegawai_tgl_lahir']) ?> </td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_agama'] ?></td>
			</tr>

			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_jk'] ?></td>
			</tr>

			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_alamat'] ?></td>
			</tr>

			<tr>
				<td>Nomor HP</td>
				<td>:</td>
				<td><?= $pegawai['pegawai_no_hp'] ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><span 
					<?php if ($pegawai['pegawai_status']=='Aktif'){ ?>
						class="text-success"
					<?php }else{ ?>
						class="text-danger"
					<?php } ?>
					><?= $pegawai['pegawai_status'] ?></span></td>
			</tr>

		</table>
	</div>
</div>
<div class="row mt-4 border">
	<div class="col-md-12">
		<h4><b>Data Hubungan</b></h4>
				<?php $no=1; foreach ($hubungan as $hub): ?>
                    <div class="row">
                        <div class="col-md-12">
                        <span class="float-left"><?= $no ?>. <?= $hub['hubungan_nama'] ?></span>
                        <span class="float-right"> <?= $hub['hubungan_status'] ?></span>
                        </div>
                    </div>
                <?php $no++; endforeach ?>
	</div>
</div>
<div class="row border p-2">
	<div class="col-md-12">
		<h4><b>Data Pendidikan</b></h4>
				<?php $no=1; foreach ($pendidikan as $a): ?>
                    <div class="row">
                        <div class="col-md-12">
                        <span><?= $no ?>. <?= $a['pendidikan_tingkat'] ?> Jurusan <?= $a['pendidikan_jurusan'] ?> di <b><?= $a['pendidikan_nama_pt'] ?></b></span>
                        <span class="float-right">No. Ijazah [<?= $a['pendidikan_no_ijazah'] ?>]</span>
                        </div>
                    </div>
                <?php $no++; endforeach ?>
	</div>
	
</div>

<div class="row border p-2">
	<div class="col-md-6 border-right">
		<h4><b>Data Penghargaan</b></h4>
		<?php foreach ($penghargaan as $p): ?>
			<div class="row">
				<div class="col-md-12">
					<span><?= $p['penghargaan_nama'] ?></span>
					<span class="float-right" title="Tahun"><?= $p['penghargaan_tahun'] ?></span>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="col-md-6">
		<h4><b>Data Pelatihan</b></h4>
		<?php foreach ($pelatihan as $pel): ?>
			<div class="row">
				<div class="col-md-12">
					<span><?= $pel['pelatihan_nama'] ?> [<?= $pel['pelatihan_tahun'] ?>]</span>
					<span class="float-right" title="waktu pelatihan"><i class="fa fa-clock-o" ></i> <?= $pel['pelatihan_jumlah_jam'] ?> jam</span>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<div class="row border p-2">
	<div class="col-md-12">
		<h4><b>Data Seminar</b></h4>
		<?php foreach ($seminar as $d): ?>
			<span><?= $no ?>. <?= $d['seminar_nama'] ?> di <b><?= $d['seminar_tempat'] ?></b></span>
			<span class="float-right" title="Tanggal Seminar"><i class="fa fa-calendar"></i> <?= $d['seminar_tgl_mulai'] ?></span>
		<?php endforeach ?>
	</div>
</div>





</div>
</div>