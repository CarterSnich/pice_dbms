@extends('layouts.public_layout')

@section('title', 'Contact Us | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        #contact-wrapper {
            display: grid;
            grid-template-columns: 2fr 4fr;
            padding: 5.25rem 3.25rem;
            gap: 3.25rem;
        }

        #contact-wrapper>.right {
            display: flex;
            justify-content: center
        }

        .left>.contact-details>h2 {
            margin-top: 0;
        }

        .left>.contact-details>p {
            margin-bottom: .5rem;
        }

        .left>.map {
            padding: 0.25rem;
            background-color: #f8fafc;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .left>.map>iframe {
            display: block
        }

        .right>form>div {
            margin-bottom: .5rem;
        }
    </style>
@endsection

@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/CONTACT-1536x240.png') }}" alt="">
    </div>

    <div id="contact-wrapper">
        <div class="left">
            <div class="contact-details">
                <h2>Get In Contact With Us</h2>
                <p class="address">6282+PV6, Calanipawan Rd, Fatima Village, Tacloban City, Leyte</p>
                <p class="telephone">Telephone: <a href="tel:" target="_blank">000-000-0000</a></p>
                <p class="mobile">Mobile: <a href="tel:09123456789" target="_blank">0912-345-6789</a></p>
                <p class="email">E-mail: <a href="mailto:picenational@pice.org.ph" target="_blank">picenational@pice.org.ph</a></p>
                <p class="social-fb">Facebook: <a href="https://web.facebook.com/pice.natl/" target="_blank">@picemetrotacloban</a></p>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1696.9116921019327!2d125.00123814218902!3d11.217340027908877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9faf13fdd1422c8b!2sPhilippine%20Institute%20Of%20Civil%20Engineers%20Metro%20Tacloban%20Chapter%20Office!5e1!3m2!1sen!2sph!4v1659061824415!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="right">
            <form action="">
                @csrf
                {{-- name --}}
                <div>
                    <label for="name">Your name</label>
                    <input type="text" name="name" id="name">
                </div>
                {{-- email --}}
                <div>
                    <label for="email">Your email</label>
                    <input type="text" name="email" id="email">
                </div>
                {{-- subject --}}
                <div>
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject">
                </div>
                {{-- message --}}
                <div>
                    <label for="message">Your message (optional)</label>
                    <textarea name="message" id="message" cols="30" rows="8"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
