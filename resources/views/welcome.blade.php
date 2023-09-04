{{-- welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="container">
    @if(Route::currentRouteName() === 'welcome')
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">Bienvenue sur TeKuDa</h1>
                <p class="lead my-3">Découvrez une large gamme d'articles d'occasion de haute qualité disponibles à la vente. Que vous souhaitiez acheter ou vendre, TeKuDa est votre plateforme de référence pour trouver de bonnes affaires sur des biens pré-possédés. Explorez nos catégories variées et entrez en contact avec les vendeurs pour trouver des objets uniques à des prix abordables. Rejoignez notre communauté et lancez dès aujourd'hui votre parcours d'achat et de vente !</p>
                <p class="lead mb-0"><a href="/categories" class="text-body-emphasis fw-bold">Explorer les Catégories</a></p>
            </div>
        </div>
    @endif

    <div class="row g-5">

        <div class="col-md-8">
            <h2 class="pb-4 mb-4 fst-italic border-bottom">
                Page d'acceuil
            </h2>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">Comment Ça Marche</h2>
                <section class="how-it-works">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Créez un Compte</h3>
                            <p>Inscrivez-vous sur TeKuDa pour commencer à acheter ou à vendre des articles d'occasion.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Explorez et Achetez</h3>
                            <p>Parcourez nos catégories, trouvez des articles qui vous intéressent et achetez en toute confiance.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Vendez Vos Objets</h3>
                            <p>Publiez vos articles d'occasion, fixez un prix et connectez-vous avec des acheteurs potentiels.</p>
                        </div>
                    </div>
                </section>
            </article>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">Fonctionnalité Principale</h2>
                <p>Une description concise de la fonctionnalité clé de votre site.</p>
                <ul>
                    <li>Premier élément de la liste</li>
                    <li>Deuxième élément avec une description plus longue</li>
                    <li>Troisième élément pour conclure</li>
                </ul>
            </article>

        </div>

        <div class="col-md-4">
                @include('layouts.include.app.aside.about')

                @include('layouts.include.app.aside.archives')

                @include('layouts.include.app.aside.ailleurs')
            </div>
        </div>
    </div>
</div>
@endsection
