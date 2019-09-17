 <section class="content-header">
    <h1>
        Daftar Peserta
        <small>Daftar peserta, melihat jumlah pelamar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('manager/dashboard') ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Daftar Peserta</li>
        <li>Lihat Daftar Peserta</li>
        <li class="active">Detail Peserta</li>
    </ol>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="box col-md-12"><br>
          <div class="card mb-12" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail" class="card-img">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h3 class="card-title">Data Pribadi</h3>
                 <table width="400" border="0" align="left" cellspacing="5">
                   <tr>
                     <td width="90" align="left" valign="top">Nama</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['name']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Email</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['email']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Jenis Kelamin</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['gender']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">No Hp</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['phone_number']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Tempat Lahir</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['tmpt_lahir']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Tanggal Lahir</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['tgl_lahir']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Umur</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['umur']; ?></td>
                   </tr>

                   <tr>
                     <td width="90" align="left" valign="top">Tinggi Badan</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['tinggi_bdn']; ?></td>
                   </tr>

                    <tr>
                     <td width="90" align="left" valign="top">Berat Badan</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['berat_bdn']; ?></td>
                   </tr>

                    <tr>
                     <td width="90" align="left" valign="top">Status</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['status_nkh']; ?></td>
                   </tr>

                    <tr>
                     <td width="90" align="left" valign="top">Alamat</td>
                     <td width="10" align="left" valign="top">: </td>
                     <td width="300" align="left" valign="top"> <?php echo $user['alamat']; ?></td>
                   </tr>
                 </table>
                <!--   <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                </div>
              </div>
            </div>
          </div>

          <label for="files" style="padding-left: 7%; padding-right: 25%; text-align: center;">Berkas Lamaran</label><br>
            <label style="padding-left: 9.5%; padding-right: 25%; text-align: center;" for="files"><?php echo $user['berkas_lamaran']; ?></label><br>
              <a style="padding-left: 9%; padding-right: 25%; text-align: center;" href="<?php echo base_url('assets/images/profile/berkas/') . $user['berkas_lamaran'] ?>">download</a>
          <hr>

              <div class="col-md-12">
                  <div class="col-md-4">
                  <div class="card-body">
                    <h3 class="card-title">Pendidikan</h3>
                   <table width="400" border="0" align="left" cellspacing="5">
                     <tr>
                       <td width="90" align="left" valign="top">Sekolah / Universitas</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['universitas']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Jenjang Pendidikan</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['jenjang']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Jurusan</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['jurusan']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Tahun Lulus</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['tahun_lulus']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Nilai Ijazah</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['nilai_ijazah']; ?></td>
                     </tr>
                   </table>
                  <!--   <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                  </div>
                </div>

                  <div class="col-md-4">
                  <div class="card-body">
                    <h3 class="card-title">Pengalaman</h3>
                   <table width="400" border="0" align="left" cellspacing="5">
                     <tr>
                       <td width="90" align="left" valign="top">Nama Perusahaan</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['nama_perusahaan']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Posisi Sebagai</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['posisi']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Lama Bekerja</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user['lama_kerja']; ?></td>
                     </tr>
                   </table>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card-body">
                    <h3 class="card-title">Akun Ujian</h3>
                    <table width="400" border="0" align="left" cellspacing="5">
                     <tr>
                       <td width="90" align="left" valign="top">Username</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user2['user_name']; ?></td>
                     </tr>

                     <tr>
                       <td width="90" align="left" valign="top">Password</td>
                       <td width="10" align="left" valign="top">: </td>
                       <td width="300" align="left" valign="top"> <?php echo $user2['user_password']; ?></td>
                     </tr>
                   </table>
                 </div>
               </div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </section>
