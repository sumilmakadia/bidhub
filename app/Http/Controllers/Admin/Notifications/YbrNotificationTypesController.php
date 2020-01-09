<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrNotificationTypesFormRequest;
use App\Models\Crest\ybr_notification_type;
use Exception;

class YbrNotificationTypesController extends Controller
{

    /**
     * Display a listing of the ybr notification types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrNotificationTypes = ybr_notification_type::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('notification-types.index', compact('ybrNotificationTypes'));
    }

    /**
     * Show the form for creating a new ybr notification type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('notification-types.create');
    }

    /**
     * Store a new ybr notification type in the storage.
     *
     * @param App\Http\Requests\YbrNotificationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrNotificationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_notification_type::create($data);

            return redirect()->route('notification-types.ybr_notification_type.index')
                ->with('success_message', trans('ybr_notification_types.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notification_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr notification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrNotificationType = ybr_notification_type::findOrFail($id);

        return view('notification-types.show', compact('ybrNotificationType'));
    }

    /**
     * Show the form for editing the specified ybr notification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrNotificationType = ybr_notification_type::findOrFail($id);
        

        return view('notification-types.edit', compact('ybrNotificationType'));
    }

    /**
     * Update the specified ybr notification type in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrNotificationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrNotificationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrNotificationType = ybr_notification_type::findOrFail($id);
            $ybrNotificationType->update($data);

            return redirect()->route('notification-types.ybr_notification_type.index')
                ->with('success_message', trans('ybr_notification_types.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notification_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr notification type from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrNotificationType = ybr_notification_type::findOrFail($id);
            $ybrNotificationType->delete();

            return redirect()->route('notification-types.ybr_notification_type.index')
                ->with('success_message', trans('ybr_notification_types.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notification_types.unexpected_error')]);
        }
    }



}
