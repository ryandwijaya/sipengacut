<?php error_reporting(0) ?>
<div class="row">
	<div class="col-md-12">
		
<div class="card border border-primary">

     <div class="card-header border-bottom border-primary">	         
     <?php 
            $tgl = explode('-', $check_pengajuan[0]['cuti_date_created']);
            $pengacut = $this->Cuti->get_pengajuan($this->session->userdata('session_id'));
            $total = 0;
            foreach ($pengacut as $key => $var) {
                $tgl_cuti[$key] = new DateTime($var['cuti_tgl_mulai']);
                $tgl_selesai[$key] = new DateTime($var['cuti_tgl_akhir']);

                $selisih[$key] = $tgl_cuti[$key]->diff($tgl_selesai[$key])->format("%a");

                $total = $total + $selisih[$key];


            }


      ?>

     <!-- <?= $tgl[0] ?> -->
    <div class="float-right text-right">
     <span class="text-primary ">Jumlah Pengajuan : <?= $total ?> Hari</span><br>
     <span class="text-primary ">Sisa Pengajuan : <?= (12-$total) ?> Hari   </span>
    </div>
     </div>                        

    <?php 

    $tanggal1 = new DateTime($pegawai['pegawai_tgl_diterima']);
    $tanggal2 = new DateTime();
 
    $selisih = $tanggal2->diff($tanggal1)->format("%a");
     ?>                
     <div class="card-body">              
            <?php if (count($check_pengajuan)==0 ){ ?>
                
                <?php if ($selisih > 365 && $total < 12 ){ ?>
                    
                <form action="<?= base_url() ?>cuti/create" method="post">               
                        <div class="form-group">
                                <input type="hidden" name="cuti_pegawai_id" value="<?= $this->session->userdata('session_id') ?>">
                                <input type="text" name="pegawai_id" class="text-center border-primary" readonly value="<?= $this->session->userdata('session_nama') ?>">
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
                                <select name="cuti_jenis" class="form-control" required>
                                    <option disabled selected>-Pilih Jenis Cuti-</option>
                                    <option>Cuti Tahunan</option>
                                    <option>Cuti Besar</option>
                                    <option>Cuti Sakit</option>
                                    <?php if ($this->session->userdata('session_jk')=='Wanita'): ?>
                                        
                                    <option>Cuti Bersalin</option>
                                    <?php endif ?>
                                    <option>Cuti Alasan Penting</option>
                                    <option>Cuti diluar tanggungan Negara</option>
                                </select>   

                        </div>

                        <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="cuti_keterangan" id="" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                                <label for="">Pegawai Pengganti</label>
                                <select name="cuti_pengganti" class="form-control" required>
                                    <option selected disabled>-Pilih Pegawai Pengganti-</option>
                                    <?php foreach ($get_pegawai as $peg): ?>
                                        <option value="<?= $peg['pegawai_id'] ?>"><?= $peg['pegawai_nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm float-right" type="submit" name="submit" onclick="return confirm('Yakin ingin mengajukan cuti ?')">Ajukan Permohonan</button>
                            </div>
                        </div>
                </form> 
                <?php }else{ ?>
                    <h2 class="text-warning">Anda tidak bisa mengajukan cuti !</h2>
                    <span class="text-warning">Syarat mengajukan cuti adalah 1 tahun bekerja dan Maksimal 12 hari </span> <br>
                    <span class="text-warning">Lama bekerja Anda = <?= $selisih ?> Hari</span><br>
                    <span class="text-warning">Jumlah Cuti = <?= $total ?> hari</span>
                <?php } ?>
                
            <?php }
            else {?>
                    
                    <div class="row">
                    <div class="col-md-12">
                        <?php if ($check_pengajuan[0]['cuti_acc_supervisor']==1 && $check_pengajuan[0]['cuti_acc_pimpinan']==1): ?>
                            <a href="<?= base_url() ?>cuti/cetak/<?= $check_pengajuan[0]['cuti_id'] ?>" class="btn btn-sm btn-info float-right">cetak</a>
                        <?php endif ?>
                        
                        <h3>Anda telah mengajukan cuti pada tanggal <?= $check_pengajuan[0]['cuti_date_created'] ?></h3>
                        <table>
                            <tr>
                                <td>Jenis Cuti</td>
                                <td>:</td>
                                <td><?= $check_pengajuan[0]['cuti_jenis'] ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Mulai</td>
                                <td>:</td>
                                <td><?= date_indo($check_pengajuan[0]['cuti_tgl_mulai']) ?></td>
                            </tr>
                            <tr>
                                <td>Sampai Tanggal</td>
                                <td>:</td>
                                <td><?= date_indo($check_pengajuan[0]['cuti_tgl_akhir']) ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><?= $check_pengajuan[0]['cuti_keterangan'] ?></td>
                            </tr>
                            <tr>
                                <?php 
                                $pengganti = $this->Pegawai->getPegawaiById($check_pengajuan[0]['cuti_pengganti']);
                                 ?>
                                <td>Digantikan Oleh</td>
                                <td>:</td>
                                <td><a href="<?= base_url() ?>biodata/<?= $pengganti['pegawai_id'] ?>"><?= $pengganti['pegawai_nama'] ?> - <?= $pengganti['pegawai_nik'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Diperiksa oleh supervisor</td>
                                <td>:</td>
                                <td>
                                    <?php if ($check_pengajuan[0]['cuti_acc_supervisor']==0){ ?>
                                        <span class="text-warning">belum</span>
                                    <?php }else{ ?>
                                        <span class="text-success">sudah</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Diperiksa oleh pimpinan</td>
                                <td>:</td>
                                <td>
                                    <?php if ($check_pengajuan[0]['cuti_acc_pimpinan']==0){ ?>
                                        <span class="text-warning">belum</span>
                                    <?php }else{ ?>
                                        <span class="text-success">sudah</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    <?php if ($check_pengajuan[0]['cuti_status']=='waiting'){ ?>
                                        <span class="badge badge-secondary">sedang di proses</span>
                                    <?php }elseif($check_pengajuan[0]['cuti_status']=='disetujui'){ ?>
                                        <span class="badge badge-success">Telah disetujui</span>
                                    <?php }else{ ?>
                                         <span class="badge badge-danger">Cuti ditolak</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= base_url() ?>cuti/delete/<?= $check_pengajuan[0]['cuti_id'] ?>" onclick="return confirm('Yakin ingin membatalkan pengajuan ini ?')" class="btn btn-warning btn-sm float-right" ><i class="fa fa-close"></i> Batalkan Pengajuan</a>
                        <a href="<?= base_url() ?>cuti/selesai/<?= $check_pengajuan[0]['cuti_id'] ?>"  class="btn btn-success btn-sm float-right mr-3" title="Konfirmasi Jika Anda Telah Menyelesaikan Cuti" onclick="return confirm('Konfirmasi Jika Anda Telah Menyelesaikan Cuti')"><i class="fa fa-check"></i> Selesai</a>
                    </div>
                </div>        
     
            <?php } ?>
     </div>                                      

</div>		



	</div>
</div>





