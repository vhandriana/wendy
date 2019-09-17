<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Registrasi
		<small>Daftar registrasi pelamar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('manager/dashboard') ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Data Registrasi</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
            <?php echo $this->session->flashdata('message'); ?>
                <div class="box">
                    <div class="box-header with-border">
    						<div class="box-title">Daftar Registrasi</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($regist as $l): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $l['name']; ?></td>
                                    <td><?php echo $l['email']; ?></td>
                                    <td><?php echo date('d F Y', $l['date_create']); ?></td>
                                    <td><?php echo $l['status']; ?></td>
                                    <td>
                                       <a id="regist_setuju" href="" class="badge badge-success" data-toggle="modal" data-target="#modal-setujui" data-id="<?php echo $l['id']; ?>">Setujui</a>
                                        <a id="regist_delete" href="" class="badge badge-success" data-toggle="modal" data-target="#modal_delete" data-id="<?php echo $l['id']; ?>" data-status="<?php echo $l['status']; ?>">hapus</a>
                                    <!--    <a href="<?php echo base_url();?>manager/register/hapus_data_register/<?php echo $l['id']; ?>" id="regist_hapus" onclick="return confirm('Anda yakin ?')" class="badge badge-primary">Hapus</a> -->
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

    <div class="modal" id="modal-setujui" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <form action="<?php echo base_url().'manager/register/register_list' ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Setujui Registrasi Pelamar</div>
                </div>
               
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body" id="editApprov">
                            <div id="form-pesan"></div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_regist" name="id_regist">

                                <select class="form-control" id="regist_keputusan" name="regist_keputusan" required>
                                    <option value="">Pilih keputusan...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="tambah-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    </div>

    <div class="modal" id="modal_delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <form action="<?php echo base_url().'manager/register/hapus_data_register' ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Apakah Anda yakin ?</div>
                </div>
               
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body" id="hapusregist">
                            <div id="form-pesan"></div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_regist" name="id_regist">
                                <input type="hidden" class="form-control" id="status" name="status">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="tambah-simpan" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </form>
    </div>

   

<script type="text/javascript">
 $(document).on("click", "#regist_setuju", function(){
            var idUser = $(this).data('id');
            $("#editApprov #id_regist"). val(idUser);
        }) 

  $(document).on("click", "#regist_delete", function(){
            var idUser = $(this).data('id');
            var status = $(this).data('status');
            $("#hapusregist #id_regist"). val(idUser);
            $("#hapusregist #status"). val(status);
        }) 

</script>