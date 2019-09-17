<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#footer">
    <img width="40" height="30" alt="" src="<?php echo base_url().'assets/loker/img/5.png'?>">
    Employee Recruitment System
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#home'); ?>" class="page-scroll">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#lowongan'); ?>" class="page-scroll">Job Vacancy</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#profil'); ?>" class="page-scroll">Job Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#produk'); ?>" class="page-scroll">Our Products</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#tentang'); ?>" class="page-scroll">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth#login'); ?>" class="page-scroll">Login</a>
      </li>
    </ul>
  </div>
</nav>

<section class="tentang" id="tentang" style="padding-top: 7%; padding-bottom: 7%;">
      <div class="container">
        <div class="row mb-4">
          <div class="col-sm-12">
           <!--  <h2 class="text-center">Detail Job Vacancy</h2> -->
          <!--   <hr> -->
          </div>
        </div>
 

        <h1 id="namaLowongan"><?php echo $lwngan['nama_lowongan']; ?></h1>
        <h2 id="pisisi">For : <?php echo $lwngan['posisi']; ?></h2>
        <div class="card">
		  	<div class="card-header">
		    	<a href="<?php echo base_url('auth#lowongan'); ?>" type="submit" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back</a>
		  	</div>
		  	<div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p>PT. Daese Garmin Bandung sebagai salah satu perusahaan yang bergerak dalam bidang industri ekspor garmen saat ini sedang mengalami perkembangan bisnis yang sangat baik. Hal ini ditunjukan dengan semakin bertambahnya buyer dari luar negeri yang memberikan order kepada perusahaan. Selain itu perkembangan tersebut juga didukung dengan bertambahnya infrastruktur dan sumber daya  manusia  yang dimiliki oleh perusahaan sehingga perusahaan mampu meningkatkan produksi garmen  dengan kualitas yang baik. Untuk meningkatkan eksistensi perusahaan di bidang industri, maka kami memberikan kesempatan kepada putra putri terbaik Bangsa untuk bergabung di PT Daese Garmin melalui Program Perekrutan yang kami lakukan dengan ketentuan sebagai berikut :</p>

			      <h3>Kriteria Pelamar :</h3>
			    	<ul>
			      		<li class="blockquote-footer"> Jenis Kelamin 	: <?php echo $lwngan['jenis_kelamin']; ?> </li>
				      	<li class="blockquote-footer"> Pendidikan 	: <?php echo $lwngan['pendidikan']; ?> </li>
				      	<li class="blockquote-footer"> Umur Minimal 	: <?php echo $lwngan['umur_min']; ?> </li>
				      	<li class="blockquote-footer"> Umur Maksimal 	: <?php echo $lwngan['umur_max']; ?> </li>
				      	<li class="blockquote-footer"> Tinggi Badan 	: <?php echo $lwngan['tinggi_badan']; ?> </li>
				      	<li class="blockquote-footer"> Berkelakuan baik </li>
				      	<li class="blockquote-footer"> Tidak bertato dan tidak bertindik</li>
				      	<li class="blockquote-footer"> Tidak terlibat narkoba atau psikotropika </li>
				      	<li class="blockquote-footer"> Tidak pernah dihukum penjara berdasarkan putusan pengadilan yang telah berkekuatan hukum tetap </li>
				      	<li class="blockquote-footer"> Tidak pernah diberhentikan di anak perusahaan atau institusi lainnya dikarenakan hukuman disiplin </li>
			      	</ul>
			         
			     

			           <h3>Persyaratan Lamaran :</h3>
                    <h5> 1. FORMASI DENGAN TINGKAT PENDIDIKAN SLTA</h5>
                    <ul>
                      <li class="blockquote-footer">Surat Lamaran</li>
                      <li class="blockquote-footer">Daftar Riwayat Hidup</li>
                      <li class="blockquote-footer">Surat Menikah (jika menikah)</li>
                      <li class="blockquote-footer">Ijazah SLTA (SMA/MA/SMK/MAK) asli atau fotocopy legalisir</li>
                      <li class="blockquote-footer">Nilai Ujian Nasional asli atau fotocopy legalisir</li>
                      <li class="blockquote-footer">Kartu tanda penduduk (KTP) atau Surat Keterangan Kependudukan yang masih berlaku</li>
                      <li class="blockquote-footer">Akta Kelahiran</li>
                      <li class="blockquote-footer">Kartu Keluarga</li>
                      <li class="blockquote-footer">Pas foto terbaru background latar belakang berwarna merah, menggunakan kemeja putih (khusus wanita berkerudung menggukan kerudung putih) dengan ukuran 4x6</li>
                      <li class="blockquote-footer">Surat Kelakuan Baik dari kepolisian yang masih berlaku</li>
                    </ul>

                      <h5> 2. FORMASI DENGAN TINGKAT PENDIDIKAN S1</h5>
                    <ul>
                      <li class="blockquote-footer">Surat Lamaran</li>
                      <li class="blockquote-footer">Daftar Riwayat Hidup</li>
                      <li class="blockquote-footer">Surat Menikah (jika menikah)</li>
                      <li class="blockquote-footer">Ijazah Strata 1 (S1) Asli atau fotocopy legalisir (Khusus Formasi Dokter wajib melampirkan Ijazah Profesi dan Surat Tanda Registrasi)</li>
                      <li class="blockquote-footer">Transkrip Nilai asli atau fotocopy legalisir</li>
                      <li class="blockquote-footer">Akta Kelahiran</li>
                      <li class="blockquote-footer">Kartu Keluarga</li>
                      <li class="blockquote-footer">Akreditasi Jurusan pada saat tanggal kelulusan</li>
                      <li class="blockquote-footer">Kartu tanda penduduk (KTP) atau Surat Keterangan Kependudukan yang masih berlaku</li>
                      <li class="blockquote-footer">Pas foto terbaru background latar belakang berwarna biru, menggunakan kemeja putih (khusus wanita berkerudung menggukan kerudung putih) dengan ukuran 4x6</li>
                      <li class="blockquote-footer">Surat Kelakuan Baik dari kepolisian yang masih berlaku</li>
                    </ul>


			      <h3>KETERANGAN :</h3>
			      <ul>
			      	<li class="blockquote-footer">Dokumen persyaratan lamaran menggunakan format pdf dengan ukuran maksimal 2 mb</li>
			      	<li class="blockquote-footer">Pas Foto terbaru menggunakan format jpg/jpeg dengan ukuran maksimal 2 mb</li>
			      </ul><br>
			  
			    </blockquote>
		  	</div>
		</div>

        
        </div> 
</section>

 <!-- Footer -->
      <footer class="sticky-footer bg-dark">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: white; padding-bottom: 5;">Copyright &copy; Sistem Penerimaan Karyawan <?php echo date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->


	