<?php get_header(); ?>

<!-- 最新の投稿を10件収集する -->
<main class="news">
  <section class="pickup-news">
    <h2 class="news-title">Pickup news</h2>
    <!-- Slider main container -->
    <div class="swiper">
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
                  <ul class="post-categorie">
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

  <section class="latest-news">
    <header>
      <div class="category">
        <div class="filter">Filter</div>
        <button class="clear">clear</button>
        <ul class="category_list">
          <li><a href="<?php echo esc_url(home_url()); ?>">全て</a></li>
          <?php
          $list = get_categories();
          foreach ($list as $value) {
            echo '<li><a href="' . esc_url(add_query_arg('category', $value->slug, get_permalink())) . '">' . esc_html($value->name) . '</a></li>';
          }
          ?>
        </ul>
      </div>
      <div class="year">
        <ul>
          <li>All</li>
          <li></li>
        </ul>
      </div>
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
            <li class="swiper-slide">
              <a href="<?php the_permalink(); ?>">
                <div class="frame">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="contents">
                  <div class="header-sub">
                    <ul class="post-categorie">
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
  </section>
</main>

<?php get_footer(); ?>