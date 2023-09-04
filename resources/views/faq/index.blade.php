@extends('layouts.app')

@section('title', 'Foire Aux Questions')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h1 class="pb-4 mb-4 fst-italic border-bottom">
            Foires Aux Questions
        </h1>

        <article class="blog-post">

            <div class="accordion" id="accordionFAQ">
                <!-- Question 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Question 1 : Quelles sont vos options de livraison ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Réponse 1 : Nous proposons différentes options de livraison, y compris la livraison standard, la livraison express et la livraison le jour même. Les options disponibles peuvent dépendre de votre emplacement et du type de produit que vous achetez.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Question 2 : Puis-je retourner ou échanger un produit ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Réponse 2 : Oui, nous avons une politique de retour et d'échange. Si vous n'êtes pas satisfait de votre achat, vous pouvez retourner le produit dans les 30 jours suivant la livraison pour un remboursement ou un échange. Veuillez consulter notre <a href="/politique-de-retour">page de politique de retour</a> pour plus d'informations.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Question 3 : Comment puis-je suivre ma commande ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Réponse 3 : Une fois votre commande expédiée, nous vous fournirons un numéro de suivi. Vous pouvez utiliser ce numéro de suivi pour suivre votre commande sur notre site Web ou sur le site du transporteur.
                        </div>
                    </div>
                </div>
                <!-- Ajoutez plus de questions fréquentes au besoin -->
            </div>

        </article>
    </div>
</div>
@endsection
