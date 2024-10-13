<div class="card">
    <form enctype="multipart/form-data" action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('put')
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageUrl() }}" alt="Mario Avatar">
                    <div>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                </div>

                @auth
                    @if (Auth::user()->id == $user->id)
                        <a href="{{ route('user.show', $user) }}">X</a>
                    @endif
                @endauth
            </div>

            <div class="mt-3">
                <h5 class="fs-5">Profile image : </h5>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <textarea name="bio" id="bio" cols="20" rows="5" class="form-control mb-4">{{ $user->bio }}</textarea>
                @include('UserPages.Shared.UserStatus')

                @if ($editing ?? false)
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <a href="{{ route('user.show', $user) }}">Cancel</a>
                    </div>
                @endif

            </div>
        </div>
    </form>
</div>
<hr>
