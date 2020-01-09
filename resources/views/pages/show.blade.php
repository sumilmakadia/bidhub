@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ isset($page->title) ? $page->title : 'Page' }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('pages.page.create') }}" class="btn btn-info m-l-15" title="{{ trans('pages.create') }}">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                   <div class="card-body">
                        <p>
   <h6>{{ trans('pages.author_id') }}</h6>
   <small class="text-muted"> {{ $page->author_id }}</small>
</p>
<p>
   <h6>{{ trans('pages.title') }}</h6>
   <small class="text-muted"> {{ $page->title }}</small>
</p>
<p>
   <h6>{{ trans('pages.excerpt') }}</h6>
   <small class="text-muted"> {{ $page->excerpt }}</small>
</p>
<p>
   <h6>{{ trans('pages.body') }}</h6>
   <small class="text-muted"> {{ $page->body }}</small>
</p>
<p>
   <h6>{{ trans('pages.image') }}</h6>
   <small class="text-muted"> {{ $page->image }}</small>
</p>
<p>
   <h6>{{ trans('pages.slug') }}</h6>
   <small class="text-muted"> {{ $page->slug }}</small>
</p>
<p>
   <h6>{{ trans('pages.meta_description') }}</h6>
   <small class="text-muted"> {{ $page->meta_description }}</small>
</p>
<p>
   <h6>{{ trans('pages.meta_keywords') }}</h6>
   <small class="text-muted"> {{ $page->meta_keywords }}</small>
</p>
<p>
   <h6>{{ trans('pages.status') }}</h6>
   <small class="text-muted"> {{ $page->status }}</small>
</p>
<p>
   <h6>{{ trans('pages.created_at') }}</h6>
   <small class="text-muted"> {{ $page->created_at }}</small>
</p>
<p>
   <h6>{{ trans('pages.updated_at') }}</h6>
   <small class="text-muted"> {{ $page->updated_at }}</small>
</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                   <div class="card-body">
                      <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection