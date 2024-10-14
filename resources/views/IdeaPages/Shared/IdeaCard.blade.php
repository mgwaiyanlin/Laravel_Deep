<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('user.show', $idea->user) }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex items-center">
                <a href="{{ route('idea.show', $idea) }}">View</a>
                @auth
                    @can('idea.delete', $idea)
                        <a href="{{ route('idea.edit', $idea) }}" class="mx-2">Edit</a>
                    @endcan
                    @can('idea.edit', $idea)
                        <form action="{{ route('idea.delete', $idea) }}", method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <h4> Update yours idea </h4>
            <div class="row">
                <form action="{{ route('idea.update', $idea) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                        @error('content')
                            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Update </button>
                    </div>
                </form>
            </div>
        @else
            <p class="fs-5">
                {{ $idea->content }}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            @include('IdeaPages.Shared.idea-like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('Shared.CommentBox')
    </div>
</div>
