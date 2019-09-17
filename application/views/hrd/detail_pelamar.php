 
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800"><i class="  fas fa-fw fa-user"></i> <?php echo $title; ?></h1> -->

            <ul class="app-breadcrumb breadcrumb ">
              <h4 class="breadcrumb-item fas fa-address-card"> Personal Data</h4>
            </ul>

          <div class="row">
            <div class="col-lg-12">
              <!-- <?php echo $this->session->flashdata('message'); ?> -->
            </div>
          </div>

              <!-- <form> -->
                <section style="padding-left: 25%; padding-right: 25%; text-align: center;">
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

                      <img src="<?php echo base_url().'assets/loker/img/catagory-img/pdf.png'?>" class="img-thumbnail">
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
                </section> 
              <!-- </form> -->

        <!--   <div class="col-lg-12" style="padding-right: 20%; padding-left: 20%;">
          <div class="card mb-3 col-lg-8">
            <div class="row no-gutters" >
              <div class="col-md-4">
                <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $user['name']; ?></h5>
                  <p class="card-text"><?php echo $user['email']; ?></p>
                  <p class="card-text"><small class="text-muted">Member since <?php echo date('d F Y', $user['date_create']); ?></small></p>
                </div>
              </div>
            </div>
          </div>
          </div> -->
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   
