 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

         <?php echo form_error('lwngan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

         <div class="row">
          	<div class="col-lg">
          		<?php echo $this->session->flashdata('message'); ?>
          		<table class="table table-hover">
				 <thead>
                      <tr align="center">
                        <th scope="col">No</th>
                        <!-- <th scope="col">id</th> -->
                        <th scope="col">Jobs Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                        <?php foreach ($lwngan as $l): ?>
                          <tr class="text-center">
                            <th scope="row"><?php echo $i; ?></th>
                             
                              <?php $id = $l['lowongan_id']; ?>
                            <td><?php echo $l['nama_lowongan']; ?></td>
                            <td><?php echo $l['posisi']; ?></td>
                            <td>
					      	<a  href="<?php echo base_url()."user/view_loker/$id"; ?>" class="badge badge-success">View</a>
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
