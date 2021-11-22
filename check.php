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
        $memberadd=$db->prepare("insert into uyeler set uye_nick=?, uye_mail=?, uye_sifre=?, uye_isim=?, uye_yetki=0, uye_ip=?");
       $password= password_hash($datas[2], PASSWORD_BCRYPT);
       $memberadd->execute([$datas[0],$datas[1],$password,$datas[4], $_SERVER['REMOTE_ADDR']]);
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
        $_SESSION["uye_isim"]= $sifrecek["uye_isim"];
        $_SESSION["uye_mail"]= $sifrecek["uye_mail"];
        $_SESSION["uye_durum"]= $sifrecek["uye_yetki"];
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
    $animal=$db->prepare("insert into hayvanlar set hayvan_sahip_id=?, hayvan_isim=?, hayvan_tur=?, hayvan_ilan_baslik=?, hayvan_message=?, animal_yas=?, animal_kisir=?, ilan_durum=0");
    $animal->execute([$_SESSION["id"],$animaldata[0],$animaldata[1],$animaldata[2],$animaldata[3],$animaldata[4],$animaldata[5]]);
    $array["success_animal"]="Dostunuz başarılı bir şekilde eklendi! Yönetici onayından sonra ilanınız yayınlanacaktır.";
    }else{
    $array["hata"]="Seçilen tür kayıtlı türlerden değildir! Kontrol ediniz.";
    }  
    echo json_encode($array);
}
if(isset($_POST["ticket_subj"])){
    session_start();
    $ticket_data=[post("ticket_subj"),post("ticket_message"),$_SESSION["id"]];
    $tarih = date("d-m-Y H:i:s"); 
    $insert_ticket_data=$db->prepare("INSERT INTO ticket SET ticket_atan=?,ticket_konu=?,ticket_icerik=?,ticket_durum=0,ticket_tarih=?,ticket_cevap=''");
    $insert_ticket_data->execute([$ticket_data[2],$ticket_data[0],$ticket_data[1],$tarih]);
    $array["basarili"]="Başarılı bir şekilde ticketiniz oluşturuldu! Ana sayfaya yönlendiriliyorsunuz.";
    echo json_encode($array);
}if(isset($_POST["oldpass"])){
    session_start();
    $memberPassData=[post("oldpass"),post("newpass")];
    $checkoldpass=$db->prepare("select * from uyeler where uye_id=:id");
    $checkoldpass->execute(["id"=>$_SESSION["id"]]);
    $checkoldpasswrite=$checkoldpass->fetch(PDO::FETCH_ASSOC);
   if(!password_verify($memberPassData[0],$checkoldpasswrite["uye_sifre"])){
        $array["hata"]="Şifrelerinizi kontrol ediniz";
   }
   else{
       $id=$_SESSION["id"];
       $updatepass=$db->prepare('UPDATE uyeler set uye_sifre=? WHERE uye_id=?');
      $password= password_hash($memberPassData[1],PASSWORD_BCRYPT);
      $updatepass->execute([$password,$id]);
      $array["olumlu"]="Şifreniz başarılı bir şekilde değiştirildi!";
   }
  echo json_encode($array);
  $updatepass=null;
  $db=null;
}
if(isset($_POST["nickname"])){
    session_start();
    $all_user_data=[post("nickname"),post("name"),post("mail")];
    if(!filter_var($all_user_data[2],FILTER_VALIDATE_EMAIL)){
        $array["hata"]="Girmiş olduğunuz mail adresi formatı hatalıdır, lütfen kontrol ediniz!";
    }else{
        /*Burası düzeltilecek (Bug var kullanıcı adı değiştirilirken değiştire basınca değiştiremiyor kendi kullanıcı adınıda sayıyor sistem düzeltilec)
        $get_username=$db->prepare("select * from uyeler where uye_nick=:nick");
        $get_username->execute(["nick"=>$all_user_data[0]]);
        $get_username->fetch(PDO::FETCH_ASSOC);
        $get_username= $get_username->rowCount();
        if($get_username>0){
            $array["hata"]="Bu kullanıcı adına ait bir hesap zaten sistemde kayıtlı olarak bulunmakta!";
        }else{ */
        $user_id=$_SESSION["id"];
        $update_user_data= $db->prepare("UPDATE uyeler set uye_isim=?,uye_nick=?,uye_mail=? WHERE uye_id=$user_id");
        $update_user_data->execute([$all_user_data[1],$all_user_data[0],$all_user_data[2]]);
        if($update_user_data){
            $array["basarili"]="Bilgileriniz başarılı bir şekilde değiştirildi!";
        }
       else{
           $array["hata"]="Bir hata oluştu, lütfen site yönetimiyle iletişime geçiniz!";
       }
        
    }
    echo json_encode($array);
    $update_user_data=null;
    $db=null;
}
if(isset($_POST["cevap"])){
    $response = post("cevap");
    $id= post("ticketid");
    $sorgu = $db->prepare("UPDATE ticket SET ticket_cevap=?, ticket_durum=1 WHERE ticket_id=?");
    $sorgu->execute([$response, $id]);
    if($sorgu){
        $array["suc"]="Bilete başarılı bir şekilde yanıt verildi, bilet sayfasına yönlendiriliyorsunuz!";
    }else{
        $array["er"]="Bileti cevaplarken bir hata oluştu, lütfen site yetkilileriyle görüşün. Hata kodu: A0001!";
    }
    echo json_encode($array);
}
?>