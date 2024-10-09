<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link text-dark {{ (Route::is('idea.dashboard')) ? 'text-white bg-primary rounded' : '' }}" href="{{ route('idea.dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('terms')) ? ' text-white bg-primary rounded' : '' }}" href="{{ route('itea.terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        @if (Auth::user())
            <a class="btn btn-link btn-sm" href="{{ route('user.show', Auth::user()) }}">View Profile </a>
        @else
            <a class="btn btn-link btn-sm" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</div>
