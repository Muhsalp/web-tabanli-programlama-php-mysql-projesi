<!doctype html>
<html><head>
<meta charset="utf-8"/>
<title>Borç Sistemi</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons"/>
<style>
:root{--mdc-theme-secondary: #6200ee;}
*{box-sizing: border-box;}
body{display: flex; flex-direction: column; font-family: Roboto; margin: 0px;}
.tab-content{display: none;}
.tab-content.active{display: block;}
.form-container{max-width: 400px; width: 100%; margin: 16px auto;}
.mdc-text-field{width: 100%; margin-top: 16px;}
.mdc-text-field input[type="date"]::-webkit-calendar-picker-indicator{display: block;}
.mdc-button{width: 100%; margin-top: 16px;}
.main-content{display: flex; width: 100%; max-width: 1000px; margin: 16px auto; padding-left: 16px; padding-right: 16px;}
.form-section{width: 35%; padding-right: 16px; display: flex; flex-direction: column; gap: 16px;}
.form-group{margin: 0px; padding: 16px; border: solid 1px #ccc; border-radius: 8px;}
.form-group h2{margin: 0px;}
.radio-group{display: flex; gap: 16px; margin: 8px 0px -8px;}
.table-section{flex: 1; padding: 16px; border: solid 1px #ccc; border-radius: 8px;}
.table-section h2{margin: 0px;}
.mdc-data-table{width: 100%; margin-top: 16px;}
.mdc-data-table__table{white-space: normal;}
.mdc-data-table__header-cell{font-weight: bold;}
.edit-form{margin: 0px;}
.edit-input{padding: 12px; margin: -12px; width: calc(100% + 24px); border: solid 1px #9e9e9e; outline: none; border-radius: 4px;}
.edit-input:focus{border: solid 2px #6200ee;}
</style>
</head><body>
<?php
$baglanti = mysqli_connect();
session_start();
$s = $_GET["s"] ?? "";

if($s == ""){
echo "<header class='mdc-top-app-bar mdc-elevation--z4'><div class='mdc-top-app-bar__row'>
<section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>
<span class='mdc-top-app-bar__title'>Borç Sistemi</span></section>
".(isset($_SESSION["kullanici"])?"<section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-end'>
<a href='?s=cikis' class='mdc-top-app-bar__action-item mdc-icon-button material-icons' aria-label='Çıkış Yap' title='Çıkış Yap'><span class='mdc-icon-button__ripple'></span>logout</a>
</section>":"")."</div></header>
<div class='mdc-top-app-bar--fixed-adjust main-content'>";

if(isset($_SESSION["kullanici"])){
$kisi = $_GET["kisi"] ?? "";
echo "<div class='form-section'>";
if($kisi){
echo "<form class='form-group' action='?s=borcekle&kisi=$kisi' method='post'>
<h2>Borç Ekle</h2>
<label class='mdc-text-field mdc-text-field--outlined'>
<input type='date' class='mdc-text-field__input' id='tarih' value='".date("Y-m-d")."' name='tarih'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Tarih</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined'>
<input type='number' class='mdc-text-field__input' id='tutar' name='tutar'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Tutar</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<div class='radio-group'>
<div class='mdc-form-field'>
<div class='mdc-radio'>
<input class='mdc-radio__native-control' type='radio' id='radio-borc' name='tur' value='1' checked>
<div class='mdc-radio__background'>
<div class='mdc-radio__outer-circle'></div>
<div class='mdc-radio__inner-circle'></div>
</div>
</div>
<label for='radio-borc'>Borç</label>
</div>
<div class='mdc-form-field'>
<div class='mdc-radio'>
<input class='mdc-radio__native-control' type='radio' id='radio-odeme' name='tur' value='-1'>
<div class='mdc-radio__background'>
<div class='mdc-radio__outer-circle'></div>
<div class='mdc-radio__inner-circle'></div>
</div>
</div>
<label for='radio-odeme'>Ödeme</label>
</div>
</div>
<label class='mdc-text-field mdc-text-field--outlined'>
<input type='text' class='mdc-text-field__input' id='not' name='not'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Not</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<button class='mdc-button mdc-button--raised'>
<span class='mdc-button__ripple'></span>
<span class='mdc-button__label'>Ekle</span>
</button>
</form>";
}else{
echo "<form class='form-group' action='?s=kisiekle' method='post'>
<h2>Kişi Ekle</h2>
<label class='mdc-text-field mdc-text-field--outlined'>
<input type='text' class='mdc-text-field__input' id='adsoyad' name='adsoyad'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Ad Soyad</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined'>
<input type='tel' class='mdc-text-field__input' id='telefon' name='telefon'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Telefon</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<button class='mdc-button mdc-button--raised'>
<span class='mdc-button__ripple'></span>
<span class='mdc-button__label'>Ekle</span>
</button>
</form>";
}
echo "</div>";

if($kisi){
echo "<div class='table-section'>";
$sorgu = mysqli_query($baglanti, "select * from kisiler where id = $kisi;");
while($satir = mysqli_fetch_assoc($sorgu)){
echo "<a href='.' class='mdc-icon-button material-icons' aria-label='Kapat' style='float: right;'><div class='mdc-icon-button__ripple'></div>close</a>
<h2>".$satir["adsoyad"]."</h2><span style='display: block; margin-top: 8px;'>".$satir["telefon"]."</span>";
}
echo "<div class='mdc-data-table'><table class='mdc-data-table__table' aria-label='Kayıtlar'>
<thead><tr class='mdc-data-table__header-row'>
<th class='mdc-data-table__header-cell'>Tarih</th>
<th class='mdc-data-table__header-cell'>Borç</th>
<th class='mdc-data-table__header-cell'>Ödeme</th>
<th class='mdc-data-table__header-cell'>Not</th>
<th class='mdc-data-table__header-cell'>Bakiye</th>
<th class='mdc-data-table__header-cell'></th></tr></thead><tbody class='mdc-data-table__content'>";
$toplam = 0;
$sorgu = mysqli_query($baglanti, "select * from borclar where kisi = $kisi order by tarih asc;");
while($satir = mysqli_fetch_assoc($sorgu)){
$toplam += $satir["tutar"];
echo "<tr class='mdc-data-table__row'>
<td class='mdc-data-table__cell' data-editable='true' data-table='borc' data-name='tarih' data-id='".$satir["id"]."' data-value='".$satir["tarih"]."' data-type='date'>".date("d.m.Y", strtotime($satir["tarih"]))."</td>
<td class='mdc-data-table__cell' data-editable='true' data-table='borc' data-name='borc' data-id='".$satir["id"]."'>".($satir["tutar"]>0?"<b style='color: #f44336;'>".$satir["tutar"]."</b>":"")."</td>
<td class='mdc-data-table__cell' data-editable='true' data-table='borc' data-name='odeme' data-id='".$satir["id"]."'>".($satir["tutar"]<0?"<b style='color: #4caf50;'>".(0-$satir["tutar"])."</b>":"")."</td>
<td class='mdc-data-table__cell' data-editable='true' data-table='borc' data-name='notlar' data-id='".$satir["id"]."'>".$satir["notlar"]."</td>
<td class='mdc-data-table__cell'><b>$toplam</b></td>
<td class='mdc-data-table__cell' style='width: 0px; white-space: nowrap;'>
<a href='?s=borcsil&id=".$satir["id"]."' class='mdc-icon-button material-icons' aria-label='Sil'><div class='mdc-icon-button__ripple'></div>delete</a>
</td></tr>";
}
echo "</tbody></table></div></div>";
}else{
echo "<div class='table-section'>
<h2>Kişiler</h2>
<div class='mdc-data-table'><table class='mdc-data-table__table' aria-label='Kayıtlar'>
<thead><tr class='mdc-data-table__header-row'>
<th class='mdc-data-table__header-cell'>Kişi</th>
<th class='mdc-data-table__header-cell'>Borç</th>
<th class='mdc-data-table__header-cell'></th></tr></thead><tbody class='mdc-data-table__content'>";
$sorgu = mysqli_query($baglanti, "select kisiler.*, coalesce(sum(borclar.tutar), 0) as borc from kisiler left join borclar on borclar.kisi = kisiler.id where kisiler.kullanici = ".$_SESSION["kullanici"]." group by kisiler.id;");
while($satir = mysqli_fetch_assoc($sorgu)){
echo "<tr class='mdc-data-table__row'>
<td class='mdc-data-table__cell' data-editable='true' data-table='kisi' data-name='adsoyad' data-id='".$satir["id"]."'>".$satir["adsoyad"]."</td>
<td class='mdc-data-table__cell'>".$satir["borc"]."</td>
<td class='mdc-data-table__cell' style='width: 0px; white-space: nowrap;'>
<a href='?kisi=".$satir["id"]."' class='mdc-icon-button material-icons' aria-label='Görüntüle'><div class='mdc-icon-button__ripple'></div>visibility</a>
<a href='?s=kisisil&id=".$satir["id"]."' class='mdc-icon-button material-icons' aria-label='Sil'><div class='mdc-icon-button__ripple'></div>delete</a>
</td></tr>";
}
echo "</tbody></table></div></div>";
}

}else{
echo "<div class='form-container'>
<div class='mdc-tab-bar' role='tablist'>
<div class='mdc-tab-scroller'>
<div class='mdc-tab-scroller__scroll-area'>
<div class='mdc-tab-scroller__scroll-content'>
<button class='mdc-tab mdc-tab--active' role='tab' aria-selected='true' tabindex='0'>
<span class='mdc-tab__content'>
<span class='mdc-tab__text-label'>GİRİŞ YAP</span>
</span>
<span class='mdc-tab-indicator mdc-tab-indicator--active'>
<span class='mdc-tab-indicator__content mdc-tab-indicator__content--underline'></span>
</span>
<span class='mdc-tab__ripple'></span>
</button>
<button class='mdc-tab' role='tab' aria-selected='false' tabindex='-1'>
<span class='mdc-tab__content'>
<span class='mdc-tab__text-label'>KAYDOL</span>
</span>
<span class='mdc-tab-indicator'>
<span class='mdc-tab-indicator__content mdc-tab-indicator__content--underline'></span>
</span>
<span class='mdc-tab__ripple'></span>
</button>
</div>
</div>
</div>
</div>

<div class='tab-content active' id='login-tab'>
<form action='?s=giris' method='post'>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='text' class='mdc-text-field__input' id='login-kullaniciadi' name='kullaniciadi'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Kullanıcı Adı</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='password' class='mdc-text-field__input' id='login-sifre' name='sifre'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Şifre</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<button class='mdc-button mdc-button--raised' style='width: 100%;'>
<span class='mdc-button__ripple'></span>
<span class='mdc-button__label'>GİRİŞ YAP</span>
</button>
</form>
</div>

<div class='tab-content' id='signup-tab'>
<form action='?s=kayit' method='post'>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='text' class='mdc-text-field__input' id='signup-kullaniciadi' name='kullaniciadi'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Kullanıcı Adı</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='text' class='mdc-text-field__input' id='signup-adsoyad' name='adsoyad'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Ad Soyad</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='text' class='mdc-text-field__input' id='signup-telefon' name='telefon'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Telefon</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='email' class='mdc-text-field__input' id='signup-eposta' name='eposta'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>E-posta</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<label class='mdc-text-field mdc-text-field--outlined' style='width: 100%;'>
<input type='password' class='mdc-text-field__input' id='signup-sifre' name='sifre'>
<span class='mdc-notched-outline'>
<span class='mdc-notched-outline__leading'></span>
<span class='mdc-notched-outline__notch'>
<span class='mdc-floating-label'>Şifre</span>
</span>
<span class='mdc-notched-outline__trailing'></span>
</span>
</label>
<button class='mdc-button mdc-button--raised' style='width: 100%;'>
<span class='mdc-button__ripple'></span>
<span class='mdc-button__label'>KAYDOL</span>
</button>
</form>
</div>
</div>";
}

echo "</div>";

if($_SESSION["uyari"]){
echo "<div class='mdc-snackbar mdc-snackbar--leading' id='snackbar' aria-live='assertive' aria-atomic='true'>
<div class='mdc-snackbar__surface'><div class='mdc-snackbar__label' id='snackbar-label'>".$_SESSION["uyari"]."</div>
<div class='mdc-snackbar__action-wrapper'>
<button class='mdc-icon-button material-icons' id='snackbar-action' type='button' aria-label='Kapat' style='color: #fff;'><div class='mdc-icon-button__ripple'></div>close</button>
</div></div></div>";
unset($_SESSION["uyari"]);
}
}

if($s == "kayit"){
$sorgu = mysqli_query($baglanti, "insert into kullanicilar (kullaniciadi, adsoyad, telefon, eposta, sifre) values ('".$_POST["kullaniciadi"]."', '".$_POST["adsoyad"]."', '".$_POST["telefon"]."', '".$_POST["eposta"]."', '".password_hash($_POST["sifre"], PASSWORD_BCRYPT)."');");
if($sorgu){$_SESSION["kullanici"] = mysqli_insert_id($baglanti); $_SESSION["uyari"] = "Kayıt başarılı."; header("location: .");}else{echo "Hata oluştu! Veri eklenemedi.";}
}

if($s == "giris"){
$sorgu = mysqli_query($baglanti, "select * from kullanicilar where kullaniciadi = '".$_POST["kullaniciadi"]."';");
while($satir = mysqli_fetch_assoc($sorgu)){
if(password_verify($_POST["sifre"], $satir["sifre"])){
$_SESSION["kullanici"] = $satir["id"];
header("location: .");
}
}
}

if($s == "cikis"){
session_unset();
session_destroy();
setcookie(session_name(), "", time()-3600);
header("location: .");
}

if($s == "kisiekle"){
$sorgu = mysqli_query($baglanti, "insert into kisiler (kullanici, adsoyad, telefon) values (".$_SESSION["kullanici"].", '".$_POST["adsoyad"]."', '".$_POST["telefon"]."');");
if($sorgu){$_SESSION["uyari"] = "Başarıyla eklendi."; header("location: ?kisi=".mysqli_insert_id($baglanti));}else{echo "Hata oluştu! Veri eklenemedi.";}
}

if($s == "borcekle"){
$sorgu = mysqli_query($baglanti, "insert into borclar (kisi, tarih, tutar, notlar) values (".$_GET["kisi"].", '".$_POST["tarih"]."', ".($_POST["tutar"]*$_POST["tur"]).", '".$_POST["not"]."');");
if($sorgu){$_SESSION["uyari"] = "Başarıyla eklendi."; header("location: ?kisi=".$_GET["kisi"]);}else{echo "Hata oluştu! Veri eklenemedi.";}
}

if($s == "kisiguncelle"){
$sorgu = mysqli_query($baglanti, "update kisiler set ".$_GET["alan"]." = '".$_POST["deger"]."' where id = ".$_GET["id"].";");
if($sorgu){$_SESSION["uyari"] = "Başarıyla güncellendi."; header("location: .");}else{echo "Hata oluştu! Veri güncellenemedi.";}
}

if($s == "borcguncelle"){
$sorgu = mysqli_query($baglanti, "select * from borclar where id = ".$_GET["id"].";");
while($satir = mysqli_fetch_assoc($sorgu)){
$kisi = $satir["kisi"];
}
if($_GET["alan"]=="notlar"||$_POST["deger"]!=""){
$sorgu = mysqli_query($baglanti, "update borclar set ".($_GET["alan"]=="borc"||$_GET["alan"]=="odeme"?"tutar":$_GET["alan"])." = '".($_GET["alan"]=="odeme"?0-$_POST["deger"]:$_POST["deger"])."' where id = ".$_GET["id"].";");
if($sorgu){$_SESSION["uyari"] = "Başarıyla güncellendi."; header("location: ?kisi=".$kisi);}else{echo "Hata oluştu! Veri güncellenemedi.";}
}else{
header("location: ?kisi=".$kisi);
}
}

if($s == "kisisil"){
$sorgu = mysqli_query($baglanti, "delete from kisiler where id = ".$_GET["id"].";");
if($sorgu){$_SESSION["uyari"] = "Başarıyla silindi."; header("location: .");}else{echo "Hata oluştu! Veri silinemedi.";}
}

if($s == "borcsil"){
$sorgu = mysqli_query($baglanti, "select * from borclar where id = ".$_GET["id"].";");
while($satir = mysqli_fetch_assoc($sorgu)){
$kisi = $satir["kisi"];
}
$sorgu = mysqli_query($baglanti, "delete from borclar where id = ".$_GET["id"].";");
if($sorgu){$_SESSION["uyari"] = "Başarıyla silindi."; header("location: ?kisi=".$kisi);}else{echo "Hata oluştu! Veri silinemedi.";}
}

mysqli_close($baglanti);
?>

<script src="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.js"></script>
<script>
document.querySelectorAll(".mdc-tab-bar").forEach(function(el){
const tabBar = new mdc.tabBar.MDCTabBar(el);
tabBar.listen("MDCTabBar:activated", function(event){
const tabs = document.querySelectorAll(".tab-content");
tabs.forEach(function(tab){tab.classList.remove("active")});
tabs[event.detail.index].classList.add("active");
});
});

document.querySelectorAll(".mdc-text-field").forEach(function(el){
mdc.textField.MDCTextField.attachTo(el);
});

document.querySelectorAll(".mdc-button, .mdc-icon-button").forEach(function(el){
const ripple = new mdc.ripple.MDCRipple(el);
ripple.unbounded = true;
});

document.querySelectorAll("td[data-editable='true']").forEach(function(el){
el.addEventListener("dblclick", function(){
if(!el.classList.contains("opened")){
el.classList.add("opened");
el.innerHTML = "<form class='edit-form' action='?s="+el.dataset.table+"guncelle&id="+el.dataset.id+"&alan="+el.dataset.name+"' method='post'><input type='"+(el.dataset.type||"text")+"' class='edit-input' name='deger' value='"+(el.dataset.value||el.textContent)+"'/><input type='submit' hidden/></form>";
const editInput = el.querySelector(".edit-input");
editInput.focus();
if(!el.dataset.type){
editInput.setSelectionRange(editInput.value.length, editInput.value.length);
}
editInput.addEventListener("blur", function(){el.querySelector(".edit-form").submit();});
}
});
});

document.querySelectorAll(".mdc-snackbar").forEach(function(el){
const snackbar = mdc.snackbar.MDCSnackbar.attachTo(el);
snackbar.open();
const actionButton = document.querySelector("#snackbar-action");
actionButton.addEventListener("click", function(){
snackbar.close();
});
});

</script>
</body></html>
