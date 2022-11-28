@extends('admin')
@section('title', 'Authors | YIF')

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
                            <?php $user_meta = App\Models\UserMeta::where('user_id', $user->id)->first();?>
                            @if($user_meta != null)
                            <tr>
                                <th><?=$count?></th>
                                <td> {{ $user->name }} </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <span class="badge rounded-pill text-bg-info text-white">{{ $user->role }}</span>
                                </td>
                                <td>
                                    <?=date_format(date_create($user->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    <a href="{{ url('author') }}/{{ $user_meta->slug }}" class="btn btn-primary rounded-pill btn-sm" target="_blank">View</a>
                                    <a href="{{ url('yn-admin/users') }}/{{ $user->id }}/edit"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                </td>
                            </tr>                            
                            <?php $count++;?>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection