<div class="row">
	<div class="col-md-12">
		
<div class="card border border-primary">

     <div class="card-header border-bottom border-primary">	         
     <h2 class="float-left">Data Pegawai</h2>
     <?php if ($this->session->userdata('session_level')=='admin'): ?>
     <button class="btn btn-primary float-right" data-toggle="modal" data-target="#vertical-modal"><i class="icon icon-plus"></i> Tambah Pegawai</button>
     <?php endif ?>
     </div>                        
	

                 
     <div class="card-body">              
                                         
         <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;">No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th style="width: 40px;">Jenis Kelamin</th>
                                                <th style="width: 140px;">Jabatan</th>
                                                <th>Tgl Diterima</th>
                                                <th class="text-center">Status</th>
                                                <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                                <th class="text-center"><i class="icon icon-gears"></i></th>
                                            	<?php endif ?>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php 
											$no = 1;
											foreach ($pegawai as $val): ?>
											<?php 
												$jabatan = $this->Pegawai->getJabatanById($val['pegawai_jabatan']);
											?>

                                            <tr class="gradeX">
                                                <td style="width: 30px;"><?= $no ?></td>
                                                <td><a href="<?= base_url() ?>biodata/<?= $val['pegawai_id'] ?>" target="_blank"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik disini untuk melihat detail pegawai"><?= $val['pegawai_nama'] ?></a></td>
                                                <td><?= $val['pegawai_nik'] ?></td>
                                                <td><?= $val['pegawai_jk'] ?></td>
                                                <td><?= $jabatan['jabatan_nama'] ?></td>
                                                <td><?= date_indo($val['pegawai_tgl_diterima']) ?></td>
                                                <td <?php if ($val['pegawai_status']=='Cuti'){ ?>
                                                	class = "text-center text-danger"
                                                <?php } elseif ($val['pegawai_status']=='Aktif'){ ?>
                                                    class = "text-center text-success"
                                                <?php } ?>
                                                >
                                                <?= $val['pegawai_status'] ?></td>
                                                <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                                <td class="text-center">
                                                	<a href="<?= base_url() ?>pegawai/edit/<?= $val['pegawai_id'] ?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon icon-edit"></i></a>
                                                	<a href="<?= base_url() ?>pegawai/delete/<?= $val['pegawai_id'] ?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="icon icon-trash"></i></a>
                                                	
                                                </td>
                                            <?php endif ?>

                                            </tr>
											<?php $no++; endforeach ?>
                                            
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /tables -->
                                    
     </div>                                                        
</div>		



	</div>
</div>


<!-- Modal -->
 <div class="modal fade" id="vertical-modal" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Pegawai</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 	 <?php echo form_open_multipart('pegawai/create');?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Pegawai</label>
								<input type="text" class="form-control" name="pegawai_nama">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="pegawai_nik">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tempat Lahir</label>
									<input type="text" class="form-control" name="pegawai_tempat_lahir">
								</div>
						</div>

						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tanggal Lahir</label>
									<input type="date" class="form-control" name="pegawai_tgl_lahir">
								</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Agama</label>
									<select name="pegawai_agama" class="form-control">
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
									<textarea type="text" class="form-control" name="pegawai_alamat"></textarea>
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Tgl Diterima</label>
									<input type="date" class="form-control" name="pegawai_tgl_diterima">	
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
								<label for="">Nomor HP</label>
								<input type="text" name="pegawai_nope" class="form-control">
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
								<label for="">Status</label>
								<select name="pegawai_status" class="form-control">
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
							 ?>
								<div class="form-group">
								<label for="">Jabatan</label>
								<select name="pegawai_jabatan" id="" class="form-control">
									<option selected disabled>Pilih Jabatan</option>
									<?php foreach ($jabatan as $a): ?>
										<option value="<?= $a['jabatan_id'] ?>"><?= $a['jabatan_nama'] ?></option>
									<?php endforeach ?>
								</select>
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
								<label for="">Foto</label>
								<input type="file" name="userfile" class="form-control">
								</div>
						</div>
					</div>

	


                 
             </div>
            <!-- /modal body -->

            <!-- Modal Footer -->
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary btn-sm"
                         data-dismiss="modal">Close
                 </button>
                 <button type="submit" name="submit" class="btn btn-primary btn-sm">Save
                 </button>
             </div>
             </form>
            <!-- /modal footer -->

         </div>
        <!-- /modal content -->

     </div>
 </div>
<!-- /modal -->
