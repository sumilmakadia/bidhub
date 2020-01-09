<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Http\Controllers\Controller;
use App\Models\Admin\Membership\ybr_membership5_transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class YbrMembership5TransactionsController extends Controller
{

    /**
     * Display a listing of the ybr membership5 transactions Admin Dashboard.
     *
     * @return Illuminate\View\View
     */
    public function admin()
    {
        $ybrMembership5Transactions = ybr_membership5_transaction::all();

        return view('membership-transactions.admin', compact('ybrMembership5Transactions'));
    }
    
    public function bulk(Request $request)
    {
        if(isset($request->order_id)){
            $ids = $request->order_id;
        }
        
        try {
            
            foreach($ids as $id){
            
            $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
            $ybrMembership5Transaction->delete();
            
            }

            return redirect()->back()
                ->with('success_message', trans('Orders Deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
        }
    }
    
    public function cancel(Request $request){
        
        $id = $request->id;
      
        
        $tran = ybr_membership5_transaction::where('id', $id)->first();
        
        $number = $tran->ssl_recurring_id;
        
        $PaymentProcessor = new \markroland\Converge\ConvergeApi(
            '011384',
            'webpage',
            'P00QO3',
            false
        );
        // Submit a recurring payment
        $response = $PaymentProcessor->ccdeleterecurring(
            array(
                'ssl_recurring_id' => $number,
            )
        );
  
        if(isset($response["errorCode"])) {
            if($response["errorCode"]) {
                if($response["errorCode"] == 5033){
                    ybr_membership5_transaction::where('id', $id)->update(['status' => 'Canceled']);
                }
                return redirect()->back()
                    ->with('success_message', 'Order Canceled');
            }
        }
        
        ybr_membership5_transaction::where('id', $id)->update(['status' => 'Canceled']);
        
        if($id == 6 || $id == 8){
            
        User::where('id', Auth::id())->update(['role_id' => 2]);
        
        directories::where('user_id', Auth::id())->update(['paid' => 'zero']);
        DirectoryUploads::where('user_id', Auth::id())->update(['paid' => 0]);
        
        } elseif ($id == 1){
            
            User::where('id', Auth::id())->update(['help' => 0]);
            
        } elseif($id == 2 || $id == 3 || $id == 4) {
            
            User::where('id', Auth::id())->update(['property' => 0]);
            
        }
        
        return redirect()->back()
                ->with('success_message', trans('Order Canceld'));
    }


    /**
     * Display a listing of the ybr membership5 transactions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership5Transactions = ybr_membership5_transaction::with('creator')->where('created_by', Auth::id())->orderBy('id', 'DESC')->paginate(25);

        return view('admin.membership.transactions.index', compact('ybrMembership5Transactions'));
    }

    /**
     * Show the form for creating a new ybr membership5 transaction.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('admin.membership.transactions.create', compact('creators'));
    }

    /**
     * Store a new ybr membership5 transaction in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            ybr_membership5_transaction::create($data);

            return redirect()->route('admin.membership.transactions.ybr_membership5_transaction.index')
                ->with('success_message', trans('ybr_membership5_transactions.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership5 transaction.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        
        if(Auth::user()->role_id == 1) {
        $ybrMembership5Transaction = ybr_membership5_transaction::with('creator')->findOrFail($id);

        return view('admin.membership.transactions.show', compact('ybrMembership5Transaction'));
        
        } else {
        return redirect('/transactions');
        }
    }

    /**
     * Show the form for editing the specified ybr membership5 transaction.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('admin.membership.transactions.edit', compact('ybrMembership5Transaction','creators'));
    }

    /**
     * Update the specified ybr membership5 transaction in the storage.
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
            
            $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
            $ybrMembership5Transaction->update($data);

            return redirect()->route('admin.membership.transactions.ybr_membership5_transaction.index')
                ->with('success_message', trans('ybr_membership5_transactions.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
        }
    }

    /**
     * Remove the specified ybr membership5 transaction from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id = null, Request $request)
    {
        
        if(isset($request->id)){
            $id = $request->id;
        }
        
        try {
            $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
            $ybrMembership5Transaction->delete();

            return redirect()->back()
                ->with('success_message', trans('Order Deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
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
                'plan_id' => 'required|string|min:1',
            'membership_start' => 'nullable|date_format:j/n/Y g:i A',
            'membership_end' => 'nullable|date_format:j/n/Y g:i A',
            'membership_charge_date' => 'nullable|date_format:j/n/Y',
            'membership_charge' => 'nullable|numeric|min:-99999999.99|max:99999999.99',
            'created_by' => 'nullable|date_format:j/n/Y g:i A', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
