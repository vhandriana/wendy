
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

            <div id="page-wrapper" >
            <div id="page-inner">
             
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('hrd/soal');?>">Question</a>
                  </li>
                </ul>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    	<?php echo $this->session->flashdata('message'); ?>
                  		<p><a href="" class='btn btn-success' data-toggle="modal" data-target="#NewPaketModal"><i class='fa fa-plus'></i> Add Category</a></p>
                    	<div class="panel panel-default">


					 		<div class="row">
					          	<div class="col-lg">
			                        <table id="register" class="table table-hover">
									  	<thead>
										    <tr align="center">
										      	<th>No</th>
			                                    <th>Code Category</th>
			                                    <th>Category</th>
			                                    <th>Number of questions</th>
			                                    <th>Status</th>
			                                    <th>Action</th>
										    </tr>
									  	</thead>
									  	<tbody>

							  			<?php $i = 1; ?>
							  			<?php foreach ($lwngan as $pak): ?>
								    	<tr align="center">
								    
								      		<th scope="row"><?php echo $i; ?></th>
								      		<td><?php echo $pak['id_kategori']; ?></td>
			                                <td><?php echo $pak['kategori']; ?></td>
			                                <td><?php echo $pak['jmlh_soal']; ?></td>
			                                <td><?php echo $pak['status_kategori']; ?></td>
			                                <td>
			                                    <!-- <a href="<?php echo base_url();?>hrd/edit_paket/<?php echo $pak['id_paket']; ?>" class="badge badge-primary">Change</a> -->
			                                     <a href="" data-toggle="modal" id="updatePackage" data-target="#u_Package" class="badge badge-primary" data-id_kategori="<?php echo $pak['id_kategori']; ?>" data-kategori="<?php echo $pak['kategori']; ?>">Change</a>

			                                    <a onclick="return confirm('Anda yakin ?')" href="<?php echo base_url();?>hrd/delete_paket/<?php echo $pak['id_kategori']; ?>" class="badge badge-danger">Delete</a>
			                                </td>
								    	</tr>
								    	<?php $i++; ?>
										<?php endforeach; ?>
							 		 	</tbody>
									</table>
								</div>
							</div>
                        
                            
                   		</div>
                     <!-- End  Kitchen Sink -->
                	</div>
            	</div>            
            </div>
        </div>
     
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
<!-- Modal -->
	<div class="modal fade" id="NewPaketModal" tabindex="-1" role="dialog" aria-labelledby="NewPaketModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="NewPaketModalLabel">Add New Matter Package</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		     
		      <form action="<?php echo base_url('hrd/exam'); ?>" method = "post">
		      	<div class="modal-body p-4">
		      		<div class="form-row">
		      			<div class="form-group col-md">
						    <input type="text" class="form-control" id="package" name="package" placeholder="Matter Package" required>
						 </div>
					</div>
				</div>
					<div class="modal-footer">
			        	<button type="submit" class="btn btn-primary" name="add">Add</button>
			      	</div>
          		</form>

		    </div>
		  </div>
		</div>

		  <!-- Modal -->
		<div class="modal" id="u_Package" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updatePackageLabel" aria-hidden="true">
			<?php echo form_open_multipart('hrd/update_paket');?>
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="updatePackageLabel">Change Matter Package</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<form id="formApprov">
			      	<div class="modal-body" id="editPackage">
			      	 	<div class="col-sm-12">
			      	 		<input type="hidden" class="form-control" id="id_pkt" name="id_pkt" value="" readonly>
					      	<input type="text" class="form-control" id="paketname" name="paketname" value="">
					    </div>			
			      	</div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Change</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>


		<script src="<?php echo base_url(); ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).on("click", "#updatePackage", function(){
			var idPaket = $(this).data('id_kategori');
			var pakett = $(this).data('kategori');
			$("#editPackage #id_pkt"). val(idPaket);
			$("#editPackage #paketname"). val(pakett);
		}) 

			$(document).ready(function(e) {
			$("#form").on("submit", (function(e) {
				e.preventDefault();
				$.ajax({
					url : "<?php echo base_url('hrd/approve'); ?>",
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					proccessData : false,
					success : function(msg) {
						$('.table').html(msg);
					}
				});
			}));
		})
		</script>

