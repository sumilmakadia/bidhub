<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership5TransactionsFormRequest;
use App\Models\Crest\ybr_membership5_transaction;
use App\User;
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
        $ybrMembership5Transactions = ybr_membership5_transaction::paginate(25);

        return view('membership-transactions.index', compact('ybrMembership5Transactions'));
    }

    /**
     * Display a listing of the ybr membership5 transactions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership5Transactions = ybr_membership5_transaction::paginate(25);

        return view('membership-transactions.index', compact('ybrMembership5Transactions'));
    }

    /**
     * Show the form for creating a new ybr membership5 transaction.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('membership-transactions.create', compact('creators'));
    }

    /**
     * Store a new ybr membership5 transaction in the storage.
     *
     * @param App\Http\Requests\YbrMembership5TransactionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership5TransactionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            ybr_membership5_transaction::create($data);

            return redirect()->route('membership-transactions.ybr_membership5_transaction.index')
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
        //$ybrMembership5Transaction = ybr_membership5_transaction::with('creator')->findOrFail($id);
        
        return redirect('/transactions');

        //return view('membership-transactions.show', compact('ybrMembership5Transaction'));
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

        return view('membership-transactions.edit', compact('ybrMembership5Transaction','creators'));
    }

    /**
     * Update the specified ybr membership5 transaction in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership5TransactionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership5TransactionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
            $ybrMembership5Transaction->update($data);

            return redirect()->route('membership-transactions.ybr_membership5_transaction.index')
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
    public function destroy($id)
    {
        try {
            $ybrMembership5Transaction = ybr_membership5_transaction::findOrFail($id);
            $ybrMembership5Transaction->delete();

            return redirect()->route('membership-transactions.ybr_membership5_transaction.index')
                ->with('success_message', trans('ybr_membership5_transactions.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
        }
    }



}
