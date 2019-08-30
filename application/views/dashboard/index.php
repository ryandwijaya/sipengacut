<div class="row">
    <div class="col-md-4">
        <div class="dt-card">
            <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                <span class="badge badge-success badge-top-right">Aktif</span>
                <div class="media">
                    <i class="fa fa-user text-success icon-5x mr-xl-5 mr-3 align-self-center"></i>
                    <div class="media-body">
                        <p class="mb-1 h1"><?= count($p_aktif) ?></p>
                        <span class="d-block text-light-gray">Pegawai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dt-card">
            <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                <span class="badge badge-danger badge-top-right">Cuti</span>
                <div class="media">
                    <i class="fa fa-user-times text-danger icon-5x mr-xl-5 mr-3 align-self-center"></i>
                    <div class="media-body">
                        <p class="mb-1 h1"><?= count($p_cuti) ?></p>
                        <span class="d-block text-light-gray">Pegawai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dt-card">
            <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                <span class="badge badge-primary badge-top-right">Jumlah Pegawai</span>
                <div class="media">
                    <i class="fa fa-users text-primary icon-5x mr-xl-5 mr-3 align-self-center"></i>
                    <div class="media-body">
                        <p class="mb-1 h1"><?= count($pegawai) ?></p>
                        <span class="d-block text-light-gray">Pegawai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="dt-card">

                                <!-- Card Header -->
                                <div class="dt-card__header">

                                    <!-- Card Heading -->
                                    <div class="dt-card__heading">
                                        <h3 class="dt-card__title">Visi dan Misi</h3>
                                    </div>
                                    <!-- /card heading -->

                                </div>
                                <!-- /card header -->

                                <!-- Card Body -->
                                <div class="dt-card__body tabs-container tabs-vertical">

                                    <!-- Tab Navigation -->
                                    <ul class="nav nav-tabs flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab-pane-3" role="tab" aria-controls="tab-pane-3" aria-selected="true">Visi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab-pane-4" role="tab" aria-controls="tab-pane-4" aria-selected="true">Misi
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /tab navigation -->

                                    <!-- Tab Content -->
                                    <div class="tab-content">

                                        <!-- Tab Pane -->
                                        <div id="tab-pane-3" class="tab-pane active">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <strong>Visi :</strong> Menjadi bank yang bertaraf internasional dan berkemampuan melipatgandakan nilai melalui kapabilitas inovasi
                                                </p>
                                            
                                            </div>
                                        </div>
                                        <!-- /tab pane-->

                                        <!-- Tab Pane -->
                                        <div id="tab-pane-4" class="tab-pane">
                                            <div class="card-body">
                                                <p class="card-text" style="text-align: justify;">
                                                    <strong>Misi :</strong> Menyediakan produk dan layanan yang lebih baik bagi nasabah, menciptakan tinggi bagi pemegang saham, membangun jenjang karier yang lebih luas bagi rekan kerja dan bertanggung jawab sosial penuh sebagai warga korporasi yang baik
                                                </p>
                                            
                                            </div>
                                        </div>
                                        <!-- /tab pane-->


                                    </div>
                                    <!-- /tab content -->

                                </div>
                                <!-- /card body -->

                            </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
               <h5>Nilai Dasar</h5> 
            </div>

            <div class="card-body">
                <span><b>1. Integrity</b></span>
                <p>
                    Kemampuan dan komitmen mewujudkan apa yang sudah disanggupi.
                </p>
                <span><b>2. Trust</b></span>
                <p>
                    Hubungan berbasis pada kepercayaan satu sama lain.
                </p>
                <span><b>3. Speed</b></span>
                <p>
                    Kecepatan dalam memberikan pelayanan.
                </p>           
                <span><b>4. Competence</b></span>
                <p>
                    Kompetensi merupakan pembeda utama antara keberhasilan dan kegagalan dalam segala bidang.
                </p>
            </div>

        </div>
    </div>

    
</div>