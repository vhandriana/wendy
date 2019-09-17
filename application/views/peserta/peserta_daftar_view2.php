
<section class="content-header">
    <h1>
        Daftar Peserta
        <small>Daftar peserta, melihat jumlah pelamar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('manager/dashboard') ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Peserta</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->session->flashdata('message'); ?>
                <div class="box">
                    <div class="box-header with-border">
                            <div class="box-title">Daftar Peserta</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Lowongan</th>
                                    <th scope="col">Posisi</th>
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
                          <?php $id = $l['lowongan_id']; ?>
                          <td><?php echo $l['jml']; ?></td>
                          <td>
                            <a href="<?php echo base_url()."manager/daftar_pelamar/detail_data_lowongan/$id"; ?>" class="badge badge-primary">Lihat</a>
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



<script lang="javascript">
    function refresh_table(){
        $('#table-peserta').dataTable().fnReloadAjax();
    }

    function tambah(){
        $('#form-pesan').html('');
        $('#tambah-username').val('');
        $('#tambah-password').val('');
        $('#tambah-nama').val('');
        $('#tambah-email').val('');

        $("#modal-tambah").modal("show");
        $('#tambah-username').focus();
    }

    function edit(id){
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_id/'+id+'', function(data){
            if(data.data==1){
                $('#edit-id').val(data.id);
                $('#edit-username').val(data.username);
                $('#edit-password').val(data.password);
                $('#edit-nama').val(data.nama);
                $('#edit-email').val(data.email);
                $('#edit-group').val(data.group);
                
                $("#modal-edit").modal("show");
            }
            $("#modal-proses").modal('hide');
        });
    }

    $(function(){
        $("#group").change(function(){
            refresh_table();
        });

        $('#edit-simpan').click(function(){
            $('#edit-pilihan').val('simpan');
            $('#form-edit').submit();
        });
        $('#edit-hapus').click(function(){
            $('#edit-pilihan').val('hapus');
            $('#form-edit').submit();
        });
        $('#btn-edit-pilih').click(function(event) {
            if($('#check').val()==0) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
                $('#check').val('1');
            }else{
                $(':checkbox').each(function() {
                    this.checked = false;
                });
                $('#check').val('0');
            }
        });
        $('#btn-edit-hapus').click(function(){
            $("#modal-hapus").modal('show');
        });
        $('#btn-hapus').click(function(){
            $("#form-hapus").submit();
        });

        $('#form-hapus').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/hapus_daftar_siswa",
                    type:"POST",
                    data:$('#form-hapus').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#modal-hapus").modal('hide');
                            notify_success(obj.pesan);
                            $('#check').val('0');
                        }else{
                            $("#modal-proses").modal('hide');
                            notify_error(obj.pesan);
                        }
                    }
            });
            return false;
        });

        $('#form-edit').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/edit",
                    type:"POST",
                    data:$('#form-edit').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#modal-edit").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-edit').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

        $('#form-tambah').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/tambah",
                    type:"POST",
                    data:$('#form-tambah').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#modal-tambah").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

        $('#table-peserta').DataTable({
                  "paging": true,
                  "iDisplayLength":10,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
    					{"bSearchable": false, "bSortable": false, "sWidth":"20px"},
    					{"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
    					{"bSearchable": false, "bSortable": false, "sWidth":"80px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"30px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "responsive": true,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "group", "value": $('#group').val()} );
                  }
         });          
    });
</script>