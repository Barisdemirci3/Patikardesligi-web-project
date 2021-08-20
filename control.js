function register() {
    let name = $('#is01').val();
    name= name.trim();
    let username = $("#k01").val();
    username = username.trim();
    let mail = $("#m01").val();
    mail = mail.trim();
    let pass = $("#ps01").val();
    pass = pass.trim();
    let pass2 = $("#ps02").val();
    pass2 = pass2.trim();
    if (name == "" || username == "" || mail == "" || pass == "" || pass2 == "" ) {
        toastr.info("Boş alanlar doldurulmalıdır!", "Bilgi");
    }
    else {
        if (pass.length >= 8 && pass2.length >= 8) {
            if (username)

                if (pass == pass2) {
                    $.ajax({
                        type: "POST",
                        url: "check.php",
                        data: { username, mail, pass, pass2, name },
                        dataType: "JSON",
                        success: function (i) {
                            if (i.kayit) {
                                toastr.success(i.kayit);
                            }
                            if (i.zaten_kayitli) {
                                toastr.error(i.zaten_kayitli, "Hata!");
                            }
                            if (i.mail_formati) {
                                toastr.warning(i.mail_formati);
                            }
                            if (i.sayi) {
                                toastr.error(i.sayi, "Hata!");
                            }
                        }
                    });
                }
                else {
                    toastr.error("Şifreleriniz birbiriyle uyuşmuyor!", "Hata!");
                }
        }
        else {
            toastr.warning("Şifrenizin uzunluğu en az 8 karakter olmalıdır!");
        }



    }

}
function login() {
    var user = $("#user").val();
    var password = $("#password").val();
    let usertrim = user.trim();
    let passwordtrim = password.trim();
    if (usertrim == "" || passwordtrim == "") {
        toastr.warning("Boş alanları doldurunuz!");
    } else {
        $.ajax({
            type: "POST",
            url: "check.php",
            data: { usertrim, passwordtrim },
            dataType: "JSON",
            success: function (feedback) {
               if(feedback.hata){
                   toastr.error(feedback.hata, "Hata!");
               }
                if(feedback.email){
                    toastr.error(feedback.email, "Hata!");
                }
                if (feedback.basarili) {
                    toastr.success(feedback.basarili, "Başarılı!");
                    setTimeout(() => {
                        $(location).attr('href', 'login.php');
                    }, 1500);

                }
            }
        });
    }
}
function addanimal() {
    let animalname = $('#an01').val();
    animalname = animalname.trim();
    let animaltur = $('#sel01').val();
    let animalsubj = $('#subj').val();
    animalsubj = animalsubj.trim();
    let message = $('#message').val();
    message = message.trim();
    let animalyas= $('#yas').val();
    animalyas= animalyas.trim();
    let animalkisir= $('#kisir').val();
    animalkisir= animalkisir.trim();
    if(!$.isNumeric(animalyas)){
        toastr.error("Yaş kısmında harf veya özel karakter kullanılamaz!", "Hata!");
    }
    if (animalname == "" || animaltur == "" || animalsubj == "" || message == "" || animalyas == "" || animalkisir == "") {
        toastr.warning("Lütfen boş bıraktığınız alanları doldurunuz!");
    }
    else {
        if(message.length>256){
            toastr.error("Açıklama 256 karakterden fazla olamaz! Şu an ki karakter sayısı:"+message.length);
        }
        else{
        $.ajax({
            type: "POST",
            url: "check.php",
            data: { animalname,animaltur,animalsubj,message,animalyas,animalkisir },
            dataType: "json",
            success: function (feedback) {
               if(feedback.hata){
                   toastr.error(feedback.hata, "Hata!");
               }
               if(feedback.success_animal){
                   toastr.success(feedback.success_animal, "Başarılı!");
                   setTimeout(() => {
                       $(location).attr('href', "index.php");
                   }, 3000);
               }
               if(feedback.basarili){
                toastr.success(feedback.basarili, "Başarılı!");
            }
            if(feedback.uyari){
                toastr.error(feedback.uyari, "Hata!");
            }
            }
        });
    }
}
}
