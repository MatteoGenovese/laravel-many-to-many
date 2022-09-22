@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <form action=" {{ route('admin.posts.store') }}" method="POST">

                @csrf
                @method('POST')
                @include('includes.form')

            </form>
        </div>
    </div>
</div>

@endsection
