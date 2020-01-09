@extends('themes.elite.app_elite')

@section('title', 'Market Place')
@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <select name="trades[]" id="trades" class="form-control">
                            <option value="">Categories</option>
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
    <div class="row el-element-overlay">

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img1.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img2.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img3.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img4.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img3.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img5.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img6.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"><img src="{{$assets_path_public_eli}}images/big/img6.jpg" class="img-fluid">

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title"><a href="/profile/view">Title</a></h3>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consectetur cupiditate.</small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection