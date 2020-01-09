<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Crest\portfolio;
use App\Models\Crest\portfolios_photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PortfoliosController extends Controller
{

    /**
     * Display a listing of the portfolios.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $portfolios = portfolio::where('created_by', Auth::id())->with('creator')->paginate(25);

        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        $files = array();
        return view('portfolios.create', compact('creators', 'files'));
    }

    /**
     * Store a new portfolio in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
			 // $image           = $request->file('image');
			 // $originName        = $image->getClientOriginalName();
			 // $fileName = str_replace(' ', '_', time() . ' ' .$originName);
			 // $request->file('image')->storeAs('public/portfolios/images', $fileName);
			 // $filePath = 'portfolios/images/'.$fileName;

			  $id = DB::table('portfolios')->insertGetId([
			  				'title'			=> $request->title,
			  				'description'	=> $request->description,
			  				'created_by'	=> Auth::user()->id,
						]);

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
						$new_image->save('/home/bidhub/public_html/public/storage/portfolios/images/'.$fileName);
						$portfolio = portfolio::find($id);
						$portfolio ->update(['image'=> '/public/storage/portfolios/images/'.$fileName]);
						
			  }
			  
			  if($request->hasFile('files')){

										$files = $request->file('files');
										
										$file_info           = $request->get('fileuploader-list-files');
										
										foreach($files as $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						foreach($file_array as $info) {
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    if($file_n == $file_name && $file_type != 'application/pdf'){
                            						        
                            						        if(isset($info["editor"])) {
                            						            
                            						        $width = $info["editor"]["crop"]["width"];
                                    						$height = $info["editor"]["crop"]["height"];
                                    						$left = $info["editor"]["crop"]["left"];
                                    						$top = $info["editor"]["crop"]["top"];
                                    						$cfWidth = $info["editor"]["crop"]["cfWidth"];
                                    						$cfHeight = $info["editor"]["crop"]["cfHeight"];
                                    						
                                    						if(!isset($info["editor"]["rotation"])) {
                                    						    $rotate = 0;
                                    						} else {
                                    						    $rotate = $info["editor"]["rotation"];
                                    						}
                                    						
                                    						
                                    						    $new_image = Image::make($file)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                    						} else {
                                    						     $new_image = Image::make($file);
                                    						}
                                                            
                                                            $fileName        = time() . ' ' . $file_name;
                                        					$fileName = str_replace(' ', '_', $fileName);
                                        					$new_image->save('/home/bidhub/public_html/public/storage/portfolios/images/'.$fileName);
                                        					
                                        					  $project_file             = new portfolios_photo();
            												  $project_file->portfolio_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/portfolios/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/portfolios/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new portfolios_photo();
            												  $project_file->portfolio_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/portfolios/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }

			return redirect('portfolios');
    }

    /**
     * Display the specified portfolio.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $portfolio = portfolio::with('creator')->findOrFail($id);
        //if(Auth::id() == $portfolio->created_by) {
            $files = portfolios_photo::where('portfolio_id', $id)->get();
			return view('portfolios.show', compact('portfolio', 'files'));
                               
            
        //} else {
           // return redirect('/portfolios');
       // }
        
        
        
        
    }

    /**
     * Show the form for editing the specified portfolio.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $portfolio = portfolio::findOrFail($id);
        $creators = User::pluck('name','id')->all();
        $files = portfolios_photo::where('portfolio_id', $portfolio->id)->get();

        return view('portfolios.edit', compact('portfolio','creators', 'files'));
    }

    /**
     * Update the specified portfolio in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            
			 portfolio::find($id)->update([
			  				'title'			=> $request->title,
			  				'description'	=> $request->description,
			  				'created_by'	=> Auth::user()->id,
						]);
            
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
						$new_image->save('/home/bidhub/public_html/public/storage/portfolios/images/'.$fileName);
						$portfolio = portfolio::find($id);
						$portfolio ->update(['image'=> '/public/storage/portfolios/images/'.$fileName]);
						
			  }
			  
			  
			  
			  if($request->hasFile('files')){

										$files = $request->file('files');
									
										
										$file_info           = $request->get('fileuploader-list-files');
										
										foreach($files as $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						foreach($file_array as $info) {
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    if($file_n == $file_name && $file_type != 'application/pdf'){
                            						        
                            						        if(isset($info["editor"])) {
                            						            
                            						        $width = $info["editor"]["crop"]["width"];
                                    						$height = $info["editor"]["crop"]["height"];
                                    						$left = $info["editor"]["crop"]["left"];
                                    						$top = $info["editor"]["crop"]["top"];
                                    						$cfWidth = $info["editor"]["crop"]["cfWidth"];
                                    						$cfHeight = $info["editor"]["crop"]["cfHeight"];
                                    						
                                    						if(!isset($info["editor"]["rotation"])) {
                                    						    $rotate = 0;
                                    						} else {
                                    						    $rotate = $info["editor"]["rotation"];
                                    						}
                                    						
                                    						
                                    						    $new_image = Image::make($file)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                    						} else {
                                    						     $new_image = Image::make($file);
                                    						}
                                                            
                                                            $fileName        = time() . ' ' . $file_name;
                                        					$fileName = str_replace(' ', '_', $fileName);
                                        					$new_image->save('/home/bidhub/public_html/public/storage/portfolios/images/'.$fileName);
                                        					
                                        					  $project_file             = new portfolios_photo();
            												  $project_file->portfolio_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/portfolios/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/portfolios/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new portfolios_photo();
            												  $project_file->portfolio_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/portfolios/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
							  
							 

            return redirect()->route('portfolios.portfolio.index')
                ->with('success_message', trans('portfolios.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('portfolios.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified portfolio from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $portfolio = portfolio::findOrFail($id);
            $portfolio->delete();

            return redirect()->route('portfolios.portfolio.index')
                ->with('success_message', trans('portfolios.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('portfolios.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'created_by' => 'required|date_format:j/n/Y g:i A',
            'title' => 'required|string|min:1|max:500',
            'image' => 'required|numeric|string|min:1|max:500',
            'description' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }
    
    public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = portfolios_photo::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/portfolios/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/portfolios/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}

}
