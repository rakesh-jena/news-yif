@extends('admin')
@section('title', 'Dashboard | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">    
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">  
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        
                        <img src="{{URL::asset('images/author/'.$user_meta->avatar)}}" alt="Profile" class="rounded-circle">
                        <h2>{{$user->name}}</h2>
                        <h3>Administrator</h3>
                        <div class="social-links mt-2">
                        <a href="{{$user_meta->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="{{$user_meta->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{$user_meta->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="{{$user_meta->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>  
            </div>
  
            <div class="col-xl-8">  
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
        
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
            
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
            
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Reset Password</button>
                            </li>
        
                        </ul>
                        <div class="tab-content pt-2">        
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">{{$user_meta->about}}</p>
            
                                <h5 class="card-title">Profile Details</h5>
            
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                                </div>
            
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8 text-capitalize">{{$user->role}}</div>
                                </div>
            
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Gender</div>
                                    <div class="col-lg-9 col-md-8 text-capitalize">{{$user_meta->gender}}</div>
                                </div>
            
                            </div>
            
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">            
                                <!-- Profile Edit Form -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form enctype="multipart/form-data" method="POST" action="{{url('yn-admin')}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="formFile" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{URL::asset('images/author/'.$user_meta->avatar)}}" alt="Profile">
                                            <div class="pt-2">
                                                <input class="form-control" type="file" id="formFile" name="avatar" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName" value="{{$user->name}}">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{$user_meta->about}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="male" <?php $user_meta->gender == 'male' ? 'selected' : '';?>>
                                                    Male
                                                </option>
                                                <option value="female" <?php $user_meta->gender == 'female' ? 'selected' : '';?>>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="{{$user->email}}">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="twitter" type="text" class="form-control" id="Twitter" value="{{$user_meta->twitter}}">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="facebook" type="text" class="form-control" id="Facebook" value="{{$user_meta->facebook}}">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="instagram" type="text" class="form-control" id="Instagram" value="{{$user_meta->instagram}}">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="{{$user_meta->linkedin}}">
                                        </div>
                                    </div>
                
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
            
                            </div>
            
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{url('yn-author/change-password')}}">
                                    @csrf
                                    @method('PUT')            
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>
                
                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>
                
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->        
                            </div>        
                        </div><!-- End Bordered Tabs -->        
                    </div>
                </div>  
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection