<form method="POST">
<select name="asd" id="deneme">
<option value="1">deneme1</option>
<option value="2">deneme2</option>
<option value="3">deneme3</option>
</select>
<input type="submit" value="Gönder" onclick="dene();">

</form>



<?php include "footer.php"; ?>

<script>
function dene(){
  var veri= $('#deneme').val();
  if(!veri=="1" || !veri=="2" || !veri=="3"){
      document.write("Hata var!");
  }else{
      document.write(veri);
  }
}
</script>