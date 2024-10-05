@extends('AppLayout.Layout')

@section('AppContent')
    <div class="row">
        <div class="col-3">
            @include("Shared.LeftSideMenu")
        </div>
        <div class="col-6">
            @include('Shared.SuccessMessage')
            @include('Shared.SharedIdeaForm')

            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('Shared.IdeaCard')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include("Shared.SearchBox")
            @include("Shared.FollowerBox")
        </div>
    </div>
@endsection
