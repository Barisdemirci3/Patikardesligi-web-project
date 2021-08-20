<?php
$url= "192.168.64.2";
include "connect.php";
include "functions.php";
if(isset($_POST["username"])){
$datas = [post("username"), post("mail"), post("pass"), post("pass2"), post("name")];
if (filter_var($datas[1], FILTER_VALIDATE_EMAIL)) {
    $veri = $db->prepare("select * from uyeler where uye_mail=:mail OR uye_nick=:nick");
    $veri->execute(["mail" => $datas[1],"nick"=> $datas[0]]);
    $veri->fetch(PDO::FETCH_ASSOC);
    $veri = $veri->rowCount();
    if($veri==0){
        $array["kayit"]= "Başarılı bir şekilde kayıt oldunuz! Sol tarafdan giriş yapabilirsiniz.";
        $memberadd=$db->prepare("insert into uyeler set uye_nick=?, uye_mail=?, uye_sifre=?, uye_isim=?");
       $password= password_hash($datas[2], PASSWORD_BCRYPT);
       $memberadd->execute([$datas[0],$datas[1],$password,$datas[4]]);
    }
    else{
     $array["zaten_kayitli"]= "Bu kullanıcı zaten sisteme kayıtlı! Farklı bir e-mail adresi veya kullanıcı adı ile kayıt olmayı deneyin.";
    }
} else {
  $array["mail_formati"]= "Mail adresi formatınız hatalı!";
}
echo json_encode($array);
}
if(isset($_POST["usertrim"])){
    $veriler= [post("usertrim"), post("passwordtrim")];
    if (!filter_var($veriler[0], FILTER_VALIDATE_EMAIL)){
        $array["email"]= "Mail tipi hatalı!";
    }
    else{
    $sifrecek= $db->prepare("select * from uyeler where uye_mail=:mail");
    $sifrecek->execute(["mail"=>$veriler[0]]);
    $sifrecek=$sifrecek->fetch(PDO::FETCH_ASSOC);
    if(!$sifrecek){
        $array["hata"]= "Mail adresiniz veya şifreniz hatalı!";
    }else{
    $passwordhash=password_verify($veriler[1],$sifrecek["uye_sifre"]);
    if($passwordhash==1){
        session_start();
        ob_start();
        $_SESSION["id"]=$sifrecek["uye_id"];
        $_SESSION["uye_nick"]=$veriler[0];
        $_SESSION["uye_mail"]= $sifrecek["uye_mail"];
        $array["basarili"]="Başarılı bir şekilde giriş yapıldı!"; 
    }
    else{
       $array["hata"]= "Mail adresiniz veya şifreniz hatalı!";    
    }
}
    }

    echo json_encode($array);
}

if(isset($_POST["animalname"])){
    session_start();
    $animaldata= [post("animalname"),post("animaltur"),post("animalsubj"),post("message"),post("animalyas"),post("animalkisir")];
    if($animaldata[1]== "Köpek" || $animaldata[1]== "Kedi" || $animaldata[1]== "Kuş" || $animaldata[1]== "Diğer"){
    $array["basarili"]="Tür kontrol edildi, başarılı!";
    $animal=$db->prepare("insert into hayvanlar set hayvan_sahip_id=?, hayvan_isim=?, hayvan_tur=?, hayvan_ilan_baslik=?, hayvan_message=?, animal_yas=?, animal_kisir=?");
    $animal->execute([$_SESSION["id"],$animaldata[0],$animaldata[1],$animaldata[2],$animaldata[3],$animaldata[4],$animaldata[5]]);
    $array["success_animal"]="Dostunuz başarılı bir şekilde eklendi! Yönetici onayından sonra ilanınız yayınlanacaktır.";
    }else{
    $array["hata"]="Seçilen tür kayıtlı türlerden değildir! Kontrol ediniz.";
    }  
    echo json_encode($array);
}

    

?>
