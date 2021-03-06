@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <p class="text-center">
                    {{ $user->name }}'s Profile
                </p>
            </div>

            <div class="card-body">
                <center>
                    {{-- <img src="{{ Storage::url($user->avatar) }}" alt="{{$user->name}}" height="140px" width="140px" style="border-radius:50%"> --}}
                    <img src="{{ $user->avatar }}" alt="{{$user->name}}" height="140px" width="140px" style="border-radius:50%">
                </center>

                <br/>

                <p class="text-center">
                    @if($user->profile)
                    {{ $user->profile->location }}
                    @else
                    <i>--No Location--</i>
                    @endif
                </p>

                <p class="text-center">
                    @if(Auth::id() == $user->id)
                        <a href="{{ route('edit-profile') }}" class="btn btn-sm btn-outline-info">Edit Profile</a>
                    @endif()
                </p>
            </div>
        </div>

        @if(Auth::id() !== $user->id)
        <br/>

        <div class="card">
            <div class="card-body">
                <friend-component
                :profile_user_id="{{ $user->id }}">
                </friend-component>
            </div>
        </div>

        @endif

        <br>

        <div class="card">

            <div class="card-header">
                <p class="text-center">
                    About Me
                </p>
            </div>
            <div class="card-body">
                <p class="text-center">
                    @if($user->profile)
                    {{ $user->profile->about }}
                    @else
                    <i>--No Caption--</i>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection()