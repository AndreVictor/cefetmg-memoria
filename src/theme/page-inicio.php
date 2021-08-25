<?php 

    get_header(); 

?>
    <main data-barba="container" data-barba-namespace="inicial">      
      <!-- INÍCIO BANNER INICIAL -->
      <section class="banner">

      <?php 

          $bannerImg = new WP_Query(array(
              'post_type' => 'registros',
              'orderby' => 'rand',
              'posts_per_page' => 12,
          )); 
          
          while($bannerImg->have_posts()) {
            $bannerImg->the_post(); ?>
            
              <a href="<?php the_permalink(); ?>" class="banner__img-box">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="banner__img">
              </a>
          <?php
          }
          ?>
      </section>
      <!-- FIM BANNER INICIAL -->
      <!-- INICIO SECÇÃO LINHA DO TEMPO -->
      <section class="home-timeline">
            <?php 

          $bannerImg = new WP_Query(array(
              'post_type' => 'registros',
              'orderby' => 'rand',
              'posts_per_page' => 1,
          )); 
          
          while($bannerImg->have_posts()) {
            $bannerImg->the_post(); ?>

        <div class="home-timeline__row-1">
          <div class="home-timeline__col-1">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="home-timeline__img">
          </div>
          <div class="home-timeline__col-2">
            <div class="home-timeline__header m-b-32">
              <p class="home-timeline__ano MuseuModerno-bold-42 outline-text-2">
                <?php the_field('ano') ?>
              </p>
              <span class="home-timeline__header-line">
                &nbsp;
              </span>
            </div>
			<a href= "#" class="home-timeline__epoca-title MuseuModerno-regular-16">ÉPOCA</a>

			<?php 
				
				$epocaArr = get_field('epoca');

				foreach($epocaArr as $epoca) {
					$epocaTitle = explode(":", get_the_title($epoca));
					$epocaLink = get_permalink($epoca);
				}

			?>

            <a href="<?php echo $epocaLink ?>" class="home-timeline__epoca text-upper Poppins-bold-16 m-b-16">
				<?php echo $epocaTitle[0] ?>
			</a>

			<span class="home-timeline__epoca-line m-b-16">&nbsp;</span>
			<h1 class="home-timeline__title m-b-16">
              <?php the_title( ); ?>
            </h1>
			<div class="home-timeline__text Poppins-regular-16 m-b-32"><?php the_content(); ?></div>
            <a href="<?php echo get_post_type_archive_link( 'epocas' ); ?>" class="btn btn--azul margin-r-auto margin-t-auto">
              Veja registros das épocas
            </a>
          </div>
        </div>

        <?php
          }
        ?>
      </section>
	  <!-- INÍCIO SESSÃO LINHA DO TEMPO - EPOCA -->
      <section class="home-epoca m-b-32">
        <h1 class="MuseuModerno-regular-42 color-cinza text-center m-b-64">Épocas</h1>

        <div class="home-epoca__slider">

          <button aria-label="Previous" class="home-epoca__slider-arrow home-epoca__slider-arrow--left glider-prev">
            <svg class="home-epoca__slider-arrow-icon home-epoca__slider-arrow-icon--left">
              <use href="<?php echo get_theme_file_uri('img/arrow.svg#Layer_1') ?>">
            </svg>
          </button>
          <button aria-label="Next" class="home-epoca__slider-arrow home-epoca__slider-arrow--right glider-next">
            <svg class="home-epoca__slider-arrow-icon home-epoca__slider-arrow-icon--right">
              <use href="<?php echo get_theme_file_uri('img/arrow.svg#Layer_1') ?>">
            </svg>
          </button>

          <div class="home-epoca__slider-container glider-contain">
            <div class="home-epoca__slider-box glider">

            <?php
            
            $epocas = new WP_Query(array(
              'post_type' => 'epocas',
              'posts_per_page' => -1,
            ));
            
            while($epocas->have_posts()) {
              $epocas->the_post();
              $thisPost = get_the_id(); 
              $epocaTitle = explode(":", get_the_title($thisPost)); ?>

              <div class="home-epoca__card">
                <a href="<?php the_permalink(); ?>" class="home-epoca__card-col-1">
                  <h2 class="home-epoca__card-ano MuseuModerno-bold-56 outline-text-2-cinza">
                    <?php the_field('ano_inicial')?>-<?php the_field('ano_final')?>
                  </h2>
                  <img src="<?php echo get_the_post_thumbnail_url($thisPost, 'medium-img'); ?>" alt="" class="home-epoca__card-img">
                </a>
                <div class="home-epoca__card-col-2">
                  <div class="home-epoca__card-header">
                    <h6 class="home-epoca__card-sigla Poppins-bold-16 m-r-32">
                      <?php echo $epocaTitle[0] ?>
                    </h6>
                    <div class="home-epoca__card-line">&nbsp;</div>
                  </div>
                  <h2 class="home-epoca__card-title MuseuModerno-regular-32 text-upper">
                    <?php echo $epocaTitle[1] ?>
                  </h2>
                  <p class="home-epoca__card-text Poppins-regular-16">
                    <?php echo wp_trim_words( get_the_content($thisPost), 30, '...' ); ?>
                  </p>
                  <a href= "<?php the_permalink(); ?>" class="home-epoca__card-btn btn btn--cinza btn--small">
                      SAIBA MAIS SOBRE A ÉPOCA
                  </a>
                </div>
              </div>

            <?php
            } wp_reset_postdata();
            ?>

            </div>
          </div>

          <div role="tablist" class="home-epoca__slider-dots-box dots" id="dots">
          </div>

        </div>

      </section>
      <!-- FIM SESSÃO LINHA DO TEMPO - EPOCA -->
      <!-- INÍCIO FEED HISTÓRIAS -->
      <section class="container feed-historias">
        <h1 class="feed-historias__header">Veja algumas histórias...</h1>
        <div class="feed-historias__grid">
		
		<?php
		    $cards = new WP_Query(array(
					'post_type' => 'registros',
					'orderby' => 'rand',
					'posts_per_page' => 6,
				)); 
				
				while($cards->have_posts()) {
				  $cards->the_post();
          $thisPost = get_the_id(); ?>

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
          <!-- FIM DO CARD -->
          <?php
				}
				?>
        </div>
        <div class="feed-historias__btn-box">
          <a href="#" class="btn btn--azul">Ver mais</a>
        </div>
      </section>


<?php

    get_footer();

?>