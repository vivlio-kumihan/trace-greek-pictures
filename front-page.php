<?php get_header(); ?>

<!-- works -->
<!-- <section id="works" class="works">
  <div class="catch">
    <ul>
      <li></li>
      <li>「GEEK PICTURES×YUI KAMIJI／YUI KAMIJI ROAD TO PARIS 2024／Ready,」</li>
    </ul>
    <ul>
      <li>Kering Japan Limited</li>
      <li>KAGUYA BY GUCCI</li>
    </ul>
    <ul>
      <li>UNIVERSAL MUSIC LLC</li>
      <li>椎名林檎「私は猫の⽬」</li>
    </ul>
    <ul>
      <li>Suntory Holdings Limited</li>
      <li>クラフトボス『宇宙⼈ジョーンズ・ゴンドラ』篇</li>
    </ul>
    <ul>
      <li>Kansai Television Co. Ltd.</li>
      <li>カンテレ・フジテレビ系 10月期 新・月10ドラマ『エルピスー希望、あるいは災いー』</li>
    </ul>
    <ul>
      <li>LOTTE CO., LTD.</li>
      <li>LOTTE XYLITOL×BTS「Smile Special Movie Season2」</li>
    </ul>
    <ul>
      <li>y's connection</li>
      <li>「FLY(feat.androp)」by EYE VDJ MASA</li>
    </ul>
    <ul>
      <li>Amazon Japan G.K.</li>
      <li>Amazon プライム「思いのまま」編</li>
    </ul>
    <ul>
      <li>GMO CLICK Securities, Inc.</li>
      <li>GMOクリック証券 ショートムービー「New Life is … The Movie」</li>
    </ul>
    <ul>
      <li>Metro-Goldwyn-Mayer Studios Inc.、MGM</li>
      <li>ピンクパンサー</li>
    </ul>
  </div>

  <a href="">
    <h2>View All Works</h2>
    <a class="see-more">More</a>
  </a>
</section> -->

<section id="who-we-are" class="who-we-are">
  <p class="catch-copy">動かせない世界は、ない。</p>
  <p class="lead-copy">
    ひとつの世界が動き出す。それは映像だ。そして、その映像が、今のリアルな現実を、世界をも動かしてゆく。それは...
  </p>
  <a class="view-more" href="">
    <small lang="en">Who We Are</small>
    <div class="to-content fill"></div>
  </a>
</section>

<!-- newsページ = archive page -->
<section class="front-page post-archive">
  <header>
    <div class="check-category">
      <h2>News</h2>
      <ul>
        <li><a href="/archive">All</a></li>
        <?php
        $categorie_list = get_categories();
        foreach ($categorie_list as $value) {
          echo '<li><a href="' . home_url('/') . 'category/' . $value->slug . '">' . $value->name . '</a></li>';
        }
        ?>
      </ul>
    </div>
  </header>
  <div class="contents">
    <ul>
      <?php
      $args = array('posts_per_page' => 5);
      $my_query = new WP_Query($args);
      if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
      ?>
          <li class="wrapper">
            <a href="<?php the_permalink(); ?>">
              <div class="frame">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="contents">
                <div class="header-sub">
                  <ul class="post-category">
                    <?php
                    $category = get_the_category();
                    foreach ($category as $attr) {
                      echo '<li>' . $attr->name . '</li>';
                    }
                    ?>
                    <li>
                      <time datetime="<?php echo get_the_date("Y-m-d") ?>">
                        <?php echo get_the_date("Y/m/d") ?>
                      </time>
                    </li>
                  </ul>
                </div>
                <p class="article-title"><?php the_title(); ?></p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </ul>
  </div>
  <div class="contents pickup-news">
    <h2 class="news-title">Pickup News</h2>
    <ul>
      <?php
      $tag_slug = 'pick-up'; // タグのスラッグをここに入力
      $tag = get_term_by('slug', $tag_slug, 'post_tag');
      $args = array(
        'tag__in' => array($tag->term_id),
        'posts_per_page' => 1, // すべての記事を表示
      );
      $tag_query = new WP_Query($args);
      if ($tag_query->have_posts()) : while ($tag_query->have_posts()) : $tag_query->the_post();
      ?>
          <li class="wrapper">
            <a href="<?php get_permalink() ?>">
              <div class="frame">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="contents">
                <div class="header-sub">
                  <ul class="post-category">
                    <?php
                    $category = get_the_category();
                    foreach ($category as $attr) {
                      echo '<li>' . $attr->name . '</li>';
                    }
                    ?>
                    <li>
                      <time datetime="<?php echo get_the_date("Y-m-d") ?>">
                        <?php echo get_the_date("Y/m/d") ?>
                      </time>
                    </li>
                  </ul>
                </div>
                <p class="article-title"><?php echo get_the_title(); ?></p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </ul>
    <!-- パンくずリスト -->
    <?php
    global $wp_query;
    $args = array(
      'type' => 'list',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages,
      'prev_text' => '<',
      'next_text' => '>',
    );
    echo paginate_links($args);
    ?>
    <div class="more to-news"></div>
  </div>
