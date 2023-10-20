<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Out Coffee</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <img src="https://btholt.github.io/complete-intro-to-web-dev-v3/images/coffee_masters_logo.png" alt="coffee-masters-logo" class="coffee-masters-logo" />
    <h1 class="logo">Check Out Your Items</h1>
  </header>
  <?php
  include "koneksi.php";
  $query = "SELECT * FROM tabel_produk_coffee where kode_produk='$_GET[id]'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($result);
  ?>
  <div class="page">
    <div class="main-container">
      <section class="box">
        <h2 class="box-title">Items</h2>
        <ul class="items">
          <li class="item">
            <div class="item-quantity">1x</div>
            <div class="item-title"><?= $data['jenis_produk'] ?></div>
            <div class="item-price"><?= $data['harga_produk'] ?></div>
        </ul>
        </li>
        <!-- <li class="item">
            <div class="item-quantity">1x</div>
            <div class="item-title">Cappuccino</div>
            <div class="item-price">$3.85</div>
            <ul class="item-options-list">
              <li class="item-option">Lite milk</li>
              <li class="item-option">Double espresso</li>
            </ul>
          </li>
          <li class="item">
            <div class="item-quantity">1x</div>
            <div class="item-title">Croissant</div>
            <div class="item-price">$2.45</div>
            <ul class="item-options-list">
              <li class="item-option">Butter</li>
            </ul>
          </li>
--> </ul>
      </section>
      <div class="name-and-payment">
        <section class="box">
          <h2 class="box-title">Name</h2>
          <div class="input-group">
            <label class="user-input-label" for="name">Name for order</label>
            <input type="text" class="user-input" id="name">
          </div>
          <h2 class="box-title">Email</h2>
          <div class="input-group">
            <label class="user-input-label" for="email">Email for order</label>
            <input type="text" class="user-input" id="email">
          </div>
        </section>
        <section class="box">
          <h2 class="box-title">Payment</h2>
          <div class="input-group">
            <label class="user-input-label" for="cc">Card number</label>
            <input type="text" class="user-input" id="cc">
          </div>
          <div class="input-group">
            <label class="user-input-label" for="ccv">CCV number</label>
            <input type="text" class="user-input short-input" id="ccv">
          </div>
        </section>
      </div>
    </div>
    <?php
          class Hitung{
        private $dta,
        $Tax,
        $ttal,
        $oprl;

        public function __construct($ttal,$dta,$Tax,$oprl)
        {
          $this->ttal = $ttal;
          $this->dta = $dta;
          $this->Tax = $Tax;
          $this->oprl = $oprl;
        }

        public function getOprl(){
          return $this->oprl;
        }

        public function getTax(){
          return $this->Tax;
        }

        public function HitungStruck(){
          return $this->ttal = $this->Tax + $this->oprl + $this->dta; 
        }
      }

      $produk1 = new Hitung(0 , $data['harga_produk'], 6000, 12000);
      ?>

    <section class="subtotal-and-checkout" method="post">
      <p class="field-name-values">
        <span>Subtotal:</span>
        <span><?= $data['harga_produk'] ?></span>
      </p>
      <p class="field-name-values">
        <span>Tax:</span>
        <span name="tax">Rp. <?php echo $produk1->getTax()?></span>
      </p>
      <p class="field-name-values">
        <span>Diskon:</span>
        <span>0%</span>
      </p>
      <p class="field-name-values">
        <span>Operasional:</span>
        <span>Rp. <?php echo $produk1->getOprl();?></span>
      </p>
      <p class="field-name-values final-totals">
        <span>Total:</span>
        <span name="total">Rp. <?php echo $produk1->HitungStruck()?></span>
      </p>
      
    </section>
    <input class="checkout" href="" type="submit" value="Check Out">
  </div>
</body>

</html>