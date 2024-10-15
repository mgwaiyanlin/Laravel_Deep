<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px; height: 150px;" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageUrl() }}" alt="Mario Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }} </a></h3>
                    <span class="fs-6 text-muted">@ {{ $user->name }}</span>
                </div>
            </div>

            @auth
                {{-- @if (Auth::user()->id == $user->id)
                @endif --}}
                @can('update', $user)
                    <a href="{{ route('user.edit', $user) }}">Edit</a>
                @endcan
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>

            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>

            @include('UserPages.Shared.UserStatus')

            @auth
                @if (Auth::user()->id !== $user->id)
                    @if (Auth::user()->follows($user))
                        <div class="mt-3">
                            <form action="{{ route('user.unfollow', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                            </form>
                        </div>
                    @else
                        <div class="mt-3">
                            <form action="{{ route('user.follow', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        </div>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>
