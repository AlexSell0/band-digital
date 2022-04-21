<!--  TESTIMONIAL AREA START  -->
<section id="testimonial" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <div class="mb-5">
          <h3 class="mb-2"><?php 
            if (!empty($args['title'])){ echo $args['title'];}else{echo 'Отзывы';}
          ?></h3>
          <p><?php if (!empty($args['description'])){ echo $args['description'];}else{echo 'Ниже представлены отзывы от клиентов, с которыми<br />
            мы работаем уже несколько лет подряд';} ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 m-auto col-sm-12 col-md-12">
        <div class="carousel slide" id="test-carousel2">
          <div class="carousel-inner">
						<ol class="carousel-indicators">
                <?php 
                    global $post;
                    $query = new WP_Query( [
                        'posts_per_page'  => 5,
                        'post_type'       => 'testimonial',
                    ] );

										$cnt = 0;

										// count($query->posts); Колличество постов
										for($i=0; $i<count($query->posts); $i++){
											?><li data-target="#test-carousel2" data-slide-to="<?php echo $i; ?>" class="<?php if ($i === 0) echo 'active'; ?>"></li><?php
										}
										?></ol><?php

                    if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
													?>
													<!-- Выводим отзывы -->
													<div class="<?php if ($cnt === 0){echo 'carousel-item active';}else{echo 'carousel-item';}?>">
														<div class="row">
															<div class="col-lg-12 col-sm-12">
																<div class="testimonial-content style-2">
																	<div class="author-info">
																		<div class="author-img">
																			<?php 
																				// Если изображение поста установлено выводим миниатюру, иначе выводим заглушку
																				if ( has_post_thumbnail() ){
																						//post-thumbnail - размер изображения, можно менять на свой
																						the_post_thumbnail( 'post-thumbnail', array(
																								'class' => "img-fluid", // устанавливаем класс для изображения
																								'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
																						)); 
																				}else{
																						echo '<img src="'. get_template_directory_uri() .'/images/no_image.jpg" style="border: 1px solid #e3e3e3; width: 100%;" alt="" class="img-fluid">';
																				}
                                      ?>
																		</div>
																	</div>

																	<p>
																		<i class="icofont icofont-quote-left"></i><?php the_content(); ?><i class="icofont icofont-quote-right"></i>
																	</p>
																	<div class="author-text">
																		<h5><?php the_title(); ?></h5>
																		<p>Маркетолог</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--  ITEM END  -->
                        
                        <?php 
												$cnt++;
                        }

                    } else {
                        // Постов не найдено
                    }

                    wp_reset_postdata(); // Сбрасываем $post
                ?>


            <!-- <div class="carousel-item">
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="testimonial-content style-2">
                    <div class="author-info">
                      <div class="author-img">
                        <img src="images/author/5b.jpg" alt="" class="img-fluid" />
                      </div>
                    </div>

                    <p>
                      <i class="icofont icofont-quote-left"></i>Это отличная платформа для тех, кто хочет начать
                      бизнес, но не может принять правильное решение. Это действительно отличное место для того,
                      чтобы начать свой бизнес правильно! <i class="icofont icofont-quote-right"></i>
                    </p>
                    <div class="author-text">
                      <h5>Вострецов Денис</h5>
                      <p>Маркетолог</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!--  ITEM END  -->

            <!-- <div class="carousel-item">
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="testimonial-content style-2">
                    <div class="author-info">
                      <div class="author-img">
                        <img src="images/author/3b.jpg" alt="" class="img-fluid" />
                      </div>
                    </div>

                    <p>
                      <i class="icofont icofont-quote-left"></i>Это отличная платформа для тех, кто хочет начать
                      бизнес, но не может принять правильное решение. Это действительно отличное место для того,
                      чтобы начать свой бизнес правильно! <i class="icofont icofont-quote-right"></i>
                    </p>
                    <div class="author-text">
                      <h5>Киренков Алексей</h5>
                      <p>Младший менеджер</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!--  ITEM END  -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  TESTIMONIAL AREA END  -->