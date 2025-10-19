@extends('layouts.app')

@section('title', __('messages.manage_parts'))

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-gear"></i> {{ __('messages.manage_parts') }}</h2>
        <a href="{{ route('parts.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> {{ __('messages.add_new_part') }}
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.part_name') }}</th>
                            <th>{{ __('messages.category') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>{{ __('messages.stock') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($autoParts as $part)
                            <tr>
                                <td>{{ $part->id }}</td>
                                <td>
                                    @if($part->image)
                                        <img src="{{ asset('storage/' . $part->image) }}"
                                             alt="{{ $part->name }}"
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $part->name }}</td>
                                <td>{{ $part->category->name }}</td>
                                <td>{{ number_format($part->price, 2) }} {{ __('messages.km') }}</td>
                                <td>
                                    <span class="badge {{ $part->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $part->stock }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('parts.edit', $part->id) }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('parts.destroy', $part->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    {{ __('messages.no_parts_found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $autoParts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
