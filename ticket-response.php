<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";
if(!$_SESSION["uye_nick"]){
	header("Location:index.php");
}
//Üye idsi
$member_id= $_SESSION["id"];
//Ticket id
$ticket_id= $_GET["ticket-id"];
if(!is_numeric($ticket_id)){
    die("Bilinmeyen bir hata oluştu!");
}
else{
//Get ticket data
$getdata = $db->query("SELECT * FROM ticket where ticket_atan=$member_id && ticket_id=$ticket_id");
if($getdata->rowCount()==0){
    die("Bir hata oluştu!");
}else{
$writedata = $getdata->fetch(PDO::FETCH_ASSOC);
if($writedata["ticket_atan"]==$member_id){
?>

<div id="contact-page" class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2 class="title text-center">Cevap verin</h2>
            <form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;"
                enctype="multipart/form-data" method="post">
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket konusu</b>
                    <input type="text" name="subject" value="<?= $writedata["ticket_konu"]; ?>" id="subj" disabled
                        class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket mesajı</b>
                    <input type="text" name="subject" value="<?= $writedata["ticket_icerik"]; ?>" id="kisir" disabled
                        class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket atılış tarihi</b>
                    <input type="text" name="subject" value="<?= $writedata["ticket_tarih"]; ?>" id="yas" disabled
                        class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Yönetici cevabı</b>
                    <textarea name="message" id="message" class="form-control" disabled
                        rows="8"><?php if($writedata["ticket_durum"]==0){echo "Yönetici bu bilete yanıt vermediği için bileti yanıtlayamazsınız!";}else{echo $writedata["ticket_cevap"];}?></textarea>
                </div>
                <?php if($writedata["ticket_durum"]!=0 && $writedata["ticket_durum"]!=2){?>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Yanıt bölümü</b>
                    <textarea name="message" id="ticketmessage" required="required" placeholder="Yanıt verin!" ;
                        class="form-control" rows="8"></textarea>
                </div>
                
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="responseticket();"
                        value="Yanıtla">
                </div>
                <?php } ?>
            </form>
        </div>


    </div>
</div>
</div>
<?php include "footer.php"; } } }?>
</body>

</html>