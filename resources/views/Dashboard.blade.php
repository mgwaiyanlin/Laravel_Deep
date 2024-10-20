@extends('AppLayout.Layout')
@section('title', 'Dashboard')
@section('AppContent')
    <div class="row">
        <div class="col-3">
            @include("Shared.LeftSideMenu")
        </div>
        <div class="col-6">
            @include('Shared.SuccessMessage')
            {{-- @include('Shared.ErrorMessaage') --}}
            @include('IdeaPages.Shared.SharedIdeaForm')

            @forelse ($ideas as $idea)
            <div class="mt-3">
                @include('IdeaPages.Shared.IdeaCard')
            </div>
            @empty
                <p class="text-center my-4">No results found!</p>
            @endforelse

            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include("Shared.SearchBox")
            @include("Shared.FollowerBox")
        </div>
    </div>
@endsection
