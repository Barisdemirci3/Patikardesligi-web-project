<?php
require_once "sidebar.php";
// Members data //
$dataget = $db->prepare("SELECT * FROM uyeler ORDER BY uye_id DESC LIMIT 5 ");
$dataget->execute();
$get_ticket_data= $db->prepare("select * from ticket ORDER BY ticket_id ASC LIMIT 3");
$get_ticket_data->execute();
$getanimaldata = $db->query("select * from hayvanlar")->rowCount();
$getanimaldata2 = $db->query("select * from hayvanlar WHERE ilan_durum=0")->rowCount();
?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">İstatistikler</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">İstatistikler</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Toplam ilan sayısı</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getanimaldata ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                     
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Beklemede olan ilan sayısı</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getanimaldata2; ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="far fa-pause-circle fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Toplam kayıtlı kullanıcı sayısı</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $dataget->rowCount(); ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Cevap bekleyen\beklenen Ticket sayısı</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getrow=$db->query("select * from ticket where ticket_durum=0 or ticket_durum=2")->rowCount(); ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            
            <!-- Pie Chart -->
            
            <!-- Üyeler tablosu -->
            <div class="col-xl-12 col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">En son kayıt olan 5 üye</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Üye ID</th>
                        <th>Üye isim</th>
                        <th>Üye kullanıcı adı</th>
                        <th>Üye mail adresi</th>
                        <th>Üye yetki</th>
                        <th>Üye IP adresi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                      while($datawrite = $dataget->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><a href="#"><?= $datawrite["uye_id"]; ?></a></td>
                        <td><?= $datawrite["uye_isim"]; ?></td>
                        <td><?= $datawrite["uye_nick"]; ?></td>
                        <td><?= $datawrite["uye_mail"]; ?></td>
                        <?php switch ($datawrite["uye_yetki"]) {
                          case 1:
                           ?> <td><span class="badge badge-success">Admin</span></td> <?php 
                            break;
                          
                          default:
                          ?>  <td><span class="badge badge-success">Üye</span></td> <?php
                            break;
                        } 

                        ?>
                        
                        <td>192.168.64.2</td>
                      </tr>
                     
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            
            <!-- Tickets-->
            <div class="col-xl-12 col-lg-12 ">
              <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Müşterilerden gelen son üç(3) ticket</h6>
                </div>
                <div>
                  <?php while($ticket_write=$get_ticket_data->fetch(PDO::FETCH_ASSOC)){ ?>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="ticket-detail.php?ticketid=<?= $ticket_write["ticket_id"]; ?>">
                      <div class="text-truncate message-title"><?= $ticket_write["ticket_konu"] ?></div>
                      <div class="small text-gray-500 message-time font-weight-bold">
                      <?php echo substr($ticket_write["ticket_icerik"],0,100)."..."; ?> · 12:58</div>
                    </a>
                  </div>
                  <?php } ?>
                 
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="tickets.php">Daha Fazla <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->


          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b>Pati Kardeşliği</b>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>