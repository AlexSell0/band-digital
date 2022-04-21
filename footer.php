    <!--  FOOTER AREA START  -->
    <section id="footer" class="section-padding">
      <div class="container">
        <div class="row">
          <?php get_sidebar('footer'); ?>
        </div>

        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="footer-copy">© <?php the_date( 'Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</div>
          </div>
        </div>
      </div>
    </section>
    <!--  FOOTER AREA END  -->

    <!-- 
    Essential Scripts
    =====================================-->

    <? wp_footer(); ?>
  </body>
</html>
