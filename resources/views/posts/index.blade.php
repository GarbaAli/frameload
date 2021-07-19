@extends('layouts.menu_footer')
@section('title', 'Forum')
@section('content')



<section class="hero-wrap hero-wrap-2" style="background-image: url('index/images/bg_4.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span>
		@can('permission-users')
		<span class="mr-2"><a href="{{ route('blog.create') }}">Nouvel Article <i class="fa fa-chevron-right"></i></a></span>
		@endcan
		</p>
         <h1 class="mb-0 bread">Blog</h1>
       </div>
     </div>
   </div>
  </section>

<!-- Blog -->
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
				@forelse ($posts as $post )
					<div class="col-md-6 d-flex align-items-stretch ftco-animate">
						<div class="project-wrap">
							<a href="{{ route('blog.show', $post->title) }}" class="img" style="background-image: url('storage/posts/{{ $post->image }}');">
								<span class="price">{{ $post->categorie->libelle }}</span>
							</a>
							<div class="text p-4">
								<h3><a href="{{ route('blog.show', $post->title) }}">{{ $post->title }} </a></h3>
								<ul class="d-flex justify-content-between">
									<p class="advisor">{{ $post->user->name }}</p>
									<span><i class="fa fa-calendar mr-2"></i> lundi 21 mars 2021</span>
								</ul>
								

								@can('permission-users')
								<ul class="d-flex justify-content-between">
									<li><a class="btn btn-default" style="color: rgb(13, 84, 177)" href="{{ route('blog.edit', $post->title) }}"><i class="fa fa-pencil"></i>  Editer</a></li>
									@can('update', $post)
									<form action="{{ route('blog.destroy', $post->title) }}" method="post">
										@csrf
										@method("DELETE")
										<button style="color: red" type="submit" class="btn btn-default" ><i class="fa fa-trash"></i> Corbeille</button>
									</form>
									@endcan
								</ul>
								@endcan
							</div>
						</div>
					</div>
				@empty
				<div style="background-image: url('images/frameload/pasArticle.jpg')">
					<img src="{{ asset('images/frameload/pasArticle.jpg') }}" width="500px" alt="">
					<p style="text-align: center; color:#007bff; font-size:20px">Aucun article pour cette categorie</p>
				</div>
				@endforelse
				</div>
				<div class="row mt-5">
					<div class="col">
						<div class="block-27">
							{{ $posts->links() }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 sidebar">
				<div class="sidebar_section_title">Categories</div>
				<div class="sidebar_categories">
					<ul class="categories_list">
						@foreach ($categories as $categorie )
							<li><a href="{{ route('blog.categorie', $categorie->id) }}" class="clearfix">{{ $categorie->libelle }}<span>({{ App\Post::where('categorie_id', $categorie->id)->count() }})</span></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('parse_date')
<script>
	$(document).ready(function(){
		//On crée une date
	let dte = $('.dte').text();
	date1 = new Date(dte);

	let dateLocale = date1.toLocaleString('fr-FR',{
		weekday: 'long',
		year: 'numeric',
		month: 'long',
		day: 'numeric',
		hour: 'numeric',
		minute: 'numeric',
		second: 'numeric'});

	document.getElementsByClassName('dte').innerHTML =  dateLocale;
		});
</script>
@endsection