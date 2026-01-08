@extends('layouts.app')

@section('pageTitle')
    Create a new Sword
@endsection

@section('content')
    <div class="form-container">
        <h5>Create Sword</h5>
        <p>Fields marked with * must be filled</p>
        <hr>
        <form action="{{ route('swords.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" @error('name') style="color:red" @enderror>Name</label>
                <input class="@error('name') invalid @enderror" type="text" name="name" id="name"
                    value="{{ old('name', "Tachi") }}"> {{-- Default értékel, megőrizve a beírt adatot, ha validációs error van. --}}
                @error('name')
                    <span style="color: red">A név mező kitöltése kötelező</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="length">Length</label>
                <input type="text" name="length" id="length" step=".01" value="{{ old('length') }}"> {{-- Default érték nélkül, megőrizve a beírt adatot, ha validációs error van. --}}
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    value="{{ old('description',"Tachi 太刀 refers to curved swords that began to be made around the end of the Heian period") }}">
            </div>
            <div class="form-group">
                <label for="release">Release</label>
                <input type="date" name="release" id="release" value="{{old('release')}}">
            </div>
            <div class="form-group-check">
                <label for="exclusive">Exclusive</label>
                <input type="checkbox" name="exclusive" id="exclusive" value="1">
            </div>
            <div>
                <button type="submit">Add sword</button>
            </div>
        </form>
        <hr>
        {{-- Hibaüzenetek kiírása egy helyen. --}}
        @if ($errors->any())
            You have some errors.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
