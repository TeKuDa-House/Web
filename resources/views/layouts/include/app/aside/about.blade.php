@php
    $ads = App\Models\Ad::orderByDesc('created_at')->limit(3)->get();
@endphp
<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic">À Propos de Notre Boutique</h4>
        <p class="mb-0">Sur notre site dédié à la vente d'objets d'occasion, nous mettons à votre disposition une sélection soigneusement choisie d'articles préaimés qui ajoutent une touche spéciale à votre vie quotidienne. Découvrez des objets uniques ayant une histoire à raconter, sélectionnés avec passion par notre équipe.</p>
    </div>

    <div>
    <h4 class="fst-italic">Recent ads</h4>
    <ul class="list-unstyled">
        @foreach ($ads as $ad)
            <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    @php
                        $data = json_decode($ad->images_url, true);
                        $firstItem = $data[0];
                    @endphp
                    <img src="{{ $firstItem }}" class="bd-placeholder-img" width="100%" height="96" alt="{{ $ad->title }}">
                    <div class="col-lg-8">
                    <h6 class="mb-0">{{ $ad->title }}</h6>
                    <small class="text-body-secondary">
                        {{ \Carbon\Carbon::parse($ad->created_at)->formatLocaliZed('%B') }}
                        {{ \Carbon\Carbon::parse($ad->created_at)->formatLocaliZed('%d') }},
                        {{ \Carbon\Carbon::parse($ad->created_at)->formatLocaliZed('%Y') }}
                    </small>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
