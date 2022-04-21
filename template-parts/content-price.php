<!-- PRICE AREA START  -->
<section id="pricing" class="section-padding bg-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 m-auto">
        <div class="section-heading">
          <h4 class="section-title">Доступные тарифы для вас</h4>
          <p>Подберите тот, который подходит вам больше всего</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php 
        global $post;
        $query = new WP_Query( [
            'posts_per_page'  => 6,
            'post_type'       => 'price',
            'order'           => 'ASC'
        ] );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();

            ?>
            <!-- Выводим посты прайса -->
              <div class="col-lg-4 col-sm-6">
                <div class="pricing-block">
                  <div class="price-header">
                    <i class="<?php if( !empty(get_post_meta($post->ID, 'price-icon', true))){
                      echo get_post_meta($post->ID, 'price-icon', true);
                    }else{
                      echo 'icofont-bag-alt';
                    } ?>"></i>
                    <h4 class="price"><?php the_title(); ?><small>₽</small></h4>
                    <h5><?php the_excerpt(); ?></h5>
                  </div>
                  <div class="line"></div>

                  <?php the_content(); ?>

                  <a href="<?php the_permalink(); ?>" class="btn btn-hero btn-circled">выбрать тариф</a>
                </div>
              </div>
                

            <?php 
            }
        } else {
            // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
      ?>
</section>  

    <!-- Выводим отзывы -->
    <?php get_template_part( 'template-parts/content', 'testimonial' , ['title' => 'Клиенты, которые нам доверяют', 'description' => 'Отзывы благодарных клиентов']); ?>

<!--  PARTNER START  -->
<section class="section-padding">
  <div class="container">
    
    <!-- Выводим партнеров -->
    <?php get_template_part( 'template-parts/content', 'partners' ); ?>
  </div>
</section>
<!--  PARTNER END  -->