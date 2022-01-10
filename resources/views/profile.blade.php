@extends('master')

@section('content')

<div class="container">
    <h3>Profile</h3>
    <div class="profile-content">
        {{-- profile picture --}}
        <div class="fullname-text">
            <span class="fw-bold">Full Name : </span>
            <p>Nama</p>
        </div>
        <hr>
        <div class="gender-text">
            <span class="fw-bold">Gender : </span>
            <p>Male/Female</p>
        </div>
        <hr>
        <div class="dob-text">
            <span class="fw-bold">Date of Birth : </span>
            <p>d/m/y</p>
        </div>
        <hr>
        <div class="phonenum-text">
            <span class="fw-bold">Phone Number : </span>
            <p>08xxxxxxxxxx</p>
        </div>
        <hr>
        <div class="address-text">
            <span class="fw-bold">Address : </span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ex pariatur, obcaecati facere iusto qui quis earum dicta tempore aliquid quibusdam quae excepturi architecto molestiae nihil, minus velit dolores numquam.</p>
        </div>
        <hr>
        <div class="email-text">
            <span class="fw-bold">Email : </span>
            <p>xxxxxx@gmail.com</p>
        </div>
        <hr>
        <div class="password-text">
            <span class="fw-bold">Password : </span>
            <p>xxxxx</p>
        </div>

        <div class="text-center">
            <button class="bg-danger p-2 mb-3 fw-bold" style="border-radius: 5px; border: none; color: white">Edit Profile</button>
        </div>



    </div>

</div>


@endsection
