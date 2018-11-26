

@foreach($comments as $comment)
 <div class="display-comment">
     <p>Author: <strong>{{ $comment->user->name }}</strong></p>
     <p>{{ $comment->body }}</p>
     <a href="" id="reply"></a>
     <form method="post" action="{{ route('reply.add') }}">
         @csrf
         <div class="form-group">
             <textarea type="text" placeholder="Reply" name="comment_body" class="form-control"></textarea>
             <input type="hidden" name="post_id" value="{{ $post_id }}" />
             <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
         </div>
         <button class="form-group" type="submit" value="Reply">Reply</button>
     </form>
     @include('partials._comment_replies', ['comments' => $comment->replies])
 </div>
@endforeach
