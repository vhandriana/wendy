
<!-- Begin Page Content -->
<div class="container-fluid">

			



<nav class="navbar navbar-fixed-top  bg-primary main-nav">
  <div class="container">
    <ul class="nav navbar-nav pull-left"></ul>
    <ul class="nav navbar-nav text-center">
      <h5> Your Time <div id="counter"></div></h5>
        <div class="nav navbar-nav navbar-center" id="pesan" style="text-align: center;">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script>
              var url = "<?php echo base_url('user/gagal'); ?>"; // url tujuan
              var count = 3200; // dalam detik
              function countDown() {
              if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#pesan').html( + waktu + ' seconds.');
                setTimeout("countDown()", 1000);
                } else {
                  window.location.href = url;
                  }
              }
                countDown();
            </script>
        </div>
          <ul class="nav navbar-nav text-center">
            <h5 style="text-align: center;">Good Luck <?php echo $user['name']; ?></h5>
          </ul>
    </ul>
    <ul class="nav navbar-nav pull-right"></ul> 
  </div>
</nav>

         <div id="wrapper"></div>
        <div id="page-inner">           
           <div class="row">
            <div class="col-md-12">                              
                <div class="panel panel-primary">
                    
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                        <div class="row">
                            <div class="col-md-12">
                               
                        
                        <div class="panel-body" style="height: 800px; overflow: auto;">
                             <form role="form" action="<?php echo base_url(); ?>jawaban/jawab" method="post" onsubmit="return confirm('Anda Yakin ?')">
                             <input type="hidden" name="jumlah_soal" value="<?php echo $total_soal; ?>">
                             <input type="text" name="id_jawaban" value="<?php echo $id_jawaban; ?>">
                                <?php $no=0; foreach($soal as $soal) { $no++ ?>

                                    <div class="form-group">
                                        <b><?php echo $no; ?>. </b>
                                        <label>
                                        <?php echo $soal['soal']; ?>
                                        </label>
                                        <input type='text' name='soal[]' value='<?php echo $soal['id_soal']; ?>'/>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jawaban[<?php echo $soal['id_soal']; ?>]" id="optionsRadios1" value="A" required/><b>A. </b> <?php echo $soal['a']; ?>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jawaban[<?php echo $soal['id_soal']; ?>]" id="optionsRadios2" value="B" required/><b>B. </b><?php echo $soal['b']; ?>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jawaban[<?php echo $soal['id_soal']; ?>]" id="optionsRadios3" value="C" required/><b>C. </b><?php echo $soal['c']; ?>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jawaban[<?php echo $soal['id_soal']; ?>]" id="optionsRadios4" value="D" required/><b>D. </b><?php echo $soal['d']; ?>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jawaban[<?php echo $soal['id_soal']; ?>]" id="optionsRadios5" value="E" required/><b>E. </b><?php echo $soal['e']; ?>
                                            </label>
                             </div>
            </div>
              <?php } ?>                            
                                 <button type="submit" class="btn btn-primary">Selesai</button> 
                                </form>
                                <br />
                        </div>

                    </div>
		

 

      

    
   
                               
                               
</div>
        <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->


 <script type="text/javascript">
      $(function(){
        $("#demoForm").formwizard({ 
          formPluginEnabled: true,
          validationEnabled: true,
          focusFirstInput : true,
          formOptions :{
            success: function(data){$("#status").fadeTo(500,1,function(){ $(this).html("You are now registered!").fadeTo(5000, 0); })},
            beforeSubmit: function(data){$("#data").html("data sent to the server: " + $.param(data));},
            dataType: 'json',
            resetForm: true
          },
          inAnimation : {height: 'show'},
              outAnimation: {height: 'hide'},
          inDuration : 700,
          outDuration: 700,
          easing: 'easeOutBounce' //see e.g. http://gsgd.co.uk/sandbox/jquery/easing/ for information on easing
         }
        );
      });
      </script>