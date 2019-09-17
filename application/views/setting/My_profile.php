 
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><i class="  fas fa-fw fa-user"></i> <?php echo $title; ?></h1>

          <!--   <ul class="app-breadcrumb breadcrumb ">
              <h4 class="breadcrumb-item fas fa-address-card"> Personal data</h4>
            </ul> -->

          <div class="row">
            <div class="col-lg-12">
              <?php echo $this->session->flashdata('message'); ?>
            </div>
          </div>

                <!-- <section style="padding-left: 25%; padding-right: 25%; text-align: center;">
                  <div class="col-md-4 mx-auto d-block" >
                    <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail">
                  </div><br>

                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input style="text-align: center;" class="form-control" id="email" name="email" type="text" value="<?php echo $user['email']; ?>" readonly>
                  </div>

                  <div class="form-group" style="text-align: center;">
                    <label for="name">Full name</label>
                    <input style="text-align: center;" class="form-control" id="name" name="name" type="text" value="<?php echo $user['name']; ?>" readonly>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="gender">Gender</label>
                      <input style="text-align: center;" class="form-control" id="gender" name="gender" type="text" value="<?php echo $user['gender']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="phone">Phone Number</label>
                      <input style="text-align: center;" class="form-control" id="phone" name="phone" type="text" value="<?php echo $user['phone_number']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="gender">Place of birth</label>
                      <input style="text-align: center;" class="form-control" id="birth" name="birth" type="text" value="<?php echo $user['tmpt_lahir']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="dateBirth">Date Birth</label>
                      <input style="text-align: center;" class="form-control" id="dateBirth" name="dateBirth" type="text" value="<?php echo $user['tgl_lahir']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="age">Age</label>
                      <input style="text-align: center;" class="form-control" id="age" name="age" type="text" value="<?php echo $user['umur']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="height">Height</label>
                      <input style="text-align: center;" class="form-control" id="height" name="height" type="text" value="<?php echo $user['tinggi_bdn']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="weight">Weight</label>
                      <input style="text-align: center;" class="form-control" id="weight" name="weight" type="text" value="<?php echo $user['berat_bdn']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone">Marital Status</label>
                      <input style="text-align: center;" class="form-control" id="phone" name="phone" type="text" value="<?php echo $user['status_nkh']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea style="text-align: center;" class="form-control" id="address" name="address" rows="4" readonly><?php echo $user['alamat']; ?></textarea>
                  </div>
                </section>



                <ul class="app-breadcrumb breadcrumb ">
                  <h4 class="breadcrumb-item fas fa-book"> Education</h4>
                </ul>

                <section style="padding-left: 25%; padding-right: 25%; text-align: center;">             
                    <div class="form-group">
                      <label for="university">University</label>
                      <input style="text-align: center;" class="form-control" id="university" placeholder="Your data is still empty" name="university" type="text" value="<?php echo $user['universitas']; ?>" readonly>
                    </div>

                     <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendidikan">Education Level</label>
                      <input style="text-align: center;" class="form-control" id="pendidikan" placeholder="Your data is still empty" name="pendidikan" type="text" value="<?php echo $user['jenjang']; ?>" readonly>
                    </div>


                    <div class="form-group col-md-6">
                      <label for="StudyProgram">Study Program</label>
                      <input style="text-align: center;" class="form-control" id="StudyProgram" placeholder="Your data is still empty" name="StudyProgram" type="text" value="<?php echo $user['jurusan']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="graduation">Graduation Year</label>
                      <input style="text-align: center;" class="form-control" id="graduation" name="graduation" type="text" value="<?php echo $user['tahun_lulus']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="diploma">Diploma Value</label>
                      <input style="text-align: center;" class="form-control" id="diploma" name="diploma" type="text" value="<?php echo $user['berat_bdn']; ?>" placeholder="Your data is still empty" readonly>
                    </div>
                  </div>        

                  <div class="form-group" style="padding-left: 40%; padding-right: 40%; text-align: center;">
                      <label for="files">File</label><br>
                      <img src="assets/loker/img/catagory-img/pdf.png" class="img-thumbnail">
                      <label for="files"><?php echo $user['berkas_lamaran']; ?></label>
                      <a href="<?php echo base_url('assets/images/profile/berkas/') . $user['berkas_lamaran'] ?>">download</a>
                    </div> 
                </section>

                <ul class="app-breadcrumb breadcrumb ">
                  <h4 class="breadcrumb-item fas fa-building"> Work experience</h4>
                </ul>

                <section style="padding-left: 25%; padding-right: 25%; text-align: center;">
                  <div class="form-group">
                      <label for="fileInput">Company Name</label>
                    <input class="form-control" id="company" name="company" type="text" value="<?php echo $user['nama_perusahaan']; ?>" placeholder="Your data is still empty" style="text-align: center;"  readonly>
                  </div>

                  <div class="form-group">
                      <label for="fileInput">Position</label>
                    <input class="form-control" id="position" name="position" type="text" value="<?php echo $user['posisi']; ?>" placeholder="Your data is still empty" style="text-align: center;" readonly>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="fileInput">Length Of Working</label>
                        <input class="form-control" id="lengthWork" name="lengthWork" type="text" value="<?php echo $user['lama_kerja']; ?>" placeholder="Your data is still empty" style="text-align: center;" readonly><small style="padding-left: 90%;">Month</small>
                    </div>
                  </div>
                </section>  -->

                <section class="content">
  <div class="container-fluid">
    <div class="row col-md-12">
      <div class="col-md">
        <div class="box col-md-12"><br>
          <div class="card mb-12" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail" class="card-img">
                <label for="files" style="padding-left: 10.5%; padding-right: 25%; text-align: center;">Berkas Lamaran</label><br>
            <label style="padding-left: 9.5%; padding-right: 25%; text-align: center;" for="files"><?php echo $user['berkas_lamaran']; ?></label><br>
              <a style="padding-left: 9%; padding-right: 25%; text-align: center;" href="<?php echo base_url('assets/images/profile/berkas/') . $user['berkas_lamaran'] ?>">download</a>
              </div>
              <div class="col-md-8">
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
          <hr>

              <div class="form-row col-md-12">
                  <div class="col-md-5">
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

                  <div class="col-md-3">
                    <div class="card-body">
                      <h3 class="card-title">Akun Ujian</h3>
                      <table width="400" border="0" align="left" cellspacing="5">
                        <tr>
                         <td width="90" align="left" valign="top">Username</td>
                         <td width="10" align="left" valign="top">:</td>
                         <td width="300" align="left" valign="top"><?php echo $user2['user_name']; ?></td>
                        </tr>

                        <tr>
                         <td width="90" align="left" valign="top">Password</td>
                         <td width="10" align="left" valign="top">:</td>
                         <td width="300" align="left" valign="top"><?php echo $user2['user_password']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div> 
                </div>
          </div>
     
    </div>
  </div>
</section>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


               
   
