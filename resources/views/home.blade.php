@extends('layouts.app')

@section('title', 'Page principale')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">{{ $ads->links() }}</div>

                @if (count($ads) <= 0)
                    <div class="col-md-12 alert alert-success" role="alert">{{ __("Aucune annonce") }}</div>
                @endif

                @foreach ($ads as $ad)
                    <div class="col-md-3">
                        <div class="card border rounded overflow-hidden mb-4 shadow-sm" style="min-height: 450px; max-height: 450px;">
                            @php
                                $data = json_decode($ad->images_url, true);
                                $firstItem = $data[0];
                            @endphp
                            <img src="{{ $firstItem }}" class="border rounded-top-2" width="100%" height="180" alt="{{ $ad->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                                <p class="card-text">
                                    @php
                                        $lenght = 140;
                                        $array = array();
                                            if(strlen($ad->description) > $lenght){
                                                for ($i=0; $i < $lenght ; $i++) {
                                                    array_push($array, $ad->description[$i]);
                                                }
                                            }
                                        $newDescription = implode($array)
                                    @endphp
                                    @if(strlen($ad->description) < $lenght)
                                        {{ $ad->description }}
                                    @else
                                        <div class="displays-block">
                                            <span>{{$newDescription}}</span> <span class="fw-bolder">{{ __('...') }}</span>
                                            <a class="btn btn-sm btn-light fw-bolder" role="button" href="#">Voire Suite</a>
                                        </div>
                                    @endif
                                </p>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-primary">View</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Del</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12">{{ $ads->links() }}</div>

            </div>
        </div>
    </div>
</div>
@endsection