</section>

<!-- Serviceのページ -->
<section id="service" class="service">
  <div class="lead">
    <h2>Service</h2>
    <p>
      TVCM・映画・ミュージックビデオなどあらゆる映像コンテンツの企画・制作をはじめ、イベント・キャンペーン・デジタルコンテンツなど、すべてのプロジェクトをワンストップでプロデュースしています。
    </p>
  </div>
  <ul class="container">
    <li>
      <dl>
        <a href="">
          <dt>映像・グラフィック関連<br><span lang="en">Film &amp; Visual Design</span></dt>
          <dd>TVやWebをはじめとしたあらゆるメディアに対応した映像を、実写、CG、アニメーションなど様々な表現を用いて制作</dd>
        </a>
      </dl>
      <a class="to-content circle"></a>
    </li>
    <li>
      <dl>
        <dt>プロモーション / メディア<br><span lang="en">Promotion / Media</span></dt>
        <dd><a href="">プロモーション</a><br>広告キャンペーン・イベントの企画制作など</dd>
        <dd><a href="">メディア</a><br>情報媒体、プラットフォームの企画開発・運営</dd>
      </dl>
      <a class="to-content circle"></a>
    </li>
    <li>
      <dl>
        <a href="">
          <dt>コンテンツ事業<br><span lang="en">Contents Business</span></dt>
          <dd>キャラクターIPコンテンツ、NFT、WEB COMIC、企業サポート、クリエイターのマネージメント</dd>
        </a>
      </dl>
      <a class="to-content circle"></a>
    </li>
    <li>
      <dl>
        <dt>海外 / R&amp;D / マネージメント / その他<br><span lang="en">Global / R&amp;D / Management / Others</span></dt>
        <dd><a href="">海外</a><br>プロダクションコーディネート、コンテンツ輸出入、市場調査など、海外と日本の双方向ネットワークを活用した事業</dd>
        <dd><a href="">R&amp;D</a><br>AI、IoT、ビッグデータなど、先端技術を用いた新規事業の企画開発</dd>
        <dd><a href="">マネージメント</a><br>映像ディレクター、カメラマン、スタイリストなどのマネージメント</dd>
        <dd><a href="">その他</a><br>空間設計デザイン、劇場運営、スタジオ運営など</dd>
      </dl>
      <a class="to-content circle"></a>
    </li>
  </ul>
</section>

