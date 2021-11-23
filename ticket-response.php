<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";
if(!$_SESSION["uye_nick"]){
	header("Location:index.php");
}
//Üye idsi
$member_id= $_SESSION["id"];
//Get ticket data
$getdata = $db->query("SELECT * FROM ticket where ticket_atan=$member_id");
?>

<div id="contact-page" class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2 class="title text-center">Cevap verin</h2>
            <form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;"
                enctype="multipart/form-data" method="post">
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket konusu</b>
                    <input type="text" name="subject" id="subj" disabled class="form-control" >
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket mesajı</b>
                    <input type="text" name="subject" id="kisir" disabled class="form-control" >
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Ticket atılış tarihi</b>
                    <input type="text" name="subject" id="yas" disabled class="form-control" >
                </div>
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Yönetici cevabı</b>
                    <textarea name="message" id="message" class="form-control" disabled rows="8"></textarea>
                </div>
                
                <div class="form-group col-md-12">
                    <b style="font-size: 12pt;">Yanıt bölümü</b>
                    <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="responseticket();"
                        value="Gönder">
                </div>
            </form>
        </div>


    </div>
</div>
</div>
<?php include "footer.php"; ?>
</body>

</html>