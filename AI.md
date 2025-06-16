<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons"/>

<script src="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.js"></script>

Bunları kullanarak tab ile bir giriş yap/kaydol sayfası yapar mısın?

Elbette! Aşağıda Material Components Web (MDC Web) kullanarak bir **"Giriş Yap / Kaydol" sekmeli (tab) arayüzü** örneği bulabilirsin. Bu örnek hem MDC sekmelerini hem de formları içerir:

---

### ✅ **Tam HTML Örneği**

```html
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap / Kaydol</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 2rem;
      display: flex;
      justify-content: center;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
    .form-container {
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="form-container">
  <!-- Tabs -->
  <div class="mdc-tab-bar" role="tablist">
    <div class="mdc-tab-scroller">
      <div class="mdc-tab-scroller__scroll-area">
        <div class="mdc-tab-scroller__scroll-content">
          <button class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="0">
            <span class="mdc-tab__content">
              <span class="mdc-tab__text-label">Giriş Yap</span>
            </span>
            <span class="mdc-tab-indicator mdc-tab-indicator--active">
              <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
            </span>
            <span class="mdc-tab__ripple"></span>
          </button>
          <button class="mdc-tab" role="tab" aria-selected="false" tabindex="-1">
            <span class="mdc-tab__content">
              <span class="mdc-tab__text-label">Kaydol</span>
            </span>
            <span class="mdc-tab-indicator">
              <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
            </span>
            <span class="mdc-tab__ripple"></span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Giriş Formu -->
  <div class="tab-content active" id="login-tab">
    <br>
    <label class="mdc-text-field mdc-text-field--outlined" style="width: 100%;">
      <input type="text" class="mdc-text-field__input" placeholder="E-posta">
      <span class="mdc-notched-outline">
        <span class="mdc-notched-outline__leading"></span>
        <span class="mdc-notched-outline__notch">
          <span class="mdc-floating-label">E-posta</span>
        </span>
        <span class="mdc-notched-outline__trailing"></span>
      </span>
    </label>
    <br><br>
    <label class="mdc-text-field mdc-text-field--outlined" style="width: 100%;">
      <input type="password" class="mdc-text-field__input" placeholder="Şifre">
      <span class="mdc-notched-outline">
        <span class="mdc-notched-outline__leading"></span>
        <span class="mdc-notched-outline__notch">
          <span class="mdc-floating-label">Şifre</span>
        </span>
        <span class="mdc-notched-outline__trailing"></span>
      </span>
    </label>
    <br><br>
    <button class="mdc-button mdc-button--raised" style="width: 100%;">
      <span class="mdc-button__label">Giriş Yap</span>
    </button>
  </div>

  <!-- Kaydol Formu -->
  <div class="tab-content" id="signup-tab">
    <br>
    <label class="mdc-text-field mdc-text-field--outlined" style="width: 100%;">
      <input type="text" class="mdc-text-field__input" placeholder="Ad Soyad">
      <span class="mdc-notched-outline">
        <span class="mdc-notched-outline__leading"></span>
        <span class="mdc-notched-outline__notch">
          <span class="mdc-floating-label">Ad Soyad</span>
        </span>
        <span class="mdc-notched-outline__trailing"></span>
      </span>
    </label>
    <br><br>
    <label class="mdc-text-field mdc-text-field--outlined" style="width: 100%;">
      <input type="email" class="mdc-text-field__input" placeholder="E-posta">
      <span class="mdc-notched-outline">
        <span class="mdc-notched-outline__leading"></span>
        <span class="mdc-notched-outline__notch">
          <span class="mdc-floating-label">E-posta</span>
        </span>
        <span class="mdc-notched-outline__trailing"></span>
      </span>
    </label>
    <br><br>
    <label class="mdc-text-field mdc-text-field--outlined" style="width: 100%;">
      <input type="password" class="mdc-text-field__input" placeholder="Şifre">
      <span class="mdc-notched-outline">
        <span class="mdc-notched-outline__leading"></span>
        <span class="mdc-notched-outline__notch">
          <span class="mdc-floating-label">Şifre</span>
        </span>
        <span class="mdc-notched-outline__trailing"></span>
      </span>
    </label>
    <br><br>
    <button class="mdc-button mdc-button--raised" style="width: 100%;">
      <span class="mdc-button__label">Kaydol</span>
    </button>
  </div>
</div>

<!-- MDC JS ve Tab Olayları -->
<script src="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.js"></script>
<script>
  mdc.autoInit();

  const tabBar = new mdc.tabBar.MDCTabBar(document.querySelector('.mdc-tab-bar'));
  const tabs = document.querySelectorAll('.tab-content');

  tabBar.listen('MDCTabBar:activated', function(event) {
    tabs.forEach(tab => tab.classList.remove('active'));
    tabs[event.detail.index].classList.add('active');
  });
</script>

</body>
</html>
```

