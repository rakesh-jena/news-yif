@extends('admin')
@section('title', 'Categories | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Add Category</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/category')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Category</label>
                        <input type="text" class="form-control" id="inputNanme4" name="category">
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
                    <h5 class="card-title">Categories</h5>
                </div>
                
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Category
                            </th>
                            <th>
                                Added
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($categories as $category)
                            <tr>
                                <th><?=$count?></th>
                                <td> {{ $category->category }} </td>
                                <td>
                                    <?=date_format(date_create($category->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    <a href="{{ url('yn-admin/category') }}/{{ $category->id }}" class="btn btn-primary rounded-pill btn-sm">View</a>
                                    <a href="{{ url('yn-admin/category') }}/{{ $category->id }}/edit"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                    <button data-bs-toggle="modal" data-id="{{$category->id}}" data-aurl="{{ url('check-category') }}" data-url="{{ url('yn-admin/category/'.$category['id']) }}"
                                    data-bs-target="#category_delete_modal" class="btn btn-danger rounded-pill btn-sm">Delete</button>
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
@include('admin.category.delete')
@endsection