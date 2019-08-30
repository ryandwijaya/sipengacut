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
                                                <td><a href="<?= base_url() ?>pegawai/detail/<?= $val['pegawai_id'] ?>" target="_blank"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik disini untuk melihat detail pegawai"><?= $val['pegawai_nama'] ?></a></td>
                                                <td><?= $val['pegawai_nik'] ?></td>
                                                
                                                <td class="text-center">
                                                	<a href="<?= base_url() ?>pegawai/detail/<?= $val['pegawai_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-right"></i></a>
                                                </td>

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

