<?php include "sidebar.php";?>


        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tüm ilanlar</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tüm ilanlar</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tüm ilanlar</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Hayvan ID</th>
                        <th>Hayvanı ekleyen kişinin kullanıcı adı</th>
                        <th>Hayvanın isimi</th>
                        <th>Hayvan türü</th>
                        <th>Hayvan ilan başlık</th>
                        <th>Hayvan kısırlık durumu</th>
                        <th>Hayvanın yaşı</th>
                        <th>İlan durumu</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Hayvan ID</th>
                        <th>Hayvanı ekleyen kişinin kullanıcı adı</th>
                        <th>Hayvanın isimi</th>
                        <th>Hayvan türü</th>
                        <th>Hayvan ilan başlık</th>
                        <th>Hayvan kısırlık durumu</th>
                        <th>Hayvanın yaşı</th>
                        <th>İlan durumu</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $dataget= $db->query("select * from hayvanlar");
                      while($datawrite= $dataget->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1"><?= $datawrite["hayvan_id"]; ?></td>
                        <?php $data= $db->prepare("select * from uyeler where uye_id=:id"); $data->execute(["id"=>$datawrite["hayvan_sahip_id"]]); $datayaz= $data->fetch(PDO::FETCH_ASSOC);?>
                        
                        <td><?= $datayaz["uye_nick"]; ?></td>
                        <td><?= $datawrite["hayvan_isim"]; ?></td>
                        <td><?= $datawrite["hayvan_tur"]; ?></td>
                        <td><?= $datawrite["hayvan_ilan_baslik"]; ?></td>
                        <td><?= $datawrite["animal_kisir"]; ?></td>
                        <td><?= $datawrite["animal_yas"]; ?></td>
                        <?php switch ($datawrite["ilan_durum"]) {
                          case 1:
                            ?>   <td><span class="badge badge-success">Yayında</span></td> <?php
                            break;
                          
                          case 0:
                          ?> <td><span class="badge badge-danger">Yayında değil</span></td> <?php
                            break;
                        } ?>
                      

                        
                        
                        
                        
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
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
              <b><a href="#" target="_blank">Patikardesligi</a></b>
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

  <script src="../js/jquery.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->

  <!-- Page level custom scripts -->


</body>

</html>