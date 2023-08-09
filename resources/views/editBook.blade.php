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
    <h1 class="mt-5 mb-5">
        Edit book : {{$book -> name}}
    </h1>
    <form action="{{route('book.post-edit', ['id' => $book->book_id])}}" method="POST">
        @csrf
        @method('PATCH')
{{--        <input name="id" value="{{$book->book_id}}">--}}
        <div class="mb-3">
            <label for="bookName" class="form-label">Book Name</label>
            <input type="text" class="form-control" name="name" id="bookName" value="{{$book->name}}" placeholder="Enter book name">
        </div>
        <div class="mb-3">
            <label for="bookContent" class="form-label">Book Content</label>
            <textarea class="form-control" name="content" id="bookContent" style="height: 500px" rows="3">{{$book->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@include('footer')
</body>
</html>



