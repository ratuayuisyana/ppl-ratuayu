<?php
//load config.php
include("config/config.php");

//untuk api_key newsapi.org
$api_key = "4129ef90d11b4a80b2257c04ccfa426e";

//url api untuk ambil berita headline di Amerika Serikat
$url = "https://newsapi.org/v2/top-headlines?country=us&apiKey=" . $api_key;

//menyimpan hasil dalam variabel
$data = http_request_get($url);

//konversi data json ke array
$hasil = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rest Client dengan cURL</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #81c784 !important; 
        }
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #1b5e20 !important;
        }
        h1 {
            color: #2e7d32;
            text-align: center;
            margin-top: 90px;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: 1px solid #c8e6c9;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card-body {
            background-color: #ffffff;
            color: #2e7d32;
        }
        .card-text i {
            color: #388e3c;
        }
        a {
            color: #388e3c;
            text-decoration: none;
            font-weight: 500;
        }
        a:hover {
            color: #1b5e20;
        }
        footer {
            margin-top: 40px;
            text-align: center;
            padding: 15px;
            background-color: #a5d6a7;
            color: #1b5e20;
            border-top: 2px solid #81c784;
        }
    </style>
</head>
<body>

<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">RestClient</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
<!-- navbar -->

<h1>Top Headlines (US)</h1>

<div class="container">
    <div class="row justify-content-center">

<!-- looping hasil data di array article -->
<?php if (isset($hasil['articles']) && is_array($hasil['articles'])): ?>
<?php foreach ($hasil['articles'] as $row): ?>
    <div class="col-md-4" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="card">
            <?php if (!empty($row['urlToImage'])): ?>
                <img src="<?php echo $row['urlToImage']; ?>" class="card-img-top" height="180px">
            <?php endif; ?>
            <div class="card-body">
                <p class="card-text"><i>Oleh <?php echo $row['author'] ?: 'Tidak diketahui'; ?></i></p>
                <p class="card-text"><?php echo $row['title']; ?></p>
                <p class="text-right">
                    <a href="<?php echo $row['url']; ?>" target="_blank">Selengkapnya...</a>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
    <p style="text-align:center;">Tidak ada data berita tersedia.</p>
<?php endif; ?>

    </div>
</div>

<footer>
    &copy; <?php echo date('Y'); ?> REST Client News API - eka irma 
</footer>

<!-- JS Bootstrap -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
