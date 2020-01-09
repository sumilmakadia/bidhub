@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;" data-budget_id="{{$budget->id}}">
		<input type="hidden" id="budget_id" value="{{$budget->id}}">
		<input type="hidden" id="baseURL" value="{{asset('')}}">
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
				<div class="col-8 mx-auto">

					<div class="card">
						<div class="card-body">

							<div class="row total_budget mb-20">
								<div class="col-4">
									<div class="form-group {{ $errors->has('budget_title') ? 'has-error' : '' }}">
										<div class="input-group">
											<input type="text" class="form-control" name="budget_title" id="field_budget_title" value="{{$budget->budget_title}}" placeholder="Budget Title">
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<select class="form-control" id="projects_list">
											@foreach ($projects as $project)
												<option value="default">Select Project</option>
												<option value="{{$project->id}}" @if ($project->id == $budget->project_id)
												    selected
												@endif>{{$project->title}}</option>
											@endforeach

										</select>
									</div>
								</div>

								<div class="col-4">
									<label class="control-label">Total Budget</label>
									<div class="input-group col-sm-6">
										<span class="input-group-addon">$</span>
										<input type="number" class="form-control" name="field_total_budget" oninput="calculate_total()" id="field_total_budget" value="{{$budget->total}}" placeholder="0.00">
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
													<th>Amount</th>
													<th>Actions</th>
												</tr>
												</thead>
												<tbody id="id_tbody">
												@foreach($budget_items as $key => $budget_item)
												<tr>
													<td>{{$key+1}}</td>
													<td>
														<input type="text" class="form-control item_name" name="item_name" value="{{$budget_item->title}}">
													</td>
													<td>
														<div class="input-group">
															<span class="input-group-addon">$</span>
															<input type="number" name="item_amount"  class="form-control item_amount" value="{{$budget_item->amount}}" placeholder="0.00">
														</div>
													</td>

													<td>
														<button class="btn btn-danger delete_row">Delete</button>
													</td>
												</tr>
												@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div>
									<div class="col-12">
										<h2><b>Total:$</b><span id="id_total">{{$budget->total}}</span> (You have $<span id="id_left">0</span> left)</h2>
									</div>
								</div>
								<hr>
								<div class="col-6" style="margin-top:20px;">
									<div class="row">
										<div class="col-6">
											<button type="button" class="btn btn_add btn-primary" onclick="add_new_item()"><b>Add Item</b></button>
										</div>
										<div class="col-6">

											<button type="button" class="btn btn_add btn-primary" onclick="save_budget()"><b>Save Budget</b></button>

										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
					<script type="text/javascript">
                                                      var total_budget = 0;
                                                      var left_amount = 0;
                                                      var items_amount = 0;
                                                      var budget_plan = {};

                                                      calculate_total();

                                                      function add_new_item() {
                                                          var tbody = document.getElementById("id_tbody");
                                                          var no = tbody.rows.length + 1;
                                                          var new_row = "<td>" + no + "</td>";
                                                          new_row = new_row + "<td><input type='text' class='form-control item_name' name='item_name'></td>";
                                                          new_row = new_row + "<td>";
                                                          new_row = new_row + "<div class='input-group'>";
                                                          new_row = new_row + "<span class='input-group-addon'>$</span>";
                                                          new_row = new_row + "<input type='number' class='form-control item_amount' name='item_amount' oninput='calculate_total()' value='0' placeholder='0.00'>";
                                                          new_row = new_row + "</div>";
                                                          new_row = new_row + "</td>";

                                                          new_row = new_row + "<td><button class=\"delete_row btn btn-danger\">Delete</button></td>";
                                                          var row = tbody.insertRow(tbody.rows.length);
                                                          row.innerHTML = new_row;
                                                      }

                                                      function save_budget() {
                                                          var data = [];
                                                          var title, amount;
                                                          $("#id_tbody tr").each(function (index) {
                                                              title = $(this).find('.item_name').val();
                                                              amount = $(this).find('.item_amount').val();

                                                              data.push({
                                                                      title: title,
                                                                      amount: amount
                                                              })
                                                          });

                                                          var budget_id = $('#budget_id').val();
                                                          var budget_title = $('#field_budget_title').val();
                                                          var total_budget = $('#field_total_budget').val();
                                                          var baseURL = $('#baseURL').val();

                                                          $.ajax({
                                                            url : baseURL+'budget-planner/budget/'+budget_id,
                                                            method: 'post',
                                                            data: {
                                                              "items": data,
                                                                "title": budget_title,
                                                                "total": total_budget,
                                                              "_token": "{{csrf_token()}}"
                                                            },
                                                            success: function (res) {
                                                                if (res == 'false') {
                                                                    alert("please select project");
                                                                } else  {
                                                                    window.location.href = baseURL + 'budget-planner';
                                                                }
                                                            }
                                                          })

                                                      }

                                                      function calculate_total() {
                                                          var items_amount = 0;
                                                          var total = document.getElementById("field_total_budget").value;
                                                          total_budget = total;
                                                          var elements = document.getElementsByClassName("item_amount");
                                                          for (var i = 0; i < elements.length; i++) {
                                                              items_amount += parseInt(elements[i].value);
                                                          }
                                                          left_amount = total - items_amount;
                                                          jQuery('#id_left').html(left_amount);
                                                      }
                                                      jQuery(document).on('click', '.delete_row', function(event) {
                                                          $(this).closest('tr').remove();
                                                          calculate_total();
                                                      });
					</script>

				</div>
			</div>
		</div>
	</div>

@endsection