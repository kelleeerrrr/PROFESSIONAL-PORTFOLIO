@extends('layout')

@section('title', 'About | Irish Rivera')

@section('content')
<style>
    /* Main container */
    .container {
        max-width: 1000px;
        margin-top: -30px;
        margin: -30px auto -15px auto;
        background: #ffffff;
        padding: 35px 40px; /* compact padding */
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
        transition: background 0.4s, box-shadow 0.3s;
    }

    body.dark .container {
        background: #2e2e2e;
        box-shadow: 0 0 20px rgba(255,255,255,0.05);
    }

    /* Container top gradient bar for aesthetics */
    .container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, var(--accent), #ff7aa2);
    }

    /* Headers */
    h2 {
        color: var(--accent);
        margin-top: -5px;
        margin-bottom: 10px;
        font-size: 2em;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Educational Background Highlight */
    h3.educ-bg {
        display: inline-block;
        background: #ff0073ff; /* pink background */
        color: #ffffff; /* white font */
        padding: 5px 12px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.35em;
        margin-top: 25px;
        margin-bottom: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    h3.educ-bg i {
        margin-right: 6px;
    }

    h3.educ-bg:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
    }

    /* Other headers if needed */
    h3:not(.educ-bg) {
        margin-top: 25px;
        margin-bottom: 8px;
        color: var(--accent);
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 1.35em;
        font-weight: 700;
        border-left: 4px solid var(--accent);
        padding-left: 10px;
    }

    /* Paragraphs */
    p {
        margin-left: 30px;
        margin right 20px;
        max-width: 1000px;
        line-height: 1.6;
        font-size: 1.05em;
        color: #333;
        margin-bottom: 12px;
    }

    body.dark p {
        color: #ddd;
    }

    /* Quote styling */
    .quote {
        font-style: italic;
        color: var(--accent);
        font-size: 1.05em;
        margin-top: 15px;
        margin-bottom: 12px;
        padding-left: 10px;
        border-left: 4px solid var(--accent);
    }

    /* List styles */
    ul {
        list-style: none;
        padding-left: 0;
        margin-top: 10px;
    }

    ul li {
        background: rgba(255, 182, 193, 0.18);
        margin-bottom: 6px;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 1.05em;
        transition: background 0.3s, transform 0.2s;
        cursor: default;
    }

    ul li:hover {
        background: rgba(255, 182, 193, 0.35);
        transform: translateX(4px);
    }

    body.dark ul li {
        background: rgba(255, 255, 255, 0.05);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
            margin: 15px;
        }
        h2 { font-size: 1.85em; }
        h3 { font-size: 1.25em; }
        h3.educ-bg { font-size: 1.25em; padding: 4px 10px; }
    }

</style>

<div class="container">
    <h2><i class="fas fa-user"></i> About Me</h2>

    <p>
        I’m <strong>Irish Rivera</strong>, a passionate student currently pursuing a 
        <strong>Bachelor of Science in Computer Science</strong> at 
        <strong>Batangas State University TNEU – Alangilan Campus</strong>.
        I’m deeply interested in technology, particularly in 
        <strong>Software Engineering</strong>, <strong>Web Development</strong>, and <strong>Cybersecurity</strong>.
        I believe that innovation and creativity can empower people to build a smarter, safer, and more connected digital world.
    </p>

    <p class="quote">“Empowered by curiosity, driven by code.”</p>

    <h3 class="educ-bg"><i class="fas fa-graduation-cap"></i> Educational Background</h3>
    <ul>
        <li>🎓 Batangas State University – TNEU, Alangilan Campus (BSCS, Present)</li>
        <li>🏫 STI College – Batangas (Senior High School, 2023)</li>
        <li>📘 Tinga Itaas Elementary School (Elementary, 2017)</li>
    </ul>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
