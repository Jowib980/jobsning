@extends('admin.layouts.app')
@section('title','Resume')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("User Profile")}}</h1>
            <div class="title-actions">
                <a href="{{route('user.admin.create', ['candidate_create' => 1])}}" class="btn btn-primary">{{__("Edit Resume")}}</a>
                 <a href="{{route('user.admin.create', ['candidate_create' => 1])}}" class="btn btn-primary">{{__("Download")}}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-md-4" style="background-color: black; color: white;">
                            <div class="profile-pic" style="padding: 10px; text-align: center;">
                                <img src={{asset ('images/avatar.png') }} alt="Mubeen Ahmad" style="width: 150px; border-radius: 50%; margin: auto;">
                            </div>
                            <h2 style="text-align: center;">Mubeen Ahmad</h2>
                            <p class="title" style="text-align: center;">Web Developer</p>
                            <ul class="contact-info">
                                <li>mubeenahmad1920@gmail.com</li>
                                <li>03000000000</li>
                                <li><a href="#" style="color: white">muhammadmubeenahmad.me</a></li>
                                <li><a href="#" style="color: white">linkedin.com/in/muhammad-mubeen-ahmad</a></li>
                                <li><a href="#" style="color: white">github.com/muhammadmubeen17</a></li>
                                <li><a href="#" style="color: white">twitter.com/MubeenA01417662</a></li>
                            </ul>
                            <section class="education">
                                <h3>EDUCATION</h3>
                                <p><strong>Bachelors in Information Technology</strong><br>National Textile University<br>2019-10-01 – 2023-10-01</p>
                                <p><strong>FSC Pre Engineering</strong><br>Kips College<br>2017-09-01 – 2019-09-01</p>
                            </section>
                            <section class="languages">
                                <h3>LANGUAGES</h3>
                                <p>ur (Native)</p>
                                <p>en (Fluent)</p>
                            </section>
                        </div>
                        <div class="col-md-8">
                            <section>
                                <h3>CAREER PROFILE</h3>
                                <p>Solution oriented web developer capable of contributing to a highly collaborative work environment...</p>
                            </section>
                            <section>
                                <h3>EXPERIENCES</h3>
                                <p><strong>PHP / Laravel Developer</strong> <span class="date">2022-03-28 - 2022-11-30</span><br>
                                Cyber Hawke<br>
                                Worked as a Junior Web Developer and participated in coding, testing...</p>
                            </section>
                            <section>
                                <h3>PROJECTS</h3>
                                <p><strong>Natours</strong> – A website to plan and book travel arrangements...</p>
                                <p><strong>Portfolio Website</strong> – A website that showcases a person's work...</p>
                            </section>
                            <section>
                                <h3>SKILLS & PROFICIENCY</h3>
                                <div class="skill-bar"><span>HTML</span><div class="bar html"></div></div>
                                <div class="skill-bar"><span>CSS</span><div class="bar css"></div></div>
                                <div class="skill-bar"><span>Bootstrap</span><div class="bar bootstrap"></div></div>
                                <div class="skill-bar"><span>JavaScript</span><div class="bar js"></div></div>
                                <div class="skill-bar"><span>jQuery</span><div class="bar jquery"></div></div>
                                <div class="skill-bar"><span>PHP</span><div class="bar php"></div></div>
                                <div class="skill-bar"><span>Laravel</span><div class="bar laravel"></div></div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection