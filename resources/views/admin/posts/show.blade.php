@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">{{ $post->id }}</div>
        <div class="col-4">{{ $post->title }}</div>
        <div class="col-4">{{ $post->author }}</div>
        @php
            $date = $post->post_date;
            $newDate = explode(' ', $date);
        @endphp
        <div class="col-4">{{
            $newDate[0]
        }}</div>
        <div class="col-4"><img src="{{ $post->post_image }}" class="w-100" alt="{{ $post->title }} image"></div>
        <div class="col-4">{{ $post->post_content }}</div>
        <div class="col-4">

            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-success">
                Edit
            </a>

            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="delete">
                    destroy
                </button>
            </form>

        </div>
    </div>
</div>

@endsection
