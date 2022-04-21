<?php 
/*
Template Name: шаблон страницы услуги
Template Post Type: post-21
*/

get_header(); ?>

<!--MAIN BANNER AREA START -->
    <div class="page-banner-area page-service" id="page-banner" style="background: url('<?php                                                 // Если изображение поста установлено выводим миниатюру, иначе выводим заглушку
    if ( has_post_thumbnail() ){
        echo get_the_post_thumbnail_url(); 
    }else{
        echo get_template_directory_uri() . '/images/no_image.jpg';
    }
                                                ?>') center/cover">>
      <div class="overlay dark-overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
            <div class="banner-content content-padding">
              <h1 class="text-white"><?php the_title(); ?></h1>
              <p>Мы оказываем весь спект диджитал услуг</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--MAIN HEADER AREA END -->

        <?php the_content(); ?>

        <!--  SERVICE AREA START  -->
        <section class="section pt-0">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-5 col-sm-12 col-md-6 mb-4">
                <img src="http://wordpress/wp-content/uploads/2-min.jpg" alt="feature bg" class="img-fluid">
              </div>

              <div class="col-lg-7 pl-4">
                <div class="mb-5">
                  <h3 class="mb-4 service_area_header"><?php echo get_post_meta($post->ID, 'service-header', true); ?></h3>
                  <p>
                    <?php echo get_post_meta($post->ID, 'service-description', true); ?>
                  </p>
                </div>

                <ul class="about-list">
                  <li>
                    <h5 class="mb-2"><i class="icofont icofont-check-circled"></i><?php echo get_post_meta($post->ID, 'service-effect-title-1', true); ?></h5>
                    <p><?php echo get_post_meta($post->ID, 'service-effect-description-1', true); ?></p>
                  </li>

                  <li>
                    <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i><?php echo get_post_meta($post->ID, 'service-effect-title-2', true); ?></h5>
                    <p><?php echo get_post_meta($post->ID, 'service-effect-description-2', true); ?></p>
                  </li>

                  <li>
                    <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i><?php echo get_post_meta($post->ID, 'service-effect-title-3', true); ?></h5>
                    <p><?php echo get_post_meta($post->ID, 'service-effect-description-3', true); ?></p>
                  </li>
                  <li>
                    <h5 class="mb-2"><i class="icofont icofont-check-circled"> </i><?php echo get_post_meta($post->ID, 'service-effect-title-4', true); ?></h5>
                    <p><?php echo get_post_meta($post->ID, 'service-effect-description-4', true); ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!--  SERVICE AREA END  -->

        <?php get_template_part( 'template-parts/content', 'service', ['class' => 'service-style-two', 'header'  => 'Диджитал полного цикла', 'description' => 'Это означает, что мы сможем выполнить любую цифровую задачу:
видео, маркетинг, реклама, разработка или дизайн.'] ); ?>

        <!--  PARTNER START  -->
    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-center text-lg-left">
            <div class="mb-5">
              <h3 class="mb-2">Эти компании доверяют нам</h3>
              <p>Компании, с которыми мы работаем давно</p>
            </div>
          </div>
        </div>
        <!-- Выводим партнеров -->
        <?php get_template_part( 'template-parts/content', 'partners' ); ?>
      </div>
    </section>
    <!--  PARTNER END  -->
<?php get_footer(); ?>