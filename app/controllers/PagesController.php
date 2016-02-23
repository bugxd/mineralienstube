<?php

/**
* Pages Controller
*
* Create wlecome angebote findYstone Page
*
*/

class PagesController extends BaseController
{
	/**
	*getWelcome
	*
	*@return Welcome Page
	*/
	public function getWelcome()
	{
		return View::make('pages.welcome');
	}

	/**
	*get Angebote
	*
	*@return Angebote Page
	*/
	public function getAngebote()
	{
		return View::make('pages.angebote');
	}

	/**
	*getFindYStone
	*
	*@return Stone Page
	*/
	public function getFindYStone()
	{
		$stones = Stone::all();
		return View::make('pages.findYstone')->with('stones',$stones);
	}


	/**
	*getResults
	*
	*@return Result Page
	*/
	public function getResults()
	{
		return View::make('stones.results');
	}
}