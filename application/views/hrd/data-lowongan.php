
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

           <div class="row">
          	<div class="col-lg">
          		<?php echo $this->session->flashdata('message'); ?>
     			
          		<table id="register" class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Job Name</th>
				      <th scope="col">Position</th>
				      <th scope="col">Start Date</th>
				      <th scope="col">End Date</th>
				      <th scope="col">Jumlah Pelamar</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php $i = 1; ?>
				  	<?php foreach ($lwngan as $l): ?>
					    <tr>
					    
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $l['nama_lowongan']; ?></td>
					      <td><?php echo $l['posisi']; ?></td>
					      <?php $id = $l['id']; ?>
					       <td><?php echo $l['tgl_awal_pembuatan']; ?></td>
					        <td><?php echo $l['tgl_akhir_pembuatan']; ?></td>
						  <td><?php echo $l['jml']; ?></td>
					      <td>
					      	<a href="<?php echo base_url()."hrd/detail_employee_data/$id"; ?>" class="badge badge-primary">View</a>
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