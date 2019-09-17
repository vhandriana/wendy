    
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#footer">
    <img src="assets/loker/img//5.png" width="40" height="30" alt="">
    Employee Recruitment System
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#home" class="page-scroll">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lowongan" class="page-scroll">Job Vacancy</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#profil" class="page-scroll">Job Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#produk" class="page-scroll">Our Products</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#tentang" class="page-scroll">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#login" class="page-scroll">Login</a>
      </li>
    </ul>
  </div>
</nav>
   
    <!-- home -->
  <header>
    <section class="" id="">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
            <img src="assets/loker/img/1.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">First Slide</h2>
              <p class="lead">This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <img src="assets/loker/img/2.jpg" class="img-fluid" alt="Responsive images" width="100%">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Second Slide</h2>
              <p class="lead">This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <img src="assets/loker/img/3.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Third Slide</h2>
              <p class="lead">This is a description for the third slide.</p>
            </div>
          </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <img src="assets/loker/img/4.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Four Slide</h2>
              <p class="lead">This is a description for the Four slide.</p>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
</section>

  </header>
    <!-- akhir home -->

<br>
    <!-- lowongan -->
    <section class="lowongan" id="lowongan">
      <div class="container">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h2 class="text-center">Job Vacancy</h2>
            <hr>
          </div>
        </div>
          <table class="table table-hover">
                    <thead>
                      <tr align="center">
                        <th scope="col">No</th>
                      <!--   <th scope="col">id</th> -->
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
                            <!--   <td><?php echo $l['id']; ?></td> -->
                              <?php $id = $l['lowongan_id']; ?>
                            <td><?php echo $l['nama_lowongan']; ?></td>
                            <td><?php echo $l['posisi']; ?></td>
                            <td>
                              <a  href="<?php echo base_url()."auth/detail_lowongan/$id"; ?>" class="badge badge-success">read more</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                      <?php endforeach; ?>
                    </tbody>
          </table>       
        </div>
      </div>
    </section>
    <!-- akhir lowongan -->

    <br>
    <!-- job_profil -->
     <section class="profil" id="profil">
      <div class="container">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h2 class="text-center">Job Profile</h2>
            <hr>
          </div>
        </div>
      <div id="carouselasal" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselasal" data-slide-to="0" class="active"></li>
          <li data-target="#carouselasal" data-slide-to="1"></li>
          <li data-target="#carouselasal" data-slide-to="2"></li>
          <li data-target="#carouselasal" data-slide-to="3"></li>
        </ol>

         <div class="container">
                <div class="row">
                  <div class="col-12 text-right mb-4">
                    <a class="btn btn-outline-secondary prev" href="#carouselasal" role="button" data-slide="prev" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                    <a class="btn btn-outline-secondary next" href="#carouselasal" role="button" data-slide="next" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>

        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
            <div class="card-deck">
              <div class="card">
                <img src="assets/loker/img/catagory-img/sales.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Sales dan Marketing</h5>
                  <p class="card-text">Kegiatan penjualan produk ialah tanggung jawab seorang yang berada pada profesi <a href="<?php echo base_url('auth/job_Profile_sales') ?>">read more</a></p>
                </div>
              </div>
              <div class="card">
                <img src="assets/loker/img/catagory-img/pch.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Purchasing</h5>
                  <p class="card-text">Puchasing merupakan salah satu fungsi yang sangat penting dalam Manajemen Material, Selain dilibatkan dalam pembelian Material <a href="<?php echo base_url('auth/job_Profile_pch') ?>">read more</a></p>
                </div>
              </div>
              <div class="card">
                <img src="assets/loker/img/catagory-img/export1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Export Import</h5>
                  <p class="card-text">Export adalah suatu proses transaksi barang atau komoditas yang dilakukan dari suatu negara ke negara lain. <a href="<?php echo base_url('auth/job_Profile_ExpImp') ?>">read more</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="card-deck">
              <div class="card">
                <img src="assets/loker/img/catagory-img/bahasa pemrog.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">IT Support</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action. <a href="<?php echo base_url('auth/job_Profile_itsupport') ?>">read more</a></p>
                </div>
              </div>
              <div class="card">
                <img src="assets/loker/img/catagory-img/accounting.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Staff Accounting</h5>
                  <p class="card-text">Divisi akunting dan finance adalah bagian yang memegang peranan krusial dalam perusahaan. Dengan kinerja yang baik dari bagian akunting. <a href="<?php echo base_url('auth/job_Profile_accounting') ?>">read more</a></p>
                </div>
              </div>
              <div class="card">
                <img src="assets/loker/img/catagory-img/sekretaris.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Sekretaris</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action. <a href="<?php echo base_url('auth/job_Profile_sekretaris') ?>">read more</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
    <!-- akhir job_profil -->

   


    <!-- produk -->
    <section class="produk" id="produk">
      <div class="container">
        <div class="row mb-4">
          <div class="col-sm-12">
            <h2 class="text-center">Our Product</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="card-deck">
            <div class="card">
              <img class="card-img-top" src="assets/loker/img/men's blazer.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title text-center">Men's Blazer</h2>
                </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="assets/loker/img/men's vest.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title text-center">Men's Vest</h2>
                </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="assets/loker/img/men's pant.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title text-center">Men's Pant</h2>
                </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="assets/loker/img/men's suit.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title text-center">Men's Suit</h2>
                </div>
            </div>
        </div>  
        </div>
      </div>
    </section>
    <!-- akhir produk -->

    <!-- tentang -->
    <section class="tentang" id="tentang">
      <div class="container">
        <div class="row mb-1">
          <div class="col-sm-12">
            <h2 class="text-center">About Us</h2>
            <hr>
          </div>
        </div>

        <div class="row col-sm-12">
            <div class="col-sm-6">
              <div class="embed-responsive embed-responsive-1by1">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hF-DoaBQeQ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="embed-responsive embed-responsive-1by1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.748925778778!2d107.64194921427705!3d-6.920589694999609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8755a573c65%3A0x82326dea70856c19!2sPT.+Daese+Garmin!5e0!3m2!1sen!2sid!4v1563022125561!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
         
        </div>        
      </div> 
    </section>
    <!-- akhir tentang -->

    <!-- login -->
    <section class="login" id="login">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">Login</h2>
            <hr>
          </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row">
                 <!--  <img src="images/daese.jpg" class="img-fluid"> -->
                  <div class="col-lg-6 d-none d-lg-block"><img src="assets/loker/img/daese.jpg" class="img-fluid" style="height: 375px;"></div>
                    <div class="col-lg-6">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                        </div>
                        <?php echo $this->session->flashdata('message');?>
                          <form class="user" method="post" action="<?php echo base_url('auth#login');?>">
                            <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?php echo set_value('email'); ?>">
                              <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                              Login
                            </button>
                          </form>
                          <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth/forgotPassword') ?>">Forgot Password?</a>
                          </div>
                          <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth/register') ?>">Create an Account!</a>
                          </div>
                           <div class="text-center">
                            <a class="small" href="<?php echo base_url('manager/welcome') ?>">Create an Account!</a>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir login -->

<!-- footer -->
<!-- Footer -->
      <footer class="sticky-footer bg-dark">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: white; padding-bottom: 5;">Copyright &copy; Sistem Penerimaan Karyawan <?php echo date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
<!-- akhir footer -->


     