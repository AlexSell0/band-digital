    <div class="row">
        <!-- Выводим сайтбар -->

        <div class="row">
          <div class="col-lg-5 col-sm-8 col-md-8">
            <?php   
            if ( ! dynamic_sidebar( 'sidebar-footer-text' ) ) : dynamic_sidebar( 'sidebar-footer-text' ); endif; 
            ?>
          </div>
          <div class="col-lg-2 col-sm-4 col-md-4">
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'footer-info',
                'menu_id'        => false,
                'menu_class'        => '',
                'depth'           => 1,
                'container'       => 'div',
                'container_class' => 'footer-widget footer-link',
                'items_wrap'      => '<h4>Информация</h4><ul>%3$s</ul>',
                'walker'          => new bootstrap_4_walker_nav_menu()
            ) );
            ?>
          </div>

          <div class="col-lg-2 col-sm-6 col-md-6">

            <?php
            wp_nav_menu( array(
                'theme_location'  => 'footer-href',
                'menu_id'        => false,
                'menu_class'        => '',
                'depth'           => 1,
                'container'       => 'div',
                'container_class' => 'footer-widget footer-link',
                'items_wrap'      => '<h4>Сылки</h4><ul>%3$s</ul>',
                'walker'          => new bootstrap_4_walker_nav_menu()
            ) );
            ?>

          </div>
          <div class="col-lg-3 col-sm-6 col-md-6">
            <?php   
            if ( ! dynamic_sidebar( 'sidebar-footer-contact' ) ) : dynamic_sidebar( 'sidebar-footer-contact' ); endif; 
            ?>
          </div>
        </div>
    </div>