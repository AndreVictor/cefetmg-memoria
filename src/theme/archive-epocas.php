<?php get_header(); ?>
    <main data-barba="container" data-barba-namespace="inicial">   
    <section class="archiveEpocas">

    <div class="archiveEpocas__box">

        <?php 
            if (have_posts()) {
            while (have_posts()) {
                the_post();
                $thisPost = get_the_id();
                $epocaTitle = explode(":", get_the_title($thisPost));  ?>

                <div class="archiveEpocas__entry-box" id="<?php echo $epocaTitle[0] ?>">
                    <div class="archiveEpocas__epoca-box">
                        <div class="archiveEpocas__epoca-header m-b-32">
                            <h6 class="Poppins-bold-18 m-r-16">
                                <?php echo $epocaTitle[0] ?>
                            </h6>
                            <div class="archiveEpocas__epoca-line">&nbsp;</div>
                        </div>
                        <h1 class="archiveEpocas__title MuseuModerno-regular-42 text-upper m-b-32">
                            <?php echo $epocaTitle[1] ?>
                        </h1>
                        <div class="archiveEpocas__sub-header MuseuModerno-regular-16 m-b-32 text-upper">
                            <h2 class="m-r-16">
                                <?php the_field('ano_inicial');?> - <?php the_field('ano_final');?>
                            </h2>
                            <div class="archiveEpocas__epoca-line">&nbsp;</div>
                        </div>
                        <div class="archiveEpocas__content Poppins-regular-16 m-b-32">
                            <?php echo wp_trim_words( get_the_content($thisPost), 80, '...' ); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="archiveEpocas__btn btn btn--small btn--azul text-upper">
                            Leia mais
                        </a>
                    </div>
                </div>
                <div class="archiveEpocas__gallery-box">
                <?php 
                    $registros = new WP_Query(array( 
                            'post_type' => 'registros',
                            'meta_key' => 'ano',
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                        )); wp_reset_query();
                        
                        while($registros->have_posts()) {
                            $registros->the_post();
                            $thisRegistro = get_the_id();

                            $epocaRelacionada = get_field('epoca');

                            foreach($epocaRelacionada as $epoca) {
                                if(get_the_title($epoca) == get_the_title($thisPost)) { ?>
                                    
                                    <a href="<?php echo get_the_permalink($thisRegistro)?>" class="archiveEpocas__img-box">
                                        <p class="Poppins-regular-14">
                                            <span class="Poppins-bold-14">
                                                <?php echo get_field('ano', $thisRegistro)?>
                                            </span>
                                            - 
                                            <?php echo get_the_title($thisRegistro)?>
                                        </p>
                                        <div class="archiveEpocas__img" style="background-image: url('<?php echo get_the_post_thumbnail_url( $thisRegistro, 'medium-img' ) ?>')">&nbsp;</div>
                                    </a>

                        <?php
                            }
                        }
                    } wp_reset_postdata(); ?>

        </div>

        <?php
            } wp_reset_postdata();
        } ?>

    </div>

        <div class="archiveEpocas__line-box">
            <?php if (have_posts()) {
                while (have_posts()) {
                the_post();
                $thisPost = get_the_id();
                $epocaTitle = explode(":", get_the_title($thisPost));  ?>

                    <a href="#<?php echo $epocaTitle[0]?>" class="archiveEpocas__line-entry">
                        <div class="archiveEpocas__line-bullet">&nbsp;</div>
                        <p class="MuseuModerno-regular-16 text-upper"><?php echo $epocaTitle[0]?></p>
                    </a>
            <?php
                }
            }?>

        </div>
    </section>

<?php get_footer(); ?>
