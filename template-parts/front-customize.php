<div class="customize--wrapper">

	<div class="customize--content text-center">
		<h2 class="for__title lined_title title js-appearing-content"><span><?= get_field( 'homepage_customization_title', 'option' ); ?></span></h2>
		<p><?= get_field( 'homepage_customization_caption', 'option' ); ?></p>	
	</div>

	<div class="customize--content__row row justify-between align-center">

		<div class="customize--content__column column__wheel align-center text-left">
			<img src="<?= get_field( 'homepage_customization_build_your_wheel_image', 'option' ); ?>" alt="">
			<h1 class="customize--content__column-title text-right"><span>Build</span> Your Wheel</h1>
			<a class="customize--content__column-link" href="/wheel-builder"></a>
		</div>


		<div class="customize--content__column column__car align-center text-right">
			<img src="<?= get_field( 'homepage_customization_build_your_car_image', 'option' ); ?>" alt="">
			<h1 class="customize--content__column-title text-left"><span>Build</span> Your Car</h1>
			<a class="customize--content__column-link" href="/vehicle-builder"></a>
		</div>

	</div>

</div>