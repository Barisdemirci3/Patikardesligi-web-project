<?php require_once "sidebar.php"; 
$id=$_GET["ticketid"]; 
checkget($id,"index.php");
$get_ticket_data=$db->query("select * from ticket where ticket_id=$id");
$write_data=$get_ticket_data->fetch(PDO::FETCH_ASSOC);
$member_id=$write_data["ticket_atan"];
$get_user_data=$db->query("select * from uyeler where uye_id=$member_id");
$user_write=$get_user_data->fetch(PDO::FETCH_ASSOC);
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ticket detayları</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item">Menüler</li>
              <li class="breadcrumb-item active" aria-current="page">Ticket detayları</li>
            </ol>
          </div>

          <div class="text-center">
            <h4 class="pt-3">Ticket <b>Detayları</b></h4>
          </div>
          <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="text-center"></div>
                </div>
                <div class="card-body">
            
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ticket Konusu</label>
                      <input type="email" disabled value="<?= $write_data["ticket_konu"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ticket mesajı</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?= $write_data["ticket_icerik"]; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Ticket gönderen kişinin ID'sı</label>
                      <input type="email" disabled value="#<?= $write_data["ticket_atan"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Ticket gönderen kişinin isimi</label>
                      <input type="email" disabled value="<?= $user_write["uye_isim"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Cevap alanı</label>
                      <form onsubmit="return false;" method="POST" >
                      <?php if($write_data["ticket_durum"]==1){
                         ?>
                         <textarea class="form-control" id="response" disabled rows="3" >Zaten bu bilete yanıt vermişsiniz! Yanıtınız: <?= $write_data["ticket_cevap"]; ?></textarea> <?php }else{ ?>
                      <textarea class="form-control" id="response" placeholder="Cevap gönder" rows="3" ></textarea>
                      <?php } ?>
                    </div>
                    <input type="hidden" id="ticketid" value="<?= $write_data["ticket_id"];?>">
                    <?php if($write_data["ticket_durum"]!=1){
                         ?>
                    <button type="submit" onclick="sendResponse();" class="btn btn-primary">Gönder</button>
                    <?php } ?>
                  </form>
                </div>
              </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="#" target="_blank">Patikardesligi</a></b>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="js/admin-control.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>