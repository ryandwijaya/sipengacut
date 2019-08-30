<div class="row">
    <div class="col-md-4">
        <div class="card bg-light">

            <h4 class="card-header">Profil</h4>
           

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?= base_url() ?>uploads/<?= $pegawai['pegawai_foto'] ?>" alt="no image" width="200" height="200">
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-md-12 text-center">
                        <span class="text-primary" title="nama pegawai"><?= $pegawai['pegawai_nama'] ?></span><br>
                        <span class="text-default" title="jabatan"><?= $pegawai['jabatan_nama'] ?></span><br>
                        <span class="text-default" title="nik"><?= $pegawai['pegawai_nik'] ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            
                <h4 class="card-header">Detail informasi pegawai</h4>
           
            <div class="card-body">
                <div class="tabs-container">

                                    <!-- Tab Navigation -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#hubungan" role="tab" aria-controls="tab-pane-2" aria-selected="false"><i class="fa fa-group"></i>Hubungan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" data-toggle="tab" href="#penghargaan" role="tab" aria-controls="tab-pane-2" aria-selected="false"><i class="fa fa-trophy"></i>Penghargaan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" data-toggle="tab" href="#pelatihan" role="tab" aria-controls="tab-pane-2" aria-selected="false"><i class="fa fa-universal-access"></i>Pelatihan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="tab-pane-1" aria-selected="true"><i class="fa fa-graduation-cap"></i>
                                            Pendidikan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" data-toggle="tab" href="#seminar" role="tab" aria-controls="tab-pane-2" aria-selected="false"><i class="fa fa-flag"></i>Seminar
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /tab navigation -->

                                    <!-- Tab Content -->
                                    <div class="tab-content">

                                        <!-- Tab Pane -->
                                        <div id="hubungan" class="tab-pane active show">
                                            <div class="card-body">
                                                <?php if ($this->session->userdata('session_level')=='pegawai'): ?> 
                                                <button data-toggle="modal" data-target="#modal1" class="btn btn-primary btn-sm mb-2" title="Tambah Data Hubungan"><i class="icon icon-plus"></i></button>
                                                <?php endif ?>
                                                
                                                <?php if (count($hubungan)>0){ ?>
                                                    
                                                        <?php $no=1; foreach ($hubungan as $hub): ?>
                                                            <div class="row p-4 border">
                                                                <div class="col-md-12">
                                                                <span class="float-left"><?= $no ?>. <?= $hub['hubungan_nama'] ?> => <?= $hub['hubungan_status'] ?></span>

                                                                <?php if ($this->session->userdata('session_id')==$hub['hubungan_pegawai_id']): ?>    
                                                                <a href="<?= base_url() ?>delete/hubungan/<?= $hub['hubungan_id'] ?>" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm float-right"><i class="fa fa-close"></i></a>

                                                                <?php endif ?>
                                                                </div>
                                                            </div>
                                                        <?php $no++; endforeach ?>
                                                            
                                                <?php }else{ ?>
                                                    <br>
                                                    <span class="text-muted">Tidak ada data !</span>
                                                <?php } ?>

                                                
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                        <!-- Tab Pane -->
                                        <div id="penghargaan" class="tab-pane show">
                                            <div class="card-body">
                                                <?php if ($this->session->userdata('session_level')=='pegawai'): ?>
                                                <button data-toggle="modal" data-target="#modal2" class="btn btn-primary btn-sm mb-2" title="Tambah Data Penghargaan"><i class="icon icon-plus"></i></button>
                                                <?php endif ?>
                                                <?php if (count($penghargaan)>0){ ?>
                                                    
                                                        <?php foreach ($penghargaan as $a): ?>
                                                            <div class="row p-4 border">
                                                                <div class="col-md-12">
                                                                <span class="float-left"><?= $a['penghargaan_nama'] ?> => <?= $a['penghargaan_tahun'] ?></span>


                                                                <?php if ($this->session->userdata('session_id')==$a['penghargaan_pegawai_id']): ?>
                                                                <a href="<?= base_url() ?>delete/penghargaan/<?= $a['penghargaan_id'] ?>" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm float-right"><i class="fa fa-close"></i></a>
                                                                <?php endif ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                            
                                                <?php }else{ ?>
                                                    <br>
                                                    <span class="text-muted">Tidak ada data !</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                        <!-- Tab Pane -->
                                        <div id="pelatihan" class="tab-pane show">
                                            <div class="card-body">
                                                <?php if ($this->session->userdata('session_level')=='pegawai'): ?>
                                                <button data-toggle="modal" data-target="#modal3" class="btn btn-primary btn-sm mb-2" title="Tambah Data Pelatihan"><i class="icon icon-plus"></i></button>
                                                <?php endif ?>
                                                <?php if (count($pelatihan)>0){ ?>
                                                    
                                                        <?php foreach ($pelatihan as $b): ?>
                                                            <div class="row p-4 border">
                                                                <div class="col-md-12">
                                                                <span class="float-left"><?= $b['pelatihan_nama'] ?> => <?= $b['pelatihan_tahun'] ?> (<?= $b['pelatihan_jumlah_jam'] ?> Jam) </span>

                                                                <?php if ($this->session->userdata('session_id')==$b['pelatihan_pegawai_id']): ?>
                                                                <a href="<?= base_url() ?>delete/pelatihan/<?= $b['pelatihan_id'] ?>" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm float-right"><i class="fa fa-close"></i></a>
                                                            <?php endif ?> 
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                            
                                                <?php }else{ ?>
                                                    <br>
                                                    <span class="text-muted">Tidak ada data !</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                        <!-- Tab Pane -->
                                        <div id="pendidikan" class="tab-pane show">
                                            <div class="card-body">
                                                <?php if ($this->session->userdata('session_level')=='pegawai'): ?>
                                                <button data-toggle="modal" data-target="#modal4" class="btn btn-primary btn-sm mb-2" title="Tambah Data Pendidikan"><i class="icon icon-plus"></i></button>
                                                <?php endif ?>
                                                <?php if (count($pendidikan)>0){ ?>
                                                    
                                                        <?php foreach ($pendidikan as $c): ?>
                                                            <div class="row p-4 border">

                                                                <div class="col-md-12">
                                                                <?= $c['pendidikan_tingkat'] ?>, Jurusan <?= $c['pendidikan_jurusan'] ?> di <?= $c['pendidikan_nama_pt'] ?> , (No.Ijazah : <?= $c['pendidikan_no_ijazah'] ?>)
    
                                                                <?php if ($this->session->userdata('session_id')==$c['pendidikan_pegawai_id']): ?>
                                                                <a href="<?= base_url() ?>delete/pendidikan/<?= $c['pendidikan_id'] ?>" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm float-right"><i class="fa fa-close"></i></a>
                                                            <?php endif ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                            
                                                <?php }else{ ?>
                                                    <br>
                                                    <span class="text-muted">Tidak ada data !</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                        <!-- Tab Pane -->
                                        <div id="seminar" class="tab-pane show">
                                            <div class="card-body">
                                                <?php if ($this->session->userdata('session_level')=='pegawai'): ?>
                                                <button data-toggle="modal" data-target="#modal5" class="btn btn-primary btn-sm mb-2" title="Tambah Data Seminar"><i class="icon icon-plus"></i></button>
                                                <?php endif ?>
                                                <?php if (count($seminar)>0){ ?>
                                                    
                                                        <?php foreach ($seminar as $d): ?>
                                                            <div class="row p-4 border">
                                                                <div class="col-md-12">
                                                                <?= $d['seminar_nama'] ?> di <?= $d['seminar_tempat'] ?> [ <?= date_indo($d['seminar_tgl_mulai']) ?> ]
    
                                                                <?php if ($this->session->userdata('session_id')==$d['seminar_pegawai_id']): ?>
                                                                <a href="<?= base_url() ?>delete/seminar/<?= $d['seminar_id'] ?>" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm float-right"><i class="fa fa-close"></i></a>
                                                            <?php endif ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                            
                                                <?php }else{ ?>
                                                    <br>
                                                    <span class="text-muted">Tidak ada data !</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                    </div>
                                    <!-- /tab content -->

                                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Hubungan -->
 <div class="modal fade" id="modal1" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Hubungan</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>hubungan/create/<?= $this->uri->segment(3) ?>" method="post">
                    
                        <div class="row">
                            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="hubungan_nama">
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="hubungan_status" class="form-control">
                                    <option>Anak</option>
                                    <option>Istri</option>
                                    <option>Suami</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="hubungan_tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="hubungan_tgl_lahir">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <input type="text" class="form-control" name="hubungan_pendidikan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pekerjaan</label>
                                <input type="text" class="form-control" name="hubungan_pekerjaan">
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


<!-- Modal Penghargaan -->
 <div class="modal fade" id="modal2" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Penghargaan</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>penghargaan/create/<?= $this->uri->segment(3) ?>" method="post">
                    
                        <div class="row">
                            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Penghargaan</label>
                                <input type="text" class="form-control" name="penghargaan_nama">
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="text" name="penghargaan_tahun" class="form-control">
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

<!-- Modal Pelatihan -->
 <div class="modal fade" id="modal3" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Pelatihan</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>pelatihan/create/<?= $this->uri->segment(3) ?>" method="post">
                    
                        <div class="row">
                            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Pelatihan</label>
                                <input type="text" class="form-control" name="pelatihan_nama">
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="number" name="pelatihan_tahun" max="9999" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Jam</label>
                                <input type="number" name="pelatihan_jumlah_jam" class="form-control">
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


<!-- Modal Pendidikan -->
 <div class="modal fade" id="modal4" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Pendidikan</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>pendidikan/create/<?= $this->uri->segment(3) ?>" method="post">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Perguruan Tinggi</label>
                                    <input type="text" name="pendidikan_nama_pt" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tingkat</label>
                                <input type="text" name="pendidikan_tingkat" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input type="text" name="pendidikan_jurusan" class="form-control">
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <textarea name="pendidikan_lokasi" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Ijazah</label>
                                <input type="text" name="pendidikan_no_ijazah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Ijazah</label>
                                <input type="date" name="pendidikan_tgl_ijazah" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" name="ijazah" class="form-control">
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

<!-- Modal Pelatihan -->
 <div class="modal fade" id="modal5" tabindex="-1" role="dialog"
      aria-labelledby="model-3" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">

         <!-- Modal Content -->
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h3 class="modal-title" id="model-3">Input Data Seminar</h3>
                 <button type="button" class="close" data-dismiss="modal"
                         aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            <!-- /modal header -->

            <!-- Modal Body -->
             <div class="modal-body">
                 <form action="<?= base_url() ?>seminar/create/<?= $this->uri->segment(3) ?>" method="post">
                    
                        <div class="row">
                            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Seminar</label>
                                <input type="text" class="form-control" name="seminar_nama">
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat</label>
                                <input type="text" name="seminar_tempat" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Penyelenggara</label>
                                <input type="text" name="seminar_penyelenggara" class="form-control">
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" name="seminar_tgl_mulai" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" name="seminar_tgl_selesai" class="form-control">
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Piagam</label>
                                <input type="text" name="seminar_no_piagam" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Piagam</label>
                                <input type="date" name="seminar_tgl_piagam" class="form-control">
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