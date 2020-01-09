<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentsFormRequest;
use App\Models\Crest\equipment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\fileEquipments;
use App\Models\Crest\equipmentGaleries;

class EquipmentsController extends Controller
{
   
		  /**
		   * Display a listing of the properties.
		   *
		   * @return Illuminate\View\View
		   */
		  public function admin()
		  {
					$equipments = equipment::paginate(25);
                    
                    if(Auth::user()->role_id == 1) { 
							    return view('equipment-for-sale.admin', compact('properties'));
                               } else {
                                   return redirect('/equipment-for-sale');
                    }
					return view('equipment-for-sale.admin', compact('equipments'));
		  }
		  
		  public function bulk(Request $request)
                        {
                            if(isset($request->equipment_id)){
                                $ids = $request->equipment_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $equipment = equipment::findOrFail($id);
                                $equipment->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Equipment Deleted'));
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
		      
		      
					$equipments = equipment::orderBy('created_at', 'desc')->paginate(25);

					return view('equipment-for-sale.public', compact('equipments'));
		  }
    /**
     * Display a listing of the properties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
      
        $equipments = equipment::where('created_by', Auth::Id())->paginate(25);
       
        if(Auth::user()->role_id == 1 || Auth::user()->equipment != 0 || Auth::user()->role_id == 8) {

        return view('equipment-for-sale.index', compact('equipments'));
        
        } else {
                       return redirect('/equipment-for-sale');
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
        return view('equipment-for-sale.create', compact('creators', 'files', 'galeries'));
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
    
		  $id = DB::table('equipments')->insertGetId([
													    'equipment_title'		=> $request->equipment_title,
													    'equipment_description'	=> $request->equipment_description,
													    'equipment_acres'		=> $request->equipment_acres,
													    'equipment_cost'			=> $request->equipment_cost,
													      'category'			=> $request->category,
													    'equipment_annual_taxes'	=> $request->equipment_annual_taxes,
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
						$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
						$portfolio = equipment::find($id);
					
						$portfolio ->update(['equipment_image'=> '/public/storage/equipments/images/'.$fileName]);
						
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
                                        					
                                        					  $project_file             = new equipmentGaleries();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/equipments/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/equipments/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new equipmentGaleries();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/equipments/files/'.$file_name;
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileEquipments();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/equipments/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/equipments/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileEquipments();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/equipments/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
			  return redirect('equipment-for-sale/manage');
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
        $equipment = equipment::with('creator')->findOrFail($id);
        $files     = fileEquipments::where('equipment_id', $id)->get();
        $galeries     = equipmentGaleries::where('equipment_id', $id)->get();
        return view('equipment-for-sale.show', compact('equipment', 'files', 'galeries'));
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
        $equipment = equipment::findOrFail($id);
        
        $creators = User::pluck('name','id')->all();
        $files     = fileEquipments::where('equipment_id', $id)->get();
        $galeries     = equipmentGaleries::where('equipment_id', $id)->get();
        
        if(Auth::user()->role_id == 1 || Auth::user()->id == $equipment->created_by){
        return view('equipment-for-sale.edit', compact('equipment','creators', 'files', 'galeries'));
        } else{
            
            return redirect('/equipment-for-sale');
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
	  equipment::find($id)->update([
									'equipment_title'		=> $request->equipment_title,
								    'equipment_description'	=> $request->equipment_description,
								    'equipment_acres'		=> $request->equipment_acres,
								    'equipment_cost'			=> $request->equipment_cost,
								      'category'			=> $request->category,
								    'equipment_annual_taxes'	=> $request->equipment_annual_taxes,
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
                                    						     $new_image = Image::make($image);
                                    						}
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
						$portfolio = equipment::find($id);
						$portfolio ->update(['equipment_image'=> '/public/storage/equipments/images/'.$fileName]);
						
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
                                        					
                                        					  $project_file             = new equipmentGaleries();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/equipments/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/equipments/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new equipmentGaleries();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/equipments/files/'.$file_name;
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/equipments/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileEquipments();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/equipments/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/equipments/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileEquipments();
            												  $project_file->equipment_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/equipments/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
			  
            return redirect()->route('equipment-for-sale.property.index')
                ->with('success_message', trans('equipments.model_was_updated'));
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
            $equipment = equipment::findOrFail($id);
            $equipment->delete();

            return redirect()->back()
                ->with('success_message', trans('equipments.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('equipments.unexpected_error')]);
        }
    }
    
    public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = fileEquipments::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/equipments/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/equipments/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}

    public function removeGalery(Request $request){
					    
					    $id = $request->id;
					    $file  = equipmentGaleries::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/equipments/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/equipments/files/'.$file->file_name;
                            unlink($path);
					    }
					   
					    
					    return response()->json(['id' => $id]);
					    
					}

}
