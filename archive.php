<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Child_Twenty_Twenty_One
 */

get_header();

$description = get_the_archive_description();

$children_terms = array();
$queried_object = get_queried_object();
if ( $queried_object instanceof WP_Term ) {
	$children_terms = get_terms(
		array(
			'taxonomy' => $queried_object->taxonomy,
			'parent'   => $queried_object->term_id,
		)
	);
}
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php if ( $children_terms ) : ?>
		<?php foreach ( $children_terms as $child_term ) : ?>
			<?php get_template_part( 'template-parts/content/content', 'child-term', array( 'child_term' => $child_term ) ); ?>
		<?php endforeach; ?>
	<?php else : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
		<?php endwhile; ?>

		<?php twenty_twenty_one_the_posts_navigation(); ?>
	<?php endif; ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