<!-- Join Our Teamのページ -->
<section id="join-our-team" class="join-our-team">
  <h2>Join Our Team</h2>
  <!-- swiperが必要 -->
  <div class="arrow-mark">1 - 6 <- arrow mark -></div>

  <h3>Job Information</h3>
  <ul class="include-accordion">
    <li>
      <button type="button">CM制作プロダクションマネージャー</button>
      <dl>
        <dt>職種</dt>
        <dd>CM制作プロダクションマネージャー</dd>
        <dt>勤務地</dt>
        <dd>渋谷区神宮前/中央区銀座/渋谷区猿楽町　※いずれかになります</dd>
        <dt>資格</dt>
        <dd>実務経験のない方でも可　※実務経験のある方は優遇します。</dd>
        <dt>選出方法</dt>
        <dd>書類選考のうえ面接日を通知いたします。</dd>
        <dt>待遇</dt>
        <dd>経験・能力に応じ当社規定により優遇</dd>
        <dt>福利厚生</dt>
        <dd>各種社会保険完備（雇用、労災、健康、厚生年金） / 交通費支給（当社規定にあり）</dd>
        <dt>昇給 / 賞与</dt>
        <dd>昇給：年1回 / 賞与：年1回（決算賞与）</dd>
      </dl>
      <a class="view-more" href="">
        <small>応募する</small>
        <div class="to-content fill"></div>
      </a>
    </li>
    <li>
      <button type="button">映像エディター</button>
      <dl>
        <dt>職種</dt>
        <dd>映像エディター</dd>
        <dt>勤務地</dt>
        <dd>渋谷区神宮前</dd>
        <dt>資格</dt>
        <dd>
          <ul>
            <li>・実務経験1年以上</li>
            <li>・After Effectsの実務経験</li>
            <li>・PremiereまたはFinal Cut Proなどの映像編集ソフトの基本操作</li>
            <li>・Photoshopの実務経験</li>
          </ul>
        </dd>
        <dt>選出方法</dt>
        <dd>書類選考のうえ面接日を通知いたします。</dd>
        <dt>待遇</dt>
        <dd>経験・能力に応じ当社規定により優遇</dd>
        <dt>福利厚生</dt>
        <dd>各種社会保険完備（雇用、労災、健康、厚生年金） / 交通費支給（当社規定にあり）</dd>
        <dt>昇給 / 賞与</dt>
        <dd>昇給：年1回 / 賞与：年1回（決算賞与）</dd>
        <dt>業務内容</dt>
        <dd>映像エディターとして、オフラインなどの映像編集を行います。</dd>
      </dl>
      <a class="view-more" href="">
        <small>応募する</small>
        <div class="to-content fill"></div>
      </a>
    </li>
    <li>
      <button type="button">ビジネスプロデューサー</button>
      <dl>
        <dt>職種</dt>
        <dd>ビジネスプロデューサー</dd>
        <dt>勤務地</dt>
        <dd>〒150-0001　東京都渋谷区神宮前2-27-5</dd>
        <dt>資格</dt>
        <dd>
          <dl>
            <dt>【業務内容】</dt>
            <dd>
              <ul>
                <li>●新規案件受注の受付窓口業務</li>
                <li>●新規クライアント開拓の営業活動</li>
                <li>●クライアント先との交渉や調整等</li>
              </ul>
            </dd>
            <dt>【歓迎条件】</dt>
            <dd>
              <ul>
                <li>■セールス経験・販売経験者</li>
                <li>■新規開拓営業経験者</li>
                <li>■広告代理店営業・プロデューサー経験者</li>
              </ul>
            </dd>
            <dt> 【求める人物像】</dt>
            <dd>
              <ul>
                <li>■起業家精神のある方（営業経験など）</li>
              </ul>
            </dd>
          </dl>
        </dd>
        <dt>選出方法</dt>
        <dd>書類選考のうえ、通過の際面接日を調整させていただきます。</dd>
        <dt>待遇</dt>
        <dd>経験・能力に応じ当社規定により優遇</dd>
        <dt>福利厚生</dt>
        <dd>各種社会保険完備（雇用、労災、健康、厚生年金）/ 交通費支給（当社規定あり）</dd>
        <dt>昇給 / 賞与</dt>
        <dd>昇給：年1回/賞与：年1回（決算賞与）</dd>
      </dl>
    </li>

    <a class="view-more" href="">
      <small>応募する</small>
      <div class="to-content fill"></div>
    </a>
  </ul>
  <a class="view-more" href="">
    <small lang="en">More</small>
    <div class="to-content fill"></div>
  </a>
