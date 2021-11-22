function sendResponse() {
  let cevap = $("#response").val().trim();
  let ticketid = $("#ticketid").val().trim();
  if (cevap == "") {
    toastr.error(
      "Lütfen kullanıcıya cevap gönderecekseniz cevap alanını doldurunuz!",
      "Hata!"
    );
  } else {
    $.ajax({
      type: "post",
      url: "../check.php",
      data: { cevap, ticketid },
      dataType: "Json",
      success: function (response) {
            if(response.suc){
                toastr.success(response.suc, "Başarılı!");
                setTimeout(() => {
                    $(location).attr('href', "tickets.php");
                }, 1000);
            }
            if(response.er){
                toastr.error(response.er, "Başarısız!");
            }
      },
    });
  }
}
