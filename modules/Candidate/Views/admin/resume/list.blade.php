@extends('admin.layouts.app')
@section('title','Candidate')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All Resume")}}</h1>
            <div class="title-actions">
                <a href="{{route('candidate.admin.resume.form')}}" class="btn btn-primary">{{__("Create new Resume")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($data))
                    <form method="post" action="{{route('candidate.admin.resume.bulkEdit')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$data->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> {{ __('Profile Title')}}</th>
                                    <th class="title"> {{ __('Name')}}</th>
                                    <th class="title"> {{ __('Date Created')}}</th>
                                    <th class="title"> {{ __('Last Updated')}}</th>
                                    <th width="100px" colspan="2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($data->total() > 0)
                                    @foreach($data as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">{{ $row->profile_title ?? '' }}</td>
                                            <td class="title">{{ $row->first_name ?? '' }} {{ $row->last_name ?? '' }}</td>
                                            <td> {{ $row->created_at}}</td>
                                            <td> {{ $row->updated_at}}</td>
                                            <td>
                                                <a href="{{route('candidate.admin.resume.edit', $row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                <a href="{{route('candidate.admin.resume.index', $row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{__('View')}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </form>
                        {{$data->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
