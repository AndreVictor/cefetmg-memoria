<?php get_header(); 
	if (have_posts()) {
		while (have_posts()) {
            the_post();
            $thisPost = get_the_id();  ?>

    <main data-barba="container" data-barba-namespace="sobre">
    <section class="sobrePage">
        <div class="sobrePage__img-box">
            <div class="sobrePage__img" style="background-image: url(<?php echo get_the_post_thumbnail_url( $thisPost, 'banner-img'); ?> ">&nbsp;</div>
            <div class="sobrePage__title MuseuModerno-bold-72 text-upper">
                <?php the_field('titulo_exposicao'); ?>
            </div>
        </div>
        <div class="sobrePage__content">
            <div class="sobrePage__legenda">
                <p class="Poppins-italic-14">
                    <?php the_field('legenda'); ?>
                </p>
                <p class="Poppins-bold-italic-14">
                    <?php the_field('ano_legenda'); ?>
                </p>
            </div>

            <div class="Poppins-regular-16 m-b-32">
                <?php the_content(); ?>
            </div>

            <div class="sobrePage__divider m-b-32">&nbsp;</div>

            <div class="Poppins-regular-14 m-b-32">
                <p class="Poppins-bold-14 text-upper m-b-8">Siglas</p>
                <?php the_field('siglas') ?>
            </div>

            <div class="sobrePage__divider m-b-32">&nbsp;</div>

            <div class="sobrePage__ficha-tec-box m-b-32">
                <p class="Poppins-bold-14 text-upper m-b-8">Ficha técnica</p>
                <div class="sobrePage__ficha-tec Poppins-regular-14">
                    <?php the_field('ficha_tec'); ?>
                </div>
            </div>

            <div class="sobrePage__divider m-b-32">&nbsp;</div>

            <div class="sobrePage__ficha-tec-box">
                <p class="Poppins-bold-14 text-upper m-b-8">Fale Conosco</p>
                <div class="sobrePage__ficha-tec Poppins-regular-14">
                    <?php the_field('fale_conosco'); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php
        }
    }    
get_footer(); ?>
