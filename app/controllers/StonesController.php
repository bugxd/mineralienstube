<?php


/**
 *| Stones Controller
 *| Containes all functions which are used to 
 *| save, search or delete stones 
 */
class StonesController extends Controller {

	/**
	 * index
	 * 
	 * Setup the layout used by the controller.
	 * 
	 * send arrays to page to show required db entries
	 *
	 * @return the index page for admins to add delete stones from db
	 */
	protected function index()
	{
		$stones = Stone::all();
		$disease = Disease::all();
		$chakra = Chakra::all();
		$found = Found::all();
		$body = Body::all();
		return View::make('stones.index')->with('stones',$stones)->with('diseases',$disease)->with('chakras',$chakra)->with('founds',$found)->with('bodies',$body);
	}

	/**
	 * storeStone
	 * 
	 * Setup the layout used by the controller to store stones.
	 * 
	 * first validates user input if val fails return to the index pages with Errors and the required modal dialog
	 * 
	 * add a picture which the user add to the form
	 *
	 * at least addes the stone to the db and all required tables too bound to any disease, body, chakra and found
	 * @return index page with errors if fail or success message
	 */
	protected function storeStone()
	{
		$validate = Validator::make(Input::all(), array(
				'stone_name' => 'required|unique:stones,name',
				'stone_desc' => 'required',
				'stone_color' => 'required',
			));

		if($validate->fails())
		{
			return Redirect::route('stones-home')->withErrors($validate)->with('modal', '#stone_form');
		}
		else
		{

			if(Input::hasFile('stone_img'))
			{
				//store img
				$file = Input::file('stone_img');
				$file->move('images/stones', $file->getClientOriginalName());
			
				$stone = new Stone;
				$stone->name = Input::get('stone_name');
				$stone->description = Input::get('stone_desc');
				$stone->color = Input::get('stone_color');
				$stone->found = '';
				$stone->img = $file->getClientOriginalName();

				if($stone->save())
				{	

					if(is_array(Input::get('chakra_select'))){
						foreach(Input::get('chakra_select') as $id){
							$stch = new StoneChakra;
							$stch->stone_id = $stone->id;
							$stch->chakra_id = $id;
							$stch->save();
						};
					}
					else
					{
						$stch = new StoneChakra;
						$stch->stone_id = $stone->id;
						$stch->chakra_id = Input::get('chakra_select');
						$stch->save();
					}

					if(is_array(Input::get('disease_select'))){
						foreach(Input::get('disease_select') as $id){
							$stdi = new StoneDisease;
							$stdi->stone_id = $stone->id;
							$stdi->diseases_id = $id;
							$stdi->save();
						};
					}
					else
					{
						$stdi = new StoneDisease;
						$stdi->stone_id = $stone->id;
						$stdi->diseases_id = Input::get('disease_select');
						$stdi->save();
					}
					
					if(is_array(Input::get('body_select'))){
						foreach(Input::get('body_select') as $id){
							$stbo = new StoneBody;
							$stbo->stone_id = $stone->id;
							$stbo->bodies_id = $id;
							$stbo->save();
						};
					}
					else
					{
						$stbo = new StoneBody;
						$stbo->stone_id = $stone->id;
						$stbo->bodies_id = Input::get('body_select');
						$stbo->save();
					}

					if(is_array(Input::get('found_select'))){
						foreach(Input::get('found_select') as $id){
							$stfo = new StoneFound;
							$stfo->stone_id = $stone->id;
							$stfo->found_id = $id;
							$stfo->save();
						};
					}
					else
					{
						$stfo = new StoneFound;
						$stfo->stone_id = $stone->id;
						$stfo->found_id = Input::get('found_select');
						$stfo->save();
					}

					return Redirect::route('stones-home')->with('success', 'Stein gespeichert'); 
				}
				else
				{
					return Redirect::route('stones-home')->with('fail', 'Fehler beim Speichern'); 
				}
			}
			else
			{
				$file = Input::file('stone_img');
				return Redirect::route('stones-home')->with('fail', 'Error no image '.$file); 
			}
		}
	}

