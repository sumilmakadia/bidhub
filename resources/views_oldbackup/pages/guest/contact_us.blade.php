@extends('themes.ino.app_ino')
@section('content')
    <style>
    .get_touch-area {
    position: relative;
    overflow: hidden;
    margin-top: 100px;
}
@media only screen and (max-width: 991px) {
    .get_touch-area {
    position: relative;
    overflow: hidden;
    margin-top: 93px;
}
}
@media only screen and (max-width: 450px) {
    .get_touch-area {
    position: relative;
    overflow: hidden;
    margin-top: 88px;
}
}
    </style>
    @include('themes.ino.elements.block9')
    @include('themes.ino.elements.block8')
@endsection