@extends('layouts.app')

@section('content')
    <header>
        @include('components.navbar_specific')
    </header>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- Page Content -->
    <div class="page-heading contact-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>@lang('messages.CONTACT_US')</h4>
                        <h2>@lang('messages.LETS_GET_IN_TOUCH')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="find-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>@lang('messages.OUR_LOCATION_ON_MAPS')</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- How to change your own map point
                                                                                                                                                                                                                                                                                                                                                                                             1. Go to Google Maps
                                                                                                                                                                                                                                                                                                                                                                                             2. Click on your location point
                                                                                                                                                                                                                                                                                                                                                                                             3. Click "Share" and choose "Embed map" tab
                                                                                                                                                                                                                                                                                                                                                                                             4. Copy only URL and paste it within the src="" field below
                                                                                                                                                                                                                                                                                                                                                                                            -->
                    <div id="map">
                        <iframe
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="left-content">
                        <h4>About our office</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester
                            consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic
                            elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>@lang('messages.SEND_US_A_MESSAGE')</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        @if (session('success'))
                            <div id="message" class="alert alert-success">
                                {{-- {{ session('success') }} --}}
                                @php
                                    $word = session('success');
                                @endphp
                                @lang("messages.$word")
                            </div>
                        @endif
                        <form id="contact" action="{{ route('StoreMessage') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid  @enderror" id="name"
                                            placeholder="Full Name" required value="{{ old('name') }}">
                                    </fieldset>
                                    @error('name')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text"
                                            class="form-control @error('email') is-invalid  @enderror" id="email"
                                            placeholder="E-Mail Address" required value="{{ old('email') }}">
                                    </fieldset>
                                    @error('email')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text"
                                            class="form-control @error('subject') is-invalid  @enderror" id="subject"
                                            placeholder="Subject" required value="{{ old('subject') }}">
                                    </fieldset>
                                    @error('subject')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control @error('message') is-invalid  @enderror" id="message"
                                            placeholder="Your Message" required value="{{ old('message') }}"></textarea>
                                    </fieldset>
                                    @error('message')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit"
                                            class="filled-button">@lang('messages.SEND_MESSAGE')</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="accordion">
                        <li>
                            <a>Accordion Title One</a>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester
                                    consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur
                                    adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti
                                    elite.</p>
                            </div>
                        </li>
                        <li>
                            <a>Second Title Here</a>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester
                                    consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur
                                    adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti
                                    elite.</p>
                            </div>
                        </li>
                        <li>
                            <a>Accordion Title Three</a>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester
                                    consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur
                                    adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti
                                    elite.</p>
                            </div>
                        </li>
                        <li>
                            <a>Fourth Accordion Title</a>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester
                                    consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur
                                    adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti
                                    elite.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>@lang('messages.OUR_HAPPY_CUSTOMERS')</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-clients owl-carousel">
                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="1">
                        </div>

                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="2">
                        </div>

                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="3">
                        </div>

                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="4">
                        </div>

                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="5">
                        </div>

                        <div class="client-item">
                            <img src="assets/images/client-01.png" alt="6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('components.footer')
@endsection
