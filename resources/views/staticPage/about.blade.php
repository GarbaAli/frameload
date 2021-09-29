
@extends('layouts.menu_footer')
@section('title', 'Forum')
@section('content')

 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/frameload/nous.jpg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>À-propos </span></p>
       <h1 class="mb-0 bread">À propos</h1>
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
       <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('images/frameload/1.jpg') }}');">
       </div>
       <div class="img-2 d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('images/frameload/2.jpg') }}');">
       </div>
     </div>
   </div>
   <div class="col-md-6 pl-md-5 py-5">
    <div class="row justify-content-start pb-3">
      <div class="col-md-12 heading-section ftco-animate">
       <h2 class="mb-4">Qui sommes nous ?</h2>
       <p style="text-align: justify;">FRAMELOAD (Cadre de Téléchargement) est une startup novatrice dans le secteur des nouvelles technologies Camerounaise, sur internet. le but est de répondre aux préoccupations des élèves, et des étudiants qui cherchent des anciens sujets d’examens, des anciens rapports de stage en ligne, des corrigés de sujets quelconques des tutos de formations et autres afin de les acompagnés tout au long de leur cursus académique.</p>
       <p><a href="contact.htlm" class="btn btn-primary">Prenez contact avec nous</a></p>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</section>

<section class="ftco-section services-section" style="margin-top: -200px;">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
       <div class="w-100 mb-4 mb-md-0">
        <span class="subheading">BIENVENU CHEZ FRAMELOAD</span>
        <h2 class="mb-4">Notre mission</h2>
        <p style="text-align: justify;">Mettre à la disposition des élèves et étudiants tous types de documents nécessaire à l’apprentissage tels que : les épreuves de tous types anciens et nouveaux, avec corrigés ; des rapports de stages avec PowerPoint ; des tutos de formations en ligne ; des livres électroniques etc.</p>
        <div class="d-flex video-image align-items-center mt-md-4">
          <a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image:  url('{{ asset('images/frameload/video.jpg') }}');">
           <span class="fa fa-play-circle"></span>
         </a>
         <h4 class="ml-4">FRAMELOAD en Vidéo</h4>
       </div>
     </div>
   </div>
   <div class="col-md-6">
     <div class="row">
      <div class="col-md-12 col-lg-12 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Notre histoire</h3>
            <p style="text-align: justify;">Tout démarre en novembre 2019, que le concept FRAMELOAD voit le jour. Dans un club informatique GL, ils ont décidés de créer une application qui sera au profit des étudiants. </p>
          </div>
        </div>      
      </div>
      <div class="col-md-12 col-lg-12 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon icon-4 d-flex align-items-center justify-content-center"><span class="flaticon-browser"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Notre vision</h3>
            <p style="text-align: justify;">Le but est dans un prémier temps de conquérir tout apprenants camerounais et par la suite etre leader du marché africain ou a l'occident.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</div>
</div>
</section>



<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
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


<section class="ftco-section testimony-section bg-light">
 <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
 <div class="container">
  <div class="row pb-4">
    <div class="col-md-7 heading-section ftco-animate">
     <span class="subheading">TÉMOIGNAGE</span>
     <h2 class="mb-4">Que disent les étudiants</h2>
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
             <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
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
         <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
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
     <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
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
     <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
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
     <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
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
@endsection