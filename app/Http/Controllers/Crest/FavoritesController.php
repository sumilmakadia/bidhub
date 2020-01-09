<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoritesFormRequest;
use App\Models\Crest\favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class FavoritesController extends Controller
{

    /**
     * Display a listing of the favorites.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $favorites = favorite::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new favorite.
     *
     * @return Illuminate\View\View
     */
     
    
    public function favorite(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        $is_favorite = $request->is_favorite;
        switch($type){
				  case 'project':
							if((int)$is_favorite === 1) {
									  $favorite = favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_projects')->where('favorite_id', $id)->delete();
									  return response()->json(['favorite' => 'deleted', 'id' => $id]);
							} else {
									  $favorite = favorite::updateOrCreate(['created_by' => Auth::user()->id, 'favorite_id' => $id],
									                    [
																 'created_by'	=> Auth::user()->id,
																 'favorite_type'	=> 'favorite_projects',
																 'favorite_id'	=> $id
													   ]);
									return response()->json(['favorite' => 'added', 'id' => $id]);				   
							}
				  		break;
				  case 'proposal':
				  		$fav_proposal = favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_proposals')->where('favorite_id',$id)->first();
				  		if($fav_proposal)
							favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_proposals')->where('favorite_id',$id)->delete();
				  		else {
				  			favorite::create([
				  				'created_by'	=> Auth::user()->id,
				  				'favorite_type'	=> 'favorite_proposals',
				  				'favorite_id'	=> $id
											 ]);
				  		}
						break;
				  case 'user':
							$fav_user = favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_users')->where('favorite_id',$id)->first();
							if($fav_user)
									  favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_users')->where('favorite_id',$id)->delete();
							else {
									  favorite::create([
																 'created_by'	=> Auth::user()->id,
																 'favorite_type'	=> 'favorite_users',
																 'favorite_id'	=> $id
													   ]);
							}
				  		break;
        }
        return $favorite;
    }

    /**
     * Store a new favorite in the storage.
     *
     * @param App\Http\Requests\FavoritesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FavoritesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            favorite::create($data);

            return redirect()->route('favorites.favorite.index')
                ->with('success_message', trans('favorites.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('favorites.unexpected_error')]);
        }
    }

    /**
     * Display the specified favorite.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $favorite = favorite::with('creator')->findOrFail($id);

        return view('favorites.show', compact('favorite'));
    }

    /**
     * Show the form for editing the specified favorite.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $favorite = favorite::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('favorites.edit', compact('favorite','creators'));
    }

    /**
     * Update the specified favorite in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\FavoritesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FavoritesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $favorite = favorite::findOrFail($id);
            $favorite->update($data);

            return redirect()->route('favorites.favorite.index')
                ->with('success_message', trans('favorites.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('favorites.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified favorite from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $favorite = favorite::findOrFail($id);
            $favorite->delete();

            return redirect()->route('favorites.favorite.index')
                ->with('success_message', trans('favorites.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('favorites.unexpected_error')]);
        }
    }



}
