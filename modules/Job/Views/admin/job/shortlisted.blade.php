@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb20">
        <h1 class="title-bar">{{ __("Shortlisted Candidates") }}</h1>
    </div>

    @include('admin.message')

    @if(!empty($rows) && $rows->total() > 0)
        <form method="POST" action="{{ route('job.admin.applicantBulkEdit') }}">
            @csrf

            <div class="filter-div d-flex justify-content-between mb-3">
                <div class="col-left d-flex">
                    <select name="action" class="form-control me-2">
                        <option value="">{{ __("Bulk Actions") }}</option>
                        <option value="delete">{{ __("Delete") }}</option>
                    </select>
                    <button data-confirm="{{__("Do you want to delete?")}}" class="btn-default btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                </div>

                <div class="text-right">
                    <p><i>{{ __('Found :total items', ['total' => $rows->total()]) }}</i></p>
                </div>
            </div>

            @foreach($rows as $row)
                <div class="container mb-4">
                    <div class="card shadow p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5>
                                    <input type="checkbox" class="check-item" name="ids[]" value="{{ $row->id }}">
                                    <strong>{{ $row->candidateInfo->getAuthor->getDisplayName() ?? '' }}</strong>
                                    @if($row->candidateInfo->title)
                                        (<span class="text-muted">{{ $row->candidateInfo->title }}</span>)
                                    @endif
                                </h5>
                                <p class="mb-1">{{ $row->candidateInfo->location ?? '' }}</p>
                                <p class="text-muted">Total work experience: {{ $row->candidateInfo->experience_year }}</p>
                            </div>
                            <div class="text-end">
                                <p class="text-muted">Applied<br><strong>{{ display_date($row->updated_at) }}</strong></p>
                            </div>
                        </div>

                        <hr>

                        @php
                            $experiences = is_array($row->candidateInfo->experience)
                                ? $row->candidateInfo->experience
                                : json_decode($row->candidateInfo->experience, true);
                            $education = is_array($row->candidateInfo->education)
                                ? $row->candidateInfo->education
                                : json_decode($row->candidateInfo->education, true);
                            $skills = is_array($row->candidateInfo->skills)
                                ? $row->candidateInfo->skills
                                : json_decode($row->candidateInfo->skills, true);
                        @endphp

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4"><h6><strong>EXPERIENCE</strong></h6></div>
                                <div class="col-md-8">
                                    @if(!empty($experiences))
                                        @foreach ($experiences as $exp)
                                            <p>
                                                <strong>{{ $exp['position'] ?? '' }} at {{ $exp['location'] ?? '' }}</strong><br>
                                                {{ $exp['from'] ?? '' }} – {{ $exp['to'] ?? '' }}
                                            </p>
                                        @endforeach
                                    @else
                                        <p>No experience data available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4"><h6><strong>EDUCATION</strong></h6></div>
                                <div class="col-md-8">
                                    @if(!empty($education))
                                        @foreach ($education as $edu)
                                            <p>
                                                <strong>{{ $edu['reward'] ?? '' }}</strong> {{ $edu['from'] ?? '' }} – {{ $edu['to'] ?? '' }}<br>
                                                {!! $edu['location'] ?? '' !!}
                                            </p>
                                        @endforeach
                                    @else
                                        <p>No education data available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4"><h6><strong>SKILL(S)</strong></h6></div>
                                <div class="col-md-8">
                                    @if(!empty($skills))
                                        @foreach ($skills as $skill)
                                            <span class="px-3 py-1 rounded-pill bg-info bg-opacity-10 fw-semibold" style="color: white; font-weight: bold;">
                                                {{ $skill['name'] ?? '' }}
                                            </span>
                                        @endforeach
                                    @else
                                        <p>No skill data available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/candidate/{{ $row->candidateInfo->slug }}" target="_blank">View Full Application</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>

        {{ $rows->appends(request()->query())->links() }}
    @else
        <div class="card shadow p-4">
            <p>{{ __("No data") }}</p>
        </div>
    @endif
</div>
@endsection
