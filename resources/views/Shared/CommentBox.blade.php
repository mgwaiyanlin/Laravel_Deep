<div>
    <form action="{{ route('idea.comment', $idea) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            @error("content")
                <small class="text-danger mt-2">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>

    @foreach ($idea->comments as $comment)
        @include("Shared.CommentMessages")
    @endforeach
</div>
