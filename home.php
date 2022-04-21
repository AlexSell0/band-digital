<!-- Страница записей -->
<?php get_header(); ?>
<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Promodise журнал</h1>
                    <p>Полезные статьи про маркетинг и диджитал</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                        <!-- Циклом выводим записи -->
                        <?php 
                        $count = 0; //Обьявляем счетчик постов
                        if ( have_posts() ) : while ( have_posts() ) : the_post();  //Проверяем есть ли посты
                        $count++;
                        
                        switch($count):
                            case 3:
                                $count = 0;
                                ?>

                                        <div class="col-lg-12">
                                            <div class="blog-post">
                                                <!-- Выводим изображение -->
                                                <?php 
                                                // Если изображение поста установлено выводим миниатюру, иначе выводим заглушку
                                                if ( has_post_thumbnail() ){
                                                    //post-thumbnail - размер изображения, можно менять на свой
                                                    the_post_thumbnail( 'post-thumbnail', array(
                                                        'class' => "img-fluid w-100", // устанавливаем класс для изображения
                                                        'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                                                    )); 
                                                }else{
                                                    echo '<img src="'. get_template_directory_uri() .'/images/no_image.jpg" style="border: 1px solid #e3e3e3; width: 100%;" alt="" class="img-fluid">';
                                                }
                                                ?>
                                                <div class="mt-4 mb-3 d-flex">
                                                    <div class="post-author mr-3">
                                                    <!-- выводим автора поста -->
                                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>" class="h6 text-uppercase"><?php the_author(); ?></a>
                                                    </div>

                                                    <div class="post-info">
                                                        <i class="fa fa-calendar-check"></i>
                                                    <!-- выводим дату и ссылку на нее -->
                                                    <span><a href="<?php echo get_home_url(); ?>/date/<?php the_time('Y'); ?>/<?php the_time('m'); ?>/<?php the_time('d'); ?>/"><?php the_time('j F Y'); ?></a></span>
                                                    </div>
                                                </div>
                                                <!-- выводим ссылку и тайтл -->
                                                <a href="<?php the_permalink(); ?>" class="h4 "><?php the_title(); ?></a>
                                                <!-- выводим отрывок -->
                                                <p class="mt-3"><?php the_excerpt(); ?></p>
                                                <!-- выводим ссылку -->
                                                <a href="<?php the_permalink(); ?>" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>

                                            </div>
                                        </div>

                                <?php
                                break;
                            default:
                                ?>
                                <!-- Цикл WordPress -->
                                    <div class="col-lg-6">
                                        <div class="blog-post">
                                            <!-- Выводим изображение -->
                                            <?php 
                                            // Если изображение поста установлено выводим миниатюру, иначе выводим заглушку
                                            if ( has_post_thumbnail() ){
                                                the_post_thumbnail( 'post-thumbnail', array(
                                                    'class' => "img-fluid w-100",
                                                    'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                                                )); 
                                            }else{
                                                echo '<img src="'. get_template_directory_uri() .'/images/no_image.jpg" style="border: 1px solid #e3e3e3; width: 100%; max-width: 370px;" alt="" class="img-fluid">';
                                            }
                                            ?>

                                            <div class="mt-4 mb-3 d-flex">
                                                <div class="post-author mr-3">
                                                    <i class="fa fa-user"></i>
                                                    <!-- выводим автора поста -->
                                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>" class="h6 text-uppercase"><?php the_author(); ?></a>
                                                </div>

                                                <div class="post-info">
                                                    <i class="fa fa-calendar-check"></i>
                                                    <!-- выводим дату и ссылку на нее -->
                                                    <span><a href="<?php echo get_home_url(); ?>/date/<?php the_time('Y'); ?>/<?php the_time('m'); ?>/<?php the_time('d'); ?>/"><?php the_time('j F Y'); ?></a></span>
                                                    
                                                </div>
                                            </div>
                                            <!-- выводим ссылку и тайтл -->
                                            <a href="<?php the_permalink(); ?>" class="h4 "><?php the_title(); ?></a>
                                            <!-- выводим отрывок -->
                                            <p class="mt-3"><?php the_excerpt(); ?></p>
                                            <!-- выводим ссылку -->
                                            <a href="<?php the_permalink(); ?>" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                        
                        <?php 
                            break;
                        endswitch;

                        endwhile; else : ?>
                                <p>Записей нет.</p>
                            <?php endif; ?>

                </div>

                <div class="row">
                    <div class="col">
                        <!-- Выводим пагинацию -->
                        <?php the_posts_pagination( array(
                            'show_all'     => false, // показаны все страницы участвующие в пагинации
                            'end_size'     => 1,     // количество страниц на концах
                            'mid_size'     => 1,     // количество страниц вокруг текущей
                            'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                            'prev_text'    => __('<span class="p-2 border">«</span>'),
                            'next_text'    => __('<span class="p-2 border">»</span>'),
                            'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                            'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                            'screen_reader_text' => __( 'Posts navigation' ),
                            'before_page_number' => '<span class="p-2 border">',
                            'after_page_number'  => '</span>'
                        ) ); ?>
                    </div>
                </div>

            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>