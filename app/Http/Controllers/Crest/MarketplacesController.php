<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketplacesFormRequest;
use App\Models\Crest\marketplace;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarketplacesController extends Controller
{
		  /**
		   * Display a listing of the marketplaces.
		   *
		   * @return Illuminate\View\View
		   */
		  public function admin(){
					$marketplaces = marketplace::with('creator')->get();
					
					if(Auth::user()->role_id == 1) { 
							    	return view('market-place.admin', compact('marketplaces'));
                               } else {
                                   return redirect('/market-place');
                               }

				
		  }
		  /**
		   * Display a listing of the marketplaces.
		   *
		   * @return Illuminate\View\View
		   */
		  public function public(){
		      $name = '';
		      $category = '';
					$marketplaces = marketplace::paginate(24);
					$categories = DB::table('categories_marketplaces')->get();

					return view('market-place.public', compact('marketplaces', 'categories', 'name', 'category'));
		  }
		  
		  public function bulk(Request $request)
                        {
                            if(isset($request->market_place)){
                                $ids = $request->market_place;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $marketplace = marketplace::findOrFail($id);
                                $marketplace->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Market Place Deleted'));
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }
    /**
     * Display a listing of the marketplaces.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $marketplaces = marketplace::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('market-place.index', compact('marketplaces'));
    }

    /**
     * Show the form for creating a new marketplace.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        
        return view('market-place.create', compact('creators', 'marketplace'));
    }

    /**
     * Store a new marketplace in the storage.
     *
     * @param App\Http\Requests\MarketplacesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MarketplacesFormRequest $request)
    {
        
        try {
            
            
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            //marketplace::create($data);
            
            $id = DB::table('marketplaces')->insertGetId($data);
            
            if($request->hasFile('file')) {
						$image           = $request->file('file');
						$file_info           = $request->get('fileuploader-list-file');
						$file_array = json_decode($file_info, true);
						$width = $file_array[0]["editor"]["crop"]["width"];
						$height = $file_array[0]["editor"]["crop"]["height"];
						$left = $file_array[0]["editor"]["crop"]["left"];
						$top = $file_array[0]["editor"]["crop"]["top"];
						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
						
						if(!isset($file_array[0]["editor"]["rotation"])) {
						    $rotate = 0;
						} else {
						    $rotate = $file_array[0]["editor"]["rotation"];
						}
						
                        // and you are ready to go ...
                        $new_image = Image::make($image)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$new_image->save('/home/bidhub/public_html/public/storage/marketplace/images/'.$fileName);
						$portfolio = marketplace::find($id);
						$portfolio ->update(['company_image'=> '/public/storage/marketplace/images/'.$fileName]);
						
			  }

            return redirect()->route('market-place.marketplace.index')
                ->with('success_message', trans('marketplaces.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('marketplaces.unexpected_error')]);
        }
    }

    /**
     * Display the specified marketplace.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $marketplace = marketplace::with('creator')->findOrFail($id);

        return view('market-place.show', compact('marketplace'));
    }

    /**
     * Show the form for editing the specified marketplace.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $marketplace = marketplace::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('market-place.edit', compact('marketplace','creators'));
    }

    /**
     * Update the specified marketplace in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\MarketplacesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MarketplacesFormRequest $request)
    {
        
        try {
            
            $data = $request->getData();
            
            $marketplace = marketplace::findOrFail($id);
            $data['created_by'] = Auth::Id();
            $marketplace->update($data);
            
             if($request->hasFile('file')) {
						$image           = $request->file('file');
						$file_info           = $request->get('fileuploader-list-file');
						$file_array = json_decode($file_info, true);
						$width = $file_array[0]["editor"]["crop"]["width"];
						$height = $file_array[0]["editor"]["crop"]["height"];
						$left = $file_array[0]["editor"]["crop"]["left"];
						$top = $file_array[0]["editor"]["crop"]["top"];
						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
						
						if(!isset($file_array[0]["editor"]["rotation"])) {
						    $rotate = 0;
						} else {
						    $rotate = $file_array[0]["editor"]["rotation"];
						}
						
                        // and you are ready to go ...
                        $new_image = Image::make($image)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$new_image->save('/home/bidhub/public_html/public/storage/marketplace/images/'.$fileName);
						$portfolio = marketplace::find($id);
						$portfolio ->update(['company_image'=> '/public/storage/marketplace/images/'.$fileName]);
						
			  }

            return redirect()->route('market-place.marketplace.index')
                ->with('success_message', trans('marketplaces.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('marketplaces.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified marketplace from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $marketplace = marketplace::findOrFail($id);
            $marketplace->delete();

            return redirect()->route('market-place.marketplace.index')
                ->with('success_message', trans('marketplaces.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('marketplaces.unexpected_error')]);
        }
    }

    public function category(){
        
        $categories = DB::table('categories_marketplaces')->paginate(25);

		return view('market-place.categories', compact('categories'));
        
    }
    
    public function createCategory(){
        
        $creators = User::pluck('name','id')->all();
        
        $category = '';
        
        return view('market-place.create-category', compact('creators', 'category'));
        
    }
    
    public function storeCategory(Request $request){
        
       try { 
        
        DB::table('categories_marketplaces')
        ->updateOrInsert(
            ['title' => $request->category_name],
            ['title' => $request->category_name]
        );
        
         return redirect()->route('market-place.marketplace.categories')
                ->with('success_message', 'Marketplace Category Created');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Not Added']);
        }
        
    }
    
    public function updateCategory($id, Request $request){
        
       try { 
        
        DB::table('categories_marketplaces')->where('id',$id)
        ->update(
            ['title' => $request->category_name]
        );
        
         return redirect()->route('market-place.marketplace.categories')
                ->with('success_message', 'Marketplace Category Created');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Not Added']);
        }
        
    }
    
    public function editCategory($id)
    {
       
       $creators = User::pluck('name','id')->all();
        
        $category = DB::table('categories_marketplaces')->where('id', '=', $id)->first();
        
        return view('market-place.edit-category', compact('creators', 'category'));
    }
    
    public function destroyCategory($id)
    {
        
       
        try {
            
            $category = DB::table('categories_marketplaces')->where('id', '=', $id);
            $category->delete();

            return redirect()->route('market-place.marketplace.categories')
                ->with('success_message', 'Marketplace category was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('marketplaces.unexpected_error')]);
        }
    }


}
