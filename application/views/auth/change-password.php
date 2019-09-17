
    <section class="login" id="login">
      <div class="container">
        <br><br>
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row">
                 <!--  <img src="images/daese.jpg" class="img-fluid"> -->
                  <div class="col-lg-6 d-none d-lg-block">
                    <img class="img-fluid" style="height: 350px;" src="<?php echo base_url(). 'assets/loker/img/daese.jpg'?>">
                    </div>
                    <div class="col-lg-6">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900">Change your password for</h1>
                          <h5 class=" mb-4"><?php echo $this->session->userdata('reset_email') ?></h5>
                        </div>
                        <?php echo $this->session->flashdata('message');?>
                          <form class="user" method="post" action="<?php echo base_url('auth/changePassword');?>">
                            <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Enter new password...">
                              <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat password...">
                              <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                              Change Password
                            </button>
                          </form>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
