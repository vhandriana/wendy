
		
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 style="text-align: center;" class="h3 mb-4 text-gray-800"><i class="fas fa fw fa-key"></i> <?php echo $title; ?></h1>
         <!--  <hr style="border-top: 4px double #8c8b8b; "> -->


          <div class="row">
          	<div class="col-lg-12" style="padding-right: 20%; padding-left: 20%;">
          		<?php echo $this->session->flashdata('message'); ?>
          		<form action="<?php echo base_url('setting/change_password'); ?>" method = "post">
          			<div class="form-group">
					    <label for="current_password">Current Password</label>
					    <input type="password" class="form-control" id="current_password" name="current_password">
					    <?php echo form_error('current_password', '<small class="text-danger pl-3">', '</small>');  ?>
					</div>
					<div class="form-group">
					    <label for="new_password1">New Password</label>
					    <input type="password" class="form-control" id="new_password1" name="new_password1">
					    <?php echo form_error('new_password1', '<small class="text-danger pl-3">', '</small>');  ?>
					</div>
					<div class="form-group">
					    <label for="new_password2">Repeat Password</label>
					    <input type="password" class="form-control" id="new_password2" name="new_password2">
					    <?php echo form_error('new_password2', '<small class="text-danger pl-3">', '</small>');  ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Change Password</button>
					</div>
          		</form>

          	</div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   
 