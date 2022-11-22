@extends('admin')
@section('title', 'Users | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Users</h5>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Added
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($users as $user)
                            <tr>
                                <th><?=$count?></th>
                                <td> {{ $user->name }} </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td> {{ $user->role }} </td>
                                <td>
                                    <?=date_format(date_create($user->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    <a href="{{ url('yn-admin/users') }}/{{ $user->id }}" class="btn btn-primary rounded-pill btn-sm">View</a>
                                    <a href="{{ url('yn-admin/users') }}/{{ $user->id }}/edit"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
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
@endsection