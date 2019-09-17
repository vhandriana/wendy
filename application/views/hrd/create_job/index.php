 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

         <?php echo form_error('lwngan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

         <div class="row">
          	<div class="col-lg">
          		<?php echo $this->session->flashdata('message'); ?>
          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewCreatejobModal"><i class='fa fa-plus'></i> Add New Create Job</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Start Date</th>
				      <th scope="col">End Date</th>
				      <th scope="col">Job Name</th>
				      <th scope="col">Position</th>
				      <th scope="col">Education</th>
				      <th scope="col">Gender</th>
				      <th scope="col">Age Min</th>
				      <th scope="col">Age Max</th>
				      <th scope="col">Height</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($lwngan as $l): ?>
					    <tr>
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $l['tgl_awal_pembuatan']; ?></td>
					      <td><?php echo $l['tgl_akhir_pembuatan']; ?></td>
					      <td><?php echo $l['nama_lowongan']; ?></td>
					      <td><?php echo $l['posisi']; ?></td>
					      <td><?php echo $l['pendidikan']; ?></td>
					      <td><?php echo $l['jenis_kelamin']; ?></td>
					      <td><?php echo $l['umur_min']; ?></td>
					      <td><?php echo $l['umur_max']; ?></td>
					      <td><?php echo $l['tinggi_badan']; ?></td>
					      <td>
					      	<a href="" class="badge badge-primary">edit</a>
					      	<a href="" class="badge badge-success">delete</a>
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
		<div class="modal fade" id="NewCreatejobModal" tabindex="-1" role="dialog" aria-labelledby="NewCreatejobModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-full" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="NewCreatejobModalLabel">Add New Create Job</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		     
		      <form action="<?php echo base_url('hrd/create_job'); ?>" method = "post">
		      	<div class="modal-body p-4">
		      		<div class="form-row">
		      			<div class="form-group col-md-6">
						   <!-- <label>Tgl Awal</label> -->
						   <div class="input-group date">
						    <div class="input-group-addon">
						           <!-- <span class="glyphicon glyphicon-th"></span> -->
						       </div>
						       <input placeholder="Enter start date" type="text" class="form-control datepicker" id="tgl_awal" name="tgl_awal" required>
						       
						   </div>
						  </div>
						  <div class="form-group col-md-6">
						   <!-- <label>Tgl Akhir</label> -->
						   <div class="input-group date">
						    <div class="input-group-addon">
						       </div>
						       <input placeholder="Enter end date" type="text" class="form-control datepicker" id="tgl_akhir" name="tgl_akhir" required>
						       
						   </div>
						  </div>
						    <div class="form-group col-md-6">
						      <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan" placeholder="Job Name" required>
						      
						    </div>

						    <div class="form-group col-md-6">
								<select class="form-control" id="posisi" name="posisi" required>
								    <option value="">Choose Position...</option>
								    <option>Sales</option>
								    <option>Purshasing</option>
								    <option>Export Import</option>
								    <option>Sekertaris</option>
								    <option>IT</option>
								    <option>Produksi</option>
								    <option>Teknisi</option>
								    <option>Security</option>
								</select>
							    
							</div>


							<div class="form-group col-md-12">
								<h5>Criteria For Applicants</h5>
							</div>


							<div class="form-group col-md-6">
							    <select class="form-control" id="pendidikan" name="pendidikan" required>
							    <option value="">Choose Education...</option>
							      <option>SLTA (SMA/MA/SMK/MAK)</option>
							      <option>D3</option>
							      <option>S1</option>
							    </select>
							    
							</div>

							<div class="form-group col-md-6">
							    <select class="form-control" id="height" name="height" required>
							    <option value="">Choose Height...</option>
							      <option>160cm -+</option>
							      <option>170cm -+</option>
							      <option>180cm -+</option>
							    </select>
							    
							</div>

							<div class="form-group col-md-12">
								<div class="form-check">
							          <input class="form-check-input" type="radio" name="gridRadios" id="L" value="Laki-laki" required>Laki-laki
							    </div>
							    <div class="form-check">
							          <input class="form-check-input" type="radio" name="gridRadios" id="P" value="Perempuan" required>Perempuan
							    </div>
							    <div class="form-check">
							          <input class="form-check-input" type="radio" name="gridRadios" id="LP" value="laki-laki dan Perempuan" required>Laki-laki dan Perempuan
							   	</div>
							</div>

							<div class="form-group col-md-6">
							    <select class="form-control" id="age_min" name="age_min" required="">
							    <option value="">Choose Age Min...</option>
							      <option value="17 tahun">17 tahun</option>
							      <option value="18 tahun">18 tahun</option>
							      <option value="19 tahun">19 tahun</option>
							      <option value="20 tahun">20 tahun</option>
							      <option value="21 tahun">21 tahun</option>
							      <option value="22 tahun">22 tahun</option>
							      <option value="23 tahun">23 tahun</option>
							      <option value="24 tahun">24 tahun</option>
							      <option value="25 tahun">25 tahun</option>
							    </select>
							    
							</div>


							<div class="form-group col-md-6">
							    <select class="form-control" id="age_max" name="age_max" required>
							    <option value="">Choose Age Min...</option>
							      <option value="17 tahun">17 tahun</option>
							      <option value="18 tahun">18 tahun</option>
							      <option value="19 tahun">19 tahun</option>
							      <option value="20 tahun">20 tahun</option>
							      <option value="21 tahun">21 tahun</option>
							      <option value="22 tahun">22 tahun</option>
							      <option value="23 tahun">23 tahun</option>
							      <option value="24 tahun">24 tahun</option>
							      <option value="25 tahun">25 tahun</option>
							    </select>
							    
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