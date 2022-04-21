<?php get_header(); ?>
    <!--MAIN BANNER AREA START -->
    <div class="page-banner-area page-contact" id="page-banner">
      <div class="overlay dark-overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
            <div class="banner-content content-padding">
              <h1 class="text-white"><?php the_title(); ?></h1>
              <p><?php the_content(); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--MAIN HEADER AREA END -->

    <!-- Подключаем прайсы -->
    <?php get_template_part( 'template-parts/content', 'price' ); ?>

<?php get_footer();