<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrNotificationsFormRequest;
use App\Models\Crest\ybr_notification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class YbrNotificationsController extends Controller
{

    /**
     * Display a listing of the ybr notifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrNotifications = ybr_notification::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('notifications.index', compact('ybrNotifications'));
    }

    /**
     * Show the form for creating a new ybr notification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('notifications.create', compact('creators'));
    }

    /**
     * Store a new ybr notification in the storage.
     *
     * @param App\Http\Requests\YbrNotificationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrNotificationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            ybr_notification::create($data);

            return redirect()->route('notifications.ybr_notification.index')
                ->with('success_message', trans('ybr_notifications.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notifications.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrNotification = ybr_notification::with('creator')->findOrFail($id);

        return view('notifications.show', compact('ybrNotification'));
    }

    /**
     * Show the form for editing the specified ybr notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrNotification = ybr_notification::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('notifications.edit', compact('ybrNotification','creators'));
    }

    /**
     * Update the specified ybr notification in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrNotificationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrNotificationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrNotification = ybr_notification::findOrFail($id);
            $ybrNotification->update($data);

            return redirect()->route('notifications.ybr_notification.index')
                ->with('success_message', trans('ybr_notifications.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notifications.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr notification from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrNotification = ybr_notification::findOrFail($id);
            $ybrNotification->delete();

            return redirect()->route('notifications.ybr_notification.index')
                ->with('success_message', trans('ybr_notifications.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_notifications.unexpected_error')]);
        }
    }



}
