@extends('layouts.front-app')
@section('content')
<div class="cv-main-wrapper">
    @include('pages.breadcrumb')
    <div class="cv-conatact spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div id="c-l" class="col-lg-4">
                    <div class="cv-contact-detail">
                        <h2 class="cv-sidebar-title">Contact Info</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        <ul>
                            <li>
                                <div class="cv-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 513.64 513.64">
                                        <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                                        c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                                        c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                                        l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
                                    </svg>
                                </div>  
                                <div class="cv-contact-text">
                                    <h3>Contact</h3>
                                    <p><a href="#">{{$setting->contact_no}}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="cv-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M10.688,95.156C80.958,154.667,204.26,259.365,240.5,292.01c4.865,4.406,10.083,6.646,15.5,6.646
                                            c5.406,0,10.615-2.219,15.469-6.604c36.271-32.677,159.573-137.385,229.844-196.896c4.375-3.698,5.042-10.198,1.5-14.719
                                            C494.625,69.99,482.417,64,469.333,64H42.667c-13.083,0-25.292,5.99-33.479,16.438C5.646,84.958,6.313,91.458,10.688,95.156z"></path>
                                        <path d="M505.813,127.406c-3.781-1.76-8.229-1.146-11.375,1.542c-46.021,39.01-106.656,90.552-152.385,129.885
                                            c-2.406,2.063-3.76,5.094-3.708,8.271c0.052,3.167,1.521,6.156,4,8.135c42.49,34.031,106.521,80.844,152.76,114.115
                                            c1.844,1.333,4.031,2.01,6.229,2.01c1.667,0,3.333-0.385,4.865-1.177c3.563-1.823,5.802-5.49,5.802-9.49V137.083
                                            C512,132.927,509.583,129.146,505.813,127.406z"></path>
                                        <path d="M16.896,389.354c46.25-33.271,110.292-80.083,152.771-114.115c2.479-1.979,3.948-4.969,4-8.135
                                            c0.052-3.177-1.302-6.208-3.708-8.271C124.229,219.5,63.583,167.958,17.563,128.948c-3.167-2.688-7.625-3.281-11.375-1.542
                                            C2.417,129.146,0,132.927,0,137.083v243.615c0,4,2.24,7.667,5.802,9.49c1.531,0.792,3.198,1.177,4.865,1.177
                                            C12.865,391.365,15.052,390.688,16.896,389.354z"></path>
                                        <path d="M498.927,418.375c-44.656-31.948-126.917-91.51-176.021-131.365c-4-3.26-9.792-3.156-13.729,0.24
                                            c-9.635,8.406-17.698,15.49-23.417,20.635c-17.563,15.854-41.938,15.854-59.542-0.021c-5.698-5.135-13.76-12.24-23.396-20.615
                                            c-3.906-3.417-9.708-3.521-13.719-0.24c-48.938,39.719-131.292,99.354-176.021,131.365c-2.49,1.792-4.094,4.552-4.406,7.604
                                            c-0.302,3.052,0.708,6.083,2.802,8.333C19.552,443.01,30.927,448,42.667,448h426.667c11.74,0,23.104-4.99,31.198-13.688
                                            c2.083-2.24,3.104-5.271,2.802-8.323C503.021,422.938,501.417,420.167,498.927,418.375z"></path>
                                    </svg>
                                </div>  
                                <div class="cv-contact-text">
                                    <h3>Email</h3>
                                    <p>{{$setting->email}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="cv-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5
                                        c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021
                                        C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333
                                        s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z"></path>
                                    </svg>
                                </div>  
                                <div class="cv-contact-text">
                                    <h3>Location</h3>
                                    <p>{{$setting->address}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="c-r" class="col-lg-8">
                    <div class="cv-contact-form">
                        <h2 class="cv-sidebar-title">Send Your Regards</h2>
                        <form>
                            <input type="text" placeholder="Enater your name" name="full_name" id="full_name" class="require"/>
                            <input type="text"  placeholder="Enter your email" name="email" id="email" class="require" data-valid="email" data-error="Email should be valid."/>
                            <input type="text"  placeholder="Enter your subject" name="subject" id="subject" class="require"/>
                            <textarea placeholder="Message here" name="message" id="message" class="require"></textarea>
                            <button type="button" class="cv-btn submitForm">submit</button>
                            <div class="response"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- conatact end -->
    <!-- iframe start -->

    <div id="map-l" class="cv-contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3530.7907525040914!2d85.29862711246379!3d27.754599328863574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1f32faa66423%3A0x35e46aa95b1a82d9!2zQmFuZ2FsYW11a2hpIFRlbXBsZSDgpKzgpJfgpLLgpL7gpK7gpYHgpJbgpYAg4KSu4KSo4KWN4KSm4KS_4KSw!5e0!3m2!1sen!2snp!4v1631617756802!5m2!1sen!2snp" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
@endsection