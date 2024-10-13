<div>
    @auth
        @if (Auth::user()->likedIdea($idea))
            <form action="{{ route('idea.unlike', $idea) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes()->count() }} </button>
            </form>
        @else
            <form action="{{ route('idea.like', $idea) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $idea->likes()->count() }} </button>
            </form>
        @endif
    @endauth

    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $idea->likes()->count() }} </a>
    @endguest


</div>
