@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Saved Jobs')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($wishlists))
                    <form method="post" action="{{route('candidate.admin.savedjobs.delete')}}" class="filter-form filter-form-left d-flex justify-content-start">
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
            <p><i>{{__('Found :total items',['total'=>$wishlists->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th>{{__('Job Title')}}</th>
                            <th>{{__('Expiration Date')}}</th>
                            <th>{{__('Location')}}</th>
                            <th>{{__('Wage Agreement')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wishlists as $wishlist)
                            @php
                                $job = $jobs[$wishlist->object_id] ?? null;
                                $country = $job ? Nnjeim\World\Models\Country::find($job->country_id) : null;
                                $city = $job ? Nnjeim\World\Models\City::find($job->location_id) : null;
                            @endphp

                            @if($job)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{ $wishlist->id }}" class="check-item"></td>
                                    <td class="title">
                                        <a href="{{ url('admin/module/user/edit/' . $job->slug) }}">{{ $job->title ?? '' }}</a>
                                    </td>
                                    <td>{{ display_date($job->expiration_date ?? '') }}</td>
                                    <td>{{ $country->name ?? '' }}, {{ $city->name ?? '' }}</td>
                                    <td class="{{ $job->wage_agreement == 1 ? 'badge badge-success' : 'badge badge-secondary' }}">
                                        {{ $job->wage_agreement == 1 ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                    </div>
                </form>
                {{$wishlists->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
