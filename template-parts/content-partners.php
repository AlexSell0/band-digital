<div class="row">
  <?php 
    global $post;
    $query = new WP_Query( [
      'posts_per_page' => 4,
      'post_type'        => 'partners',
    ] );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        ?>
        <!-- Выводим посты сервисов -->
      <div class="col-lg-3 col-sm-6 col-md-3 text-center">
        <img src="<?php if ( has_post_thumbnail() ){
                                echo get_the_post_thumbnail_url(); 
                        }?>" alt="partner" class="img-fluid" />
      </div>
  
        <?php 
      }
    } else {
      // Постов не найдено
    }

    wp_reset_postdata(); // Сбрасываем $post
  ?>
</div>