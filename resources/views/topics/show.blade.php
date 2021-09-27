@extends('layouts.menu_footer')
@section('title', 'Commentaires')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ $souscategorie->getImage()  }}');height:200px">
    <div class="overlay"></div>
</section>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="col-md-12 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('forum.show', $souscategorie) }}">Topic <i class="fa fa-chevron-right"></i></a></span> <span>{{ $souscategorie->libelle }} <i class="fa fa-chevron-right"></i></span></p>
        </div>
      <div class="row">
        <div class="col-md-8 ftco-animate">
            <h4 style="font-weight: bold" class="mb-3 topic_title">{{ $topic->title }}</h4><hr>
            <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{ $topic->user->profile->getImage() }}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{ $topic->user->name }}</h3>
                    <div class="meta">{{ $topic->created_at->format('d-m-Y') }}</div>
                    <p style="font-size: 12px">{!! $topic->content !!}</p>
                  </div>
                </li>
            </ul>
          
            <div class="pt-5 mt-5">
            <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">0 Comments</h3>
            <ul class="comment-list comments_list">
            
            </ul>
            <!-- END comment-list -->
            
           @auth
                <div class="comment-form-wrap pt-5">
                  <form id="comment_id" class="comment_form">
                      <div class="form-group">
                        <input  type="text" value="" class="comment_input @error('content') is-invalid @enderror" hidden name="content">
                        <div id="content">
                            {{-- {{ old('content') }} --}}
                        </div>
                          {{-- <textarea name="content" class="comment_input comment_textarea form-control" rows="5"></textarea> --}}
                          <span style="color: red" id="errors"></span>
                      </div>
                      <div>
                          <button  class="btn btn-primary comment_button">Poster Votre Commentaire</button>
                      </div>
                  </form><hr>
               </div>
            @else
              <div>
                <a class="btn btn-outline-primary" href="{{ route('login') }}"><i class="fa fa-user"> Connectez-vous pour Creer un Topic</i></a>
              </div>
           @endauth
          </div>
  
        </div> <!-- .col-md-8 -->
        <div style="background-color: rgba(255, 255, 255, 0.685)" class="col-md-4 ftco-animate">
          <strong style="color: black;font-size:18px">Forum</strong><hr>
          <ul>
            @foreach ($categories as $categorie )
            <li>{{ $categorie->libelle }}</li>
              <ul>
                @foreach ($categorie->sousCategories as $souscategorie )
                <li><a href="{{ route('forum.show', $souscategorie) }}">{{ $souscategorie->libelle }}</a></li>
               @endforeach
              </ul>
            @endforeach
            
          </ul>

          <strong style="color: black;font-size:18px">Sujets recents</strong><hr>
          <ul>
            @foreach ($topics as $topi )
            <div class="d-flex justify-content-between">
              <div><i class="fa fa-comment"></i></div>
              <div>
                <li><a style="color: #000" href="{{ route('topics.show', ['souscategorie'=>$souscategorie, 'topic'=>$topi]) }}">{{ $topi->title }}</a> par <strong style="color: #000;font-size:15px">{{ $topi->user->name }}</strong>
                  <img src="{{ $topi->user->profile->getImage() }}" class="rounded-circle" style="width: 25px; height:25px; margin-right:10px" alt="">
                </li>
                <em style="color: rgb(34, 134, 216);font-size:12px"> {{ $topi->parseDate($topi->created_at->format('d-m-y')) }}</em>
              </div>
            </div>
            -------------------------------            
            @endforeach
          </ul>
        </div>
  
      </div>
    </div>
  </section> <!-- .section -->	

@endsection

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('ajax')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/highlight.js') }}"></script>
<script src="{{ asset('js/quill.js') }}"></script>
<script src="{{ asset('js/image-resize.min.js') }}"></script>
<script src="{{ asset('js/video-resize.min.js') }}"></script>

    <script>
        $(document).ready(function(){
          //initialisation de l'editeur
            var options = {
              modules:{
                toolbar:[
                  [{header:[1, 2, false] }],
                  ['size', 'bold', 'italic', 'underline', 'strike'],
                  ['image', 'code-block', 'video', 'blockquote', 'code', 'align', {align:'center'}, 'link'],
                  [{list: 'ordered'}, {list: 'bullet'},],
                  [{ 'script': 'sub'}, { 'script': 'super' }],    
                  [{ 'indent': '-1'}, { 'indent': '+1' }],  
                  [{ 'color': [] }, { 'background': [] }],          
                  [{ 'font': [] }],
                  [{ 'align': [] }],
                  ['clean'] 
                ],

                imageResize: {
                  modules: ['Resize', 'DisplaySize', 'Toolbar']
                },

                videoResize: {
                  modules: ['Resize', 'DisplaySize', 'Toolbar']
                },

                syntax: true,
              },
              placeholder: 'Ecrivez ici...',
              theme: 'snow'
            };

            var quill = new Quill('#content', options);
            //Fin initialisation de l'editeur -------------------------------------------------------
            var id;
          

            //Chargement des commentaires avec ajax ------------------------------------------------
            var topic = $('.topic_title').text();

          setTimeout(function(){fetchComment()}, 2000);

            //toggle le formulaire pour repondre a un commentaire
            $(document).on('click', '.element', function(e){
              id = $(this).attr("id");
              let fm = document.getElementById(id+'-reply');
              fm.classList.toggle('d-none');
              // alert(id);
            });

            function fetchComment()
            {
                $.ajax({
                    type: "GET",
                    url: "/commentsFetchTopic/"+topic, 
                    success:function(data){
                    $('.comments_list').html(data);
                  }
                });
            }
            //Fin du chargement (fetch) ---------------------------------------------------------------------

            //Envoie des commentaires ----------------------------------------------------------------------
          $(document).on('click', '.comment_button', function(e){
            e.preventDefault();

            var datas = {
              'content': quill.root.innerHTML
            };  
            var topic = $('.topic_title').text();
            
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // console.log(title);

            $.ajax({
                type: "POST",
                url:"/commentsForum/"+topic,
                data: datas,
                dataType: "json",
                success:function(response){
                    // console.log(response.errors.name);
                    if(response.status == 400)
                    {
                        $('#errors').html(response.errors['content']);
                    }else{
                        $('#errors').html("");
                        $('#content').html("");
                        fetchComment();
                    }
                }
            });
          });

            //Envoie des reponses aux commentaires ----------------------------------------------------------------------
            $(document).on('click', '.reply_button', function(e){
            e.preventDefault();
            // $('.comment_input').val() = quill.root.innerHTML;
            // console.log(quill.root.innerHTML);
            var datas = {
                'replycontent': $('#content'+id).val()
            };

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url:"/commentReply/"+id,
                data: datas,
                dataType: "json",
                success:function(response){
                    // console.log(response.errors.name);
                    if(response.status == 400)
                    {
                        $('#errorss').html(response.errors['replycontent']);
                    }else{
                        $('#errorss').html("");
                        $('#content'+id).val("");
                        fetchComment();
                    }
                }
            });
          });
        });
    </script>
@endsection