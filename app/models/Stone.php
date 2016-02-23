<?php

class Stone extends Eloquent{

	/**
	 * The database table used by the stones.
	 *
	 * @var string
	 */
	protected $table = 'stones';

	/**
	 * function bodies
	 *
	 * calculate all body entrys with the spezified pivot table
	 *
	 * @return entrys from the body table that belong to a stone
	*/
	public function bodies()
	{
		return $this->belongsToMany('Body', 'stones_bodies');
	}

	/**
	 * function chakras
	 *
	 * calculate all chakras entrys with the spezified pivot table
	 *
	 * @return entrys from the chakras table that belong to a stone
	*/
	public function chakras()
	{
		return $this->belongsToMany('Chakra', 'stones_chakras');
	}

	/**
	 * function diseases
	 *
	 * calculate all diseases entrys with the spezified pivot table
	 *
	 * @return entrys from the diseases table that belong to a stone
	*/
	public function diseases()
	{
		return $this->belongsToMany('Disease', 'stones_diseases');
	}

	/**
	 * function found
	 *
	 * calculate all found entrys with the spezified pivot table
	 *
	 * @return entrys from the found table that belong to a stone
	*/
	public function founds()
	{
		return $this->belongsToMany('Found', 'stones_found');
	}
}