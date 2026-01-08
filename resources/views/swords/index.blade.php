@extends('layouts.app')

@section('pageTitle')
    Here are all of our fancy Swords
@endsection

@section('content')

    {{-- Store funkcióból történt visszairányítással küldött üzenet --}}
    @if (session()->has('msg'))
        <p>{{session()->get("msg")}}</p>
    @endif

    <table>
        <thead>
            <th>Name</th>
            <th>Length</th>
            <th>Price</th>
            <th>Exclusive</th>
        </thead>
        <tbody>

            @foreach ($swords as $sword)
                <tr>
                    <td>{{ $sword->name }}</td>
                    <td>{{ $sword->length }} cm</td>
                    <td>${{ $sword->price }} USD</td>
                    <td><input type="checkbox" disabled {{ $sword->exclusive ? 'checked' : '' }}></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
