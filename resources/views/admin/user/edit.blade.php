@extends('admin')
@section('title', 'Edit Author | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Edit Author</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/users/'.$user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name" value="{{$user->name}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="validationDefault04" class="form-label">Gender</label>
                        <select class="form-select" id="validationDefault04" name="gender" required="">
                            <option value="male" <?php $user_meta->gender == 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?php $user_meta->gender == 'female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#about" class="form-label">About</label>
                        <textarea id="about" name="about" class="form-control" style="height: 100px">{{$user_meta->about}}</textarea>
                    </div>
                    <div class="col-12 col-md-6 th_input user">
                        <label for="#formFile" class="form-label">Avatar</label>
                        <input class="form-control" type="file" id="formFile" name="avatar">
                        <img class="w-100" src="{{url('images/author/'.$user_meta->avatar)}}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user_meta->facebook}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{$user_meta->twitter}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{$user_meta->instagram}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{$user_meta->linkedin}}">
                    </div>
                    <input type="hidden" name="role" value="{{$user->role}}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection