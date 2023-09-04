@php
    $categories = App\Models\Category::get('name');
@endphp
<div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="nav nav-underline justify-content-between">
        <form action="{{ route('home') }}" method="GET">
            <input type="hidden" name="filter" value="{{ __('All') }}">
            <button type="submit" class="nav-item nav-link link-body-emphasis{{ Request::get('filter') === 'All' ? ' active' : '' }}">{{ __('Toutes les categories') }}</button>
        </form>

        @foreach ($categories as $category)
            <form action="{{ route('home') }}" method="GET">
                <input type="hidden" name="filter" value="{{ $category->name }}">
                <button type="submit" class="nav-item nav-link link-body-emphasis{{ Request::get('filter') === $category->name ? ' active' : '' }}">{{ $category->name }}</button>
            </form>
        @endforeach
    </nav>
</div>
