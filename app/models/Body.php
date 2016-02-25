<?php

class Body extends Eloquent{

	/**
	 * The database table used by the bodies.
	 *
	 * @var string
	 */
	protected $table = 'bodies';

	/**
	 * function bodies
	 *
	 * calculate all stones entrys with the spezified pivot table
	 *
	 * @return entrys from the stone table that belong to body part
	*/
	public function stones()
	{
		return $this->belongsToMany('Stone', 'stones_bodies');
	}
}