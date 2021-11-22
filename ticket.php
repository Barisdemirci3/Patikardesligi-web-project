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
	    				<h2 class="title text-center">Ticket</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" onsubmit="return false;" enctype="multipart/form-data" method="post">
				            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">Ticket başlığı</b>
				                <input type="text" name="subject" id="ticket_subject" class="form-control" required="required">
				            </div>
				            <div class="form-group col-md-12">
							<b style="font-size: 12pt;">Ticket mesajı</b>
				                <textarea name="message" id="ticket_message" required="required" class="form-control" rows="12" ></textarea>  
				            </div>            
							  
				            </div>              
							Kullandığım bilet sistemini amacı dışında kullanmadım.<input type="checkbox" required="required" name="" id="ticket_checkbox">
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="ticket_send();" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    					
	    	</div>  
    	</div>	
		<?php include "footer.php"; ?>
</body>
</html>