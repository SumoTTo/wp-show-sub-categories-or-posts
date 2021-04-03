<?php
/**
 * Template part for displaying children terms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @var array $args
 * @var WP_Term $child_term
 *
 * @package Child_Twenty_Twenty_One
 */

$child_term    = $args['child_term'];
$taxonomy_name = mb_strtolower( get_taxonomy_labels( get_taxonomy( $child_term->taxonomy ) )->singular_name );
?>

<article id="term-<?php echo esc_attr( $child_term->term_id ); ?>">
	<header class="entry-header">
		<h1 class="entry-title default-max-width">
			<?php echo esc_html( $child_term->name ); ?>
		</h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php echo wp_kses_post( wpautop( $child_term->description ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer default-max-width">
		<a href="<?php echo esc_url( get_term_link( $child_term ) ); ?>" rel="category">
			<?php
			printf( /* translators: %s: From term posts. Only visible to screen readers. */
				esc_html__( 'Read posts %s', 'twentytwentyone' ),
				'<span class="screen-reader-text">' . sprintf(
				/* translators: %1$s: Name of current term, %2$s: Name of current taxonomy. */
					esc_html__( 'from the %1$s %2$s', 'twentytwentyone' ),
					esc_html( $child_term->name ),
					esc_html( $taxonomy_name )
				) . ' </span>'
			);
			?>
		</a>
		<?php if ( get_edit_term_link( $child_term->term_id ) ) : ?>
			<?php
			edit_term_link(
				sprintf( /* translators: %s: Name of current term. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . esc_html( $child_term->name ) . '</span>'
				),
				'<span class="edit-link">',
				'</span>',
				$child_term
			);
			?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #term-<?php esc_html( $child_term->term_id ); ?> -->
