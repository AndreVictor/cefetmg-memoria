<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="inicial">   
    <?php
    if (have_posts()) {
		while (have_posts()) {
            the_post();
            $thisPost = get_the_id();  ?>

            <section class="singleRegistros">
                <div class="singleRegistros__img-box m-b-16">
                    <button class="singleRegistros__zoom-btn btn btn--small btn--azul text-upper">ATIVAR ZOOM</button>
                    <figure class="singleRegistros__img-figure">
                        <?php the_post_thumbnail( 
                            'banner-img',
                            array( 
                                'class' => 'singleRegistros__img',
                                'alt' => 'Registro Cefet-mg Memória' 
                            ));
                        ?>
                    </figure>
                </div>
                <div class="singleRegistros__box">
                    <div class="singleRegistros__header">
                            <div class="singleRegistros__date MuseuModerno-bold-32">
                                <?php the_field('ano')?>
                            </div>
                            <h1 class="MuseuModerno-regular-42">
                                <?php the_title(); ?>
                            </h1>
                    </div>
                    <div class="singleRegistros__content m-b-32">
                        <div class="singleRegistros__btn-box">
                            <a href= "<?php echo get_post_type_archive_link('registros')?>" class="singelRegistros__category-btn btn btn--cinza btn--small text-upper m-r-16">
                                <?php the_field('categoria') ?>
                            </a>
                            <?php
                                $epocaRelacionada = get_field('epoca');

                                foreach($epocaRelacionada as $epoca) { 
                                    $epocaTitle = explode(":", get_the_title($epoca)); ?>
                                    <a href= "<?php echo get_the_permalink( $epoca ); ?>" class="singelRegistros__category-btn btn btn--cinza btn--small text-upper">
                                        <?php echo $epocaTitle[0]; ?>
                                    </a>
                                <?php
                                } ?>
                        </div>
                        <div class="singleRegistros__text Poppins-regular-16">
                                <?php the_content(); ?>
                        </div>
                    </div>
                    <a href="<?php echo get_post_type_archive_link( 'epocas' ) ?>" class="singleRegistros__btn btn btn--small btn--azul text-upper m-b-32">
                        Ver todos registros
                    </a>
                    <div class="singleRegistros__divider m-b-32">&nbsp;</div>
                    
                    <?php

                    $args2 = array(
                        'post_id' => $thisPost
                    );
                    $comments = get_comments( $args2 );
                        foreach ( $comments as $comment ) { ?>
                            <div class="singleRegistros__comment-box m-b-16">
                                <div class="singleRegistros__comment-name MuseuModerno-bold-16 text-upper">Teste</div>
                                <div class="singleRegistros__comment-content Poppins-regular-14 m-b-16"><?php echo $comment->comment_content; ?></div>
                                <div class="singleRegistros__comment-divider">&nbsp;</div>
                            </div>
                        <?php }
                
                        $args = array(
                            'title_reply' => '<div class="MuseuModerno-regular-24 text-upper m-b-16"> Deixe um comentário </div>',
                            'comment_field' => '
                                <div class="form-group">
                                    <br>
                                    <textarea id="comment" name="comment" class="form-control singleRegistros__comment-area m-b-16"></textarea>
                                </div>
                            ',
                            'submit_button' => '<button type="submit" class="btn btn--azul btn--small text-upper singleRegistros__comment-btn">Enviar Comentário</button>',
                            'fields' => apply_filters('comment_form_default_fields', array(
                                'author' => '
                                    <div class="form-group singleRegistros__comment-label-box">
                                        <label for="author" class="MuseuModerno-regular-24 text-upper">Nome*</label>
                                        <input id="author" name="author" type="text" class="form-control singleRegistros__comment-label">
                                    </div>
                                ',
                                'email' => '
                                    <div class="form-group singleRegistros__comment-label-box">
                                        <label for="email" class="MuseuModerno-regular-24 text-upper">E-mail*</label>
                                        <input id="email" name="email" type="email" class="form-control singleRegistros__comment-label">
                                    </div>
                                ',
                            ))
                        );
                        comment_form($args, $thisPost);

                    ?>

                </div>

            </section>

            <?php
            }
    } ?>
<?php get_footer(); ?>
