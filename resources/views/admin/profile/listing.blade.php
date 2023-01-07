@extends('admin')
@section('title', 'Profiles | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Authors</h5>
                </div>
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Name
                            </th>
                            <th>
                                Organization
                            </th>
                            <th>
                                Age
                            </th>
                            <th>
                                Added
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($profiles as $profile)                            
                            <tr>
                                <th><?=$count?></th>
                                <td>
                                    <img width="40" height="40" class="rounded-circle" src="{{URL::asset('images/tut/'.$profile->image_profile)}}" alt="">
                                    {{ $profile->name }} 
                                </td>
                                <td>
                                    {{ $profile->organization }}
                                </td>
                                <td>
                                    {{ $profile->age }}
                                </td>
                                <td>
                                    <?=date_format(date_create($profile->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary rounded-pill btn-sm" target="_blank">View</a>
                                    <a href="{{ url('yn-admin/profiles') }}/{{ $profile->id }}/edit"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                        <button data-bs-toggle="modal" data-url="{{ url('yn-admin/profiles/'.$profile->id) }}"
                                            data-bs-target="#profile_delete_modal" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                                </td>
                            </tr>                            
                            <?php $count++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@include('admin.profile.delete')
@endsection