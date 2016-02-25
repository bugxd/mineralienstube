<?php

class Chakra extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'chakras';

	/**
	 * function bodies
	 *
	 * calculate all stone entrys with the spezified pivot table
	 *
	 * @return entrys from the stone table that belong to a charkra
	*/
	public function stones()
	{
		return $this->belongsToMany('Stone', 'stones_chakras');
	}
}