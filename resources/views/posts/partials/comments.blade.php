<h4 class="card-title">Comments</h4>

@include('posts.partials.add_comment')

@forelse($post->comments as $comment)
	<div class="card-text">
		<b>{{ $comment->owner->name }}</b> said
		<small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
		<p>{{ $comment->comment }}</p>

        <!--//*************************************************************************-->
        @if (auth()->id() == $comment->owner->id )
            <!--<small class="float-right mr-2 ml-2">-->
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button class='btn btn-link' type="submit">delete</button>
            </form>
            <!-- </small>-->
        @endif
        <!--//*************************************************************************-->


	</div>
	{!! $loop->last ? '' : '<hr>' !!}
@empty
	<p class="card-text">no comments yet!</p>
@endforelse
