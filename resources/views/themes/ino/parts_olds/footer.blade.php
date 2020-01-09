<footer style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php

    				if (Voyager::translatable($items)) {
    				    $items = $items->load('translations');
    				}
    
    			@endphp
    
    			@foreach ($items as $item)
    
    				@php
    
    					$originalItem = $item;
    					if (Voyager::translatable($item)) {
    					    $item = $item->translate($options->locale);
    					}
    
    					$isActive = null;
    					$styles = null;
    					$icon = null;
    
    					// Background Color or Color
    					if (isset($options->color) && $options->color == true) {
    					    $styles = 'color:'.$item->color;
    					}
    					if (isset($options->background) && $options->background == true) {
    					    $styles = 'background-color:'.$item->color;
    					}
    
    					// Check if link is current
    					if(url($item->link()) == url()->current()){
    					    $isActive = 'active';
    					}
    
    					// Set Icon
    					if(isset($options->icon) && $options->icon == true){
    					    $icon = '<i class="' . $item->icon_class . '"></i>';
    					}
    
    				@endphp
                <a href="{{ url($item->link()) }}"  target="{{ $item->target }}">{{ $item->title }}</a>
                @if(!$originalItem->children->isEmpty())
					@include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
				@endif
                @endforeach
            </div>
            <div class="col-md-6 text-md-right">
               {{$site_copy_right}} | <a href="{{$site_created_by_url}}">{{$site_created_by}}</a>
            </div>
        </div>
    </div>
</footer>

