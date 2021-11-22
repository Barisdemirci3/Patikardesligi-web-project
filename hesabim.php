<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";
SessionCheck();
$dataget= $db->prepare("select * from uyeler where uye_id=:id");
$dataget->execute(["id"=>$_SESSION["id"]]);
$datawrite = $dataget->fetch(PDO::FETCH_ASSOC);
?>
	 
	 <div id="contact-page" class="container">

	      	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Üye bilgileri</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;" enctype="multipart/form-data" method="post">
				            <div class="form-group col-md-12">
                            <h2 class="title text-center">Profil fotoğrafı</h2>
                            <h2 class="title text-center"><img width="150px;" height="125px;" style="
  border-radius: 50%" src="https://www.cyclistmag.com.tr/wp-content/uploads/2020/12/ay%C4%B1.jpg" alt=""></h2>
							<b style="font-size: 12pt;">Kullanıcı adı</b>
				                <input type="text" value="<?= $datawrite["uye_nick"]; ?>" name="" id="nickname" class="form-control" required="required">
				            </div>
				            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">İsim ve Soyisim</b>
				                <input type="text" value="<?= $datawrite["uye_isim"]; ?>" name="" id="name" class="form-control" required="required">
				            </div>
							<div class="form-group col-md-12">
							<b style="font-size: 12pt;">Uye mail adresi</b>
				                <input type="text" value="<?= $datawrite["uye_mail"]; ?>" name="mail" id="mail" class="form-control" required="required">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="changeUserProp();" value="Gönder">
				            </div>   
                            </form>
                            <form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;" enctype="multipart/form-data" method="post">
                            <h2 class="title text-center">Şifre bölümü</h2>
                            <h5 class="text-center">Şifrenizi değiştirmek için ilk önce lütfen eski şifrenizi giriniz!</h5>
                            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">Eski şifreniz</b>
				                <input type="password" name="subject" id="oldpass" class="form-control" required="required">
				            </div>  
                            <b style="font-size: 12pt;">Yeni şifreniz</b>
				                <input type="password" name="subject" id="newpass" class="form-control" required="required">
				            </div> 
                           <div style="opacity: 50%;">Yeni şifreniz 8 karakterden fazla olması gerekmekte.</div>
      
							
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="changePassword();" value="Gönder">
				            </div>
                            </form>
				       
	    			</div>
	    		</div>
	    					
	    	</div>  
    	</div>	
		<?php include "footer.php";
        $dataget=null;
        $db=null;
        ?>
</body>
</html>