<div class="row">
	<div class="col-md-12">
		
<div class="card border border-primary">

     <div class="card-header border-bottom border-primary">	         
     <h2 class="float-left">Data Cuti Pegawai</h2>
     <?php if ($this->session->userdata('session_level')=='admin'): ?>
     <button class="btn btn-primary float-right" data-toggle="modal" data-target="#vertical-modal"><i class="icon icon-plus"></i> Tambah Cuti Baru</button>
    <?php endif ?>
     </div>                        

                 
     <div class="card-body">              
                                         
         <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;">No</th>
                                                <th>Nama Pegawai</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Jenis Cuti</th>
                                                <th>Status</th>
                                                <th class="text-center"><i class="icon icon-gears"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php 
											$no = 1;
											foreach ($cuti as $val): ?>
                                            <tr class="gradeX">
                                                <td style="width: 30px;"><?= $no ?></td>
                                                <td><?= $val['pegawai_nama'] ?></td>
                                                <td><?= date_indo($val['cuti_tgl_mulai']) ?></td>
                                                <td><?= date_indo($val['cuti_tgl_akhir']) ?></td>
                                                <td><?= $val['cuti_jenis'] ?></td>
                                                <td
                                                <?php if ($val['cuti_status']=='waiting'){ ?>
                                                    class="text-warning"
                                                <?php }elseif ($val['cuti_status']=='disetujui') { ?>
                                                    class="text-success"
                                                <?php }else { ?>
                                                    class="text-danger"
                                                <?php } ?>
                                                
                                                ><span class="animated fadeIn infinite"><?= $val['cuti_status'] ?></span></td>


                                                <?php if ($this->session->userdata('session_level')=='pimpinan'): ?>
                                                    <td class="text-center">

                                                        <a href="<?= base_url() ?>konfirmasi/cuti/<?= $val['cuti_id'] ?>" class="btn btn-success btn-sm"  name="konfirmasi" onclick="return confirm('Konfirmasi ?')" title="Konfirmasi"><i class="fa fa-check" ></i></a>

                                                        <a href="<?= base_url() ?>tolak/cuti/<?= $val['cuti_id'] ?>" class="btn btn-danger btn-sm" name="tolak" onclick="return confirm('Tolak ?')" title="Tolak"><i class="fa fa-close"></i></a>
                                                        
                                                    </td>
                                                <?php endif ?>

                                                <?php if ($this->session->userdata('session_level')=='supervisor'): ?>
                                                    <td class="text-center">
                                                        <?php if ($val['cuti_acc_supervisor']==1){ ?>
                                                            <a href="<?= base_url() ?>set_waiting/cuti/<?= $val['cuti_id'] ?>" class="btn btn-warning btn-sm"  name="batalkan" onclick="return confirm('Konfirmasi ?')" title="Batalkan"><i class="fa fa-close" ></i> Batalkan</a>
                                                        <?php }else{ ?>
                                                        <a href="<?= base_url() ?>konfirmasi/cuti/<?= $val['cuti_id'] ?>" class="btn btn-success btn-sm"  name="konfirmasi" onclick="return confirm('Konfirmasi ?')" title="Konfirmasi"><i class="fa fa-check" ></i></a>
                                                        <a href="<?= base_url() ?>tolak/cuti/<?= $val['cuti_id'] ?>" class="btn btn-danger btn-sm" name="tolak" onclick="return confirm('Tolak ?')" title="Tolak"><i class="fa fa-close"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                <?php endif ?>

                                                 <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                                <td class="text-center">
                                                	<a href="<?= base_url() ?>cuti/edit/<?= $val['cuti_id'] ?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon icon-edit"></i></a>
                                                	<a href="<?= base_url() ?>cuti/delete/<?= $val['cuti_id'] ?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="icon icon-trash"></i></a>
                                                    <?php if ($val['cuti_acc_supervisor']==1 && $val['cuti_acc_pimpinan']==1){ ?>
                                                    <a href="<?= base_url() ?>cuti/cetak/<?= $val['cuti_id'] ?>" class="btn btn-success btn-sm"  title="Cetak"><i class="fa fa-print" ></i></a>
                                                    <?php } ?>
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
     <div class="modal-dialog modal-dialog-centered " role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Cuti</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>cuti/create" method="post">
					
						
							<div class="form-group">
								<label for="">Pilih Pegawai</label>
								<input list="pegawai" name="cuti_pegawai_id"  required class="form-control" autocomplete="off">	
								
								<datalist id="pegawai">
									<?php foreach ($pegawai as $value): ?>
										<option value="<?= $value['pegawai_id'] ?>"><?= $value['pegawai_nama'] ?>  (<?= $value['pegawai_nik'] ?>)</option>
									<?php endforeach ?>
								</datalist>
							</div>
						
						<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Mulai</label>
								<input type="date" class="form-control" required name="cuti_tgl_mulai">
							</div>
							</div>
	
							<div class="col-md-6">
							<div class="form-group">
								<label for="">Sampai Tanggal</label>
								<input type="date" class="form-control" required name="cuti_tgl_akhir">
							</div>
							</div>
						</div>
						<div class="form-group">
								<label for="">Jenis Cuti - <a href="<?= base_url() ?>info/jenis_cuti" target="_blank" data-toggle="tooltip" data-placement="right" title="" data-original-title="Klik disini untuk melihat keterangan cuti"><i class="icon-info-sign"></i></a></label>
								<select name="cuti_jenis" required class="form-control">
									<option disabled selected>-Pilih Jenis Cuti-</option>
									<option>Cuti Tahunan</option>
									<option>Cuti Besar</option>
									<option>Cuti Sakit</option>
									<option>Cuti Bersalin</option>
									<option>Cuti Alasan Penting</option>
									<option>Cuti diluar tanggungan Negara</option>
								</select>	

						</div>

						<div class="form-group">
								<label for="">Keterangan</label>
								<textarea name="cuti_keterangan" id="" rows="3" class="form-control"></textarea>
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

