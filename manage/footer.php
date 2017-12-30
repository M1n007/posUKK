
</body>
<script>
//hitung total harga
function startHitung(){
  interval = setInterval("hitung()",1);
}
function hitung(){
  var jumlah = parseInt(document.getElementById("jumlahbrg").value);
  var harga = parseInt(document.getElementById("hargabrg").value);
  totalbrg = jumlah * harga;
  document.getElementById("totalbrg").value = totalbrg;
}
function rampungHitung(){
  clearInterval(interval);
}
//function hitung Kembalian
function startKembali(){
  mulai = setInterval("kembali()",1);
}
function kembali(){
  var uang = parseInt(document.getElementById("duitbrg").value);
  var total = parseInt(document.getElementById("totalbrg").value);
  kembalibrg = uang - total;
  document.getElementById("kembalibrg").value = kembalibrg;
}
function rampungKembali(){
  clearInterval(mulai);
}
</script>
</html>