</section>
<!-- GEEK Communityのページ -->
<section id="geek-community" class="geek-community">
  <h2>GEEK Community</h2>
  <h3>Unit</h3>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/division-426x426.jpg" alt="">
        <h4>GEEK PICTURES Division</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/division-426x426.jpg" alt="">
        <h4>GEEK PICTURES Division</h4>
        <div class="out-line">映像コンテンツのプロデュース</div>
        <p>TVCMのほかマルチメディアにおける映像コンテンツのプロデュースを行っています。お客様との連携でメディアや視聴環境に合った映像コンテンツのプロデュースを実行します。</p>
      </dd>
    </div>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-geekpark-426x426.jpg" alt="">
        <h4>geekpark</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-geekpark-426x426.jpg" alt="">
        <h4>geekpark</h4>
        <div class="out-line">映像・グラフィックなど全ジャンルのプロデュース業務</div>
        <p>映像・グラフィックなどを手がけるプロデュースチーム。広告からエンターテインメントまで、ジャンルの壁を越えた包括的なプロデュースを実行します。</p>
        <p>https://geekpark.tokyo</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-gcs-426x426.jpg" alt="">
        <h4>GEEK CREATIVE STUDIO</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-gcs-426x426.jpg" alt="">
        <h4>GEEK CREATIVE STUDIO</h4>
        <div class="out-line">マルチメディアのエンターテインメントコンテンツの企画・プロデュース業務</div>
        <p>プランナー、ディレクターを有し、マルチメディアにおけるエンターテインメントコンテンツをプロデュースするプロフェッショナル集団。お客様の課題解決を最適な形で提供しています。</p>
        <p>https://cs.geekpictures.co.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/965aae056635da14f8a464ea714d7188-1-426x426.jpg" alt="">
        <h4>GEEK DESIGN</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/965aae056635da14f8a464ea714d7188-1-426x426.jpg" alt="">
        <h4>GEEK DESIGN</h4>
        <div class="out-line">デザインのプロデュース業務</div>
        <p>デザインに特化したプロデュースチーム。グラフィックのプロデュースのほか、マルチメディアにおけるエンターテインメントコンテンツのデザイン領域を担っています。</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/MP-426x426.jpg" alt="">
        <h4>MEDIA PROMOTION</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/MP-426x426.jpg" alt="">
        <h4>MEDIA PROMOTION</h4>
        <div class="out-line">イベント及び自社メディアの企画・プロデュース業務</div>
        <p>お客様の課題解決に沿ったイベントプロデュースのほか、当社発のメディアの企画・プロデュースを手がけています。</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-gw-426x426.jpg" alt="">
        <h4>GEEK WONDERS</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-gw-426x426.jpg" alt="">
        <h4>GEEK WONDERS</h4>
        <div class="out-line">キャラクターIPコンテンツ・NFT・WEBCOMIC・企業サポート、クリエイターのマネージメント</div>
        <p>キャラクターIPコンテンツをはじめ NFTやWEBCOMIC、クリエイターマネージメント、 その知見を活かした企業サポートなど コンテンツの新たな可能性を日々追求しながら事業展開しています。</p>
        <p>https://geekwonders.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-palvlov-426x426.jpg" alt="">
        <h4>PAVLOV.</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-palvlov-426x426.jpg" alt="">
        <h4>PAVLOV.</h4>
        <div class="out-line">音楽の企画・プロデュース業務</div>
        <p>音楽のプロデュースユニット。広告分野に限らず、マルチメディアのエンターテインメントコンテンツの音楽領域のプロデュースを担っています。</p>
        <p>http://pavlov.co.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-direction-426x426.jpg" alt="">
        <h4>DIRECTION</h4>
        <div class="category">Unit</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/geekpictures-direction-426x426.jpg" alt="">
        <h4>DIRECTION</h4>
        <div class="out-line">企画演出業務</div>
        <p>映像コンテンツの企画演出を行うユニット。早くから様々な作品に携わり、多くの実績を有する若く才能あるメンバーも所属します。</p>
      </dd>
    </div>
  </dl>

  <h3>Group Company</h3>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-gs-426x426.jpg" alt="">
        <h4>geek sight inc.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-gs-426x426.jpg" alt="">
        <h4>geek sight inc.</h4>
        <div class="out-line">映画のプロデュース・ポストプロダクション業務</div>
        <p>映画の制作プロダクションとして、大型作品を含む複数の作品を手がけています。一方でポストプロダクションも有しており、映画、テレビ番組、MV、CMの編集を手がけています。</p>
        <p>https://geeksight.co.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-gt-426x426.jpg" alt="">
        <h4>GEEK TOYS Inc.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-gt-426x426.jpg" alt="">
        <h4>GEEK TOYS Inc.</h4>
        <div class="out-line">アニメーションのプロデュース業務</div>
        <p>アニメーションスタジオ。既存の制作手法にとらわれることなく、常に新しい技術と工夫で、世界中の人々に感動と驚きを与える映像表現を目指しています。</p>
        <p>https://geektoys.co.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-rgp-426x426.jpg" alt="">
        <h4>RED GEEK PICTURES INC.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-rgp-426x426.jpg" alt="">
        <h4>RED GEEK PICTURES INC.</h4>
        <div class="out-line">CG、空間演出の企画・プロデュース業務</div>
        <p>中国・日本を含むアジアを中心に活動するクリエイティブチーム。国内外の映像コンテンツでCGや空間演出の企画・プロデュースを手がけています。</p>
        <p>https://www.red-asia.com</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-nv-426x426.jpg" alt="">
        <h4>Nouvelle Vague Co., Ltd.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-nv-426x426.jpg" alt="">
        <h4>Nouvelle Vague Co., Ltd.</h4>
        <div class="out-line">映像美術のデザイン・企画・プロデュース業務</div>
        <p>映画、CM、店舗などの美術のプロデュース・デザインを行うアートプロダクション。デザインから設計・施工までを一手に担い、25年以上にわたって業界の第一線で活躍しています。</p>
        <p>https://www.nv-art.co.jp/nouvellevague/</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-nestvisual-426x426.jpg" alt="">
        <h4>NestVisual Co., Ltd.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-nestvisual-426x426.jpg" alt="">
        <h4>NestVisual Co., Ltd.</h4>
        <div class="out-line">デジタルコンテンツの開発、制作</div>
        <p>「映像コンテンツ」と「テクノロジー」の融合による高品質な映像表現を目指し、「XR(VR/AR/MR）」「インタラクティブシステム」「プロジェクションマッピング」など、様々なデジタルコンテンツの開発、制作に携わっています。</p>
        <p>https://www.nest-vis.com/</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-tscp-426x426.jpg" alt="">
        <h4>TOCHIGI STUDIO CITY PLANNING Inc.</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-tscp-426x426.jpg" alt="">
        <h4>TOCHIGI STUDIO CITY PLANNING Inc.</h4>
        <div class="out-line">実用サイズのスクランブル交差点のオープンセットの運営業務</div>
        <p>当社グループ会社Nouvelle Vagueが開設した実用サイズのスクランブル交差点のオープンセット「足利スクランブルシティスタジオ」の運営を行っています。</p>
        <p>https://ashikaga-scramble.com</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-capsule-426x426.jpg" alt="">
        <h4>CAPSULE</h4>
        <div class="category">Group Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/group-capsule-426x426.jpg" alt="">
        <h4>CAPSULE</h4>
        <div class="out-line">レンタルシアターの運営業務</div>
        <p>原宿のレンタルシアター。新鋭映像作家の発掘や、サブカルチャーからメジャーへのステップアップの活動拠点、さらには劇場の枠を超えた映像文化情報のサイトを構築しています。</p>
        <p>https://capsule-theater.jp</p>
      </dd>
    </div>
  </dl>

  <h3>Creative Brand</h3>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-voyager-426x426.jpg" alt="">
        <h4>VOYAGER</h4>
        <div class="category">Creative Brand</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-voyager-426x426.jpg" alt="">
        <h4>VOYAGER</h4>
        <div class="out-line">クリエイターのマネージメント業務</div>
        <p>クリエイターのマネージメントオフィス。マネージメントに留まらずクリエイターの発掘も行っています。現在、国内外のディレクター、カメラマンなどの精鋭たちが活躍中です。</p>
        <p>https://www.vyg.jp</p>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-zc-426x426.jpg" alt="">
        <h4>ZEN creative</h4>
        <div class="category">Creative Brand</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-zc-426x426.jpg" alt="">
        <h4>ZEN creative</h4>
        <div class="out-line">クリエイターのマネージメント業務</div>
        <p>クリエイターのマネージメントオフィス。フィルムディレクター、カメラマン、スタイリスト、メーキャップアーティストなど様々なクリエイターが在籍しています。</p>
        <a href="https://zencreative.jp">https://zencreative.jp</a>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-beyond-426x426.jpg" alt="">
        <h4>Beyond</h4>
        <div class="category">Creative Brand</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/creativebrand-beyond-426x426.jpg" alt="">
        <h4>Beyond</h4>
        <div class="out-line">プロデューサーユニット</div>
        <p>広告・映像のプロデューサーの可能性を広げ、実現するために集まったプロデューサーユニットです。</p>
        <a href="https://unit-beyond.tokyo">https://unit-beyond.tokyo</a>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/logo_50-426x426.jpg" alt="">
        <h4>WASH</h4>
        <div class="category">Creative Brand</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/logo_50-426x426.jpg" alt="">
        <h4>WASH</h4>
        <div class="out-line">クリエイターのマネージメント業務</div>
        <p>クリエイターのマネージメントオフィス。<br>自分を磨き続けるという意味で立ち上げられたWASHは、「新しい選択」となる若手クリエイターが所属しています。</p>
      </dd>
    </div>
  </dl>

  <h3>Global</h3>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-shanghai-426x426.jpg" alt="">
        <h4>GEEK PICTURES SHANGHAI INC.</h4>
        <div class="category">Global</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-shanghai-426x426.jpg" alt="">
        <h4>GEEK PICTURES SHANGHAI INC.</h4>
        <div class="out-line">海外拠点・上海</div>
        <p>中国・上海を拠点とし、RED GEEK PICTURESとともに中国大陸全土、中華圏にて東京本社と同様のクオリティ&amp;サービスで映像制作を行います。日本のクリエイターの中国におけるマネージメント業務も行っています。</p>
        <a href="https://www.red-asia.com">https://www.red-asia.com</a>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-pvt-426x426.jpg" alt="">
        <h4>GEEK PICTURES Pvt.Ltd.</h4>
        <div class="category">Global</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-pvt-426x426.jpg" alt="">
        <h4>GEEK PICTURES Pvt.Ltd.</h4>
        <div class="out-line">海外拠点・インド</div>
        <p>メイド・イン・トウキョウの映像制作クオリティを提供する拠点です。</p>
        <a href="https://geekpictures.in">https://geekpictures.in</a>
      </dd>
    </div>
  </dl>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-bangkok-426x426.jpg" alt="">
        <h4>GEEK PICTURES BANGKOK</h4>
        <div class="category">Global</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/global-bangkok-426x426.jpg" alt="">
        <h4>GEEK PICTURES BANGKOK</h4>
        <div class="out-line">海外拠点・バンコク</div>
        <p>2022年3月1日より、GEEK PICTURES SINGAPOREはGEEK PICTURES BANGKOKに併合しました。東南アジアの拠点を発展が著しいバンコクに集約することで、より効率的で高クオリティなサービスを提供します。</p>
        <a href="https://geekpictures.co.jp/bangkok/">https://geekpictures.co.jp/bangkok/</a>
      </dd>
    </div>
  </dl>

  <h3>Affiliated Company</h3>
  <dl>
    <div>
      <dt>
        <img src="<?php echo get_template_directory_uri() ?>/img/affiliated-vt-426x426.jpg" alt="">
        <h4>VISUALMAN TOKYO Inc.</h4>
        <div class="category">Affiliated Company</div>
      </dt>
      <dd>
        <img src="<?php echo get_template_directory_uri() ?>/img/affiliated-vt-426x426.jpg" alt="">
        <h4>VISUALMAN TOKYO Inc.</h4>
        <div class="out-line">CG・VFXのプロデュース・制作業務</div>
        <p>映画、CM などにおいて、ハイレベルなCG・VFX を提供する経験豊富なプロダクションです。TOKYO を起点として世界の映像制作のHUB(拠点)になることを目指しています。</p>
        <a href="">https://visualman.tokyo</a>
      </dd>
    </div>
  </dl>
  <a class="view-more" href="">
    <small lang="en">More</small>
    <div class="to-content fill"></div>
  </a>
</section>


<section id="contact" class="contact">
  <h2>Contact Us</h2>
  <p>
    ご依頼やご相談、<br>
    採用に関してのお問い合わせはこちら
  </p>
</section>


<?php get_footer(); ?>