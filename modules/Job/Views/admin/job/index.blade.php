@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __("All Jobs") }}</h1>
            <div class="title-actions">
                <a href="{{ route('job.admin.create') }}" class="btn btn-primary">{{__("Add new job")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/job/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="publish">{{__(" Publish ")}}</option>
                            <option value="draft">{{__(" Move to Draft ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-default btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{ route('job.admin.index') }}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    @if(is_admin())
                        <?php
                        $company = \Modules\Company\Models\Company::find(Request()->input('company_id'));
                        \App\Helpers\AdminForm::select2('company_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url' => route('company.admin.getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Select Company --')
                            ]
                        ], !empty($company->id) ? [
                            $company->id,
                            $company->name . ' (#' . $company->id . ')'
                        ] : false)
                        ?>
                    @endif
                    <input type="text" name="s" value="{{ Request()->input('s') }}" placeholder="{{__('Search by name')}}" class="form-control">
                    <button class="btn-default btn btn-icon btn_search" type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th> {{ __('Title')}}</th>
                                <th width="200px"> {{ __('Location')}}</th>
                                <th width="150px"> {{ __('Category')}}</th>
                                <th width="150px"> {{ __('Company')}}</th>
                                <th width="100px"> {{ __('Status')}}</th>
                                <th width="100px"> {{ __('Published Date')}}</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr class="{{$row->status}}">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                        </td>
                                        <td class="title">
                                            <a href="{{ $row->getEditUrl() }}">{{$row->title}}</a>
                                        </td>
                                        <td>{{$row->location->name ?? ''}}</td>
                                        <td>{{$row->category->name ?? ''}}</td>
                                        <td>{{$row->company->name ?? ''}}</td>
                                        <!-- <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td> -->
                                        <td>
                                            @php
                                                $badgeClass = 'badge-';
                                                $customStyle = '';

                                                if ($row->status === 'pause') {
                                                    $customStyle = 'background-color: #f3af33; color: white;';
                                                } elseif ($row->status === 'closed') {
                                                    $customStyle = 'background-color: #f13434; color: white;';
                                                } else {
                                                    $badgeClass .= $row->status; // fallback to default class
                                                }
                                            @endphp

                                            <span class="badge {{ $badgeClass }}" style="{{ $customStyle }}">
                                                {{ $row->status }}
                                            </span>
                                        </td>

                                        <td>{{ display_date($row->updated_at)}}</td>
                                        @if($row->status != 'closed')
                                        <td>
                                            <a href="{{  $row->getEditUrl() }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </td>
                                        @endif
                                        <!-- <td>
                                            <form action="{{route('job.admin.removeJob', $row->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this applicant?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td> -->
                                        @if($row->status != 'closed')
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link btn-sm p-0 m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    &#8942; {{-- Unicode vertical ellipsis (⋮) --}}
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('job.admin.job.changeStatus', ['status' => 'pause', 'id' => $row->id])}}">{{ __("Pause") }}</a>

                                                    <a class="dropdown-item" href="{{ route('job.admin.job.changeStatus', ['status' => 'publish', 'id' => $row->id]) }}">{{ __("Open") }}</a>

                                                    <a class="dropdown-item" href="{{ route('job.admin.job.changeStatus', ['status' => 'closed', 'id' => $row->id]) }}">{{ __("Close") }}</a>

                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">{{__("No data")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
