<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PATCH')

    {{-- Post title --}}
    <div class="form-group">
      <label for="title">Post title</label>
      <input type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ $post->title }}"
                placeholder="write post title here.."
                required />

        @if ($errors->has('title'))
            <small class="text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>
    {{-- End --}}

    {{-- Post body --}}
    <div class="form-group">
      <label for="content">Post content</label>
      <textarea class="form-control"
                name="content"
                id="content"
                rows="3"
                placeholder="write post content here.."
                required
                style="resize: none;">{{ $post->content }}</textarea>

        @if ($errors->has('content'))
            <small class="text-danger">{{ $errors->first('content') }}</small>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('home') }}" class="btn btn-default">Back</a>
    </div>

</form>
