@extends('layout')

@section('title', 'Contact | Irish Rivera')

@section('content')
<style>
    h2 { color: var(--accent); margin-top: -20px; margin-bottom: 10px; }
    p { margin-bottom: 20px; font-size: 1.1em; }

    /* Form & Layout */
    .contact-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-top: 20px;
        justify-content: space-between;
    }
    form.contact-form {
        flex: 1 1 45%;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        position: relative;
    }
    .input-icon { position: relative; }
    .input-icon input,
    .input-icon textarea {
        width: 91.5%;
        padding: 12px 12px 12px 35px;
        border-radius: 5px;
        border: 1px solid #ccc;
        transition: 0.3s;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }
    .input-icon textarea { padding-left: 35px; }
    .input-icon i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #888;
        font-size: 1.1em;
    }
    input:focus, textarea:focus {
        outline: 2px solid var(--accent);
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }
    button.back-btn {
        background-color: var(--accent);
        color: #fff;
        padding: 12px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    button.back-btn:hover {
        opacity: 0.95;
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Success / Error Messages */
    .message {
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 15px;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
    .message.success { background-color: #2ecc71; color: white; }
    .message.error { background-color: #e74c3c; color: white; }

    /* Social Links */
    .contact-info { 
        flex: 1 1 40%; 
        min-width: 300px; 
        align-self: flex-start; 
        margin-left: auto; /* push to the right */
    }
    .contact-info h3 { margin-bottom: 10px; }
    .contact-info ul { list-style: none; padding: 0; font-size: 1.1em; }
    .contact-info ul li { margin-bottom: 12px; }
    .contact-info ul li a { text-decoration: none; color: var(--accent); transition: 0.3s; }
    .contact-info ul li a:hover { color: #333; }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-container { flex-direction: column; }
        .contact-info { margin-left: 0; margin-top: 20px; }
    }
</style>

<h2>Get In Touch</h2>
<p>Let’s collaborate or connect! I’d love to hear from you.</p>

<div class="contact-container">
    {{-- Contact Form --}}
    <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
        @csrf
        @once
        @endonce

        @if($errors->any())
            <div class="message error">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-icon"><i>👤</i><input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"></div>
        <div class="input-icon"><i>✉️</i><input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}"></div>
        <div class="input-icon"><textarea name="message" placeholder="📝Your Message" rows="6">{{ old('message') }}</textarea></div>
        <button type="submit" class="back-btn">Send Message</button>
    </form>

    {{-- Social / Contact Info --}}
    <div class="contact-info">
        <h3>Social Links</h3>
        <ul>
            <li>📧 <a href="mailto:23-00679@g.batstate-u.edu.ph">Email: 23-00679@g.batstate-u.edu.ph</a></li>
            <li>💼 <a href="https://www.linkedin.com/in/irishrivera" target="_blank">LinkedIn: irishrivera.linkin</a></li>
            <li>🐙 <a href="https://github.com/kelleeerrrr" target="_blank">GitHub: github.com/kelleeerrrr</a></li>
        </ul>
    </div>
</div>
@endsection
