<!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
          	<h1 style="text-align: center;" class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-user-edit"></i> <?php echo $title; ?></h1>

          	<div class="row">
	            <div class="col-lg-12">
	              <?php echo $this->session->flashdata('message'); ?>
	            </div>
          	</div>

          	<div class="row">
          		<div class="col-lg-12" style="padding-right: 20%; padding-left: 20%;">

        			<?php echo form_open_multipart('setting/edit_profil');?>

        				<div class="form-group">
							<div>
						    	<input type="text" style="text-align: center;" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<div>
						    	<input type="text" style="text-align: center;" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" readonly>
						    	<?php echo form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
							</div>
						</div>


							<div style="padding-left: 10%; padding-right: 10%;">
			                  <div class="col-md-4 mx-auto d-block" >
			                    <img src="<?php echo base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail">
			                  </div><br>

			                <div class="form-group" style="padding-right: 25%; padding-left: 25%;">
			                  <div class="custom-file">                      
			                    <input type="file" class="custom-file-input" id="image" name="image">
			                    <label class="custom-file-label" for="image">Change Photo</label>

			                  </div>
			                </div>

			            	</div>

			            	<small class="form-text text-muted">file photo yang di inputkan max 2 mb.</small>
			                    <small class="form-text text-muted">background latar belakang berwarna biru, menggunakan kemeja putih (khusus wanita berkerudung menggukan kerudung putih)</small><br>

						<div class="form-group">  
						 	<div style="padding-left: 15%; padding-right: 15%;">
						 		<button type="submit" class="btn btn-primary btn-block">Change</button>
						 	</div>
						</div>
      			</div>
      		</div>
	
         
      	</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content