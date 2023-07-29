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
    <header>
      <div class="ci">
        <a href="<?php echo home_url('/') ?>">
          <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/linktopath" alt="GreekPictures"></img>
        </a>
      </div>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-link'
      ))
      ?>
      <button id="content-links-btn" class="content-links-btn">
        <div></div>
        <div></div>
        <div></div>
      </button>
      <!-- <div id="menu-link" class="menu-link">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-link'
        ))
        ?>
        <a class="contact" href="">
          <p>お問い合わせ</p>
        </a>
        <ul class="other-links">
          <li><a class="shrinkLine" href="">プライバシーポリシー</a></li>
          <li>
            <a class="icon twitter" href=""></a>
            <a class="icon instagram" href=""></a>
          </li>
        </ul>
      </div> -->
    </header>
    Menu

    Who We Are
    Service
    Works
    News
    Company
    Recruit
    Contact

    Ja
    En

    Top
    Who We Are

    Service
    Film &amp; Visual Design
    Promotion
    Media
    Contents Business
    Global
    R&amp;D
    Management
    Others

    Works
    All
    CM
    MV
    Feature Film
    Graphic
    Promotion
    Character
    Other
    Unit
    Director
    Award

    News
    All
    Press Release
    Information
    Media
    Award

    Company
    Access

    Recruit
    Contact

    Twitter
    Facebook

    GEEK PICTURES Head Office
    〒150-0001
    東京都渋谷区神宮前2-27-5
    T：03-5879-2360　F：03-5879-2361

    <!-- logo画像 -->
    GEEK PICTURES独自の知見とネットワークを活用しNFTの可能性をグローバル視点で探求し続けるプロジェクト

    GEEK.NFT

    GEEK PICTURESが取り組んでいる、NFT領域のコンテンツクリエイティブからマーケティング、企業支援のサービスまで、独自の知見とネットワークを活用し
    NFTの可能性をグローバル視点で探求し続けるプロジェクト
    上記事業の一環として運営しているNFTプラットフォームMOSAIC NATION：https://mosaic-n.com

    Unexpected Powers United.

    150-0001, Tokyo Japan,
    2-27-5 Jingumae, Shibuya-ku,
  </header>