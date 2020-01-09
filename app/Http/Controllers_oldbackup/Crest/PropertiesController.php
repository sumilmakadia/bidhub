<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertiesFormRequest;
use App\Models\Crest\property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\fileProperties;
use App\Models\Crest\fileGaleries;

class PropertiesController extends Controller
{
		  /**
		   * Display a listing of the properties.
		   *
		   * @return Illuminate\View\View
		   */
		  public function admin()
		  {
					$properties = property::paginate(25);
                    
                    if(Auth::user()->role_id == 1) { 
							    return view('property-for-sale.admin', compact('properties'));
                               } else {
                                   return redirect('/property-for-sale');
                    }
					return view('property-for-sale.admin', compact('properties'));
		  }
		  
		  public function bulk(Request $request)
                        {
                            if(isset($request->property_id)){
                                $ids = $request->property_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $property = property::findOrFail($id);
                                $property->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Property Deleted'));
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }
		  
		  /**
		   * Display a listing of the properties.
		   *
		   * @return Illuminate\View\View
		   */
		  public function public()
		  {
					$properties = property::orderBy('created_at', 'desc')->paginate(25);

					return view('property-for-sale.public', compact('properties'));
		  }
    /**
     * Display a listing of the properties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $properties = property::where('created_by', Auth::Id())->paginate(25);

        if(Auth::user()->role_id == 1 || Auth::user()->property != 0 || Auth::user()->role_id == 8) {

        return view('property-for-sale.index', compact('properties'));
        
        } else {
                       return redirect('/property-for-sale');
        }
    }

    /**
     * Show the form for creating a new property.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        $files     = array();
        $galeries     = array();
        return view('property-for-sale.create', compact('creators', 'files', 'galeries'));
    }

    /**
     * Store a new property in the storage.
     *
     * @param App\Http\Requests\PropertiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
		  $id = DB::table('properties')->insertGetId([
													    'property_title'		=> $request->property_title,
													    'property_description'	=> $request->property_description,
													    'property_acres'		=> $request->property_acres,
													    'property_cost'			=> $request->property_cost,
													    'property_annual_taxes'	=> $request->property_annual_taxes,
													    'parcel_tax_number'	    => $request->parcel_tax_number,
													    'location'				=> $request->location,
													    'city'                  => $request->city,
														'state'                 => $request->state_id,
														'latitude'              => $request->latitude,
														'longitude'             => $request->longitude,
														'phone'                 => $request->phone !== null ? $request->phone : '',
													    'email'                 => $request->email,
													    'preferred_contact'     => serialize($request->preferred_contact),
													    'created_by'			=> Auth::Id(),
													    'created_at'			=> date('Y-m-d H:i:s')
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
						$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
						$portfolio = property::find($id);
						$portfolio ->update(['property_image'=> '/public/storage/properties/images/'.$fileName]);
						
			  }
			  
			  
			  
			  if($request->hasFile('galeries')){

										$galeries = $request->file('galeries');
									
										
										$file_info           = $request->get('fileuploader-list-galeries');
										
										foreach($galeries as $file){
										    
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileGaleries();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/properties/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/properties/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileGaleries();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/properties/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileProperties();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/properties/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/properties/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileProperties();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/properties/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
			  return redirect('property-for-sale/manage');
    }

    /**
     * Display the specified property.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $property = property::with('creator')->findOrFail($id);
        $files     = fileProperties::where('property_id', $id)->get();
        $galeries     = fileGaleries::where('property_id', $id)->get();
        return view('property-for-sale.show', compact('property', 'files', 'galeries'));
    }

    /**
     * Show the form for editing the specified property.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $property = property::findOrFail($id);
        $creators = User::pluck('name','id')->all();
        $files     = fileProperties::where('property_id', $id)->get();
        $galeries     = fileGaleries::where('property_id', $id)->get();
        
        if(Auth::user()->role_id == 1 || Auth::user()->id == $property->created_by){
        return view('property-for-sale.edit', compact('property','creators', 'files', 'galeries'));
        } else{
            
            return redirect('/property-for-sale');
        }
    }

    /**
     * Update the specified property in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\PropertiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
	  property::find($id)->update([
									'property_title'		=> $request->property_title,
								    'property_description'	=> $request->property_description,
								    'property_acres'		=> $request->property_acres,
								    'property_cost'			=> $request->property_cost,
								    'property_annual_taxes'	=> $request->property_annual_taxes,
								    'parcel_tax_number'	    => $request->parcel_tax_number,
								    'location'				=> $request->location,
								    'city'                  => $request->city,
									'state'                 => $request->state_id,
									'latitude'              => $request->latitude,
									'longitude'             => $request->longitude,
									'phone'                 => $request->phone !== null ? $request->phone : '',
								    'email'                 => $request->email,
								    'preferred_contact'     => serialize($request->preferred_contact),
								 ]);
                
                if($request->hasFile('file')) {
						$image           = $request->file('file');
						$file_info           = $request->get('fileuploader-list-file');
						$file_array = json_decode($file_info, true);
						
						
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
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
						$portfolio = property::find($id);
						$portfolio ->update(['property_image'=> '/public/storage/properties/images/'.$fileName]);
						
			  }
			  
			  
			  
			  if($request->hasFile('galeries')){

										$galeries = $request->file('galeries');
									
										
										$file_info           = $request->get('fileuploader-list-galeries');
										
										foreach($galeries as $file){
										    
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileGaleries();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/properties/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/properties/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileGaleries();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/properties/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/properties/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileProperties();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/properties/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/properties/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileProperties();
            												  $project_file->property_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/properties/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
			  
            return redirect()->route('property-for-sale.property.index')
                ->with('success_message', trans('properties.model_was_updated'));
    }

    /**
     * Remove the specified property from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $property = property::findOrFail($id);
            $property->delete();

            return redirect()->back()
                ->with('success_message', trans('properties.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('properties.unexpected_error')]);
        }
    }
    
    public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = fileProperties::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/properties/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/propertiess/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}

    public function removeGalery(Request $request){
					    
					    $id = $request->id;
					    $file  = fileGaleries::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/propertiess/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/propertiess/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}

}
