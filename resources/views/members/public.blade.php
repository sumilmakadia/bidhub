@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Search Members</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('members.user.index') }}" class="btn btn-info m-l-15" title="{{ trans('helps.index') }}">
							Manage Members
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="row">
							<div class="col">
								<select name="trades[]" id="trades" class="form-control">
									<option value="">Contractor Type</option>
									<option value="">General Contractors</option>
									<option value="">Sub Contractors</option>
								</select>
							</div>
							<div class="col">
								<select name="trades[]" id="trades" class="form-control">
									<option value="">Industry</option>
									<option value="569">Air Conditioning</option>
									<option value="847">Air Duct Cleaning</option>
									<option value="495">Alarms/Multimedia</option>
									<option value="496">Appliances</option>
									<option value="755">Architects &amp; Building Designers</option>
									<option value="752">Artists &amp; Artisans</option>
									<option value="762">Backyard Courts</option>
									<option value="768">Bedding &amp; Bath</option>
									<option value="497">Blinds</option>
									<option value="498">Blower Door</option>
									<option value="567">Boiler repair</option>
									<option value="572">Boilers</option>
									<option value="499">Brick</option>
									<option value="783">Building Designers and Drafters</option>
									<option value="653">Building Supplies</option>
									<option value="500">Cabinets</option>
									<option value="747">Cabinets &amp; Cabinetry</option>
									<option value="749">Carpenters</option>
									<option value="746">Carpet &amp; Flooring</option>
									<option value="797">Carpet &amp; Upholstery Cleaners</option>
									<option value="760">Carpet Dealers</option>
									<option value="501">Cleaning</option>
									<option value="754">Closet Designers and Professional Organizers</option>
									<option value="502">Concrete Work</option>
									<option value="823">Conservatories &amp; Orangeries</option>
									<option value="564">Construction Services</option>
									<option value="503">Countertops</option>
									<option value="769">Decks</option>
									<option value="504">Decks and Patios</option>
									Decks, Patios &amp; Outdoor Enclosures</option>
									<option value="753">Design-Build Firms</option>
									<option value="571">Design/Build</option>
									<option value="655">Door Sales &amp; Installation</option>
									<option value="786">Doors</option>
									<option value="779">Driveways &amp; Paving</option>
									<option value="505">Drywall</option>
									<option value="506">Electric</option>
									<option value="776">Electrical Contractors</option>
									<option value="804">Electricians</option>
									<option value="507">Engineering</option>
									<option value="800">Environmental Services &amp; Restoration</option>
									<option value="565">Exterior Building Services</option>
									<option value="828">Exterior Cleaners</option>
									<option value="508">Exterior rails</option>
									<option value="657">Fencing &amp; Gate Sales &amp; Construction</option>
									<option value="757">Fencing &amp; Gates</option>
									<option value="744">Fireplace Sales &amp; Installation</option>
									<option value="509">Fireplaces</option>
									<option value="510">Flooring</option>
									<option value="511">Foundation</option>
									<option value="512">Framing</option>
									<option value="801">Furniture Refinishing</option>
									<option value="816">Furniture Repair</option>
									<option value="819">Garage Door Repair</option>
									<option value="785">Garage Door Sales &amp; Installation</option>
									<option value="513">Garage Doors</option>
									<option value="566">Garage and Deck Coatings</option>
									<option value="756">Garden &amp; Landscape Supplies</option>
									<option value="833">Gardeners, Lawn Care &amp; Sprinklers</option>
									<option value="654">General Contractors</option>
									<option value="514">Grading &amp; Excavation</option>
									<option value="515">Gutters</option>
									<option value="518">HVAC</option>
									<option value="782">HVAC Contractors</option>
									<option value="826">Handyman</option>
									<option value="765">Hardwood Flooring Dealers &amp; Installers</option>
									<option value="573">Heating</option>
									<option value="806">Heating &amp; Cooling Sales &amp; Repair</option>
									<option value="658">Home Builders</option>
									<option value="516">Home Inspectors</option>
									<option value="748">Home Media Design &amp; Installation</option>
									<option value="790">Home Stagers</option>
									<option value="517">Home Theatre</option>
									<option value="815">Hot Tub &amp; Spa Dealers</option>
									<option value="825">House Cleaning Services</option>
									<option value="519">Insulation</option>
									<option value="834">Interior Architects</option>
									<option value="646">Interior Designers &amp; Decorators</option>
									<option value="789">Ironwork</option>
									<option value="827">Junk Removal</option>
									<option value="814">Kids &amp; Nursery</option>
									<option value="781">Kitchen &amp; Bath Designers</option>
									<option value="751">Kitchen &amp; Bath Fixtures</option>
									<option value="764">Kitchen &amp; Bath Remodelers</option>
									<option value="759">Landscape Architects &amp; Landscape Designers</option>
									<option value="656">Landscape Contractors</option>
									<option value="520">Landscaping</option>
									<option value="794">Lawn &amp; Sprinklers</option>
									<option value="818">Lawn Care &amp; Sprinklers</option>
									<option value="780">Lighting</option>
									<option value="773">Lighting Showrooms &amp; Sales</option>
									<option value="521">Lumber</option>
									<option value="522">Maid Services</option>
									<option value="570">Mechanical contracting</option>
									<option value="793">Media &amp; Bloggers</option>
									<option value="523">Mirrors &amp; Hardware</option>
									<option value="839">Movers</option>
									<option value="763">Not specified</option>
									<option value="822">Outdoor Lighting &amp; Audio/Visual Systems</option>
									<option value="798">Outdoor Play Systems</option>
									<option value="840">PLA</option>
									<option value="524">Paint</option>
									<option value="761">Paint &amp; Wall Coverings</option>
									<option value="771">Painters</option>
									<option value="770">Patios &amp; Outdoor Enclosures</option>
									<option value="750">Pavers &amp; Concrete</option>
									<option value="525">Paving</option>
									<option value="821">Pest Control</option>
									<option value="784">Photographers</option>
									<option value="799">Plumbers</option>
									<option value="526">Plumbing</option>
									<option value="791">Plumbing Contractors</option>
									<option value="820">Pool &amp; Spa Maintenance</option>
									<option value="527">Pools</option>
									<option value="787">Pools &amp; Spas</option>
									<option value="832">Real Estate</option>
									<option value="774">Real Estate Agents</option>
									<option value="838">Realtor</option>
									<option value="528">Roofing</option>
									<option value="758">Roofing &amp; Gutters</option>
									<option value="803">Rubbish Removal</option>
									<option value="772">Schools and Organizations</option>
									<option value="529">Septic</option>
									<option value="802">Septic Tanks &amp; Systems</option>
									<option value="530">Shower Doors</option>
									<option value="531">Siding</option>
									<option value="792">Siding &amp; Exterior Contractors</option>
									<option value="778">Siding &amp; Exteriors</option>
									<option value="532">Soil Treatment</option>
									<option value="745">Solar Energy Contractors</option>
									<option value="766">Specialty Contractors</option>
									<option value="533">Sprinklers</option>
									<option value="796">Staircases &amp; Railings</option>
									<option value="534">Stairs, Rails</option>
									<option value="535">Steel</option>
									<option value="536">Stone</option>
									<option value="652">Stone &amp; Countertops</option>
									<option value="824">Stone Cleaners</option>
									<option value="830">Stone, Pavers &amp; Concrete</option>
									<option value="813">Student - AEC &amp; Design</option>
									<option value="743">Swimming Pool Builders</option>
									<option value="651">Tile</option>
									<option value="829">Tile, Stone &amp; Countertops</option>
									<option value="788">Tree Services</option>
									<option value="537">Trim</option>
									<option value="903">Truck Towing Services</option>
									<option value="795">Upholstery</option>
									<option value="538">Waterproofing</option>
									<option value="539">Well</option>
									<option value="835">Window Cleaners</option>
									<option value="777">Window Sales &amp; Installation</option>
									<option value="775">Window Treatments</option>
									<option value="540">Windows &amp; Doors</option>
									<option value="805">Wine Cellars</option>
									<option value="767">Woodworkers &amp; Carpenters</option>
									<option value="643">furniture-accessories</option>
									<option value="644">windows</option>
								</select>

							</div>
							<div class="col">
								<input type="text" class="form-control" placeholder="Enter Location">
							</div>
							<div class="col">
								<select name="trades[]" id="trades" class="form-control">
									<option value="">Distance</option>
								</select>
							</div>
							<div class="col">
								<select name="trades[]" id="trades" class="form-control">
									<option value="">Sort By</option>
								</select>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				@if(count($users) == 0)
					<div class="col-12">
						<div class="panel-body text-center">
							<h4>{{ trans('users.none_available') }}</h4>
						</div>
					</div>
				@else
					@foreach($users as $user)
						<div class="col-12 col-md-4">
							<div class="card card-body">
								<div class="row align-items-center">
									<div class="col-md-4 col-lg-3 text-center">
										<a href="{{ route('members.user.show', $user->id ) }}"><img class="profile-icon" src="{{$assets_path_public}}{{ $user->avatar }}" alt="user" class="img-circle img-fluid"></a>
									</div>
									<div class="col-md-8 col-lg-9">
										<div class="row">
											<div class="col-8">
												<h3 class="box-title m-b-0 p-0"><a href="{{ route('members.user.show', $user->id ) }}">{{ $user->name }}</a></h3>
											</div>
											<div class="col-4">
												<a href="{{ route('members.user.show', $user->id ) }}" class="btn btn-info">View</a>
											</div>
										</div>

										<small>Contractor Type</small>

									</div>
								</div>
							</div>
						</div>
					@endforeach
					{!! $users->render() !!}
				@endif
			</div>
		</div>
	</div>
@endsection