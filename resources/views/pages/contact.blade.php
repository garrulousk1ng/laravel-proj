@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="noscroll">
        <div class="centered-layout" data-aos="fade-up">
            <div class="container" style="max-width: 600px;">
                <h1 style="margin-bottom: 20px;">Contact Me</h1>

                <div class="contact-info" style="margin-bottom: 30px;">
                    <p><strong>Email:</strong> <a href="">sample@email.com</a></p>
                    <p><strong>LinkedIn:</strong> <a href="" target="_blank">linkedin.com/in/sample</a></p>
                    <p><strong>GitHub:</strong> <a href="" target="_blank">github.com/sample</a></p>
                </div>

                <div class="contact-form">
                    <form>
                        <label>Name:</label>
                        <input type="text" placeholder="Your Name" required>
                        <label>Email:</label>
                        <input type="email" placeholder="Your Email" required>
                        <label>Message:</label>
                        <textarea rows="6" placeholder="Your Message" required></textarea>
                        <button type="submit" disabled>Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
