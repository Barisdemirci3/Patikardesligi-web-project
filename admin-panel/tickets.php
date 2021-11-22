<?php require_once "sidebar.php"; ?>
      <div id="content">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item">Menüler</li>
              <li class="breadcrumb-item active" aria-current="page">Tickets</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tickets</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tıcket ID</th>
                        <th>Tıcket gönderen kişinin ID'si</th>
                        <th>Ticket konu</th>
                        <th>Ticket durum</th>
                        <th>Etkileşim</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $get_ticket_data=$db->query("select * from ticket");
                      while($ticket_data_write=$get_ticket_data->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <tr>
                        <td>#<?= $ticket_data_write["ticket_id"]; ?></td>
                        <td>#<?= $ticket_data_write["ticket_atan"]; ?></td>
                        <td><?= $ticket_data_write["ticket_konu"]; ?></td>
                        
                        <?php switch ($ticket_data_write["ticket_durum"]) {
                          case 0: ?> <td><span class="badge badge-danger">Cevap verilmedi</span></td>
                             <?php
                            break;
                          
                          case 1:
                            ?> <td><span class="badge badge-warning">Cevap verildi, kullanıcı bekleniyor</span></td> <?php
                            break;
                          
                          case 2:
                            ?> <td><span class="badge badge-success">Ticket kapandı</span></td> <?php break;
                        } ?>
                        <td><a href="ticket-detail.php?ticketid=<?= $ticket_data_write["ticket_id"]; ?>" class="btn btn-sm btn-primary">Detaylar</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b>Patikardesligi</a></b>
            </span>
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

</body>

</html>