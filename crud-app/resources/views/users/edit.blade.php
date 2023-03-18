@extends('dashboard')
@section('content')

@can('update', App\Models\User::class)
<div class="column col-">
  <h3>Edit User</h3>
  <form method="POST" action="{{route('users.update', $user->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      @include('users.form')
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary ml-4 mb-3">Update User</button>
      <a class="btn btn-danger mb-3" href="{{route('users.index')}}">Cancel</a>
    </div>
  </form>
  @endCan
  @endSection