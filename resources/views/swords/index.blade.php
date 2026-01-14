@extends('layouts.app')

@section('pageTitle')
    Here are all of our fancy Swords
@endsection

@section('content')
    {{-- Store funkcióból történt visszairányítással küldött üzenet --}}
    @if (session()->has('msg'))
        <p>{{ session()->get('msg') }}</p>
    @endif

    <table>
        <thead>
            <th>Name</th>
            <th>Length</th>
            <th>Price</th>
            <th>Exclusive</th>
            <th>Owner</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($swords as $sword)
                <tr>
                    <td>{{ $sword->name }}</td>
                    <td>{{ $sword->length }} cm</td>
                    <td>${{ $sword->price }} USD</td>
                    <td><input type="checkbox" disabled {{ $sword->exclusive ? 'checked' : '' }}></td>
                    <td>{{ $sword->samurai?->name }}</td> {{-- null safe operator --}}
                    <td>
                        @if (isset($sword->deleted_at))
                            <form action="{{ route('swords.restore', $sword) }}" method="POST">
                                @csrf
                                <button class="buttonlikea">Restore</button>
                            </form>
                        @else
                            <div class="actions">
                                <a href="{{ route('swords.show', $sword) }}">Show</a>
                                <a href="{{ route('swords.edit', $sword) }}">Edit</a>
                                <form action="{{ route('swords.destroy', $sword) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="buttonlikea">Delete</button>
                                </form>
                            </div>
                        @endif

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
