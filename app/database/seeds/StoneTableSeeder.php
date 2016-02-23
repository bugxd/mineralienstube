<?php

/**
*Automaticalli fill database with some data
*
*
*/
class StoneTableSeeder extends Seeder
{
	public function run()
	{
		Chakra::create(array(
			'name' => 'Kronen- oder Scheitelchakra',
			'color' => '#990066',

		));

		Chakra::create(array(
			'name' => 'Stirnchakra oder Drittes Auge',
			'color' => '#660099',
		));

		Chakra::create(array(
			'name' => 'Hals- oder Kehlchakra',
			'color' => '#0055AA',
		));

		Chakra::create(array(
			'name' => 'Herzchakra',
			'color' => '#009900',
		));

		Chakra::create(array(
			'name' => 'Nabel- oder Solarplexuschakra',
			'color' => '#FFFF00',
		));

		Chakra::create(array(
			'name' => 'Sakral- oder Sexualchakra',
			'color' => '#FFA500',
		));

		Chakra::create(array(
			'name' => 'Wurzel- oder Basischakra',
			'color' => '#FF1111',
		));

		
		Found::create(array(
			'name' => 'Brasilien',
		));

		Disease::create(array(
			'name' => 'Kreislauf',
		));

		Body::create(array(
			'name' => 'Magen',
		));

		Body::create(array(
			'name' => 'Kopf',
		));

		Body::create(array(
			'name' => 'Gelenke',
		));

		Body::create(array(
			'name' => 'Beine',
		));

		Body::create(array(
			'name' => 'Hals',
		));

		Body::create(array(
			'name' => 'Herz',
		));

		Body::create(array(
			'name' => 'Lunge',
		));

		Body::create(array(
			'name' => 'Bauch',
		));
	}
}