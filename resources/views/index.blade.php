@extends('layouts.menu_footer')

@section('content')
    
<div class="hero-wrap js-fullheight" style="background-image: url('index/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span class="subheading">Bienvenue a Frameload</span>
          <h1 class="mb-4"><strong style="color: #000">FRAMELOAD</strong>, <span style="color: #4986fc">Notre Compagnon academique</span></h1>
          <p class="mb-0"><a href="#" class="btn btn-primary">Notre Contenue</a> <a href="#" class="btn btn-white">Apprendre plus</a></p>
      </div>
  </div>
  </div>
  </div>
  
  {{-- Le formulaire napparais que si user non connecter --}}
  @guest
  <section class="ftco-section ftco-no-pb ftco-no-pt">
     <div class="container">
        <div class="row">
           <div class="col-md-7"></div>
           <div class="col-md-5 order-md-last">
            <div class="login-wrap p-4 p-md-5">
          
                              <!-- Message derreurs -->
                          @if ($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          @endif
                          <!-- Fin message errreurs -->
                      <h3 class="mb-4">Log In Now</h3>
                      <form method="POST" action="{{ route('login') }}" class="signup-form">
                          @csrf
                          <div class="form-group">
                              <label class="label" for="email">Email Address</label>
                              <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="johndoe@gmail.com">
                          </div>
                          <div class="form-group">
                          <label class="label" for="password">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                          </div>
  
                          <div class="custom-control custom-control-alternative custom-checkbox">
                              <input class="custom-control-input"  type="checkbox" name="remember" id=" customCheckLogin" {{ old('remember') ? 'checked' : '' }}>
                              <label class="custom-control-label" for=" customCheckLogin">
                              <span class="text-muted">Souviens-toi de moi</span>
                              </label>
                          </div>
                      
                          <div class="form-group d-flex justify-content-end mt-4">
                              <button type="submit" class="btn btn-primary submit"><span class="fa fa-paper-plane"></span></button>
                          </div>
                  </form>
                  <p class="text-center">Already have an account? <a href="{{ route('register') }}">Sign In</a></p>              
       </div>
   </div>
  </div>
  </div>
  </section>
  @endguest
  
  <section class="ftco-section">
     <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
              <h2 class="mb-4">Browse Online Course Category</h2>
          </div>
      </div>
      <div class="row justify-content-center">
       <div class="col-md-3 col-lg-2">
          <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-1.jpg);">
             <div class="text w-100 text-center">
                <h3>IT &amp; Software</h3>
                <span>100 course</span>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-lg-2">
      <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-9.jpg);">
         <div class="text w-100 text-center">
            <h3>Music</h3>
            <span>100 course</span>
        </div>
    </a>
  </div>
  <div class="col-md-3 col-lg-2">
      <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-3.jpg);">
         <div class="text w-100 text-center">
            <h3>Photography</h3>
            <span>100 course</span>
        </div>
    </a>
  </div>
  <div class="col-md-3 col-lg-2">
      <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-5.jpg);">
         <div class="text w-100 text-center">
            <h3>Marketing</h3>
            <span>100 course</span>
        </div>
    </a>
  </div>
  <div class="col-md-3 col-lg-2">
      <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-8.jpg);">
         <div class="text w-100 text-center">
            <h3>Health</h3>
            <span>100 course</span>
        </div>
    </a>
  </div>
  <div class="col-md-3 col-lg-2">
      <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(index/images/work-6.jpg);">
         <span class="text w-100 text-center">
            <h3>Audio Video</h3>
            <span>100 course</span>
        </span>
    </a>
  </div>
  <div class="col-md-12 text-center mt-5">
      <a href="#" class="btn btn-secondary">See All Courses</a>
  </div>
  </div>
  </div>
  </section>
  
  <section class="ftco-section bg-light">
     <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
              <h2 class="mb-4">Pick Your Course</h2>
          </div>
      </div>
      <div class="row">
         <div class="col-md-4 ftco-animate">
            <div class="project-wrap">
               <a href="#" class="img" style="background-image: url(index/images/work-1.jpg);">
                  <span class="price">Software</span>
              </a>
              <div class="text p-4">
                  <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                  <p class="advisor">Advisor <span>Tony Garret</span></p>
                  <ul class="d-flex justify-content-between">
                     <li><span class="flaticon-shower"></span>2300</li>
                     <li class="price">$199</li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="col-md-4 ftco-animate">
        <div class="project-wrap">
           <a href="#" class="img" style="background-image: url(index/images/work-2.jpg);">
              <span class="price">Software</span>
          </a>
          <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                 <li><span class="flaticon-shower"></span>2300</li>
                 <li class="price">$199</li>
             </ul>
         </div>
     </div>
  </div>
  <div class="col-md-4 ftco-animate">
    <div class="project-wrap">
       <a href="#" class="img" style="background-image: url(index/images/work-3.jpg);">
          <span class="price">Software</span>
      </a>
      <div class="text p-4">
          <h3><a href="#">Design for the web with adobe photoshop</a></h3>
          <p class="advisor">Advisor <span>Tony Garret</span></p>
          <ul class="d-flex justify-content-between">
             <li><span class="flaticon-shower"></span>2300</li>
             <li class="price">$199</li>
         </ul>
     </div>
  </div>
  </div>
  
  <div class="col-md-4 ftco-animate">
    <div class="project-wrap">
       <a href="#" class="img" style="background-image: url(index/images/work-4.jpg);">
          <span class="price">Software</span>
      </a>
      <div class="text p-4">
          <h3><a href="#">Design for the web with adobe photoshop</a></h3>
          <p class="advisor">Advisor <span>Tony Garret</span></p>
          <ul class="d-flex justify-content-between">
             <li><span class="flaticon-shower"></span>2300</li>
             <li class="price">$199</li>
         </ul>
     </div>
  </div>
  </div>
  <div class="col-md-4 ftco-animate">
    <div class="project-wrap">
       <a href="#" class="img" style="background-image: url(index/images/work-5.jpg);">
          <span class="price">Software</span>
      </a>
      <div class="text p-4">
          <h3><a href="#">Design for the web with adobe photoshop</a></h3>
          <p class="advisor">Advisor <span>Tony Garret</span></p>
          <ul class="d-flex justify-content-between">
             <li><span class="flaticon-shower"></span>2300</li>
             <li class="price">$199</li>
         </ul>
     </div>
  </div>
  </div>
  <div class="col-md-4 ftco-animate">
    <div class="project-wrap">
       <a href="#" class="img" style="background-image: url(index/images/work-6.jpg);">
          <span class="price">Software</span>
      </a>
      <div class="text p-4">
          <h3><a href="#">Design for the web with adobe photoshop</a></h3>
          <p class="advisor">Advisor <span>Tony Garret</span></p>
          <ul class="d-flex justify-content-between">
             <li><span class="flaticon-shower"></span>2300</li>
             <li class="price">$199</li>
         </ul>
     </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  
  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(index/images/bg_4.jpg);">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
           <div class="block-18 d-flex align-items-center">
              <div class="icon"><span class="flaticon-online"></span></div>
              <div class="text">
               <strong class="number" data-number="400">0</strong>
               <span>Online Courses</span>
           </div>
       </div>
   </div>
   <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
       <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-graduated"></span></div>
          <div class="text">
           <strong class="number" data-number="4500">0</strong>
           <span>Students Enrolled</span>
       </div>
   </div>
  </div>
  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
   <div class="block-18 d-flex align-items-center">
      <div class="icon"><span class="flaticon-instructor"></span></div>
      <div class="text">
       <strong class="number" data-number="1200">0</strong>
       <span>Experts Instructors</span>
   </div>
  </div>
  </div>
  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
   <div class="block-18 d-flex align-items-center">
      <div class="icon"><span class="flaticon-tools"></span></div>
      <div class="text">
       <strong class="number" data-number="300">0</strong>
       <span>Hours Content</span>
   </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  
  <section class="ftco-section ftco-about img">
     <div class="container">
        <div class="row d-flex">
           <div class="col-md-12 about-intro">
              <div class="row">
                 <div class="col-md-6 d-flex">
                    <div class="d-flex about-wrap">
                       <div class="img d-flex align-items-center justify-content-center" style="background-image:url(index/images/about-1.jpg);">
                       </div>
                       <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url(index/images/about.jpg);">
                       </div>
                   </div>
               </div>
               <div class="col-md-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                       <span class="subheading">Enhanced Your Skills</span>
                       <h2 class="mb-4">Learn Anything You Want Today</h2>
                       <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                       <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                   </div>
               </div>
           </div>
       </div>
   </div>
  </div>
  </div>
  </section>
  
  
  <section class="ftco-section testimony-section bg-light">
     <div class="overlay" style="background-image: url(index/images/bg_2.jpg);"></div>
     <div class="container">
      <div class="row pb-4">
        <div class="col-md-7 heading-section ftco-animate">
           <span class="subheading">Testimonial</span>
           <h2 class="mb-4">What Are Students Says</h2>
       </div>
   </div>
  </div>
  <div class="container container-2">
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                   <p class="star">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                     <div class="user-img" style="background-image: url(index/images/person_1.jpg)"></div>
                     <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
      <div class="testimony-wrap py-4">
        <div class="text">
           <p class="star">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
          </p>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <div class="d-flex align-items-center">
             <div class="user-img" style="background-image: url(index/images/person_2.jpg)"></div>
             <div class="pl-3">
                <p class="name">Roger Scott</p>
                <span class="position">Marketing Manager</span>
            </div>
        </div>
    </div>
  </div>
  </div>
  <div class="item">
      <div class="testimony-wrap py-4">
        <div class="text">
           <p class="star">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
          </p>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <div class="d-flex align-items-center">
             <div class="user-img" style="background-image: url(index/images/person_3.jpg)"></div>
             <div class="pl-3">
                <p class="name">Roger Scott</p>
                <span class="position">Marketing Manager</span>
            </div>
        </div>
    </div>
  </div>
  </div>
  <div class="item">
      <div class="testimony-wrap py-4">
        <div class="text">
           <p class="star">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
          </p>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <div class="d-flex align-items-center">
             <div class="user-img" style="background-image: url(index/images/person_1.jpg)"></div>
             <div class="pl-3">
                <p class="name">Roger Scott</p>
                <span class="position">Marketing Manager</span>
            </div>
        </div>
    </div>
  </div>
  </div>
  <div class="item">
      <div class="testimony-wrap py-4">
        <div class="text">
           <p class="star">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
          </p>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <div class="d-flex align-items-center">
             <div class="user-img" style="background-image: url(index/images/person_2.jpg)"></div>
             <div class="pl-3">
                <p class="name">Roger Scott</p>
                <span class="position">Marketing Manager</span>
            </div>
        </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  
  <section class="ftco-intro ftco-section ftco-no-pb">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 text-center">
            <div class="img"  style="background-image: url(index/images/bg_4.jpg);">
               <div class="overlay"></div>
               <h2>We Are StudyLab An Online Learning Center</h2>
               <p>We can manage your dream building A small river named Duden flows by their place</p>
               <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Enroll Now</a></p>
           </div>
       </div>
   </div>
  </div>
  </section>
  
  <section class="ftco-section services-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
           <div class="w-100 mb-4 mb-md-0">
              <span class="subheading">Welcome to StudyLab</span>
              <h2 class="mb-4">We Are StudyLab An Online Learning Center</h2>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
              <div class="d-flex video-image align-items-center mt-md-4">
                <a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image: url(index/images/about.jpg);">
                   <span class="fa fa-play-circle"></span>
               </a>
               <h4 class="ml-4">Learn anything from StudyLab, Watch video</h4>
           </div>
       </div>
   </div>
   <div class="col-md-6">
       <div class="row">
          <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
            <div class="services">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Quality Content</h3>
                <p>A small river named Duden flows by their place and supplies</p>
            </div>
        </div>      
    </div>
    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon icon-2 d-flex align-items-center justify-content-center"><span class="flaticon-instructor"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Highly Skilled Instructor</h3>
            <p>A small river named Duden flows by their place and supplies</p>
        </div>
    </div>    
  </div>
  <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
    <div class="services">
      <div class="icon icon-3 d-flex align-items-center justify-content-center"><span class="flaticon-quiz"></span></div>
      <div class="media-body">
        <h3 class="heading mb-3">World Class &amp; Quiz</h3>
        <p>A small river named Duden flows by their place and supplies</p>
    </div>
  </div>      
  </div>
  <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
    <div class="services">
      <div class="icon icon-4 d-flex align-items-center justify-content-center"><span class="flaticon-browser"></span></div>
      <div class="media-body">
        <h3 class="heading mb-3">Get Certified</h3>
        <p>A small river named Duden flows by their place and supplies</p>
    </div>
  </div>      
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  
  
  <section class="ftco-section bg-light">
    <div class="container">
       <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
           <span class="subheading">Our Blog</span>
           <h2 class="mb-4">Articles Recents</h2>
       </div>
   </div>
   <div class="row d-flex">
      @forelse($posts as $pt )
      <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
          <a href="blog-single.html" class="block-20" style="background-image: url('storage/posts/{{ $pt->image }}')">
          </a>
          <div class="text d-block">
              <div class="meta">
              <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $pt->created_at->diffForHumans() }}</a>
                  <a href="{{ route('profiles.show', $pt->user->name) }}"><span class="fa fa-user mr-2"></span>{{ $pt->user->name }}</a>
              </p>
          </div>
          <h3 class="heading"><a href="{{ route('blog.show', $pt->title) }}">{{ $pt->title }}</a></h3>
          <p><a href="{{ route('blog.show', $pt->title) }}" class="btn btn-secondary py-2 px-3">Lire Plus</a></p>
      </div>
      </div>
      </div>
      @empty
         <div class="alert alert-info">
          Aucun Article Recents
      </div>
      @endforelse 
          
  
  </div>
  </div>
  </section>
@endsection