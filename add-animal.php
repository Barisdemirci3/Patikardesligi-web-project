<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";
if(!$_SESSION["uye_nick"]){
	header("Location:index.php");
}
?>
	 
	 <div id="contact-page" class="container">

	      	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Dostumuzu ekle!</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;" enctype="multipart/form-data" method="post">
				            <div class="form-group col-md-6">
							<b style="font-size: 12pt;">Dostumuzun isimi</b>
				                <input type="text" name="name" id="an01" class="form-control" required="required">
				            </div>
				            <div class="form-group col-md-6">
							<b style="font-size: 12pt;">Dostumuzun Türü</b>
				               <select style="height: 45px;" name="select" id="sel01">
							<option value="Köpek">Köpek</option>
							<option value="Kedi">Kedi</option>
							<option value="Kuş">Kuş</option>
							<option value="Diğer">Diğer</option>
							</select>
				            </div>
				            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">Dostumuz için açtığımız yardım ilanınızın başlığı</b>
				                <input type="text" name="subject" id="subj" class="form-control" required="required">
				            </div>
							<div class="form-group col-md-12">
							<b style="font-size: 12pt;">Dostumuz kısır mı? (Eğer kısırlaştırılabilecek bir hayvan değil ise boş alana "Diğer" yazın.</b>
				                <input type="text" name="subject" id="kisir" class="form-control" required="required">
				            </div>
							<div class="form-group col-md-12">
							<b style="font-size: 12pt;">Dostumuzun yaşı</b>
				                <input type="text" name="subject" id="yas" class="form-control" required="required">
				            </div>
				            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">Sevimli dostumuzun çeşitli özelliklerini ve sevip sevmediği şeyleri içeren yazı (En fazla 256 karakter)</b>
				                <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>  
				            </div>            
							<div class="form-group col-md-12">
							<b style="font-size: 12pt;">Sevimli dostumuzun yüzü görünecek şekilde olan bir fotoğrafını yükleyiniz</b>
				                
								<br>
								<br>
								<b style="font-size: 16pt; color:red;">Uyarı! Yardım ilanınızda, ilan ekleme kurallarını ihlâl eden bir kısım olursa ilanınız onaylanmayacaktır! Lütfen dikkat ediniz.</b>   
				            </div>              
							
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="addanimal();" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    					
	    	</div>  
    	</div>	
		<?php include "footer.php"; ?>
</body>
</html>