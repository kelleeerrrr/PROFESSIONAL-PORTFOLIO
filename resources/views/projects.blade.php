@extends('layout')

@section('title', 'Projects | Irish Rivera')

@section('content')
<style>
h2 { color: var(--accent); margin-top: -20px; margin-bottom: 10px; }
.projects-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
    max-width: 1100px;
    margin: 40px auto;
}

/* ===== Project Card ===== */
.project-card {
    display: flex;
    flex-direction: column;
    background: #ffffffcc;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    min-height: 480px;
    cursor: pointer;
}
body.dark .project-card { background: #2a2a2acc; }

.project-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: transform 0.3s;
}
.project-card:hover img { transform: scale(1.05); }

.project-card-content { display: flex; flex-direction: column; justify-content: space-between; padding: 20px; flex: 1; }
.project-card h3 { font-size: 1.3em; color: var(--accent); margin-bottom: 5px; }
.tagline { font-style: italic; color: #555; margin-bottom: 10px; font-size: 0.95em; }
body.dark .tagline { color: #ddd; }
.description { font-size: 1em; line-height: 1.5; margin-bottom: 15px; color: #333; }
body.dark .description { color: #ffffffdd; }
.tech-icons span { margin-right: 8px; font-size: 0.9em; }
.project-links { display: flex; gap: 10px; }
.project-links a {
    text-decoration: none; background-color: var(--accent);
    color: white; padding: 8px 12px; border-radius: 5px;
    font-weight: 500; transition: 0.3s; text-align: center; flex: 1;
}
.project-links a:hover { opacity: 0.9; transform: translateY(-2px); }

/* See More Button */
.see-more { display: block; max-width: 200px; margin: 30px auto 0 auto; text-align: center; text-decoration: none; background-color: #ff7f7f; color: white; padding: 10px 20px; border-radius: 6px; font-weight: 500; transition: 0.3s; }
.see-more:hover { opacity: 0.9; transform: translateY(-2px); }

/* ===== Modal Styling ===== */
.modal {
    display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%;
    overflow: auto; background-color: rgba(0,0,0,0.7); padding-top: 20px;
}
.modal-content {
    background-color: #fff; margin: auto; padding: 25px; border-radius: 15px;
    max-width: 900px; max-height: 90vh; overflow-y: auto; position: relative;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}
body.dark .modal-content { background-color: #2e2e2e; color: #ddd; }
.modal-content img { width: 100%; border-radius: 12px; margin-bottom: 20px; }

/* Close Button */
.close-modal {
    position: fixed; top: 20px; right: 25px; font-size: 30px; font-weight: bold;
    cursor: pointer; color: #aaa; background: rgba(255,255,255,0.15); width: 40px; height: 40px; text-align: center; line-height:40px; border-radius:50%;
    z-index: 10;
}
.close-modal:hover { color: var(--accent); background: rgba(255,255,255,0.25); }
body.dark .close-modal { color: #ddd; background: rgba(0,0,0,0.3); }

/* Tabs inside modal */
.tab { overflow: hidden; border-bottom: 1px solid #ccc; margin-bottom: 15px; }
.tab button {
    background-color: inherit; float: left; border: none; outline: none; cursor: pointer;
    padding: 12px 25px; transition: 0.3s; font-weight: 500;
}
.tab button:hover { background-color: #ddd; }
.tab button.active { border-bottom: 3px solid var(--accent); font-weight: bold; }
.tabcontent { display: none; padding: 15px 10px; background: #f9f9f9; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
body.dark .tabcontent { background: #3a3a3a; }

/* Section headers inside modals */
.tabcontent h4 { color: var(--accent); font-size: 1.1em; margin-top: 10px; margin-bottom: 5px; display:flex; align-items:center; gap:5px; }
.tabcontent ul li { margin-bottom: 8px; }

/* Responsive */
@media (max-width: 768px) { .projects-container { grid-template-columns: 1fr; } .project-card { min-height: auto; } }
</style>

<h2 style="color:var(--accent); text-align:center;">Featured Projects</h2>
<p style="text-align:center; max-width:700px; margin:10px auto 30px auto; font-size:1.1em; color:#555;">Key projects demonstrating skills in software, automation, and embedded systems.</p>

<div class="projects-container" id="initial-projects">
    {{-- PRESENCE --}}
    <div class="project-card">
        <img src="{{ asset('images/presence.jpg') }}" alt="PRESENCE">
        <div class="project-card-content">
            <div>
                <h3>💡 PRESENCE: Smart Appliance Controller</h3>
                <p class="tagline">Automating home energy usage intelligently with presence detection.</p>
                <p class="description">Detects human presence using OpenCV and controls appliances automatically.</p>
                <div class="tech-icons"><span>🐍 Python</span><span>🖥️ Tkinter</span><span>📷 OpenCV</span></div>
            </div>
            <div class="project-links">
                <a class="open-modal" data-modal="modal-presence">View Details</a>
                <a href="https://github.com/kelleeerrrr/PRESENCE-PROJECT" target="_blank">GitHub</a>
            </div>
        </div>
    </div>

    {{-- APAC --}}
    <div class="project-card">
        <img src="{{ asset('images/apac.jpg') }}" alt="APAC">
        <div class="project-card-content">
            <div>
                <h3>🚦 APAC: Arduino Pedestrian & Crosswalk Lights</h3>
                <p class="tagline">Smart traffic management system to improve pedestrian safety.</p>
                <p class="description">Uses Arduino and sensors to automate crosswalk signals, monitoring pedestrian flow.</p>
                <div class="tech-icons"><span>⚡ Arduino</span><span>📡 Sensors</span><span>C/C++</span></div>
            </div>
            <div class="project-links">
                <a class="open-modal" data-modal="modal-apac">View Details</a>
                <a href="https://github.com/kelleeerrrr/OOP-Final-Project" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
</div>

<a href="#" class="see-more" id="see-more">See All Projects →</a>

{{-- ===== Additional Projects (hidden initially) ===== --}}
<div class="projects-container" id="additional-projects" style="display:none;">
    {{-- KAPITBAYAN --}}
    <div class="project-card">
        <img src="{{ asset('images/kapitbayan.jpg') }}" alt="KapitBayan">
        <div class="project-card-content">
            <div>
                <h3>🏢 KAPITBAYAN: Disaster Assistance Request & Mapping System</h3>
                <p class="tagline">Web-based platform for disaster request coordination and mapping.</p>
                <p class="description">Streamlines disaster assistance coordination, improves accessibility, and enhances operational efficiency.</p>
                <div class="tech-icons"><span>💻 PHP & Laravel</span><span>🗺️ Leaflet.js</span><span>🖥️ PostgreSQL</span></div>
            </div>
            <div class="project-links">
                <a class="open-modal" data-modal="modal-kapitbayan">View Details</a>
                <a href="https://github.com/paulalcaraz0/Final-Project-Web-System/tree/admin" target="_blank">GitHub</a>
            </div>
        </div>
    </div>

    {{-- StudyMate+ --}}
    <div class="project-card">
        <img src="{{ asset('images/studymate.jpg') }}" alt="StudyMate+">
        <div class="project-card-content">
            <div>
                <h3>📱 StudyMate+: Productivity & Study Management App</h3>
                <p class="tagline">Helps students plan, organize, and manage their study sessions effectively.</p>
                <p class="description">Mobile app that tracks tasks, deadlines, and study sessions with Firebase backend.</p>
                <div class="tech-icons"><span>📱 Flutter</span><span>🔥 Firebase</span><span>💾 Firestore</span></div>
            </div>
            <div class="project-links">
                <a class="open-modal" data-modal="modal-studymate">View Details</a>
                <a href="https://github.com/kelleeerrrr/STUDY-MATE" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
</div>

{{-- ===== Modals ===== --}}
@foreach(['presence','apac','kapitbayan','studymate'] as $project)
<div id="modal-{{ $project }}" class="modal">
    <span class="close-modal">&times;</span>
    <div class="modal-content">
        <img src="{{ asset('images/'.$project.'.jpg') }}" alt="{{ strtoupper($project) }}">
        <h3 style="color:var(--accent); margin-bottom:15px;">{{ strtoupper($project) }} Project Details</h3>

        <div class="tab">
            <button class="tablinks active" data-tab="desc-{{ $project }}">📝 Description</button>
            <button class="tablinks" data-tab="tech-{{ $project }}">💻 Tech & Tools</button>
            <button class="tablinks" data-tab="scope-{{ $project }}">🎯 Scope/Objectives</button>
        </div>

        <div id="desc-{{ $project }}" class="tabcontent" style="display:block;">
            @if($project=='presence')
            <h4>💡 Overview</h4>
            <p>Simulates an intelligent appliance controller that automatically manages lights and devices based on detected human presence. It monitors real-time activity to minimize energy waste, triggers automated power control, and generates usage insights through logs and summaries. The system also includes administrative tools for manual overrides, feature configuration, and activity tracking. Designed to enhance convenience and promote energy-efficient practices in homes or small office environments.</p>
            @elseif($project=='apac')
            <h4>💡 Overview</h4>
            <p>An Arduino-based pedestrian and crosswalk lighting system designed to improve safety in school zones and high-traffic areas. It features push-button activation that triggers synchronized pedestrian signals, illuminated road studs, and enhanced visibility indicators to guide both walkers and drivers. The system boosts awareness during nighttime or low-light conditions and promotes safer, more orderly street crossings through affordable, low-power, and easily deployable hardware.</p>
            @elseif($project=='kapitbayan')
            <h4>💡 Overview</h4>
            <p>KapitBayan is a web-based platform for disaster assistance requests and real-time incident mapping, enabling faster and more organized emergency response. Public users can easily submit help requests, upload verification materials, and monitor the status of their reports. Meanwhile, administrators can review, approve, or reject requests, visualize affected areas through an interactive map, and track operational analytics to support decision-making. By streamlining communication and coordination between communities and local authorities, KapitBayan enhances disaster response efficiency and promotes a more resilient, well-informed community.</p>
            @elseif($project=='studymate')
            <h4>💡 Overview</h4>
            <p>StudyMate+ is a mobile app designed to help students manage academic tasks, organize deadlines, and plan study sessions more effectively. It offers intuitive productivity tools such as task scheduling, reminders, and progress tracking, all backed by secure user authentication and real-time database synchronization. By centralizing academic responsibilities in one accessible platform, StudyMate+ supports better time management, reduces missed deadlines, and helps students stay focused and organized throughout their studies.</p>
            @endif
        </div>

        <div id="tech-{{ $project }}" class="tabcontent">
            @if($project=='presence')
            <h4>🛠️ Tools & Libraries</h4>
            <ul>
                <li>Python</li>
                <li>Tkinter (GUI)</li>
                <li>OpenCV (Face & Motion Detection)</li>
                <li>Matplotlib (Graphs & Visuals)</li>
            </ul>
            @elseif($project=='apac')
            <h4>🛠️ Tools & Libraries</h4>
            <ul>
                <li>Arduino UNO</li>
                <li>LEDs, Push-button, Sensors</li>
                <li>C/C++ Programming</li>
            </ul>
            @elseif($project=='kapitbayan')
            <h4>🛠️ Tools & Technologies</h4>
            <ul>
                <li>PHP & Laravel Framework</li>
                <li>Laravel Blade (Front-end)</li>
                <li>PostgreSQL (Database)</li>
                <li>Leaflet.js (Mapping)</li>
                <li>Firebase (Real-time sync)</li>
            </ul>
            @elseif($project=='studymate')
            <h4>🛠️ Tools & Technologies</h4>
            <ul>
                <li>Flutter (Mobile App UI)</li>
                <li>Firebase Authentication</li>
                <li>Firestore Database</li>
                <li>Dart Programming</li>
            </ul>
            @endif
        </div>

        <div id="scope-{{ $project }}" class="tabcontent">
            @if($project=='presence')
            <h4>🎯 Scope & Limitations</h4>
            <ul>
                <li>Simulation only; no real appliances connected.</li>
                <li>Logs energy usage for analysis.</li>
                <li>Manual admin override available.</li>
                <li>Future: IR/thermal sensors for low-light conditions.</li>
            </ul>
            @elseif($project=='apac')
            <h4>🎯 Scope & Limitations</h4>
            <ul>
                <li>Prototype stage; LED lights + push-button only.</li>
                <li>Focuses on pedestrian safety & visibility.</li>
                <li>Single power source; Arduino processing limits.</li>
            </ul>
            @elseif($project=='kapitbayan')
            <h4>🎯 Scope & Limitations</h4>
            <ul>
                <li>Web-based disaster assistance request platform.</li>
                <li>Admins manage verification and analytics.</li>
                <li>Real-time mapping and request tracking.</li>
                <li>Full-scale deployment may require government collaboration.</li>
            </ul>
            @elseif($project=='studymate')
            <h4>🎯 Scope & Limitations</h4>
            <ul>
                <li>Supports task/study management for students.</li>
                <li>Secure user authentication via Firebase.</li>
                <li>Real-time data sync with Firestore.</li>
                <li>Mobile app only; future web version possible.</li>
            </ul>
            @endif
        </div>
    </div>
</div>
@endforeach

<script>
// Modal open/close
document.querySelectorAll('.open-modal').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById(btn.dataset.modal).style.display = 'block';
    });
});
document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', () => btn.closest('.modal').style.display = 'none');
});
window.onclick = event => { if(event.target.classList.contains('modal')) event.target.style.display='none'; };

// See More
document.getElementById('see-more').addEventListener('click', e => {
    e.preventDefault();
    document.getElementById('additional-projects').style.display='grid';
    e.target.style.display='none';
});

// Tabs
document.querySelectorAll('.tab button').forEach(btn => {
    btn.addEventListener('click', function() {
        const tabContainer = this.closest('.modal-content');
        tabContainer.querySelectorAll('.tabcontent').forEach(c => c.style.display='none');
        tabContainer.querySelectorAll('.tab button').forEach(b => b.classList.remove('active'));
        document.getElementById(this.dataset.tab).style.display = 'block';
        this.classList.add('active');
    });
});
</script>
@endsection
