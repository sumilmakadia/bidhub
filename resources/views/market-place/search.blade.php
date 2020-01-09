<div class="card search-row">
    <form method="post" action="{{route('market-place.marketplace.search')}}">
		{{csrf_field()}}
	<div class="row">
		<div class="col-md-7 m-mgn-btn">
			<input type="text" name="name" class="form-control" value="@isset($name){{$name}}@endisset" placeholder="Search">
		</div>
		<div class="col-md-3 m-mgn-btn">
			<select name="category" id="catergory" class="form-control">
			    <option value="">Category</option>
				@php 
                    $trades = DB::table('categories_marketplaces')->orderBy('title', 'ASC')->get(); 
                    @endphp
                    @foreach($trades as $trade)
                        <option value="{{$trade->title}}" @isset($category) @if($trade->title == $category)) selected @endif @endisset>{{$trade->title}}</option>
                    @endforeach
			</select>
		</div>

		<div class="col-md-2 m-mgn-btn">
			<button class="btn btn-primary">Search</button>
			<a style="width: 49%;" href="/market-place" class="btn btn-primary btn-red">Clear</a>
		</div>
	</div>
	</form>
</div>
