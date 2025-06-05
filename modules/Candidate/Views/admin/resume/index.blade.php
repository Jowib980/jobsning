@extends('admin.layouts.app')
@section('title','Resume')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Build Your Resume")}}</h1>
            <div class="title-actions">
                <a href="{{route('user.admin.create', ['candidate_create' => 1])}}" class="btn btn-primary">{{__("Upload Resume")}}</a>
            </div>
        </div>

       
    </div>
@endsection