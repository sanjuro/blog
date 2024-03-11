@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h1>Add Post</h1>
            </div>

            <div class="p-6">
            <section class="mt-3">
                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Error message when data is not inputted -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card p-3">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <br>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-6">
                            <label for="content" class="form-label">Content</label>
                            <br>
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </section>
            </div>
        </div>
    </div>
</div>
@endsection