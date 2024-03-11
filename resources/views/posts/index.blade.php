@extends('layouts.app')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Add Post</a>
                 <h1>Post list</h1>
            </div>

            <div class="p-6">
                <!-- Message if a post is posted successfully -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <div class="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="row align-items-center mb-3">
                                <div class="col-10">
                                    <!-- Add anchor tag around post title to link to individual post page -->
                                    <h4 class="mb-0"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                                </div>
                            </div>
                            <p class="content">{{$post->content}}</p>
                            <p class="created-date">
                                Published at: {{$post->created_at}} 
                            </p>
                            <p class="socials">
                                Comments: {{$post->commentsCount()}} 
                                Likes: {{$post->likesCount()}} 
                            </p>
                        </div>
                    </p>
                    </div>
                    </div>
                    @endforeach
                    {{ $posts->links() }} 
                @else
                    <p>No Posts found</p>
                @endif
            </div>
            </div>
    </div>
  </div>
</div>
@endsection