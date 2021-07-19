<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Topic</title>

    <style>
        /*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
    background-image: url('{{ asset('images/team_background.jpg') }}');
}

body {
    font-family: montserrat, arial, verdana;
    background-image: url('{{ asset('images/team_background.jpg') }}');
}

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 30px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    box-sizing: border-box;
    width: 80%;
    margin: 0 10%;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

/*inputs*/
#msform input, #msform textarea {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #53abe6;
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 200px;
    background: #53abe6;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #53abe6;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
}

#progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.33%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #333;
    background: white;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #53abe6;
    color: white;
}


/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #53abe6;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
}
    </style>
</head>
<body>
    <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="POST" action="{{ route('topics.update', ['souscategorie'=>$souscategorie, 'topic'=>$topic]) }}" id="msform" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- fieldsets -->
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


            <fieldset>
                <h2 class="fs-title">Modifier <strong style="color: #1a87cf">[{{ $topic->title }}]</strong> dans {{ $souscategorie->libelle }}</h2>
                <input hidden type="text" name="souscat_forum_id" value="{{ $souscategorie->id }}" class="@error('souscat_forum_id') is-invalid @enderror" placeholder="Entrer votre Topic"/>

                <input type="text" name="title" value="{{ old('title') ?? $topic->title }}" class="@error('title') is-invalid @enderror" placeholder="Entrer votre Topic"/>

                <input id="ct" type="text" value="" class="@error('content') is-invalid @enderror" hidden name="content">
                <div id="content">
                    {!! $topic->content !!}
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" name="next" class="next action-button" value="Poster le Topic"/>
                    <a style="background: red; text-decoration:none; padding:10px" class="action-button" href="{{ route('forum.show', $souscategorie) }}">Annuler</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
<script src="{{ asset('js/highlight.js') }}"></script>
<script src="{{ asset('js/quill.js') }}"></script>
<script src="{{ asset('js/image-resize.min.js') }}"></script>
<script src="{{ asset('js/video-resize.min.js') }}"></script>
<script>
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
      placeholder: 'Descrption Topic...',
      theme: 'snow'
    };
  
    var quill = new Quill('#content', options);
  
  
    var form = document.getElementById('msform');
    form.onsubmit = function(e){
     
      var text = document.getElementById('ct');
      text.value = quill.root.innerHTML;
  
  
      return true;
    };
  </script>
</body>
</html>