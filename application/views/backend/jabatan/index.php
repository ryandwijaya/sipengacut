<div class="row">
	<div class="col-md-12">
		
<div class="card border border-primary">

     <div class="card-header border-bottom border-primary">	         
     <h2 class="float-left">Data Jabatan</h2>
     <?php if ($this->session->userdata('session_level')=='admin'): ?>
     <button class="btn btn-primary float-right" data-toggle="modal" data-target="#vertical-modal"><i class="icon icon-plus"></i> Tambah Jabatan</button>
 <?php endif ?>
     </div>                        

                 
     <div class="card-body">              
                                         
         <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;">No</th>
                                                <th>Nama Jabatan</th>
                                                <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                                <th class="text-center"><i class="icon icon-gears"></i></th>
                                                <?php endif ?>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php 
											$no = 1;
											foreach ($jabatan as $val): ?>
                                            <tr class="gradeX">
                                                <td style="width: 30px;"><?= $no ?></td>
                                                <td><?= $val['jabatan_nama'] ?></td>
                                                
                                                <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                                    
                                                
                                                <td class="text-center">
                                                	<a href="<?= base_url() ?>jabatan/edit/<?= $val['jabatan_id'] ?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon icon-edit"></i></a>
                                                	<a href="<?= base_url() ?>jabatan/delete/<?= $val['jabatan_id'] ?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="icon icon-trash"></i></a>
                                                	
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
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Jabatan</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>jabatan/create" method="post">
					
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Nama Jabatan</label>
								<input type="text" class="form-control" name="jabatan_nama">
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
