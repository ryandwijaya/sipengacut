<div class="row">
	<div class="col-md-12">
		
<div class="card border border-primary">

     <div class="card-header border-bottom border-primary">	         
     <h2 class="float-left">Data Cuti Pegawai</h2>
     
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
                                                <td class="text-center">
                                                    <a href="<?= base_url() ?>cuti/cetak/<?= $val['cuti_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
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



