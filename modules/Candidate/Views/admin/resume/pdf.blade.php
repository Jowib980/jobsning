<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
        }
        .left {
            background-color: #000;
            color: #fff;
            padding: 20px;
            vertical-align: top;
            width: 35%;
        }
        .right {
            padding: 20px;
            vertical-align: top;
            width: 65%;
        }
        .left img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        h2, h3 {
            margin: 10px 0;
        }
        ul {
            list-style: none;
            padding-left: 0;
            color: white;
        }
        .section {
            margin-bottom: 20px;
        }
        .progress-container {
            background-color: #ddd;
            border-radius: 5px;
            height: 15px;
            margin-bottom: 10px;
        }
        .progress-bar {
            height: 15px;
            background-color: #007bff;
            border-radius: 5px;
            text-align: right;
            padding-right: 5px;
            color: #fff;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <!-- Left column -->
            <td class="left">
                <img src="{{ public_path('uploads/' . $data->profile_picture_filename) }}" alt="Profile">
                <h2>{{ $data->first_name }} {{ $data->last_name }}</h2>
                <p>{{ $data->profile_title }}</p>
                <ul>
                    <li>{{ $data->email }}</li>
                    <li>{{ $data->phone }}</li>
                    <li>{{ $data->website }}</li>
                    <li>{{ $data->linkedin }}</li>
                    <li>{{ $data->github }}</li>
                    <li>{{ $data->twitter }}</li>
                </ul>

                <div class="section">
                    <h3 style="color: white;">EDUCATION</h3>
                    @foreach($education as $edu)
                        <p>
                            <strong>{{ $edu['position'] ?? '' }}</strong><br>
                            {{ $edu['location'] ?? '' }}<br>
                            {{ $edu['from'] ?? '' }} – {{ $edu['to'] ?? '' }}
                        </p>
                    @endforeach
                </div>

                <div class="section">
                    <h3 style="color: white;">LANGUAGES</h3>
                    @foreach($languages as $lang)
                        <p>{{ $lang['language'] ?? '' }} ({{ $lang['level'] ?? '' }})</p>
                    @endforeach
                </div>
            </td>

            <!-- Right column -->
            <td class="right">
                <div class="section">
                    <h3>EXPERIENCES</h3>
                    @foreach($experiences as $exp)
                        <p>
                            <strong>{{ $exp['position'] ?? '' }} at {{ $exp['location'] ?? '' }}</strong><br>
                            {{ $exp['from'] ?? '' }} – {{ $exp['to'] ?? '' }}
                        </p>
                    @endforeach
                </div>

                <div class="section">
                    <h3>PROJECTS</h3>
                    @foreach($projects as $project)
                        <p>
                            <strong>{{ $project['title'] ?? '' }}</strong> - {{ $project['description'] ?? '' }}
                        </p>
                    @endforeach
                </div>

                <div class="section">
                    <h3>SKILLS & PROFICIENCY</h3>
                    @foreach($skills as $skill)
                        <p>{{ $skill['name'] ?? '' }}</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: {{ $skill['level'] ?? 0 }}%;">
                                {{ $skill['level'] ?? 0 }}%
                            </div>
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
