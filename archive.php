<?php get_header(); ?>

<main class="archive">
  <ul class="archive-list">
    <?php
    $recent_page = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'paged' => $recent_page,
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
    ?>
    <li>
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
          </ul>
          <time datetime="<?php echo get_the_date("Y-m-d") ?>"><?php echo get_the_date("Y.m.d") ?></time>
        </div>
        <h3><?php the_title(); ?></h3>
        <p>
          <?php echo wp_trim_words(get_the_content(), 50, '…'); ?>
        </p>
      </a>
    </li>
    <?php endwhile; endif; ?>
  </ul>

  <?php
  $args = array(
    'type' => 'list',
    'current' => $recent_page,
    'total' => $my_query->max_num_pages,
    'prev_text' => '<',
    'next_text' => '>',
  );
  echo paginate_links($args);
  ?>
</main>

<?php get_footer(); ?>