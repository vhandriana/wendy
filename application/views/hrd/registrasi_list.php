
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          <div class="row">
          	<div class="col-lg">
          		<?php echo $this->session->flashdata('message'); ?>
     			
          		<table id="register" class="table table-hover">
				  <thead>
				    <tr align="center">
				      <th scope="col">No</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Role</th>
				      <th scope="col">Date Created</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($register as $r): ?>
					    <tr align="center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $r['name']; ?></td>
					      <td><?php echo $r['email']; ?></td>
					      <td><?php echo $r['role']; ?></td>
					      <td><?php echo date('d F Y', $r['date_create']); ?></td>
					       <td><?php echo $r['status']; ?></td>
					      <td align="center">
					      	<a id="approv" href="" class="badge badge-success" data-toggle="modal" data-target="#ApproveModal" data-id="<?php echo $r['id']; ?>" data-email="<?php echo $r['email']; ?>">Approve</a>
					      	<a href="" class="badge badge-success">Delete</a>
					      </td>
					    </tr>
					    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

   <!-- Modal -->
		<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="ApproveModalLabel" aria-hidden="true">
			<?php echo form_open_multipart('hrd/register_list');?>
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="ApproveModalLabel">Registration Approved</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<form id="formApprov">
			      	<div class="modal-body" id="editApprov">
			      	 	<div class="col-sm-12">
			      	 		<input type="hidden" class="form-control" id="id" name="id" value="" readonly>
					      	<input type="text" class="form-control" id="email" name="email" value="" readonly>
					    </div>
			        <div class="form-check form-check-inline text-center"><br><hr>
					    <div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="active" value="aktif" required>Active
							<?php echo form_error('gridRadios', '<small class="text-danger pl-3">', '</small>');  ?>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="reject" value="reject" required>Reject
							<?php echo form_error('gridRadios', '<small class="text-danger pl-3">', '</small>');  ?>
						</div>
					</div>
				
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Approved</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>


		<script src="<?php echo base_url(); ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).on("click", "#approv", function(){
			var idUser = $(this).data('id');
			var email = $(this).data('email');
			$("#editApprov #id"). val(idUser);
			$("#editApprov #email"). val(email);
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
