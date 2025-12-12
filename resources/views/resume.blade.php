@extends('layout')

@section('title', 'Resume | Irish Rivera')

@section('content')
<style>
    .container {
        display: flex;
        max-width: 1000px;
        margin: 40px auto;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        border-radius: 8px;
        overflow: hidden;
        color: #333;
        position: relative;
        transition: 0.3s;
    }
    body.dark .container { background: #2a2a2a; color: #f5f5f5; }
    .left { background: #ce8596ff; color: white; width: 35%; padding: 20px; transition: 0.3s; }
    body.dark .left { background: #b3586a; }
    .left img { width: 150px; height: 150px; border-radius: 50%; display: block; margin: 0 auto 20px auto; border: 3px solid white; object-fit: cover; }
    .left h2 { border-bottom: 2px solid white; padding-bottom: 5px; margin-bottom: 10px; }
    .left p, .left ul li { margin: 5px 0; }
    .right { width: 65%; padding: 20px; background: #fff; transition: 0.3s; position: relative; }
    body.dark .right { background: #1e1e1e; }
    .right h1 { color: #d6417aff; transition: 0.3s; }
    body.dark .right h1 { color: #ff76a6; }
    .right h2 { background: #d6799cff; color: white; padding: 5px 10px; border-radius: 5px; margin-top: 15px; transition: 0.3s; }
    body.dark .right h2 { background: #ff1f84ff; }
    ul { list-style: none; padding-left: 15px; }
    ul li { margin: 8px 0; }
    .skill-inline { margin: 8px 0; }
    .skill-inline strong { font-weight: bold; }
    .download-btn, .edit-btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: background 0.3s, color 0.3s;
        color: white;
    }
    .download-btn { background-color: #2ecc71; }
    .edit-btn { background-color: #3498db; }
    body.dark .download-btn { background-color: #ff1f84ff; color: white; }
    body.dark .edit-btn { background-color: #9b59b6; color: white; }
    .download-btn:hover, .edit-btn:hover { opacity: 0.9; }

    @media print {
        body { background: #fff !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; zoom: 0.9; }
        .container { background: #fff !important; box-shadow: none; }
        .left { background: #f7d6e0 !important; color: #000 !important; }
        .right { background: #fff !important; color: #000 !important; }
        .left h2, .right h2 { background: #d6417aff !important; color: white !important; }
        .download-btn, .edit-btn, .navbar { display: none !important; }
    }
</style>

<div class="container">
    <div class="left">
        <img src="{{ asset('profile.jpg') }}" alt="Profile Picture">

        {{-- Personal Information --}}
        <h2>Personal Information</h2>
        <p><strong>Full Name:</strong> Irish Rivera</p>
        <p><strong>Date of Birth:</strong> January 17, 2005</p>
        <p><strong>Place of Birth:</strong> Tinga Itaas, Batangas City, Batangas</p>
        <p><strong>Gender:</strong> Female</p>
        <p><strong>Field of Specialization:</strong> Cloud Computing & Cyber Security</p>

        {{-- Organizations --}}
        <h2>Organizations</h2>
        <p>ACCESS - Member (2023-PRESENT)</p>
        <p>JPCS - Member (2023-PRESENT)</p>
        <p>KALINGA - Member (PRESENT)</p>
    </div>

    <div class="right">
        {{-- Buttons --}}
        <div style="position: absolute; top: 20px; right: 20px; display: flex; gap: 10px;">
            <button class="download-btn" onclick="window.print()">📄 Download My CV</button>
        </div>

        {{-- Name and Contact --}}
        <h1>IRISH RIVERA</h1>
        <p>
            Tinga Itaas, Batangas City<br>
            23-00679@g.batstae-u.edu.ph<br>
            09362695155
        </p>

        {{-- Educational Background --}}
        <h2>Educational Background</h2>
        <p><strong>Elementary:</strong> Tinga Itaas Elementary School (2011-2017)</p>
        <p><strong>Junior High School</strong> Tinga Soro Soro Integrated School (2017-2021)</p>
        <p><strong>Senior High School</strong> STI Batangas (2021-2023)</p>
        <p><strong>Tertiary:</strong> Batangas State University - BS Computer Science (2017-2021)</p>

        {{-- Skills --}}
        <h2>Skills</h2>
        <ul>
            <li><strong>Web Development:</strong> HTML, CSS, JavaScript, PHP, Laravel</li>
            <li><strong>GUI Development:</strong> Python Tkinter, Flutter</li>
            <li><strong>Automation & Robotics:</strong> Arduino, Sensors, OpenCV</li>
            <li><strong>Database Management:</strong> MySQL, PostgreSQL, Firebase</li>
        </ul>

        {{-- Programming Languages --}}
        <h2>Programming Languages</h2>
        <ul>
            <li><strong>Python:</strong> Scripting, GUI, OpenCV projects</li>
            <li><strong>JavaScript:</strong> Frontend interactivity and dynamic content</li>
            <li><strong>PHP & Laravel:</strong> Web backend development</li>
            <li><strong>C/C++:</strong> Embedded systems and Arduino programming</li>
            <li><strong>Dart:</strong> Flutter mobile apps</li>
        </ul>

        {{-- Field of Interest --}}
        <h2>Field of Interest</h2>
        <ul>
            <li>Smart Home Automation</li>
            <li>IoT & Robotics</li>
            <li>Web and Mobile Application Development</li>
            <li>Data Visualization & Analytics</li>
        </ul>

        {{-- Projects --}}
        <h2>Projects</h2>
        <ul>
            <li>PRESENCE: People Recognition and Energy-Saving Control Engine</li>
            <li>APAC: Arduino Pedestrian & Crosswalk Lights Automation</li>
            <li>KapitBayan: Disaster Assistance Request & Mapping Syste</li>
            <li>StudyMate+: Productivity & Study Management Mobile App</li>
        </ul>

        {{-- Awards --}}
        <h2>Awards and Recognitions</h2>
        <ul>
            <li>Batstateu, First Year, First Sem - Deans Lister  (2023)</li>
        </ul>
    </div>
</div>
@endsection
