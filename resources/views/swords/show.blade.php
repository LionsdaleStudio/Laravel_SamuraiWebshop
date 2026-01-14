@extends('layouts.app')

@section('pageTitle')
    Details of the {{ $sword->name }} sword
@endsection

@section('content')
    <div class="details">
        <img src="{{ asset("images/".$sword->image) }}" alt="Sword Image">
        <table>
            <tr>
                <td>Name</td>
                <td>{{ $sword->name }}</td>
            </tr>
            <tr>
                <td>Length</td>
                <td>{{ $sword->length }} cm</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>${{ $sword->price }} USD</td>
            </tr>
            <tr>
                <td>Exclusive</td>
                <td>{{ $sword->exclusive ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $sword->description }}</td>
            </tr>
        </table>
    </div>
@endsection