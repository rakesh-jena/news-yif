@extends('admin')
@section('title', 'Edit Category | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Edit Category</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/category/'.$category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Category</label>
                        <input type="text" class="form-control" id="inputNanme4" name="category" value="{{$category->category}}">
                    </div>
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection