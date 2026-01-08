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
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="Tachi">
            </div>
            <div class="form-group">
                <label for="length">Length</label>
                <input type="number" name="length" id="length" step=".01" value="78.8">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="100">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="Tachi 太刀 refers to curved swords that began to be made around the end of the Heian period">
            </div>
            <div class="form-group">
                <label for="release">Release</label>
                <input type="date" name="release" id="release" value="1123-03-15">
            </div>
            <div class="form-group-check">
                <label for="exclusive">Exclusive</label>
                <input type="checkbox" name="exclusive" id="exclusive" checked value="1">
            </div>
            <div>
                <button type="submit">Add sword</button>
            </div>
        </form>
    </div>
@endsection
