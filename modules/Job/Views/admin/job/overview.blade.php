@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h1 class="title-bar">{{ __("Jobs Overview") }}</h1>
    </div>

    @include('admin.message')

    <!-- Toggle Buttons -->
    <div class="d-flex justify-content-center mb-4">
        <a href="?tab=internship" class="btn btn-outline-primary mx-2 {{ request()->get('tab', 'internship') === 'internship' ? 'active' : '' }}">
            Internships
        </a>
        <a href="?tab=job" class="btn btn-outline-primary mx-2 {{ request()->get('tab') === 'job' ? 'active' : '' }}">
            Jobs
        </a>
    </div>

    <!-- Internship Table -->
    @if(request()->get('tab', 'internship') === 'internship')
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="text-center">Internships</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('Internship Title') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Views') }}</th>
                        <th>{{ __('Applicants') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($internships as $internship)
                            <tr>
                                <td>{{ $internship->title }}</td>
                                <td>
                                    @php
                                        $badgeClass = 'badge-';
                                        $customStyle = '';
                                        if ($internship->status === 'pause') {
                                            $customStyle = 'background-color: #f3af33; color: white;';
                                        } elseif ($internship->status === 'closed') {
                                            $customStyle = 'background-color: #f13434; color: white;';
                                        } else {
                                            $badgeClass .= $internship->status;
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}" style="{{ $customStyle }}">
                                        {{ $internship->status }}
                                    </span>
                                </td>
                                <td><button class="btn btn-success">Views ({{ $internship->views_count }})</button></td>
                                <td>
                                    <a href="{{ route('job.admin.allApplicants', ['job_id' => $internship->id]) }}" class="btn btn-info text-white">
                                        Applicants ({{ $internship->applications_count }})
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{$internships->appends(request()->query())->links()}}
            </div>
        </div>
    @endif

    <!-- Job Table -->
    @if(request()->get('tab') === 'job')
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="text-center">Jobs</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('Job Title') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Views') }}</th>
                        <th>{{ __('Applicants') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>
                                    @php
                                        $badgeClass = 'badge-';
                                        $customStyle = '';
                                        if ($job->status === 'pause') {
                                            $customStyle = 'background-color: #f3af33; color: white;';
                                        } elseif ($job->status === 'closed') {
                                            $customStyle = 'background-color: #f13434; color: white;';
                                        } else {
                                            $badgeClass .= $job->status;
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}" style="{{ $customStyle }}">
                                        {{ $job->status }}
                                    </span>
                                </td>
                                <td><button class="btn btn-success">Views ({{ $job->views_count }})</button></td>
                                <td>
                                    <a href="{{ route('job.admin.allApplicants', ['job_id' => $job->id]) }}" class="btn btn-info text-white">
                                        Applicants ({{ $job->applications_count }})
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{$jobs->appends(request()->query())->links()}}
            </div>
        </div>
    @endif
</div>
@endsection
