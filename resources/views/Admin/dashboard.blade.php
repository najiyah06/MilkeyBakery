@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Menu</h5>
            <h2>{{ $menuCount }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Category</h5>
            <h2>{{ $categoryCount }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total User</h5>
            <h2>{{ $userCount }}</h2>
        </div>
    </div>

</div>
@endsection