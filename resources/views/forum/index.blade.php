@extends('layouts.menu_footer')
@section('title', 'Forum')
@section('content')
@section('css_forum')
<style>
  .souscat :hover {
  background-color: #4196f7;
}

.souscat{
  border: 1px solid silver;
}
.card :hover {
  background-color: #030d18;
  color:white;
}

.tags{
  width: 100%;
}
.tags :hover{
  background-color: #4196f7;
  color:white;
}
</style>
@endsection
<section class="hero-wrap hero-wrap-2" style="background-image: url('index/images/bg_3.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>Forum <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">Forum</h1>
       </div>
     </div>
   </div>
  </section>

<!-- Team -->
<section id="team" class="pb-5 mt-20">
    <div class="container">
        <span class="subheading" style="color: rgb(15, 153, 233)">Liste des Categories</span>
        <div class="sidebar-box bg-white ftco-animate">
          <form class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input id="topicname" type="text" style="border: 1px solid rgb(15, 153, 233)" class="form-control" placeholder="Rechercher un Topic...">
            </div>
            {{ csrf_field() }}
          </form>
          <div style="width: 100%" id="topiclist"></div>
        </div>
        @foreach ($categories as $categorie )
          <h2 class="mb-4">{{ $categorie->libelle }}</h2>
          <div class="row">
              <!-- sous-categories -->
           @forelse ($categorie->sousCategories as $souscategorie )
              <div class="col-xs-12 col-sm-6 col-md-4 mt-10 ">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                          <a  href="{{ route('forum.show', $souscategorie) }}">
                            <div style="border-bottom: none" class="souscat" class="card">
                                <div  style="border-bottom: none" class="card-body d-flex justify-content-between">
                                  <img class=" img-fluid ml-10" src="{{ $souscategorie->getImage() }}" style="width:50px; height:50px" alt="card image">
                                <h4 class="card-title">{{ $souscategorie->libelle }}</h4>
                              </div>
                            </div>
                          </a>
                          {{-- Dernier Topic --}}
                          <a href="#">
                            <div class="card" style="margin-bottom: 15px">
                                  <div class="card-body text-center mt-4">
                                    <p class="card-text" style="text-align: left">
                                      <strong style="text-decoration:underline">Dernier Topic:</strong>
                                      {{ $souscategorie->topics()->count() == 0 ? 'Aucun Topic': $souscategorie->topics()->latest()->limit(1)->value('title') }}
                                    </p>
                                </div>
                            </div>
                          </a>
                    </div>
                </div>
            </div>
           @empty
             <img src="{{ asset('images/erreurs/erreurForum.jpg') }}" class="img-fluid" style="width: 300px" alt="">
           @endforelse
          </div><hr>
        @endforeach
        

    </div>
</section>
      
  @endsection
@section('ajax')
<script>
  $(document).ready(function(){
    $('#topicname').keyup(function(){
      var query = $(this).val();
      if(query != '')
      {
        var _token = $('input[name="_token"]').val();
        $.ajax({
                type: "POST",
                url:"{{ route('search.fetch') }}",
                data: {query:query, _token:_token},
                success:function(data){
                  $('#topiclist').fadeIn();
                  $('#topiclist').html(data);
                }
              
        });
      }
    });

  });
</script>
@endsection