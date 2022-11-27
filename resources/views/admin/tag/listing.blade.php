@extends('admin')
@section('title', 'Tags | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Add Tag</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/tags')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Tag</label>
                        <input type="text" class="form-control" id="inputNanme4" name="tag">
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Tags</h5>
                </div>
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Tag
                            </th>
                            <th>
                                Added
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($tags as $tag)
                            <tr>
                                <th><?=$count?></th>
                                <td> {{ $tag->tag }} </td>
                                <td>
                                    <?=date_format(date_create($tag->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    <a href="{{ url('yn-admin/tags') }}/{{ $tag->id }}" class="btn btn-primary rounded-pill btn-sm">View</a>
                                    <a href="{{ url('yn-admin/tags') }}/{{ $tag->id }}/edit"
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