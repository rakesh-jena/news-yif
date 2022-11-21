@extends('admin')
@section('title', 'Add User | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Add User</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/users')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="validationDefault04" class="form-label">Gender</label>
                        <select class="form-select" id="validationDefault04" name="gender" required="">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#about" class="form-label">About</label>
                        <textarea id="about" name="about" class="form-control" style="height: 100px"></textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#formFile" class="form-label">Avatar</label>
                        <input class="form-control" type="file" id="formFile" name="avatar">
                    </div>
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