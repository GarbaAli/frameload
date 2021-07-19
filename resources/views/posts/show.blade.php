@extends('layouts.menu_footer')
@section('title', $post->title)
@section('content')

<!-- Home -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('index/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <h1 class="mb-0 bread blog_title">{{ $post->title }}</h1>
       </div>
     </div>
   </div>
  </section>
  

<!-- Blog -->


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
          <p>{!! $post->content !!}</p>
          
          <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <a  href="{{ route('profiles.show', $post->user->name) }}">
                <img style="width: 100px; height:100px" src="{{ $post->user->profile->getImage() }}" alt="Image placeholder"  class="img-fluid mb-4">
              </a>
            </div>
            <div class="desc">
              <h3>{{ $post->user->name }}</h3>
              <p>{{ $post->user->profile->bio }}</p>
            </div>
          </div>
  
  
          <div class="pt-5 mt-5">
            <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">{{ $post->commentPosts->count() }} Commentaire(s)</h3>
            <ul class="comment-list comments_list">
            
            </ul>
            <!-- END comment-list -->
            
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Votre Commentaire</h3>
              @auth
              <div class="add_comment_container">
                  {{-- Formulaire  --}}
                  <form id="comment_id" class="comment_form">
                      <div class="form-group">
                          <textarea name="content" class="comment_input comment_textarea form-control" rows="5"></textarea>
                          <span style="color: red" id="errors"></span>
                      </div>
                      <div>
                          <button  class="btn btn-primary comment_button">Poster Votre Commentaire</button>
                      </div>
                  </form><hr>
              </div>
          @else
              <div>
                  <a href="{{ route('login') }}" class="btn btn-primary">Connectez-vous</a>
              </div><hr>
          @endauth
            </div>
          </div>
  
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5">
          <div class="sidebar-box ftco-animate">
            <div class="categories">
              <h3>Categories</h3>
              {{-- <li><a href="#">Top Quality Content <span>(12)</span></a></li> --}}
              @foreach ($categories as $categorie )
                 <li><a href="{{ route('blog.categorie', $categorie->id) }}" class="clearfix">{{ $categorie->libelle }}<span>({{ App\Post::where('categorie_id', $categorie->id)->count() }})</span></a></li>
             @endforeach
            </div>
          </div>
  
          <div class="sidebar-box ftco-animate">
            <h3>Articles Recents</h3>
            @foreach ($posts as $pt )
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4">
                <img style="width: 100px; height:100px" src="{{ asset('storage/posts/'. $pt->image) }}">
              </a>
              <div class="text">
                <h3 class="heading"><a href="{{ route('blog.show', $pt->title) }}">{{ $pt->title }}</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="fa fa-calendar"></span> {{ $pt->created_at->format('d/m/Y') }}</a></div>
                  <div><a href="{{ route('profiles.show', $post->user->name) }}"><span class="fa fa-user"></span> #{{ $pt->user->name }}</a></div>
                  <div><a href="#"><span class="fa fa-comment"></span> 1{{ $pt->commentPosts->count() }}</a></div>
                </div>
              </div>
            </div>  
            @endforeach         
          </div>  
        </div>
  
      </div>
    </div>
  </section> <!-- .section -->	
  
@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('ajax')
    <script>

        $(document).ready(function(){
            var post = $('.blog_title').text();

            //Chargement des commentaires avec ajax
            fetchComment();
 
            function fetchComment()
            {
                $.ajax({
                    type: "GET",
                    url: "/commentsFetch/"+post,
                    dataType: "json",
                    success: function(response){
                        console.log(response.comments);
                        // console.log(response.user);
                        $('.comments_list').html("");
                        $.each(response.comments, function(key, item){
                           var img = (!item.image)?'avatar.png': item.image;

                            //On crée une date
                        let date1 = new Date(item.created_at) ;
                        let dateLocale = date1.toLocaleString('fr-FR',{
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric',
                            second: 'numeric'
                            });

                         


                            $('.comments_list').append(
                                '  <li class="comment">\
                                    <div class="vcard bio">\
                                    <img src="/storage/avatars/'+img+'" alt="Avatar '+item.name+'">\
                                    </div>\
                                    <div class="comment-body">\
                                    <h3>'+item.name+'</h3>\
                                    <div class="meta">'+dateLocale+'</div>\
                                    <p>'+item.content+' <p>\
                                    </div>\
                                </li>'
                            );

                        });
                    }
                });
            }

          $(document).on('click', '.comment_button', function(e){
            e.preventDefault();
            var datas = {
                'content':$('.comment_input').val()
            };  
            var post = $('.blog_title').text();
            
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // console.log(title);

            $.ajax({
                type: "POST",
                url:"/commentsPost/"+post,
                data: datas,
                dataType: "json",
                success:function(response){
                    // console.log(response.errors.name);
                    if(response.status == 400)
                    {
                        $('#errors').html(response.errors['content']);
                    }else{
                        $('#errors').html("");
                        $('.comment_input').val("");
                        fetchComment();
                    }

                }
                
            });

            

          });
        });
    </script>
@endsection



@endsection