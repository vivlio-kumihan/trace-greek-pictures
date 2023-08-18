<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@4.0.0/destyle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <?php wp_head(); ?>
</head>

<body>
  <header>
    <!-- ロゴ -->
    <div class="ci">
      <li>
        <a href="<?php echo home_url('/') ?>">
          <img class="logo portrait" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="GreekPicturesのロゴ"></img>
        </a>
        <small class="corp-aderss">
          150-0001, Tokyo Japan,<br>2-27-5 Jingumae, Shibuya-ku,
        </small>
      </li>
    </div>

    <!-- ヘッダーのリンクメニュー -->
    <?php
    wp_nav_menu(array(
      'theme_location' => 'link-pages'
    ))
    ?>

    <div class="other-items">
      <!-- サイト表記言語の切り替え -->
      <div class="change-lang">
        <ul>
          <li class="active"><a href="">Ja</a></li>
          <li><a href="">En</a></li>
        </ul>
      </div>
      <!-- ハンバーガーメニュー・ボタン -->
      <button id="content-links-btn" class="content-links-btn">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <h1 class="page-title" lang="en"><?php the_title(); ?></h1>
  </header>