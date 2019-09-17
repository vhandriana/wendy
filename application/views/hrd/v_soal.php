
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          	<!-- Page Heading -->
          	<h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>


     
     	 	<div id="page-wrapper" >
            	<div id="page-inner">
             
	                <ul class="nav nav-pills">
	                  <li class="nav-item">
	                    <a class="nav-link" href="<?php echo base_url('hrd/exam');?>">Category</a>
	                  </li>
	                  <li class="nav-item">
	                    <a class="nav-link active" href="#">Question</a>
	                  </li>
	                </ul><br>

                	<div class="row">
                    	<div class="col-lg-12">
	             
	                  		<p><a href="" class='btn btn-success' data-toggle="modal" data-target="#NewSoalModal"><i class='fa fa-plus'></i> Add Question</a></p>
	                    		<div class="panel panel-default">
                    				<div class="row">
                						<div class="col-md-12">
                							<?php echo $this->session->flashdata('message'); ?>
						                    <div class="panel panel-default">
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table id="register" class="table table-hover">
						                                    <thead>
						                                        <tr align="center">
						                                            <th>No</th>
						                                            <th>Questions</th>
						                                            <th>ID Category</th>
						                                            <th>Answer A</th>
						                                            <th>Answer B</th>
						                                            <th>Answer C</th>
						                                            <th>Answer D</th>
						                                            <th>Answer E</th>
						                                            <th>Key</th>
						                                            <th>Stasus</th>
						                                            <th>Action</th>
						                                        </tr>
						                                    </thead>
						                                    <tbody>						      
						                                    	<?php $i = 1; ?>
													  			<?php foreach ($lwngan as $kon): ?>
														    	<tr align="center">
														    
														      		<th scope="row"><?php echo $i; ?></th>
														      		<td><?php echo $kon['soal']; ?></td>
						                                            <td><?php echo $kon['id_paket']; ?></td>
						                                            <td><?php echo $kon['a']; ?></td>
						                                            <td><?php echo $kon['b']; ?></td>
						                                            <td><?php echo $kon['c']; ?></td>
						                                            <td><?php echo $kon['d']; ?></td>
						                                            <td><?php echo $kon['e']; ?></td>
						                                            <td><?php echo $kon['kunci']; ?></td>
						                                            <td><?php echo $kon['status']; ?></td>              
									                                <td>
									                                  <!--   <a href="<?php echo base_url();?>hrd/update_soal/<?php echo $kon['id_soal']; ?>" class="badge badge-primary">Change</a>
 -->
									                                    <a href="<?php echo base_url();?>hrd/delete_soal/<?php echo $kon['id_soal']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ?')">Delete</a>
									                                </td>
														    	</tr>
														    	<?php $i++; ?>
																<?php endforeach; ?>
						                                    </tbody>
						                                </table>
						                            </div>
						                        </div>
						                    </div>
						                </div>
            						</div>
        						</div>
    					</div>
					</div>
				</div>
			</div>
        </div>
        <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->


      <!-- Modal -->
	<div class="modal fade" id="NewSoalModal" tabindex="-1" role="dialog" aria-labelledby="NewSoalModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="NewSoalModalLabel">Add New Matter Package</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		     
		      	<form action="<?php echo base_url('hrd/soal'); ?>" method = "post">
			      	<div class="modal-body p-4">
			      		<div class="form-group">
						 	<select name="sp" id="sp" class="form-control">
						 		<option value="">Select  ID Matter Package</option>
						 		<?php foreach ($soal_paket as $sp): ?>
						 			<option value="<?php echo $sp['id_paket']; ?>"><?php echo $sp['id_paket']; ?>
						 			</option>
						 		<?php endforeach; ?>
						 	</select>
					 	</div>
			      		<div class="form-row">
			      			<div class="form-group col-md">
							    <textarea type="text" class="form-control" id="Soal" name="Soal" rows="5" placeholder="Question" required></textarea>
							</div>
						</div>
						<div class="form-row">
			      			<div class="form-group col-md">
							    <input type="text" class="form-control" id="answerA" name="answerA" placeholder="Answer A" required>
							</div>
						</div>
						<div class="form-row">
			      			<div class="form-group col-md">
							    <input type="text" class="form-control" id="answerB" name="answerB" placeholder="Answer B" required>
							</div>
						</div>
						<div class="form-row">
			      			<div class="form-group col-md">
							    <input type="text" class="form-control" id="answerC" name="answerC" placeholder="Answer C" required>
							</div>
						</div>
						<div class="form-row">
			      			<div class="form-group col-md">
							    <input type="text" class="form-control" id="answerD" name="answerD" placeholder="Answer D" required>
							</div>
						</div>
						<div class="form-row">
			      			<div class="form-group col-md">
							    <input type="text" class="form-control" id="answerE" name="answerE" placeholder="Answer E" required>
							</div>
						</div>
						<div class="form-group">
						 	<select name="key" id="key" class="form-control">
						 		<option value="">Select the answer key</option>
						 		<option value="A">A</option>
						 		<option value="B">B</option>
						 		<option value="C">C</option>
						 		<option value="D">D</option>
						 		<option value="E">E</option>
						 	</select>
					 	</div>
					 	<div class="form-group">
						 	<select name="status" id="status" class="form-control">
						 		<option value="">Status</option>
						 		<option value="Show">Show</option>
						 		<option value="Hide">Hide</option>
						 	</select>
					 	</div>
					</div>
						<div class="modal-footer">
				        	<button type="submit" class="btn btn-primary" name="add">Add</button>
				      	</div>
          		</form>
		    </div>
		  </div>
	</div>

     