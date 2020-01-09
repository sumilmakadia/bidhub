<?php

namespace App\Http\Controllers\\Crest;

use App\Http\Controllers\\Controller;
use App\Models\Budget;
use App\Models\\Crest\budget_item;
use Illuminate\Http\Request;
use Exception;

class BudgetItemsController extends Controller
{

    /**
     * Display a listing of the budget items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $budgetItems = budget_item::paginate(25);

        return view('budget-items.index', compact('budgetItems'));
    }

    /**
     * Show the form for creating a new budget item.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Budgets = Budget::pluck('budget_title','id')->all();
        
        return view('budget-items.create', compact('Budgets'));
    }

    /**
     * Store a new budget item in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            budget_item::create($data);

            return redirect()->route('budget-items.budget_item.index')
                ->with('success_message', trans('budget_items.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('budget_items.unexpected_error')]);
        }
    }

    /**
     * Display the specified budget item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $budgetItem = budget_item::with('budget')->findOrFail($id);

        return view('budget-items.show', compact('budgetItem'));
    }

    /**
     * Show the form for editing the specified budget item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $budgetItem = budget_item::findOrFail($id);
        $Budgets = Budget::pluck('budget_title','id')->all();

        return view('budget-items.edit', compact('budgetItem','Budgets'));
    }

    /**
     * Update the specified budget item in the storage.
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
            
            $budgetItem = budget_item::findOrFail($id);
            $budgetItem->update($data);

            return redirect()->route('budget-items.budget_item.index')
                ->with('success_message', trans('budget_items.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('budget_items.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified budget item from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $budgetItem = budget_item::findOrFail($id);
            $budgetItem->delete();

            return redirect()->route('budget-items.budget_item.index')
                ->with('success_message', trans('budget_items.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('budget_items.unexpected_error')]);
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
                'title' => 'nullable|string|min:0|max:500',
            'amount' => 'nullable|numeric|min:-99999999.99|max:99999999.99',
            'budget_id' => 'required',
            'created_on' => 'nullable|date_format:j/n/Y g:i A',
            'updated_on' => 'nullable|date_format:j/n/Y g:i A', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
