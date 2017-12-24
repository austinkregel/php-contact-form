@extends('layouts.app')

@section('content')
<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Challenge</h1>
                    <p class="intro-text">Code Something Awesome.
                        <br>We &lt;3 PHP Developers.</p>
                    <a href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>About This Challenge</h2>
            <p>We make awesome things at Dealer Inspire.  We'd like you to join us.  That's why we made this page.  Are you ready to join the team?</p>
            <p>To take the code challenge, visit <a href="https://bitbucket.org/dealerinspire/php-contact-form">this Git Repo</a> to clone it and start your work.</p>
        </div>
    </div>
</section>

<section id="coffee" class="content-section text-center">
    <div class="download-section">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Coffee Break?</h2>
                <p>Take a coffee break.  You deserve it.</p>
                <a href="https://www.youtube.com/dealerinspire" class="btn btn-default btn-lg">or Watch YouTube</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="container content-section">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Contact Guy Smiley</h2>
            <p class="text-center">Remember Guy Smiley?  Yeah, he wants to hear from you.</p>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <contact-form></contact-form>
        </div>
    </div>
</section>

<!-- Map Section -->
<div id="map"></div>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p><small>Copyright 2017 Dealer Inspire</small></p>
    </div>
</footer>

@endsection