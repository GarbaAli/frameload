@extends('layouts.menu_footer')
@section('title', $souscategorie->libelle)
@section('content')
@section('css_forum')

<style>
    .bg-purple:hover{
    border:1px solid #4681ee;
    color:white;
    }
    .topicshow:hover{
      border-left:3px solid #4681ee;
      color:#4681ee;
    }

    
</style>

@endsection

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ $souscategorie->getImage() }}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <h1 class="mb-0 bread">{{ $souscategorie->libelle }}</h1>
       </div>
     </div>
   </div>
  </section>

<main class="container">
    <div class="d-flex justify-content-between p-3 my-3 text-black bg-purple rounded shadow-sm">
      <div>
        <img class="me-3" src="{{ $souscategorie->getImage() }}"  alt="" width="48" height="38">
        <div class="lh-1">
          <h1 class="h3 mb-0 text-black lh-1">{{ $souscategorie->libelle }}</h1>
        </div>
      </div>

     @auth
     <div>
      <a class="btn btn-outline-primary btn-sm" href="{{ route('topics.create', $souscategorie) }}"><i class="fa fa-plus"> Creer un Topic</i></a>
    </div>
     @else
     <div>
      <a class="btn btn-outline-primary" href="{{ route('login') }}"><i class="fa fa-plus"> Connectez-vous pour Creer un Topic</i></a>
    </div>
     @endauth
    </div>
  
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h6 class="border-bottom pb-2 mb-0">Liste des Topics</h6>
      @forelse ($souscategorie->topics as $topic)
      <div class="d-flex justify-content-between text-muted pt-3">
       <a class="topicshow" href="{{ route('topics.show', ['souscategorie'=>$souscategorie, 'topic'=>$topic]) }}">
          <div>
            <img src="{{ $topic->user->profile->getImage() }}" class="rounded-circle" style="width: 50px; height:50px" alt="">
            <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">{{ $topic->user->name }}</strong>
            <span style="font-size: 18px; color:#000000">{{ $topic->title }}</span><br>{{ $topic->parseDate($topic->created_at->format('d-m-y')) }}
            </p>
        </div>
       </a>
        <div>
            <span>20 Messages</span>
            
            <div class="d-flex justify-content-between">
              <a class="btn btn-outline-success" href="{{ route('topics.edit',['souscategorie'=>$souscategorie, 'topic'=>$topic]) }}"><i class="fa fa-edit"></i></a>
              {{-- @can('delete', $topic) --}}
              <form action="{{ route('topics.destroy', ['souscategorie'=>$souscategorie, 'topic'=>$topic]) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
              </form>
              {{-- @endcan --}}
            </div>
            
           
        </div>
      </div>
      @empty
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        Aucun Topic Pour cette Sous-categorie
      </div>
      @endforelse
    

      <div class="row mt-5">
        <div class="col">
            <div class="block-27">
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>
    </div>
    </div>
  </main>

@endsection