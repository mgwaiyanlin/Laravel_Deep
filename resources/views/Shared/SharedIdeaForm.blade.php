
@auth
<div>
    <h4> Share your ideas </h4>
    <div class="row">
        <form action="{{ route('idea.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
                @error('content')
                    <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
    <hr>
</div>
@endauth

@guest
    <h4>You need to login to share your ideas!</h4>
@endguest


