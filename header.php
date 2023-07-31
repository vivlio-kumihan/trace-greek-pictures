<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@4.0.0/destyle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <!-- ロゴ -->
    <ul class="ci">
      <li>
        <a href="<?php echo home_url('/') ?>">
          <img class="logo portrait" src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="GreekPicturesのロゴ"></img>
        </a>
      </li>
      <li>
        150-0001, Tokyo Japan,<br>2-27-5 Jingumae, Shibuya-ku,
      </li>
    </ul>

    <!-- ヘッダーのリンクメニュー -->
    <div id="link-pages" class="link-pages">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'link-pages'
      ))
      ?>
    </div>

    <div class="wrapper">
      <!-- サイト表記言語の切り替え -->
      <div class="change-lang">
        <ul>
          <li>Ja</li>
          <li>En</li>
        </ul>
      </div>

      <!-- ハンバーガーメニュー・ボタン -->
      <button id="content-links-btn" class="content-links-btn">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <!-- コンテンツのリンクとその他のリンク　translateX=>100％ -->
    <div id="link-contents" class="link-contents">
      <div class="wrapper">
        <!-- ロゴ -->
        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="GreekPicturesのロゴ"></img>
        <!-- コンテンツへのリンク集 -->
        <dl class="contents">
          <div class="none-items">
            <dt>Top</dt>
          </div>
          <div class="none-items">
            <dt>Who We Are</dt>
          </div>
          <div>
            <dt>Service</dt>
            <dd>Film &amp; Visual Design</dd>
            <dd>Promotion</dd>
            <dd>Media</dd>
            <dd>Contents Business</dd>
            <dd>Global</dd>
            <dd>R&amp;D</dd>
            <dd>Management</dd>
            <dd>Others</dd>
          </div>
          <div class="">
            <dt>Works</dt>
            <dd>All</dd>
            <dd>CM</dd>
            <dd>MV</dd>
            <dd>Feature Film</dd>
            <dd>Graphic</dd>
            <dd>Promotion</dd>
            <dd>Character</dd>
            <dd>Other</dd>
            <dd>Unit</dd>
            <dd>Director</dd>
            <dd>Award</dd>
          </div>
          <div>
            <dt>News</dt>
            <dd>All</dd>
            <dd>Press Release</dd>
            <dd>Information</dd>
            <dd>Media</dd>
            <dd>Award</dd>
          </div>
          <div>
            <dt>Company</dt>
            <dd>Access</dd>
          </div>
          <div class="none-items">
            <dt>Recruit</dt>
          </div>
          <div class="none-items">
            <dt>Contact</dt>
          </div>
        </dl>
        <!-- 質問 -------------------------------------------------------------- -->
        <!-- contentsの中の各セクションをどうすればいいかわからないのでHTML要素で逃げる。 -->
        // <?php
            //  wp_nav_menu(array(
            //    'theme_location' => 'link-contents'
            //  ))
            // 
            ?>
        <!-- 質問 -------------------------------------------------------------- -->
      </div>
    </div>

    <!-- アクセス情報　住所と電話 -->
    <dl class="access">
      <dt>GEEK PICTURES Head Office</dt>
      <dd>〒150-0001<br>東京都渋谷区神宮前2-27-5</dd>
      <dd>T：03-5879-2360　F：03-5879-2361</dd>
    </dl>
    <!-- SNSのリンク -->
    <ul class="sns-links">
      <li><a href="">Twitter</a></li>
      <li><a href="">Facebook</a></li>
    </ul>

    <div class="main-title">
      <img class="logo landscape" src="<?php echo get_template_directory_uri(); ?>/img/logo_nft.svg" alt="GreekPicturesのロゴ"></img>
    </div>
    <div class="lead-copy">
      GEEK PICTURES独自の知見とネットワークを活用しNFTの可能性をグローバル視点で探求し続けるプロジェクト
    </div>
    <img class="logo landscape" src="<?php echo get_template_directory_uri(); ?>/img/logo_footer.svg" alt="GreekPicturesのロゴ"></img>
    <small>Unexpected Powers United.</small>
  </header>