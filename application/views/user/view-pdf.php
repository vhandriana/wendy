
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          <?php 

          // $file = 'assets/BAB_VI.pdf';
          $file = 'BAB_VI.pdf';
          	header('Content-type: application/pdf');
          	header('Content-Disposition: inline; filename="' . $file . '"');
          	header('Content-Transfer-Encoding: binary');
          	header('Accept-Ranges: bytes');
          	@readfile($file);


           ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

   
