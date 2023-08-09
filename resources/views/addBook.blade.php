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
        Add new book
    </h1>
    <form action="/books/add-new-book" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="bookImage" class="form-label">Book Image</label>
            <input type="file" class="form-control" name="image" id="bookImage" placeholder="Upload image">
        </div>
        <div class="mb-3">
            <label for="bookName" class="form-label">Book Name</label>
            <input type="text" class="form-control" name="name" id="bookName" placeholder="Enter book name">
        </div>
        <div class="mb-3">
            <label for="bookContent" class="form-label">Book Content</label>
            <textarea class="form-control" name="content" id="bookContent" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('footer')
</body>
</html>



