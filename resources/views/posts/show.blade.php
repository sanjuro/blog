
@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3">
                <h1>{{$post->title}}</h1>
            </div>

            <div class="p-6">
            <section class="mt-3">
                <div class="mb-6">
                    {{$post->content}}
                </div>
                <p class="socials">
                    Comments: {{$post->commentsCount()}} 
                    Likes: <span class="likes-count">{{$post->likesCount()}} </span>
                </p>
            </section>

            <section class="mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <button class="like btn btn-primary btn-sm float-sm-left" value="{{ $post->id }}"><i class="fa fa-thumbs-up"></i> <span>Like</span></button>
                        <button class="comment btn btn-primary btn-sm float-sm-left" type="button" value="{{ $post->id }}"><i class="fa fa-comments"></i> Comment</button>
                    </div>
                </div>
            </section>

            <section class="mt-3">
            <div id="commentField_{{ $post->id }}" class="panel panel-default" style="padding:10px; margin-top:-20px; display:none;">
            <div id="comment_{{ $post->id }}">
                <form id="commentForm_{{ $post->id }}">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <div class="row"> 
                        <div class="col-md-10">
                            <input type="text" name="commenttext" id="commenttext" data-id="{{ $post->id }}" class="form-control commenttext" placeholder="Write a Comment...">
                        </div>
                        <div class="col-md-2" style="margin-left:-25px;">
                            <button type="button" class="btn btn-primary submitComment" value="{{ $post->id }}"><i class="fa fa-comment"></i>Submit</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(document).on('click', '.comment', function(){
                var id = $(this).val();
                if($('#commentField_'+id).is(':visible')){
                    $('#commentField_'+id).slideUp();
                }
                else{
                    $('#commentField_'+id).slideDown();
                    getComment(id);
                }
            });

            $(document).on('click', '.submitComment', function(){
                var id = $(this).val();
                if($('#commenttext').val()==''){
                    alert('Please write a Comment First!');
                }
                else{
                    var commentForm = $('#commentForm_'+id).serialize();
                    $.ajax({
                        type: 'POST',
                        url: id + '/comments',
                        data: commentForm,
                        success: function(){
                            getComment(id);
                            $('#commentForm_'+id)[0].reset();
                        },
                    });
                }
                    
            });
         
        });

        $(document).on('click', '.like', function(){
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: id + '/likes',
                success: function(data){
                    $('.likes-count').html(data);
                },
                error: function(xhr, status, error) {
                    
                }
            });
        });
    </script>
@endsection
