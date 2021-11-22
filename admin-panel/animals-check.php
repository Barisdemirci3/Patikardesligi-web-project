<?php include "sidebar.php";
if(isset($_GET["aggre"])){
  $data = $_GET["aggre"];
  if(is_numeric($data)){
    if(!$_SESSION["uye_durum"] || $_SESSION["uye_durum"]==1){
    $dataupdate= $db->prepare("UPDATE hayvanlar SET ilan_durum=1 WHERE hayvan_id={$_GET['aggre']}");
    $dataupdate->execute();
    }
  }
  else{
  ?>
<script>
alert("Gelen veri sayısal bi değere sahip olmalıdır!");
</script>
<?php } } ?>
<?php 
  if(isset($_GET["disaggre"])){
    $data2 = $_GET["disaggre"];
    if(is_numeric($data2)){
      if(!$_SESSION["uye_durum"] || $_SESSION["uye_durum"]==1){
      $dataupdate2= $db->prepare("DELETE FROM hayvanlar WHERE hayvan_id={$_GET['disaggre']}");
      $dataupdate2->execute();
      }
    }else{
 ?> <script>
alert("Gelen veri sayısal bi değere sahip olmalıdır!");
</script>
<?php 
  } }
  ?>




<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Onay bekleyen ilanlar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Onay bekleyen ilanlar</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- Datatables -->

        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Onay bekleyen ilanlar</h6>
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
                                <th>İşlemler</th>
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
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $dataget= $db->prepare("select * from hayvanlar where ilan_durum=0");
                      $dataget->execute();
                      while($datawrite= $dataget->fetch(PDO::FETCH_ASSOC)){
                      ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $datawrite["hayvan_id"]; ?></td>
                                <?php $data= $db->prepare("select * from uyeler where uye_id=:id"); $data->execute(["id"=>$datawrite["hayvan_sahip_id"]]); $datayaz= $data->fetch(PDO::FETCH_ASSOC);?>

                                <td><?= $datayaz["uye_isim"]; ?></td>
                                <td><?= $datawrite["hayvan_isim"]; ?></td>
                                <td><?= $datawrite["hayvan_tur"]; ?></td>
                                <td><?= $datawrite["hayvan_ilan_baslik"]; ?></td>
                                <td><?= $datawrite["animal_kisir"]; ?></td>
                                <td><?= $datawrite["animal_yas"]; ?></td>
                                <td><a href="?aggre=<?= $datawrite["hayvan_id"]; ?>" title="Onayla"
                                        class="btn btn-success"><i class="fas fa-check"></i></a><a href=""
                                        title="Detaylı göster" class="btn btn-info"><i
                                            class="fas fa-info-circle"></i></a><a
                                        href="?disaggre=<?= $datawrite["hayvan_id"]; ?>" title="Reddet"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a></td>



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
            <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
                </script> - developed by
                <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
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