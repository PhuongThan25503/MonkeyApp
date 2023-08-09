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
    <h1 class="mt-5 mb-5">Books list</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Name</th>
            <th scope="col">Create date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($book))
            @foreach($book as $key => $item)
                <tr>
                    <th scope="row">{{$item->book_id}}</th>
                    <td><img style="width: 500px" src={{ $item->image}}></td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> createDate}}</td>
                    <td><a href="{{route('book.get', ['id'=> $item -> book_id])}}" class="btn btn-primary">Detail</a>
                    </td>
                    <td>
                        <form action="{{ route('book.delete-book',['id'=> $item -> book_id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-secondary" type="submit">Delete Book</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">Emty data</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@include('footer')
</body>
</html>



