<div class="row">
	<div class="col-md-12">
		<form action="<?= base_url() ?>pegawai/edit/<?= $pegawai['pegawai_id'] ?>" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Pegawai</label>
								<input type="text" class="form-control" name="pegawai_nama" value="<?= $pegawai['pegawai_nama'] ?>">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="pegawai_nik" value="<?= $pegawai['pegawai_nik'] ?>">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tempat Lahir</label>
									<input type="text" class="form-control" name="pegawai_tempat_lahir" value="<?= $pegawai['pegawai_tempat_lahir'] ?>">
								</div>
						</div>

						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tanggal Lahir</label>
									<input type="date" class="form-control" name="pegawai_tgl_lahir" value="<?= $pegawai['pegawai_tgl_lahir'] ?>">
								</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Agama</label>
									<select name="pegawai_agama" class="form-control">
										<option value="<?= $pegawai['pegawai_agama'] ?>"><?= $pegawai['pegawai_agama'] ?></option>
										<option>Islam</option>
										<option>Kristen</option>
										<option>Budha</option>
										<option>Hindu</option>
										<option>Katolik</option>
									</select>
								</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="pegawai_jk" id="" class="form-control">
									<option value="<?= $pegawai['pegawai_jk'] ?>"><?= $pegawai['pegawai_jk'] ?></option>
									<option>Pria</option>
									<option>Wanita</option>
								</select>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Alamat</label>
									<textarea type="text" class="form-control" name="pegawai_alamat" ><?= $pegawai['pegawai_alamat'] ?></textarea>
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tgl Diterima</label>
									<input type="date" class="form-control" name="pegawai_tgl_diterima" value="<?= $pegawai['pegawai_tgl_diterima'] ?>">	
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
								<label for="">Nomor HP</label>
								<input type="text" name="pegawai_nope" class="form-control" value="<?= $pegawai['pegawai_no_hp'] ?>">
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
								<label for="">Status</label>
								<select name="pegawai_status" class="form-control">
									<option value="<?= $pegawai['pegawai_status'] ?>"><?= $pegawai['pegawai_status'] ?></option>
									<option value="Aktif" class="text-success">Aktif</option>
									<option value="Cuti" class="text-danger">Cuti</option>
								</select>
								</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<?php 
							$jabatan = $this->Pegawai->getJabatan();
							$jabatan_id = $this->Pegawai->getJabatanById($pegawai['pegawai_jabatan']);
							 ?>
								<div class="form-group">
								<label for="">Jabatan</label>
								<select name="pegawai_jabatan" id="" class="form-control">
									<option value="<?= $pegawai['pegawai_jabatan'] ?>"><?= $jabatan_id['jabatan_nama'] ?></option>
									<?php foreach ($jabatan as $a): ?>
										<option value="<?= $a['jabatan_id'] ?>"><?= $a['jabatan_nama'] ?></option>
									<?php endforeach ?>
								</select>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-success btn-sm float-right" type="submit" name="submit">Update</button>
							<a href="javascript:history.back()" class="btn btn-light btn-sm float-right mr-3">Cancel</a>
						</div>
					</div>
				</form>
	</div>
</div>