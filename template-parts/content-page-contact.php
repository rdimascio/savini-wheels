<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<div class="contact-form__wrapper">
	<div class="contact-form">

		<div class="contact-form__header">

			<div class="contact-form__title">
				<h1><?= get_field( 'contact_page_title', 'option' ); ?></h1>
			</div>

			<div class="contact-form__info">
				<p><strong>Address:</strong> <a href="https://www.google.com/maps/place/<?= urlencode( get_field( 'address', 'option' ) ) ?>,+<?= get_field( 'city', 'option' ) ?>,+<?= get_field( 'state', 'option' ) ?>+<?= get_field( 'zip', 'option' ) ?>"><?= get_field( 'address', 'option' ); ?>, <?= get_field( 'city', 'option' ); ?> <?= get_field( 'state', 'option' ); ?>, <?= get_field( 'zip', 'option' ); ?></a></p>
				<p><strong>Toll Free:</strong> <a href="tel:<?= get_field( 'phone_number', 'option' ) ?>"><?= get_field( 'phone_number', 'option' ) ?></a></p>
				<p><strong>Phone:</strong> <a href="tel:<?= get_field( 'phone_number', 'option' ) ?>"><?= get_field( 'phone_number', 'option' ) ?></a></p>
				<p><strong>Fax:</strong> <a href="tel:<?= get_field( 'fax_number', 'option' ) ?>"><?= get_field( 'fax_number', 'option' ) ?></a></p>
				<p><strong>Email:</strong> <a href="mailto:<?= get_field( 'contact_email', 'option' ) ?>"><?= get_field( 'contact_email', 'option' ) ?></a></p>
			</div>

		</div>

		<div class="contact-form__body">
			<?= do_shortcode( '[contact-form-7 id="10" title="Contact form"]' ); ?>
		</div>

		<div class="contact-form__footer">
			<p><a href="#">View Our Warranty & Return Policy Here ></a></p>
		</div>

	</div>
</div>