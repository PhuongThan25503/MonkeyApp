<?php ?>


    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body class="antialiased">
@include('header')
<div class="container">
    @foreach($book as $key => $item) @endforeach
    <h1 class="mt-5 mb-5">{{$item -> name}}</h1>
        <a href="{{route('book.get-edit', ['id' => $item -> book_id])}}" class="btn btn-primary">Edit this book</a>
        <div class="row">
            <div class="col-6">
                <img style="width: 100%" src="{{asset($item -> image)}}">
            </div>
            <div class="col-6">
                {{$item -> content}}
            </div>
        </div>
</div>
@include('footer')
</body>
</html>

