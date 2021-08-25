<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="inicial">   
    <?php
    if (have_posts()) {
		while (have_posts()) {
            the_post();
            $thisPost = get_the_id();
            $epocaTitle = explode(":", get_the_title($thisPost));   ?>

            <section class="singleEpocas">
                <div class="singleEpocas__img-box m-b-16">
                    <div class="singleEpocas__img" style="background-image: url('<?php echo get_the_post_thumbnail_url( $thisPost, 'banner-img' ) ?>')">&nbsp;</div>
                        <div class="singleEpocas__header">
                            <h3 class="Poppins-bold-24">
                                <?php echo $epocaTitle[0] ?>
                            </h3>

                            <div class="singleEpocas__header-divider">&nbsp;</div>

                            <h1 class="MuseuModerno-regular-42">
                                <?php echo $epocaTitle[1] ?>
                            </h1>

                            <div class="singleEpocas__header-divider">&nbsp;</div>

                            <h2 class="MuseuModerno-bold-24 text-upper">
                                <?php the_field('ano_inicial') ?> - <?php the_field('ano_final') ?>
                            </h2>
                        </div>
                </div>

                    <div class="singleEpocas__content m-b-32">
                        <div class="singleEpocas__text Poppins-regular-18">
                                <?php the_content(); ?>
                        </div>
                        <div class="singleEpocas__content-line">&nbsp;</div>
                        <h1 class="singleEpocas__relacionados-header MuseuModerno-bold-24 text-upper m-b-32">Registros Relacionados</h1>
                        <div class="singleEpocas__relacionados-box">
                            <div class="singleEpocas__relacionados-grid m-b-32">
                            
                                <?php
                                    $cards = new WP_Query(array(
                                            'post_type' => 'registros',
                                            'orderby' => 'rand',
                                            'posts_per_page' => -1,
                                        ));
                                    $counter = 0; 
                                        
                                        while($cards->have_posts()) {
                                            $cards->the_post(); 
                                            
                                            $epocaRelacionada = get_field('epoca');

                                            foreach($epocaRelacionada as $epoca) {
                                                if(get_the_title($epoca) == get_the_title($thisPost) && $counter < 3) { ?>

                                                <!-- INICIO DO CARD -->
                                                <div class="card">
                                                    <div class="card__inner">
                                                        <div class="card__header">
                                                            <a href="<?php echo get_post_type_archive_link('registros')?>#<?php the_field('categoria'); ?>" class="card__categoria btn btn--cinza">
                                                                <?php the_field('categoria'); ?>
                                                            </a>
                                                            <h6 class="card__data">
                                                                <?php the_field('ano'); ?>
                                                            </h6>
                                                        </div>
                                                        <a href="<?php the_permalink(); ?>" class="card__img-box">
                                                            <img src="<?php the_post_thumbnail_url('small-img'); ?>" alt="" class="card__img">
                                                        </a>
                                                        <div class="card__content">
                                                            <a href="<?php the_permalink(); ?>" class="card__title">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- FIM DO CARD -->
                                            <?php $counter++;
                                                }  
                                            } wp_reset_postdata();
                                        } wp_reset_postdata();
                                    ?>
                            </div>
                            <div class="singleEpocas__btn-box">
                                <a href="<?php echo get_post_type_archive_link('registros')?>" class="btn btn--azul btn--small text-upper">Ver todos registros</a>
                            </div>
                        </div>
                    </div>
            </section>

            <?php
            } wp_reset_postdata();
    } ?>
<?php get_footer(); ?>
