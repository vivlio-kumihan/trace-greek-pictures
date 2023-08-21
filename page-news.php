<?php get_header(); ?>

<!-- 最新の投稿を10件収集する -->
<main class="news">
  <section class="pickup-news">
    <h2 class="news-title">Pickup News</h2>
    <!-- Slider main container -->
    <div class="swiper news-page">
      <ul class="swiper-wrapper news-ul">
        <?php
        $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
          'orderby' => 'date',
          'paged' => $recent_page,
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
            <li class="swiper-slide">
              <a href="<?php the_permalink(); ?>">
                <div class="frame">
                  <?php the_post_thumbnail(); ?>
                </div>
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
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </ul>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-scrollbar"></div>
    </div>
  </section>

  <!-- 作戦
        条件にあった全ての投稿を表示させる必要がある。
        10件だけ表示させておき、more buttonをクリックして10件ずつ表示を増やしていく。 -->
  <section class="latest-news post-archive">
    <header>
      <div class="check-category">
        <dl>
          <dt>
            <div class="title">Filter</div>
            <div class="btn">Clear</div>
          </dt>
          <!-- インスタンスをここで回してulで展開 -->
          <dd>
            <ul>
              <li>Press Release</li>
              <li>Information</li>
              <li>Media</li>
              <li>Award</li>
            </ul>
          </dd>
        </dl>
        <!-- 根本的に理解できてないからとりあえず元の書き方を置いておく。 -->
        <!--  
        <?php
        $list = get_categories();
        foreach ($list as $value) {
          echo '<li><a href="' . esc_url(add_query_arg('category', $value->slug, get_permalink())) . '">' . esc_html($value->name) . '</a></li>';
        }
        ?>
        -->
        <ul class="category_list">
          <?php
          $list = get_categories();
          foreach ($list as $value) {
          ?>
            <li>
              <!-- <label for="html"><?php echo $value->name ?></label> -->
              <label for="html" class="active"><?php echo $value->name ?></label>
              <input type="checkbox" name="checked" id="<?php echo $value->name ?>" value="<?php echo $value->name ?>">
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <dl id="check-year" class="check-year">
        <dt class="title">Year</dt>
        <dd class="year-list">
          <ul>
            <li><a href="">All</a></li>
            <?php wp_get_archives('post_type=post&type=yearly&show_post_count=0'); ?>
          </ul>
        </dd>
      </dl>
    </header>
    <div class="contents">
      <h2>Latest News / Press Release</h2>
      <ul>
        <?php
        $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
        $selected_category = isset($_GET['category']) ? $_GET['category'] : 'all';
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
          'paged' => $recent_page,
        );
        if ($selected_category !== 'all') {
          $args['category_name'] = $selected_category;
        }
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
      <div class="see-more">
        <a href="">More</a>
      </div>
    </div>
  </section>
  <section class="contact-us parallax-frame">
    <div class="parallax-bg-img one"></div>
    <div class="border-circle">
      <h2>Contact Us</h2>
      <p>ご依頼やご相談、<br>採用に関してのお問い合わせはこちら</p>
    </div>
  </section>
  <!-- <section class="contact-us parallax-frame two">
    <div class="parallax-bg-img"></div>
  </section>
  <section class="contact-us parallax-frame three">
    <div class="parallax-bg-img"></div>
  </section> -->
</main>

<?php get_footer(); ?>