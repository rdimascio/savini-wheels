<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<div class="contact-form">

	<div class="contact-form__header">

		<div class="contact-form__title">
			<h1>Contact Us</h1>
		</div>

		<div class="contact-form__info">
			<p><strong>Address:</strong> <a href="https://www.google.com/maps/dir//Savini+Wheels+Anaheim,+CA+92806/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x80dcd6c1dd1953fb:0xd2bf2a55c5690e59?sa=X&ved=2ahUKEwj_xvCm777hAhWIHzQIHcvDBIgQ9RcwC3oECA8QEA">3199 E. La Palma Ave, Anaheim CA, 92806</a></p>
			<p><strong>Toll Free:</strong> <a href="tel:866-779-4646">866 779-4646</a></p>
			<p><strong>Phone:</strong> <a href="tel:866-779-4646">866 779-4646</a></p>
			<p><strong>Fax:</strong> <a href="tel:714-632-0630">714 632-0630</a></p>
			<p><strong>Email:</strong> <a href="mailto:sales@saviniwheels.com">sales@saviniwheels.com</a></p>
		</div>

	</div>

	<div class="contact-form__body">
		<?= do_shortcode( '[contact-form-7 id="145" title="Contact form"]' ); ?>
	</div>

	<div class="contact-form__footer">
		<p><a href="#">View Our Warranty & Return Policy Here ></a></p>
	</div>

</div>
