<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
             <h1><i class="fa fa-edit"></i> Form Biodata</h1>

             <ul class="app-breadcrumb breadcrumb ">
        <li class="breadcrumb-item fas fa fw fa-exclamation-triangle"> Warning !!! Hati-hati dalam pengisian biodata diri Anda. karena data yang anda inputkan tidak dapat diubah lagi !</li>
       </ul>

       <ul class="app-breadcrumb breadcrumb ">
        <h4 class="breadcrumb-item fas fa-address-card"> Personal data</h4>
      </ul>

            <div class="row">
              <div class="col-lg-12">

              <!-- <?php echo form_open_multipart('user/form_lamar');?> -->

              <form action="<?php echo base_url('user/form_lamar'); ?>" method = "post">
          
                <section style="padding-left: 20%; padding-right: 20%;">
                  <div class="col-md-4 mx-auto d-block" >
                    <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail">
                  </div><br>

               
             
                
                 <div class="form-group">
                  <label for="id_lwngn">id_lowongan</label>
                  <input class="form-control" id="id_lwngn" name="id_lwngn" type="text" value="<?php echo $lwngan['lowongan_id']; ?>"readonly>
                </div>

                <div class="form-group">
                  <label for="id_user">id_user</label>
                  <input class="form-control" id="id_user" name="id_user" type="text" value="<?php echo $user['id']; ?>" readonly>
                </div>


                <div class="form-group">
                  <label for="email">Email address</label>
                  <input class="form-control" id="email" name="email" type="text" value="<?php echo $user['email']; ?>" readonly>
                </div>


                <div class="form-group">
                  <label for="name">Full name</label>
                  <input class="form-control" id="name" name="name" type="text" value="<?php echo $user['name']; ?>" readonly>
                  <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
      
                    <select class="form-control" id="gender" name="gender" required>
                      <option value="">~select gender~</option>
                      <option>Laki-laki</option>
                      <option>Perempuan</option>
                    </select>
                    <?php echo form_error('gender', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                  <div class="form-group col-md-6">
                    <input class="form-control" id="phone" name="phone" type="text"  maxlength="12" onkeypress="return Angkasaja(event)" placeholder="Phone number" required>
                    <?php echo form_error('phone', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                </div>

                    <div class="form-row">
                  <div class="form-group col-md-4">

                    <input class="form-control" id="birth" name="birth" type="text" placeholder="Place of birth" required>
                    <?php echo form_error('birth', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                 
                  <div class="form-group col-md-4">
                    <div class="input-group date">
                      <input placeholder="Enter date birth" type="text" class="form-control datepicker" id="dateBirth" name="dateBirth" required>
                      <?php echo form_error('dateBirth', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
         
                    <input placeholder="Enter age" type="text" class="form-control datepicker" id="age" name="age"  maxlength="2" onkeypress="return Angkasaja(event)" required>
                    <?php echo form_error('age', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                    <div class="form-group col-md-1">
                      <label for="lengthWork">Year</label>
                    </div>
                </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
            
                      <input class="form-control" id="height" name="height" type="text"  maxlength="3" onkeypress="return Angkasaja(event)" placeholder="Height" required>
                      <?php echo form_error('height', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                 
                      <div class="form-group col-md-4">
                      
                        <input class="form-control" id="weight" name="weight" type="text"  maxlength="3" onkeypress="return Angkasaja(event)" placeholder="Weight" required>
                        <?php echo form_error('weight', '<small class="text-danger pl-3">', '</small>');  ?>
                      </div>

                      <div class="form-group col-md-4">
                       
                          <select class="form-control" id="status" name="status" required>
                            <option value="">~select Marital status~</option>
                            <option>Single</option>
                            <option>Married</option>
                          </select>
                          <?php echo form_error('status', '<small class="text-danger pl-3">', '</small>');  ?>
                      </div>
                  </div>

                 <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                    <?php echo form_error('address', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
                </section>

                 <ul class="app-breadcrumb breadcrumb ">
                    <h4 class="breadcrumb-item fas fa-book"> Education</h4>
                  </ul>
                    <ul class="app-breadcrumb breadcrumb ">
                      <li class="breadcrumb-item fas fa fw fa-exclamation-triangle"> Warning !!! Diharapkan anda untuk mengisikan data dengan benar sesuai dengan pendidikan yang anda dapatkan. karena jika didapati kekeliruan maka akan di anggap gagal ! !</li>
                    </ul>

                  <section style="padding-left: 20%; padding-right: 20%;">
                    <div class="form-group">
                      
                      <input class="form-control" id="university" name="university" type="text"  placeholder="University or School" required>
                      <?php echo form_error('university', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                      
                      <select class="form-control" id="pendidikan" name="pendidikan" required>
                      <option value="">Choose Education level...</option>
                        <option>SLTA (SMA/MA/SMK/MAK)</option>
                        <option>D3</option>
                        <option>S1</option>
                      </select>
                      <?php echo form_error('pendidikan', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                  
                   <div class="form-group">
                      <input class="form-control" id="StudyProgram" name="StudyProgram" type="text" placeholder="Study program / department" required>
                      <?php echo form_error('StudyProgram', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                
                        <div class="input-group date">
                          <input class="form-control" id="graduation" name="graduation" type="text" placeholder="Graduation year" required>
                          <?php echo form_error('graduation', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                 
                      <div class="form-group col-md-6">
                 
                        <input class="form-control" id="diploma" name="diploma" type="text"  placeholder="Diploma value" required>
                        <?php echo form_error('diploma', '<small class="text-danger pl-3">', '</small>');  ?>
                      </div>
                    </div>

                
                    <div class="form-group">
                    <label for="fileInput">File input</label>
                    <div class="custom-file">                      
                      <input type="file" class="custom-file-input" id="fileInput" name="fileInput">
                      <label class="custom-file-label" for="fileInput">Choose file</label>
                      <small class="form-text text-muted">Usahakan file yang anda inputkan berbentuk pdf dan di jadikan satu file.</small>
                    </div>
                    </div> 
                 </section>


                  <ul class="app-breadcrumb breadcrumb ">
                    <h4 class="breadcrumb-item fas fa-building"> Work experience</h4>
                  </ul>

                   <section style="padding-left: 20%; padding-right: 20%;">
                    <div class="form-group">
  
                      <input class="form-control" id="company" name="company" type="text" placeholder="Company name">
                      <?php echo form_error('company', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="form-group">
        
                      <input class="form-control" id="position" name="position" type="text" placeholder="Position">
                      <?php echo form_error('position', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-11">
             
                        <input class="form-control" id="lengthWork" name="lengthWork" type="text"  maxlength="4" value="<?php echo set_value('lengthWork') ?>" onkeypress="return Angkasaja(event)" placeholder="Length of working">
                        <?php echo form_error('lengthWork', '<small class="text-danger pl-3">', '</small>');  ?>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="lengthWork">Month</label>
                      </div>
                    </div>
                      <small>Opsional. Bila ada, masukkan salah satu pengalaman kerja dengan masa kerja paling lama.</small><br><br>
                  </section> 

                  <ul class="app-breadcrumb breadcrumb ">
                    <h4 class="breadcrumb-item fas fa-building"> Exam login account</h4>
                  </ul>

                   <section style="padding-left: 20%; padding-right: 20%;">
                    <div class="form-group">
  
                      <input class="form-control" id="Examusername" name="Examusername" type="text" placeholder="Exam username"  value="<?php echo set_value('Examusername') ?>" required>
                      <?php echo form_error('Examusername', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="form-group">
                      <input class="form-control" id="Exampassword" name="Exampassword" type="text" placeholder="Exam password" required>
                      <?php echo form_error('Exampassword', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    
                      <small>akun ini akan anda gunakan ketika anda memasuki sesi ujian</small><br><br>
                  </section> 

               <ul class="app-breadcrumb breadcrumb">
                      <button class="btn btn-primary mx-auto" type="submit">Submit</button>
                    </ul>
                  </form>
            </div>
          </div>

         
        </div>
       <!-- container-fluid -->

      </div>
      <!-- End of Main Content