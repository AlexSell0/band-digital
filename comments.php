<div class="comments my-4">
<!-- Подключаем комментарии -->
<?php
if ( post_password_required() ) {
	return;
}
?>

<!-- Вывод комментариев -->
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="mb-5">
			<?php
			if ( '0' === get_comments_number() ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Коментарии отсутствуют', 'band_digital' )
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( 'Коментарии', 'band_digital' )
				);
			}
			?>
		</h3><!-- .comments-title -->

		<!-- the_comments_navigation(); -->

		<ol class="comment-list p-0">
			<?php    
                wp_list_comments( [
                    'walker'            => new Bootstrap_Walker_Comment(),
                    'max_depth'         => '2', //Колличество вложенности
                    'style'             => 'ol', //тег
                    'type'              => 'all',
                    'reply_text'        => esc_html__( 'Ответить ', 'band_digital' ),
                    'avatar_size'       => 80,
                    'reverse_top_level' => null, //Сортировка
                    'reverse_children'  => '', //Сортировка
                    'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
                    'short_ping'        => false,    // С версии 3.6,
                    'echo'              => true,     // true или false
                ] ); 
            
			?>
		</ol><!-- .comment-list -->

		<?php
		// the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'band-theme' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	//Выводим форму для отправки коментария
    // Настройки формы
    $defaults = [
	'fields' => [
		'author' => '<div class="col-lg-6"><div class="form-group mb-3">
			<input class="form-control" placeholder="Имя" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
		</div></div>',
		'email'  => '<div class="col-lg-6"><div class="form-group mb-4">
			<input class="form-control" placeholder="Email" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
		</div></div>',
		'cookies' => '<div class="comment-form-cookies-consent col-12">'.
			 sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
			 <label for="wp-comment-cookies-consent">'. __( 'Сохраните мое имя, адрес электронной почты и веб-сайт в этом браузере для следующего комментария.' ) .'</label>
		</div>',
	],
	'comment_field'        => '<div class="col-lg-12"><div class="form-group mb-3">
		<textarea id="comment" placeholder="Оставить комментарий..." name="comment" cols="45" rows="8" class="form-control" aria-required="true" required="required"></textarea>
	</div></div>',
	'must_log_in'          => '<p class="must-log-in">' .
		 sprintf( __( 'Вам нужно <a href="%s">войти</a> чтобы оставить комментарий.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
	 </p>',
	'logged_in_as'         => '<p class="col-12 logged-in-as">' .
		 sprintf( __( 'Вы вошли как <a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">%2$s</a>. <a href="%3$s">Выйти?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
	 </p>',
	'comment_notes_before' => '<p id="email-notes" class="mb-4 col-12">' . __( 'Ваш E-mail защищен от спама.' ) . '</p>'.
		( $req ? $required_text : '' ),
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'class_container'      => 'mt-5 mb-3',
	'class_form'           => 'row',
	'class_submit'         => 'submit',
	'name_submit'          => 'submit',
	'title_reply'          => esc_html( 'Оставьте комментарий', 'band_digital' ),
	'title_reply_to'       => esc_html( 'Ответить %s', 'band_digital' ),
	'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h3>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => esc_html( 'Отменить комментарий', 'band_digital' ),
	'label_submit'         => esc_html( 'Оставить комментарий', 'band_digital' ),
	'submit_button'        => '<div class="col-12"><input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-hero btn-circled" value="%4$s" /></div>',
	'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
	'format'               => 'xhtml',
];
    //Функция вывода формы
    comment_form( $defaults );