---

### 🔧 Açıklama:

* **Material Components** ile stil verildi.
* MDC `tabBar` bileşeni ile sekmeler arasında geçiş yapılır.
* JavaScript ile hangi sekme seçiliyse ilgili form gösterilir.
* Her form MDC `text-field` ve `button` bileşenleriyle uyumlu.

İstersen bu yapıya doğrulama, hata mesajları ya da animasyonlar da ekleyebilirim. Yardımcı olayım mı?

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons"/>

<script src="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.js"></script>

Bunları kullanarak üstte top app bar, solda alt alta iki form, sağda her satırının sonunda icon button olan data table olan bir sayfa yapar mısın?

Evet, verdiğin bağlantılarla **Material Components Web (MDC Web)** kullanarak istediğin sayfa düzenini yapabilirim. Aşağıda şu yapıya sahip bir örnek sayfa var:

* **Üstte** bir **Top App Bar**
* **Solda** alt alta iki form elemanı (input alanı)
* **Sağda** her satırında ikon buton bulunan bir **Data Table**

---

### ✅ Örnek HTML + MDC Web Yapısı:

```html
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Material Design Sayfa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons"/>
  <style>
    body {
      font-family: Roboto, sans-serif;
      margin: 0;
    }

    .main-content {
      display: flex;
      padding: 16px;
      margin-top: 64px; /* App bar yüksekliği kadar */
    }

    .form-section {
      flex: 1;
      max-width: 300px;
      margin-right: 32px;
    }

    .table-section {
      flex: 2;
    }

    .mdc-text-field {
      width: 100%;
      margin-bottom: 16px;
    }

    .mdc-data-table {
      width: 100%;
    }
  </style>
</head>
<body>

  <!-- Top App Bar -->
  <header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <span class="mdc-top-app-bar__title">Başlık</span>
      </section>
    </div>
  </header>

  <!-- Ana içerik -->
  <div class="main-content">

    <!-- Sol form -->
    <div class="form-section">
      <label class="mdc-text-field mdc-text-field--outlined">
        <span class="mdc-notched-outline">
          <span class="mdc-notched-outline__leading"></span>
          <span class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">Ad</span>
          </span>
          <span class="mdc-notched-outline__trailing"></span>
        </span>
        <input type="text" class="mdc-text-field__input" />
      </label>

      <label class="mdc-text-field mdc-text-field--outlined">
        <span class="mdc-notched-outline">
          <span class="mdc-notched-outline__leading"></span>
          <span class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">Soyad</span>
          </span>
          <span class="mdc-notched-outline__trailing"></span>
        </span>
        <input type="text" class="mdc-text-field__input" />
      </label>
    </div>

    <!-- Sağ tablo -->
    <div class="table-section">
      <div class="mdc-data-table">
        <table class="mdc-data-table__table" aria-label="Basit Tablo">
          <thead>
            <tr class="mdc-data-table__header-row">
              <th class="mdc-data-table__header-cell">Ad</th>
              <th class="mdc-data-table__header-cell">Soyad</th>
              <th class="mdc-data-table__header-cell">İşlem</th>
            </tr>
          </thead>
          <tbody class="mdc-data-table__content">
            <tr class="mdc-data-table__row">
              <td class="mdc-data-table__cell">Ali</td>
              <td class="mdc-data-table__cell">Veli</td>
              <td class="mdc-data-table__cell">
                <button class="mdc-icon-button material-icons" title="Düzenle">edit</button>
              </td>
            </tr>
            <tr class="mdc-data-table__row">
              <td class="mdc-data-table__cell">Ayşe</td>
              <td class="mdc-data-table__cell">Yılmaz</td>
              <td class="mdc-data-table__cell">
                <button class="mdc-icon-button material-icons" title="Düzenle">edit</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- JavaScript ile componentleri başlat -->
  <script src="https://cdn.jsdelivr.net/npm/material-components-web@latest/dist/material-components-web.min.js"></script>
  <script>
    mdc.autoInit(); // Tüm MDC bileşenlerini başlatır
  </script>
</body>
</html>
```

---

### 📝 Notlar:

* **mdc.autoInit()** tüm MDC bileşenlerini otomatik başlatır. Eğer daha özelleştirilmiş kullanım istersen `new mdc.textField.MDCTextField(...)` şeklinde elle başlatabilirsin.
* Dilersen tabloya "Sil" gibi farklı ikonlar da ekleyebilirim.
* Mobil uyumluluk için `@media` sorguları ile düzenleme yapılabilir.

İstersen bu yapıya butonlar, modal pencereler veya responsivite gibi detaylar da ekleyebilirim. Genişletmek ister misin?
