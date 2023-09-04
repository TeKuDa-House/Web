@extends('layouts.app')

@section('title', 'Qui sommes nous ?')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h1 class="pb-4 mb-4 fst-italic border-bottom">
            Qui sommes nous ?
        </h1>

        <article class="blog-post">
            <div class="about-section">
                <h2>À Propos de TeKuDa</h2>
                <p>Bienvenue sur TeKuDa, votre marché en ligne pour acheter et vendre des objets d'occasion de qualité. Notre plateforme vous permet de découvrir une large gamme d'articles pré-possédés dans diverses catégories, allant de l'électronique à la mode, en passant par le mobilier.</p>
                <p>Nous croyons en la durabilité et en l'idée que les objets d'occasion peuvent trouver une nouvelle vie entre les mains des bonnes personnes. TeKuDa est le lieu où les acheteurs et les vendeurs se rejoignent pour faire de bonnes affaires et contribuer à réduire le gaspillage.</p>
                <p>Que vous soyez à la recherche d'une affaire incroyable ou que vous souhaitiez donner une seconde vie à vos objets inutilisés, TeKuDa est là pour vous aider. Rejoignez notre communauté et découvrez des trésors cachés à des prix abordables.</p>
                <p>Nous sommes fiers de fournir une plateforme sécurisée et conviviale pour faciliter vos transactions en ligne. Explorez, achetez, vendez et partagez votre passion pour les objets d'occasion avec TeKuDa.</p>
            </div>
            <div class="about-section">
                <h2>Notre Histoire</h2>
                <p>Bienvenue sur TeKuDa, votre marché en ligne dédié à l'achat et à la vente d'objets d'occasion de qualité. Notre plateforme vous offre une variété d'articles pré-aimés dans différentes catégories, allant de la technologie à la mode en passant par les meubles.</p>
                <p>Nous croyons en la durabilité et en l'idée que les objets d'occasion peuvent avoir une nouvelle vie entre les mains des bonnes personnes. TeKuDa est l'endroit où les acheteurs et les vendeurs se réunissent pour faire des transactions avantageuses tout en contribuant à réduire le gaspillage.</p>
                <p>Que vous soyez à la recherche d'une bonne affaire ou que vous souhaitiez donner une seconde vie à vos objets sous-utilisés, TeKuDa est là pour vous aider. Rejoignez notre communauté et découvrez des trésors cachés à des prix abordables.</p>
                <p>Nous sommes fiers de fournir une plateforme sécurisée et conviviale pour faciliter vos transactions en ligne. Explorez, achetez, vendez et partagez votre passion pour les objets d'occasion avec TeKuDa.</p>
            </div>

            <div class="row g-3">
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-2">
                            <h1>Notre Vision</h1>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo massa quis tellus fermentum luctus. Donec venenatis urna ut aliquam molestie. Phasellus tempus nisi ac metus interdum aliquam. Sed commodo consectetur tellus, sed dignissim massa interdum in.</p>
                            <p>Suspendisse id libero eu lacus venenatis egestas ut vel nisi. Sed non imperdiet ligula, ut volutpat felis. Morbi dapibus enim nunc, et elementum mauris ullamcorper nec. Aenean vulputate, dui non laoreet malesuada, lectus sem fringilla risus, ac eleifend ipsum neque in risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <h2>Notre Mission</h2>
                            <p>Notre mission est de fournir des produits de haute qualité et un service client exceptionnel. Nous nous efforçons de créer une expérience d'achat fluide et agréable pour nos clients. Nous croyons en la durabilité et en la valeur des produits de seconde main pour réduire les déchets et promouvoir une économie circulaire.</p>
                        </div>
                        <div class="col-lg-6">
                            <h2>Notre Équipe</h2>
                            <p>Nous disposons d'une équipe dévouée de professionnels passionnés par notre mission. De notre équipe de support client à nos experts produits, tout le monde travaille ensemble pour assurer la satisfaction de nos clients et offrir la meilleure expérience possible.</p>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-8 offset-lg-2">
                            <h2>Contactez-Nous</h2>
                            <p>Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter. Vous pouvez joindre notre équipe de support client par email à l'adresse <a href="mailto:info@example.com">info@example.com</a> ou par téléphone au 123-456-7890.</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
