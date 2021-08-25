<?php get_header();
	$className = '';
	if (!is_search_has_results()) {
		$className = 'searchPage__inner--no-result';
	}
?>

<?php

global $query_string;

if(stristr($query_string, 'paged')) {
	$searchString[1] = str_replace('&paged=', '', $query_string);
} else {
	$searchString = explode("=", $query_string);
}

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

?>
<main>
<section class="searchPage">
	<div class="searchPage__inner <?php echo $className; ?>">
		<?php
			if ($search->have_posts()) { ?>
				<div class="searchPage__results-title m-b-32">
					<h1 class="MuseuModerno-regular-32 text-upper m-b-32">
						Pesquisa: <span class="MuseuModerno-bold-32"> <?php echo get_search_query( $escaped = true ) ?> </span>
					</h1>
					<div class="searchPage__results-divider">&nbsp;</div>
				</div>
				<div class="searchPage__cards-box">
				<?php
				while ($search->have_posts()) {
					$search->the_post();
					$thisPost = get_the_id(); ?>
					  <div class="searchPage__card m-b-32">
						<a href="<?php the_permalink(); ?>" class="searchPage__card-img" style="background-image: url('<?php the_post_thumbnail_url( 'small-img' ) ?>');">&nbsp;</a>
						<div class="searchPage__card-content">
							<h2 class="searchPage__card-title MuseuModerno-regular-24 m-b-16">
								<?php the_title(); ?>
							</h2>
							<div class="searchPage__card-text Poppins-regular-18">
								<?php echo wp_trim_words( get_the_content($thisPost), 30, '...' ); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="searchPage__card-btn btn btn--small btn--azul text-upper">
                            	Leia mais
                        	</a>
						</div>
					  </div>          
				<?php } ?>
				</div>
				<div class="searchPage__pagination-box">
					<?php echo paginate_links(); ?>
				</div>
				<?php } else { ?>
					<div class="MuseuModerno-regular-42 text-center">
						Nenhum resultado encontrado para sua pesquisa: <br/>
						<strong><?php echo get_search_query( $escaped = true ) ?></strong>
					</div>	
				<?php
				} ?>
	</div>
</section>
<?php get_footer(); ?>
