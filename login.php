<!DOCTYPE html>
<html lang="en">
<?php 
require_once "header.php";
if($_SESSION["uye_nick"]){
	header("Location: index.php");
}
?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Hesabına giriş yap.</h2>
						<form method="POST" onsubmit="return false;">
							<input type="text" id="user" placeholder="Mail adresi" />
							<input type="password" id="password" placeholder="Şifre" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Oturum açık kalsın.
							</span>
							<button type="submit" onclick="login();" class="btn btn-default">Giriş yap</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">VEYA</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Kayıt ol!</h2>
						<form method="POST" onsubmit="return false;">
						<input type="text" id="is01" placeholder="İsim ve Soy isim"/>
							<input type="text" id="k01" placeholder="Kullanıcı adı"/>
							<input type="email" id="m01" placeholder="Mail adresi"/>
							<input type="password" id="ps01" placeholder="Şifre"/>
							<input type="password" id="ps02" placeholder="Tekrar şifre"/>
							
							<button type="submit" onclick="register();" class="btn btn-default">Kayıt ol</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include "footer.php"; ?>
</body>
</html>