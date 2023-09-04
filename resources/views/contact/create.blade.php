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
                Formulaire de contact
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <article class="blog-post">
                <div class="card">
                    <div class="card-header">Contactez-Nous</div>
                    <div class="card-body">
                        <p class="card-text">Si vous avez des questions, des suggestions ou si vous avez besoin d'assistance, n'hésitez pas à nous contacter. Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                        <form action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
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
