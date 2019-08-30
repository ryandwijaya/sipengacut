<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<button class="btn btn-sm btn-success float-right" onclick="printContent('print')"><i class="fa fa-print"></i></button>
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
			<div class="card-body" id="print">
					<div class="row">
						<div class="col-md-12 p-8">
							
						
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
						<div class="col-md-12 mt-5 mb-3">
							Laporan Cutis 

						</div>
					</div>
					<table class="table table-striped table-bordered table-hover">
					<tr>		
					<th>Nama Pegawai</th>
					<th>Tgl Cuti</th>
					<th>Sampai Tgl</th>
					<th>Jenis Cuti</th>
					<th>Keterangan</th>
					<th>Pengganti</th>
					<th>Sisa Cuti</th>

					
					</tr>
					<?php foreach ($pengajuan as $var): ?>
						<?php $pegawai = $this->Pegawai->getPegawaiById($var['cuti_pengganti']); ?>
						<?php 
            $pengacut = $this->Cuti->get_pengajuan($var['pegawai_id']);
            $total = 0;
            foreach ($pengacut as $key => $val) {
                $tgl_cuti[$key] = new DateTime($val['cuti_tgl_mulai']);
                $tgl_selesai[$key] = new DateTime($val['cuti_tgl_akhir']);

                $selisih[$key] = $tgl_cuti[$key]->diff($tgl_selesai[$key])->format("%a");

                $total = $total + $selisih[$key];


            }
				?>
					<tr>
						<td><?= $var['pegawai_nama'] ?></td>
						<td><?= date_indo($var['cuti_tgl_mulai']) ?></td>
						<td><?= date_indo($var['cuti_tgl_akhir']) ?></td>
						<td><?= $var['cuti_jenis'] ?></td>
						<td><?= $var['cuti_keterangan'] ?></td>
						<td><?= $pegawai['pegawai_nama'] ?></td>
						<td><?= 12-$total ?> hari</td>
					</tr>
					<?php endforeach ?>
					</table>
					<br><br><br>
					<div class="row mt-7">
						<div class="col-md-12">
							<div class="block-right float-right">
								<?php $date = Date("Y-m-d"); ?>
								<span>Pekanbaru, <?= date_indo($date); ?></span>
								<br>
								<br>
								<br>
								<br>
								<span>..................</span><br>
								<span>NIK. </span>
							</div>
						</div>
					</div>

				</div>
				</div>


			</div>
		</div>
	</div>
</div>