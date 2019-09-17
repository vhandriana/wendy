
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
           <h4 class="breadcrumb-item fas fa-address-card"> Detail Employee Data</h4><br><br>

          

        <div class="row">
            <div class="col-lg">
              <!-- <?php echo $this->session->flashdata('message'); ?> -->
          
              <table id="#" class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Education</th> 
              <th scope="col">Gender</th> 
              <th scope="col">Age</th> 
              <th scope="col">Height</th> 
              <th scope="col">Action</th>
            </tr>
          </thead>


          <tbody>

            <?php $i = 1; ?>
            <?php foreach ($lwongan as $l): ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <?php $id = $l['id_user']; ?>
                <td><?php echo $l['name']; ?></td>
                <td><?php echo $l['email']; ?></td>
                <td><?php echo $l['jenjang']; ?></td>
                <td><?php echo $l['gender']; ?></td>
                <td><?php echo $l['umur']; ?></td>
                <td><?php echo $l['tinggi_bdn']; ?></td>





                <td>
                  <!-- <a href="<?php echo base_url('hrd/detail_employee_data'); ?>" class="badge badge-primary"></a> -->
                  <a href="<?php echo base_url()."hrd/detail_pelamar/$id"; ?>" class="badge badge-primary">Detail</a>
                </td>
              </tr>
              <?php $i++; ?>
          <?php endforeach; ?>
          </tbody>
      
        </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->