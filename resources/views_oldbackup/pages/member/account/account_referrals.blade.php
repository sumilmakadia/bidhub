@extends('themes.elite.app_elite')

@section('title', 'Referrals')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="row">

					<div class="col-12 ">
						<div class="card-body">
							<button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal_new_project">Refer A Friend</button>
						</div>
						<div class="card-body p-t-0">
							<div class="card b-all shadow-none">
								<div class="inbox-center table-responsive">
									<table class="table table-hover no-wrap">
										<tbody>
										<tr class="unread">
											<th></th>
											<th>#</th>
											<th>Referral Date</th>
											<th>Referred User</th>
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
