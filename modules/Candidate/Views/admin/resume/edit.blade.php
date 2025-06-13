@extends('admin.layouts.app')
@section('title','Resume')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Edit Your Resume")}}</h1>
            <!-- <div class="title-actions"> -->
                <!-- <a href="{{route('user.admin.create', ['candidate_create' => 1])}}" class="btn btn-primary">{{__("Upload Resume")}}</a> -->
            <!-- </div> -->
        </div>


        <div class="row">
            <div class="col-md-12">

                <form method="post" action="{{ route('candidate.admin.resume.update', $data->id) }}">
                    @csrf 

<!-- personal info section start -->
 
                <div class="panel">
                    <div class="panel-title">
                        <strong>Personal Information</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("First Name")}}</label>
                                    <input <input type="text" value="{{ old('first_name', $data->first_name ?? '') }}" name="first_name" placeholder="{{__('First Name')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{__("Last Name")}}</label>
                                    <input type="text" value="{{old('last_name',$data->last_name ?? '')}}" name="last_name" placeholder="{{__("Last Name")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('profile_picture',$data->profile_picture) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__("Profile Title")}}</label>
                                    <input type="text" value="{{old('profile_title',$data->profile_title ?? '')}}" name="profile_title" placeholder="{{__("Profile Title")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__("About")}}</label>
                                    <div class="input-group">
                                        <textarea name="about" class="form-control">{{ old('about', $data->about ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
 
 <!-- personal info section end -->

 <!-- contact detail section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Contact Information</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("Email")}}</label>
                                    <input type="email"name="email" placeholder="{{__("Email")}}" value="{{old('email',$data->email ?? '')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("Phone Number")}}</label>
                                    <input type="tel" name="phone" placeholder="{{__("Phone Number")}}" value="{{old('phone',$data->phone ?? '')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("LinkedIn")}}</label>
                                    <input type="app_url" name="linkedin" placeholder="{{__("Linkedin url")}}" value="{{old('linkedin',$data->linkedin ?? '')}}"class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("Github")}}</label>
                                    <input type="app_url" name="github" placeholder="{{__("Github url")}}" value="{{old('github',$data->github ?? '')}}"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("Twitter")}}</label>
                                    <input type="app_url" name="twitter" placeholder="{{__("Twitter url")}}" value="{{old('twitter',$data->twitter ?? '')}}"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__("Website")}}</label>
                                    <input type="app_url" name="website" placeholder="{{__("Website url")}}" value="{{old('website',$data->website ?? '')}}"class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
 
  <!-- contact detail section end -->

                            @php
                                $experience_data = is_array($data->experience) 
                                    ? $data->experience 
                                    : (json_decode($data->experience, true) ?? []);
                                $education_data = is_array($data->education) 
                                    ? $data->education
                                    : (json_decode($data->education, true) ?? []);
                                $skills = is_array($data->skills)
                                    ? $data->skills
                                    : (json_decode($data->skills, true) ?? []);
                                $languages = is_array($data->languages)
                                    ? $data->languages
                                    : (json_decode($data->languages, true) ?? []);
                                $projects = is_array($data->projects)
                                    ? $data->projects
                                    : (json_decode($data->projects, true) ?? []);

                            @endphp

  <!-- education detail section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Education Information</strong>
                    </div>
                    <div class="panel-body">
                       
                         <div id="education-container">
                                @forelse($education_data as $index => $edu)
                                    <div class="education-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Degree") }}</label>
                                                    <input type="text" name="degree[]" class="form-control" value="{{ $edu['reward'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Institue Name") }}</label>
                                                    <input type="text" name="institute[]" class="form-control" value="{{ $edu['location'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("Start Date") }}</label>
                                                    <input type="text" name="start_date[]" class="form-control" value="{{ $edu['from'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("End Date") }}</label>
                                                    <input type="text" name="end_date[]" class="form-control" value="{{ $edu['to'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("CGPA/Percentage") }}</label>
                                                    <input type="text" name="cgpa_percentage[]" class="form-control" value="{{ $edu['information'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-education-group" style="{{ $loop->first ? 'display:none;' : '' }}">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @empty
                                    {{-- Show empty one if no experience --}}
                                    <div class="education-group">
                                        <div class="row">
                                            <!-- Same structure as above but empty -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Degree") }}</label>
                                                    <input type="text" name="degree[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Institute Name") }}</label>
                                                    <input type="text" name="institute[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("Start Date") }}</label>
                                                    <input type="text" name="start_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("End Date") }}</label>
                                                    <input type="text" name="end_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("CGPA/Percentage") }}</label>
                                                    <input type="text" name="cgpa_percentage[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-education-group" style="display:none;">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforelse
                            </div>

                         <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add-education" class="btn btn-primary pull-right">Add More</button>
                            </div>
                        </div>

                    </div>
                </div>

  <!-- education detail section end -->

  <!-- experience section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Experience</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __("Fresher") }}</label>
                                <input type="radio" name="experience_type" value="fresher">
                            </div>
                            <div class="col-md-6">
                                <label>{{ __("Experienced") }}</label>
                                <input type="radio" name="experience_type" value="experienced">
                            </div>
                        </div>

                       
                        <div class="experience-fields" style="display: none;">
                            <div id="experience-container">
                                @forelse($experience_data as $index => $exp)
                                    <div class="experience-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Job Title") }}</label>
                                                    <input type="text" name="job_title[]" class="form-control" value="{{ $exp['position'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Organization") }}</label>
                                                    <input type="text" name="organization[]" class="form-control" value="{{ $exp['location'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("Start Date") }}</label>
                                                    <input type="text" name="job_start_date[]" class="form-control" value="{{ $exp['from'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("End Date") }}</label>
                                                    <input type="text" name="job_end_date[]" class="form-control" value="{{ $exp['to'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Job Description") }}</label>
                                                    <input type="text" name="job_desc[]" class="form-control" value="{{ strip_tags($exp['information'] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-experience-group" style="{{ $loop->first ? 'display:none;' : '' }}">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @empty
                                    {{-- Show empty one if no experience --}}
                                    <div class="experience-group">
                                        <div class="row">
                                            <!-- Same structure as above but empty -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Job Title") }}</label>
                                                    <input type="text" name="job_title[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Organization") }}</label>
                                                    <input type="text" name="organization[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("Start Date") }}</label>
                                                    <input type="text" name="job_start_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __("End Date") }}</label>
                                                    <input type="text" name="job_end_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Job Description") }}</label>
                                                    <input type="text" name="job_desc[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-experience-group" style="display:none;">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforelse
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-experience" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

  <!-- experience section end -->

  <!-- project section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Projects</strong>
                    </div>
                    <div class="panel-body">
                       <div id="project-container">
                            @forelse($projects as $index => $project)
                            <div class="project-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __("Project Title") }}</label>
                                                <input type="text" name="project_title[]" value="{{ $project['title'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __("Project Description") }}</label>
                                                <textarea name="project_desc[]"class="form-control">{{ $project['description'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-project-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @empty
                                <div class="project-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __("Project Title") }}</label>
                                                <input type="text" name="project_title[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __("Project Description") }}</label>
                                                <textarea type="text" name="project_desc[]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-project-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforelse
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-project" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- project section end -->

  <!-- skills section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Skills & Proficiency</strong>
                    </div>
                    <div class="panel-body">
                       <div id="skill-container">
                        
                         @forelse($skills as $index => $skill)
                                <div class="skill-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{ __("Add Skill") }}</label>
                                                <input type="text" name="skill[]" value="{{ $skill['name'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __("Percentage") }}</label>
                                                <input type="number" name="skill_percentage[]" value="{{ $skill['level'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-skill-group" style="{ $loop->first ? 'display:none;' : '' }}">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @empty
                            <div class="skill-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{ __("Add Skill") }}</label>
                                                <input type="text" name="skill[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __("Percentage") }}</label>
                                                <input type="number" name="percentage[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-skill-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforelse
                            
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-skill" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- skill section end -->

  <!-- language section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Languages</strong>
                    </div>
                    <div class="panel-body">
                       <div id="language-container">
                        @forelse($languages as $i => $lang)
                                <div class="language-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{ __("Add Language") }}</label>
                                                <input type="text" name="language[]" value="{{ $lang['language'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __("Level") }}</label>
                                                <select class="form-control" id="language_level" name="language_level[]">
                                                    <option value="">{{ __("Select Level") }}</option>
                                                    <option value="native" {{ (isset($lang['level']) && $lang['level'] == 'native') ? 'selected' : '' }}>{{ __("Native") }}</option>
                                                    <option value="fluent" {{ (isset($lang['level']) && $lang['level'] == 'fluent') ? 'selected' : '' }}>{{ __("Fluent") }}</option>
                                                </select>

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-lang-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @empty
                            <div class="language-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{ __("Add Language") }}</label>
                                                <input type="text" name="language[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __("Level") }}</label>
                                                <select class="form-control" id="language_level" name="language_level[]">
                                                <option value="">{{ __("Select Level") }}</option>
                                                <option value="native">{{ __("Native") }}</option>
                                                <option value="fluent">{{ __("Fluent") }}</option>
                                            </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-lang-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforelse
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-language" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- language section end -->
 <!-- save button section -->

                <div class="panel">
                    <div class="panel-title">                   
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- save button section end  -->

                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // hide and show experience form 
                const radios = document.querySelectorAll('input[name=experience_type]');
                const experienceFields = document.querySelector('.experience-fields');

                radios.forEach(radio => {
                    radio.addEventListener('change', function () {
                        if(this.value === 'experienced') {
                            experienceFields.style.display = 'block';
                        } else {
                            experienceFields.style.display = 'none';
                        }
                    });
                });


                // add more and remove for experience form

                const add_experience = document.getElementById('add-experience');
                const exp_container = document.getElementById('experience-container');

                add_experience.addEventListener('click', function () {
                    const firstExpGroup = exp_container.querySelector('.experience-group');
                    const newExpGroup = firstExpGroup.cloneNode(true);

                    newExpGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newExpGroup.querySelector('.remove-experience-group').style.display = 'inline-block';

                    exp_container.appendChild(newExpGroup);
                });

                exp_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-experience-group')) {
                        e.target.closest('.experience-group').remove();
                    }
                });

                // add more and remove for education section

                const add_education = document.getElementById('add-education');
                const edu_container = document.getElementById('education-container');

                add_education.addEventListener('click', function () {
                    const firstEduGroup = edu_container.querySelector('.education-group');
                    const newEduGroup = firstEduGroup.cloneNode(true);

                    newEduGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newEduGroup.querySelector('.remove-education-group').style.display = 'inline-block';

                    edu_container.appendChild(newEduGroup);
                });

                edu_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-education-group')) {
                        e.target.closest('.education-group').remove();
                    }
                });

                // add more and remove for projects section

                const add_project = document.getElementById('add-project');
                const proj_container = document.getElementById('project-container');

                add_project.addEventListener('click', function () {
                    const firstProjGroup = proj_container.querySelector('.project-group');
                    const newProjGroup = firstProjGroup.cloneNode(true);

                    newProjGroup.querySelectorAll('input').forEach(input => input.value = '');
                    newProjGroup.querySelectorAll('textarea').forEach(textarea => textarea.value = '');

                    newProjGroup.querySelector('.remove-project-group').style.display = 'inline-block';

                    proj_container.appendChild(newProjGroup);
                });

                proj_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-project-group')) {
                        e.target.closest('.project-group').remove();
                    }
                });

                const add_skill = document.getElementById('add-skill');
                const skill_container = document.getElementById('skill-container');

                add_skill.addEventListener('click', function () {
                    const firstSkillGroup = skill_container.querySelector('.skill-group');
                    const newSkillGroup = firstSkillGroup.cloneNode(true);

                    newSkillGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newSkillGroup.querySelector('.remove-skill-group').style.display = 'inline-block';

                    skill_container.appendChild(newSkillGroup);
                });

                skill_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-skill-group')) {
                        e.target.closest('.skill-group').remove();
                    };
                });

                const add_language = document.getElementById('add-language');
                const lang_container = document.getElementById('language-container');

                add_language.addEventListener('click', function () {
                    const firstLangGroup = lang_container.querySelector('.language-group');                 
                    const newLangGroup = firstLangGroup.cloneNode(true);

                    newLangGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newLangGroup.querySelector('.remove-lang-group').style.display = 'inline-block';

                    lang_container.appendChild(newLangGroup);
                });

                lang_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-lang-group')) {
                        e.target.closest('.language-group').remove();
                    }
                });

            });

            </script>

  @endsection