	/**
	 * storeDisease
	 * 
	 * Setup the layout used by the controller to store Disease
	 * 
	 * validate user input if fail return to index page.
	 *
	 * store disease in db
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function storeDisease()
	{
		$validate = Validator::make(Input::all(), array(
				'disease_name' => 'required|unique:diseases,name',
			));

		if($validate->fails())
		{
			return Redirect::route('stones-home')->withErrors($validate)->with('modal', '#disease_form');
		}
		else
		{
			$disease = new Disease;
			$disease->name = Input::get('disease_name');

			if($disease->save())
			{
				return Redirect::route('stones-home')->with('success', 'Disease gespeichert'); 
			}
			else
			{
				return Redirect::route('stones-home')->with('fail', 'Error on save from Disease'); 
			}
		}
	}

	/**
	 * storeBody
	 * 
	 * Setup the layout used by the controller to store Body
	 * 
	 * validate user input if fail return to index page.
	 *
	 * store body in db
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function storeBody()
	{
		$validate = Validator::make(Input::all(), array(
				'body_name' => 'required|unique:bodies,name',
			));

		if($validate->fails())
		{
			return Redirect::route('stones-home')->withErrors($validate)->with('modal', '#body_form');
		}
		else
		{
			$body = new Body;
			$body->name = Input::get('body_name');

			if($body->save())
			{
				return Redirect::route('stones-home')->with('success', 'Body gespeichert'); 
			}
			else
			{
				return Redirect::route('stones-home')->with('fail', 'Error on save from Body'); 
			}
		}
	}

	/**
	 * storeFound
	 * 
	 * Setup the layout used by the controller to store Found
	 * 
	 * validate user input if fail return to index page.
	 *
	 * store found in db
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function storeFound()
	{
		$validate = Validator::make(Input::all(), array(
				'found_name' => 'required|unique:found,name',
			));

		if($validate->fails())
		{
			return Redirect::route('stones-home')->withErrors($validate)->with('modal', '#found_form');
		}
		else
		{
			$found = new Found;
			$found->name = Input::get('found_name');

			if($found->save())
			{
				return Redirect::route('stones-home')->with('success', 'Found gespeichert'); 
			}
			else
			{
				return Redirect::route('stones-home')->with('fail', 'Error on save from Found'); 
			}
		}
	}	

	/**
	 * stoneAlter
	 * 
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function stoneAlter($id)
	{

	}

	/**
	 * deleteStone
	 * 
	 * Setup the layout used by the controller to delete stone.
	 *
	 * delete stone and all entries used to bound to other table
	 *
	 * @param int $id Index for table entry
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function deleteStone($id)
	{
		$stone = Stone::find($id);

		if($stone == null)
		{
			return Redirect::route('stones-home')->with('fail', 'This stone doesn\'t exist');
		}

		/*delete foreigen keys*/
		$disease = StoneDisease::where('stone_id', $id);
		$chakra = StoneChakra::where('stone_id', $id);
		$found = StoneFound::where('stone_id', $id);
		$body = StoneBody::where('stone_id', $id);

		$delD = true;
		$delC = true;
		$delF = true;
		$delB = true;

		if($disease->count() > 0)
		{
			$delD = $disease->delete;
		}

		if($chakra->count() > 0)
		{
			$delC = $chakra->delete;
		}

		if($found->count() > 0)
		{
			$delF = $found->delete;
		}

		if($body->count() > 0)
		{
			$delB = $body->delete;
		}

		if($delD && $delC && $delF && $delB && $stone->delete())
		{
			return Redirect::route('stones-home')->with('success', 'stone deleted');
		}
		else
		{
			return Redirect::route('stones-home')->with('fail', 'error cant delete stone');
		}
	}

	/**
	 * deleteDisease
	 * 
	 * Setup the layout used by the controller to delete disease.
	 *
	 * delete disease and all entries used to bound to other table
	 *
	 * @param int $id Index for table entry
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function deleteDisease($id)
	{
		$disease = Disease::find($id);

		if($disease == null)
		{
			return Redirect::route('stones-home')->with('fail', 'This disease doesn\'t exist');
		}

		/*delete foreigen keys*/
		$stdi = StoneDisease::where('diseases_id', $id);
		
		$del = true;

		if($stdi->count() > 0)
		{
			$del = $stdi->delete;
		}

		if($del && $disease->delete())
		{
			return Redirect::route('stones-home')->with('success', 'disease deleted');
		}
		else
		{
			return Redirect::route('stones-home')->with('fail', 'error cant delete disease');
		}
	}

	/**
	 * deleteBody
	 * 
	 * Setup the layout used by the controller to delete body.
	 *
	 * delete body and all entries used to bound to other table
	 *
	 * @param int $id Index for table entry
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function deleteBody($id)
	{
		$body = Body::find($id);

		if($body == null)
		{
			return Redirect::route('stones-home')->with('fail', 'This body doesn\'t exist');
		}

		$stbo = StoneBody::where('bodies_id', $id);

		$del = true;
		
		if($stbo->count() > 0)
		{
			$del = $stbo->delete;
		}

		if($del && $body->delete())
		{
			return Redirect::route('stones-home')->with('success', 'body deleted');
		}
		else
		{
			return Redirect::route('stones-home')->with('fail', 'error cant delete body');
		}
	}

	/**
	 * deleteFound
	 * 
	 * Setup the layout used by the controller to delete body.
	 *
	 * delete body and all entries used to bound to other table
	 *
	 * @param int $id Index for table entry
	 *
	 * @return index page with errors if fail or with success message
	 */
	protected function deleteFound($id)
	{
		$found = Found::find($id);

		if($found == null)
		{
			return Redirect::route('stones-home')->with('fail', 'This found doesn\'t exist');
		}

		$stfo = StoneFound::where('found_id', $id);

		$del = true;
		
		if($stfo->count() > 0)
		{
			$del = $stfo->delete;
		}

		if($del && $found->delete())
		{
			return Redirect::route('stones-home')->with('success', 'found deleted');
		}
		else
		{
			return Redirect::route('stones-home')->with('fail', 'error cant delete found');
		}
	}


	/**
	 * searchStone
	 * 
	 * Setup the layout used by the controller to show found stones.
	 *
	 * search stones with mysql command like
	 *
	 * @return result page with found stones message
	 */
	protected function searchStone()
	{
		$validate = Validator::make(Input::all(), array(
				'search_text' => 'required',
			));

		if($validate->fails())
		{
			return Redirect::route('home')->with('fail','enter search text');
		}
		else
		{
			$text = Input::get('search_text');
			$stones = Stone::where('name', 'LIKE', $text.'%')
	                ->get();

			#DB::table('stones')
	                #->where('name', 'LIKE', $text.'%')
	                #->get();
			return View::make('stones.results')->with('stones', $stones);	
		}


			
	}
}