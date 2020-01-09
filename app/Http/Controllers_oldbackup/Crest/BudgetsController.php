<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetsFormRequest;
use App\Models\Crest\budget;
use App\Models\Crest\budget_item;
use App\Models\Crest\project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class BudgetsController extends Controller
{

    /**
     * Display a listing of the budgets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $budgets = budget::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('budgets.index', compact('budgets'));
    }


		  public function admin()
		  {
					$budgets = budget::with('creator')->paginate(25);

					return view('budgets.admin', compact('budgets'));
		  }

    /**
     * Show the form for creating a new budget.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        $projects = project::all();
        
        return view('budgets.create', compact('creators', 'projects'));
    }

    /**
     * Store a new budget in the storage.
     *
     * @param App\Http\Requests\BudgetsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store($id, Request $request)
    {
    		if(!is_numeric($id)) {
    			return "false";
    		}
    		  $b_id = DB::table('budgets')->insertGetId([
    		  					"budget_title"	=> $request->title,
    		  					"total"	=> $request->total,
    		  					"project_id" => $id,
    		  					"created_by"	=> Auth::Id(),
    		  					"created_at"	=> date('Y-m-d H:i:s')
													 ]);

			  $items = $request->items;
			  foreach($items as $item){
						$budget_item = new budget_item();
						$budget_item->title = $item['budget_title'];
						$budget_item->amount = $item['total'];
						$budget_item->budget_id = $b_id;
						$budget_item->save();
			  }
			  return "success";
    }

    /**
     * Display the specified budget.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
			  $budget = budget::findOrFail($id);
			  $creators = User::pluck('name','id')->all();

			  return view('budgets.edit', compact('budget','creators'));
    }

    /**
     * Show the form for editing the specified budget.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $budget = budget::findOrFail($id);
        $creators = User::pluck('name','id')->all();
        $budget_items = budget_item::where('budget_id', $budget->id)->get();
        $projects = project::all();

        return view('budgets.edit', compact('budget','creators', 'budget_items', 'projects'));
    }

    /**
     * Update the specified budget in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\BudgetsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
			  $budget_items = $request->items;
			  budget_item::where('budget_id', $id)->delete();
			  foreach($budget_items as $budget_item) {
						$item = new budget_item();
						$item->title = $budget_item['title'];
						$item->amount = $budget_item['amount'];
						$item->budget_id = $id;
						$item->save();
			  }
			  return 'success';
    }

    /**
     * Remove the specified budget from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $budget = budget::findOrFail($id);
            $budget->delete();

            return redirect()->route('budgets.budget.index')
                ->with('success_message', trans('budgets.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('budgets.unexpected_error')]);
        }
    }



}
