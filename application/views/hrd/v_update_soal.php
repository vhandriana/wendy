
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<h1 class="h3 mb-4 text-gray-800">Change Questions</h1>
         	<div class="row">
              	<div class="col-lg-12">

              		<?php echo form_open_multipart('hrd/update_soal');?>
          	        <section style="padding-left: 20%; padding-right: 20%;">
	                    <div class="form-group">
	  
	                      <input class="form-control" id="idSoal" name="idSoal" type="text" value="<?php echo $data_soal['id_soal']; ?>" required>
	                      <?php echo form_error('idSoal', '<small class="text-danger pl-3">', '</small>');  ?>
	                    </div>

	                    <div class="form-group">
	        
	                      <input class="form-control" id="paketSoal" name="paketSoal" type="text" value="<?php echo $data_soal['paket']; ?>" required>
	                      <?php echo form_error('paketSoal', '<small class="text-danger pl-3">', '</small>');  ?>
	                    </div>

	                   
                      <small>Opsional. Bila ada, masukkan salah satu pengalaman kerja dengan masa kerja paling lama.</small><br><br>
                  	</section> 

               		<ul class="app-breadcrumb breadcrumb">
                      <button class="btn btn-primary mx-auto" type="submit">Submit</button>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
