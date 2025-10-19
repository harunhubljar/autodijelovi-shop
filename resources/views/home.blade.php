@extends('layouts.app')

@section('title', __('messages.home'))

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded-3 mb-4">
        <h1 class="display-4"><i class="bi bi-tools"></i> {{ __('messages.welcome') }}</h1>
        <p class="lead">{{ __('messages.subtitle') }}</p>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="GET" action="{{ route('home') }}" class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control"
                           placeholder="{{ __('messages.search_placeholder') }}"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">{{ __('messages.all_categories') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> {{ __('messages.search') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @forelse($autoParts as $part)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($part->image)
                        <img src="{{ asset('storage/' . $part->image) }}"
                             class="card-img-top product-image"
                             alt="{{ $part->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image"
                             class="card-img-top product-image"
                             alt="No image">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $part->name }}</h5>
                        <p class="card-text text-muted small">
                            <i class="bi bi-tag"></i> {{ $part->category->name }}
                        </p>
                        <p class="card-text">{{ Str::limit($part->description, 80) }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="price-tag">{{ number_format($part->price, 2) }} {{ __('messages.km') }}</span>
                                <span class="badge {{ $part->isInStock() ? 'bg-success' : 'bg-danger' }}">
                                    {{ $part->stock }} {{ __('messages.pieces') }}
                                </span>
                            </div>
                            @auth
                                @if($part->isInStock())
                                    <form method="POST" action="{{ route('purchase', $part->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-cart-plus"></i> {{ __('messages.buy') }}
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary w-100" disabled>
                                        {{ __('messages.out_of_stock') }}
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                    {{ __('messages.login') }} {{ __('messages.buy') }}
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle"></i> {{ __('messages.no_parts_found') }}
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $autoParts->links() }}
    </div>
</div>
@endsection
