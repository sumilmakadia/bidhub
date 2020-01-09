@extends('layouts.app')

@section('content')
          <div class="page-wrapper" style="min-height: 149px;">
                    <div class="container-fluid">
                              <div class="row page-titles">
                                        <div class="col-md-5 align-self-center">
                                                  <h4 class="text-themecolor">{{ !empty($title) ? $title : 'Budget' }}</h4>
                                        </div>
                                        <div class="col-md-7 align-self-center text-right">
                                                  <div class="d-flex justify-content-end align-items-center">
                                                            <a href="{{ route('budgets.budget.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('budgets.show_all') }}">
                                                                      <i class="fa fa-plus-circle"></i>
                                                                      {{ trans('budgets.show_all') }}
                                                            </a>
                                                  </div>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="col-12">

                                                  <div class="card">
                                                            <div class="card-body">

                                                                      <div class="row total_budget mb-20">
                                                                                <div class="col-3">
                                                                                          <label class="control-label">Total Budget</label>
                                                                                          <div class="input-group col-sm-6">
                                                                                                    <span class="input-group-addon">$</span>
                                                                                                    <input type="number" class="form-control" name="field_total_budget" id="field_total_budget" value="0" placeholder="0.00">
                                                                                          </div>
                                                                                </div>
                                                                      </div>
                                                                      <div class="row budget_item mb-20">

                                                                                <div class="col-12">
                                                                                          <div class="card">

                                                                                                    <div class="table-responsive">
                                                                                                              <table class="table table-striped">
                                                                                                                        <thead>
                                                                                                                        <tr>
                                                                                                                                  <th></th>
                                                                                                                                  <th>Title</th>
                                                                                                                                  <th>Budget Amount</th>
                                                                                                                                  <th>Status</th>
                                                                                                                                  <th>Actions</th>
                                                                                                                        </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody id="id_tbody">
                                                                                                                        <tr>
                                                                                                                                  <td>1</td>
                                                                                                                                  <td>
                                                                                                                                            <input type="text" class="form-control" name="field_line_item_title" id="field_line_item_title">
                                                                                                                                  </td>
                                                                                                                                  <td>
                                                                                                                                            <div class="input-group">
                                                                                                                                                      <span class="input-group-addon">$</span>
                                                                                                                                                      <input type="number" class="form-control item_amount" oninput='calculate_total()' name="field_line_item_amount" id="field_line_item_amount" value="0" placeholder="0.00">
                                                                                                                                            </div>
                                                                                                                                  </td>
                                                                                                                                  <td>
                                                                                                                                            <div class="form-group">
                                                                                                                                                      <select class="form-control" id="sel1" name="field_line_item_status" id="field_line_item_status">
                                                                                                                                                                <option>1</option>
                                                                                                                                                                <option>2</option>
                                                                                                                                                                <option>3</option>
                                                                                                                                                                <option>4</option>
                                                                                                                                                      </select>
                                                                                                                                            </div>
                                                                                                                                  </td>
                                                                                                                                  <td>
                                                                                                                                            <button class="btn btn-danger">Delete</button>
                                                                                                                                  </td>
                                                                                                                        </tr>

                                                                                                                        </tbody>
                                                                                                              </table>
                                                                                                    </div>
                                                                                          </div>
                                                                                </div>

                                                                      </div>

                                                                      <div class="row">
                                                                                <div>
                                                                                          <div class="col-12">
                                                                                                    <h2><b>Total:$</b><span id="id_total">0</span> (You have $<span id="id_left">0</span> left)</h2>
                                                                                          </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="col-sm-2 col-xs-2" style="margin-top:20px;">
                                                                                          <button type="button" class="btn btn_add btn-primary" onclick="add_new_item()"><b>ADD LINE ITEM</b></button>
                                                                                          <button type="button" class="btn btn_add btn-primary" onclick="save_budget()"><b>SAVE BUDGET</b></button>
                                                                                </div>
                                                                      </div>


                                                            </div>
                                                  </div>
                                                  <script type="text/javascript">
                                                            var total_budget = 0;
                                                            var left_amount = 0;
                                                            var items_amount = 0;
                                                            var budget_plan = {};

                                                            function add_new_item() {
                                                                      var tbody = document.getElementById("id_tbody");
                                                                      var no = tbody.rows.length + 1;
                                                                      var new_row = "<td>" + no + "</td>";
                                                                      new_row = new_row + "<td><input type='password' class='form-control' name='field_line_item_title' id='field_line_item_title'></td>";
                                                                      new_row = new_row + "<td>";
                                                                      new_row = new_row + "<div class='input-group'>";
                                                                      new_row = new_row + "<span class='input-group-addon'>$</span>";
                                                                      new_row = new_row + "<input type='text' class='form-control item_amount' name='field_line_item_amount' oninput='calculate_total()' id='field_line_item_amount' value='0' placeholder='0.00'>";
                                                                      new_row = new_row + "</div>";
                                                                      new_row = new_row + "</td>";
                                                                      new_row = new_row + "<td>";
                                                                      new_row = new_row + "<div class='form-group'>";
                                                                      new_row = new_row + "<select class='form-control' id='sel1'  name='field_line_item_status' id='field_line_item_status'>";
                                                                      new_row = new_row + "<option>1</option>";
                                                                      new_row = new_row + "<option>2</option>";
                                                                      new_row = new_row + "<option>3</option>";
                                                                      new_row = new_row + "<option>4</option>";
                                                                      new_row = new_row + "</select>";
                                                                      new_row = new_row + " </div>";
                                                                      new_row = new_row + "</td>";
                                                                      new_row = new_row + "<td><button class=\"btn btn-danger\">Delete</button></td>";
                                                                      var row = tbody.insertRow(tbody.rows.length);
                                                                      row.innerHTML = new_row;
                                                            }

                                                            function save_budget() {
                                                                      budget_plan = {total_budget: total_budget, items_amount: items_amount, left_amount: left_amount};
                                                                      console.log(budget_plan);
                                                            }

                                                            function calculate_total() {
                                                                      var total = document.getElementById("field_total_budget").value;
                                                                      total_budget = total;
                                                                      var elements = document.getElementsByClassName("item_amount");
                                                                      for (var i = 0; i < elements.length; i++) {
                                                                                items_amount += parseInt(elements[i].value);
                                                                      }
                                                                      document.getElementById("id_total").innerHTML = items_amount;
                                                                      left_amount = total - items_amount;
                                                                      document.getElementById("id_left").innerHTML = left_amount;
                                                            }
                                                  </script>


                                                  {{--					<div class="card">--}}
                                                  {{--						<div class="card-body">--}}





                                                  {{--							@if ($errors->any())--}}
                                                  {{--								<ul class="alert alert-danger">--}}
                                                  {{--									@foreach ($errors->all() as $error)--}}
                                                  {{--										<li>{{ $error }}</li>--}}
                                                  {{--									@endforeach--}}
                                                  {{--								</ul>--}}
                                                  {{--							@endif--}}

                                                  {{--							<form method="POST" action="{{ route('budgets.budget.update', $budget->id) }}" id="edit_budget_form" name="edit_budget_form" accept-charset="UTF-8" class="form-horizontal">--}}
                                                  {{--								{{ csrf_field() }}--}}
                                                  {{--								<input name="_method" type="hidden" value="PUT">--}}
                                                  {{--								@include ('budgets.form', [--}}
                                                  {{--										        'budget' => $budget,--}}
                                                  {{--										      ])--}}

                                                  {{--								<div class="form-group">--}}
                                                  {{--									<div class="col-md-offset-2 col-md-10">--}}
                                                  {{--										<input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="{{ trans('budgets.update') }}">--}}
                                                  {{--									</div>--}}
                                                  {{--								</div>--}}
                                                  {{--							</form>--}}
                                                  {{--						</div>--}}
                                                  {{--					</div>--}}
                                        </div>
                              </div>
                    </div>
          </div>

@endsection