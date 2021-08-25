<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="inicial">   
    <section class="archiveRegistros">

    <div class="archiveRegistros__header-menu">
        <button class="archiveRegistros__item-menu text-upper MuseuModerno-regular-16" id="Espaços">
            Espaços
        </button>
        <button class="archiveRegistros__item-menu text-upper MuseuModerno-regular-16" id="Práticas">
            Práticas
        </button>
        <button class="archiveRegistros__item-menu text-upper MuseuModerno-regular-16" id="Trajetórias">
            Trajetórias
        </button>
    </div>

        <div class="archiveRegistros__box">

            <?php
            
                $cards = new WP_Query(array(
                    'post_type' => 'registros',
                    'orderby' => 'rand',
                    'posts_per_page' => -1,
                ));

                if ($cards->have_posts()) {
                while ($cards->have_posts()) {
                    $cards->the_post();
                    $thisPost = get_the_id(); ?>

            <div class="card">
                <div class="card__inner">
                    <div class="card__header">
                        <a href="#<?php the_field('categoria'); ?>" class="card__categoria btn btn--cinza">
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
                        <div class="card__actions-box">
                          <svg class="card__like-icon">
                            <use href="<?php echo get_theme_file_uri('img/comment.svg#Camada_1') ?>">
                          </svg>
                          <p class="card__like-num">
                              <?php
                              $args = array(
                                'post_id' => $thisPost,   // Use post_id, not post_ID
                                'count'   => true // Return only the count
                              );
                              $comments_count = get_comments( $args );
                              echo $comments_count;
                              ?>
                          </p>
                      </div>
                    </div>
                </div>
            </div>

                
                <?php
                    }
                }?>

        </div>
    </section>

<?php get_footer(); ?>
