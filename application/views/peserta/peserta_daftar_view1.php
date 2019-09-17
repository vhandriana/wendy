<section class="content-header">
    <h1>
        Daftar Peserta
        <small>Daftar peserta, melihat jumlah pelamar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('manager/dashboard') ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Daftar Peserta</li>
        <li class="active">Lihat Daftar Peserta</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->session->flashdata('message'); ?>
                <div class="box">
                    <div class="box-header with-border">
                            <div class="box-title">Posisi : <?php echo $lwngan['posisi']; ?></div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelamar</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pendidikan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php $i = 1; ?>
                    <?php foreach ($lwongan as $l): ?>
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $l['name']; ?></td>
                          <td><?php echo $l['email']; ?></td>
                          <?php $id = $l['id_user']; ?>
                          <td><?php echo $l['jenjang']; ?></td>
                          <td>
                          <a href="<?php echo base_url()."manager/daftar_pelamar/detail_pelamar/$id"; ?>" class="badge badge-primary">Detail</a>
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
</section>

  