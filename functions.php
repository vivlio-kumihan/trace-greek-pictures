<?php 
// ウィジェットの登録
// アイキャッチ画像の登録
function theme_slug_widgets_init() {
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'sidebar'
  ));
}
add_action('widgets_init', 'theme_slug_widgets_init');
add_theme_support('post-thumbnails');

// JavaScriptへのパスを通す。
function behavior_js() {
  wp_enqueue_script(
    'myScript', 
    get_template_directory_uri().'/behavior.js', 
    array(), 
    false, 
    true
  );
}
add_action('wp_enqueue_scripts', 'behavior_js');

// コンテンツへのリンクメニューの設定
// link-pages
// link-contents
// pick-up
register_nav_menus(array(
  'link-pages' => 'ヘッダーの各ページへのリンク',
  'link-contents' => 'HBMenuの各コンテンツへのリンク',
  'pick-up' => '投稿のピックアップ',
));