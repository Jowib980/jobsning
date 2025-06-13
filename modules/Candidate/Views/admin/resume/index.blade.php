@extends('admin.layouts.app')
@section('title','Resume')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("User Profile")}}</h1>
            <div class="title-actions">
                <a href="{{route('candidate.admin.resume.edit', $data->candidate_id)}}" class="btn btn-primary">{{__("Edit Resume")}}</a>
                 <a href="{{ route('candidate.admin.resume.download') }}" class="btn btn-primary">{{__("Download")}}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                        <div class="col-md-4 p-4" style="background-color: black; color: white;">
                            <div class="profile-pic" style="padding: 10px;">
                                <img src="{{ $data->getThumbnailUrl() ?? asset('images/avatar.png') }}" alt="Profile Picture" style="width: 200px; border-radius: 50%; margin: auto;">
                            </div>
                            <h2>{{ $data->first_name }} {{ $data->last_name }}</h2>
                            <p class="title">{{ $data->profile_title }}</p>
                            <ul class="contact-info">
                                <li>{{ $data->email }}</li>
                                <li>{{ $data->phone }}</li>
                                <li><a href="#" style="color: white">{{ $data->website }}</a></li>
                                <li><a href="#" style="color: white">{{ $data->linkedin }}</a></li>
                                <li><a href="#" style="color: white">{{ $data->github }}</a></li>
                                <li><a href="#" style="color: white">{{ $data->twitter }}</a></li>
                            </ul>
                            @php
                                $experiences = is_array($data->experience) 
                                    ? $data->experience 
                                    : json_decode($data->experience, true);
                                $education = is_array($data->education) 
                                    ? $data->education
                                    : json_decode($data->education, true);
                                $skills = is_array($data->skills)
                                    ? $data->skills
                                    : json_decode($data->skills, true);
                                $languages = is_array($data->languages)
                                    ? $data->languages
                                    : json_decode($data->languages, true);
                                $projects = is_array($data->projects)
                                    ? $data->projects
                                    : json_decode($data->projects, true);

                            @endphp
                            <section class="education">
                                <h3>EDUCATION</h3>
                                @if(!empty($education))
                                    @foreach ($education as $edu)
                                        <p>
                                            <strong>{{ $edu['reward'] ?? '' }} at {{ $edu['location'] ?? '' }}</strong><br>
                                            {{ $edu['from'] ?? '' }} – {{ $edu['to'] ?? '' }}
                                        </p>
                                    @endforeach
                                @else
                                    <p>No education data available.</p>
                                @endif
                            </section>
                            <section class="languages">
                                <h3>LANGUAGES</h3>
                                @if(!empty($languages))
                                    @foreach ($languages as $lang)
                                        <p>
                                            {{ $lang['language'] ?? '' }} {{ $lang['level']}}
                                        </p>
                                    @endforeach
                                @else
                                    <p>No Language data available.</p>
                                @endif
                            </section>
                        </div>
                        <div class="col-md-8 p-4">
                            <section>
                                <h3>EXPERIENCES</h3>
                                @if(!empty($experiences))
                                    @foreach ($experiences as $exp)
                                        <p>
                                            <strong>{{ $exp['position'] ?? '' }} at {{ $exp['location'] ?? '' }}</strong><br>
                                            {{ $exp['from'] ?? '' }} – {{ $exp['to'] ?? '' }}
                                        </p>
                                    @endforeach
                                @else
                                    <p>{{ $data->experience_type }}</p>
                                @endif
                            </section>
                            <section>
                                <h3>PROJECTS</h3>
                                    @if(!empty($projects))
                                        @foreach ($projects as $project)
                                            <p>
                                                <strong>{{ $project['title'] ?? '' }}</strong> - {{ $project['description'] ?? ''}}
                                            </p>
                                        @endforeach
                                    @else
                                        <p>No projects data available.</p>
                                    @endif
                            </section>
                            <section>
                                <h3>SKILLS & PROFICIENCY</h3>
                                @if(!empty($skills))
                                    @foreach ($skills as $skill)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span>{{ $skill['name'] ?? '' }}</span> 
                                        </div>
                                        <div class="col-md-9"> 
                                            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: {{ $skill['level'] }}%">@if(!empty($skill['level'])){{ $skill['level'] }}%
                                                @endif</div>
                                            </div>
                                            <Br>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>No skills data available.</p>
                                @endif
                            </section>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection