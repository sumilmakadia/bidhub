@extends('themes.elite.app_elite')

@section('title', 'Notifications')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="row">

				<div class="col-12 ">
					<div class="card-body">

						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn m-b-10 btn-secondary font-18 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
							<div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Mark as all read</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
						</div>
					</div>
					<div class="card-body p-t-0">
						<div class="card b-all shadow-none">
							<div class="inbox-center table-responsive">
								<table class="table table-hover no-wrap">
									<tbody>
										<tr class="unread">
											<th></th>
											<th>#</th>
											<th>Date</th>
											<th>Notification Description</th>
										</tr>
										<tr class="unread">
											<td>
												<div class="custom-control custom-checkbox mr-sm-2">
													<input type="checkbox" class="custom-control-input" id="checkbox1" value="check">
													<label class="custom-control-label" for="checkbox1"></label>
												</div>
											</td>
											<th scope="row">1</th>
											<td>3/1/2017</td>
											<td>Description.....</td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
