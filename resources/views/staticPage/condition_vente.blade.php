
@extends('layouts.menu_footer')
@section('title', 'Condition de vente')
@section('content')
 
 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/frameload/vente.PNG') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="index.html">Conditions générales de ventes</a></span> </p>
       <h1 class="mb-0 bread">Conditions générales de ventes</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
        <h4 class="mb-3 mt-5">Article 1 : Objet</h4>
        <p>Les présentes Conditions Générales de Vente déterminent les droits et obligations des parties dans le cadre des services proposés.</p>

        <h4 class="mb-3 mt-5">Article 2 : Dispositions générales</h4>
        <p>Les présentes Conditions Générales de Vente (CGV) régissent les services, effectuées au travers du site Internet de la Société, et sont partie intégrante entre l’internaute et www.habitaresponsable.fr. Elles sont pleinement opposables à www.habitaresponsable.fr qui les a acceptés avant de faire une demande de mise en relation. Le Vendeur se réserve la possibilité de modifier les présentes, à tout moment par la publication d’une nouvelle version sur son site Internet. Les CGV applicables alors sont celles étant en vigueur à la date de son inscription à un formulaire. Ces CGV sont consultables sur le site Internet depuis la page d’accueil. Le Client déclare avoir pris connaissance de l’ensemble des présentes Conditions Générales de Vente, et le cas échéant des Conditions Particulières de Vente liées à ce service, et les accepter sans restriction ni réserve. Le Client reconnaît qu’il a bénéficié des conseils et informations nécessaires sur le site afin de s’assurer de l’adéquation de l’offre à ses besoins. Le Client déclare être en mesure de contracter légalement en vertu des lois françaises ou valablement représenter la personne physique ou morale pour laquelle il s’engage.</p>

        <h4 class="mb-3 mt-5">Article 3 : Prix</h4>
        <p>La prestation de mise en relation est gratuite pour le particulier.</p>

        <h4 class="mb-3 mt-5">Article 4 : Conclusion du formulaire en ligne</h4>
        <p>Le client disposera pendant son processus la possibilité d’identifier d’éventuelles erreurs commises dans la saisie des données et de les corriger. La langue proposée pour le formulaire est la langue française. L’archivage des communications, des détails de l’inscription est effectué sur un support fiable et durable de manière constituer une copie fidèle et durable conformément aux dispositions de l’article 1360 du code civil. Ces informations peuvent être produites à titre de preuve. Le Vendeur se réserve la possibilité de refuser la mise en relation, par exemple pour toute demande anormale, réalisée de mauvaise foi ou pour tout motif légitime.</p>

        <h4 class="mb-3 mt-5">Article 5 : Produits et services</h4>
        <p>Les caractéristiques essentielles des biens, des services sont mises à disposition de l’acheteur sur les sites Internet de la société, de même, le cas échéant, que le mode d’utilisation du produit. Conformément à l’article L112-1 du Code la consommation, le consommateur est informé des conditions particulières de l’exécution des services avant toute inscription. Lorsque les produits ou services ne sont pas exécutés immédiatement, une information claire est donnée sur la page de présentation du produit quant aux dates de livraison du service.</p>

        <h4 class="mb-3 mt-5">Article 6 : Conformité</h4>
        <p>Conformément à l’article L.411-1 du Code de la consommation, les produits et les services offerts à la vente au travers des présentes CGV répondent aux prescriptions en vigueur relatives à la sécurité.

</p>

      </div> <!-- .col-md-8 -->


      <div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5">
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>A savoir aussi</h3>
            <li><a href="{{ route('staticPage.mention_legale') }}">Mention légale </a></li>
            <li><a href="{{ route('staticPage.condition') }}">Condition générale d'utilidation </a></li>
          </div>
        </div>
      </div>

    </div>
  </div>
</section> <!-- .section -->	
@endsection