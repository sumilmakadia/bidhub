<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Crest\page;
use Illuminate\Http\Request;
use Exception;

class PagesController extends Controller
{

    /**
     * Display a listing of the pages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $pages = page::paginate(25);

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('pages.create');
    }

    /**
     * Store a new page in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            page::create($data);

            return redirect()->route('pages.page.index')
                ->with('success_message', trans('pages.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
        }
    }

    /**
     * Display the specified page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $page = page::findOrFail($id);

        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $page = page::findOrFail($id);
        

        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified page in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $page = page::findOrFail($id);
            $page->update($data);

            return redirect()->route('pages.page.index')
                ->with('success_message', trans('pages.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified page from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $page = page::findOrFail($id);
            $page->delete();

            return redirect()->route('pages.page.index')
                ->with('success_message', trans('pages.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
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
                'author_id' => 'required|numeric|min:0|max:4294967295',
            'title' => 'required|string|min:1|max:255',
            'excerpt' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable|numeric|string|min:0|max:255',
            'slug' => 'required|string|min:1|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }
    
    public function sendContact(Request $request){
      
		$from_email = $request->email;
        $email = 'info@bidhub.com';
                		   
        $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $message = '<br>Name: '.$request->name.'<br><br>
        Email: '.$request->email.'<br><br>
        Message: '.$request->message.'<br><br>';
                           			
        $success =  mail($email, 'New Contact From Bidhub', $message, $headers);
        
        if($success) {
            echo '<div class="alert alert-success" style="color:#194200;">Your message has been sent, a BidHub representative will be in contact within 24 hours.</div>';
        } else {
            echo '<div class="alert alert-danger" style="color:#000;">Your message has not been sent, please try again.</div>';
        }
        
    }

}
