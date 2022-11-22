@extends('admin')
@section('title', 'Edit Tag | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Edit Tag</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/tags/'.$tag->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Tag</label>
                        <input type="text" class="form-control" id="inputNanme4" name="tag" value="{{$tag->tag}}">
                    </div>
                    <input type="hidden" name="id" value="{{$tag->id}}">
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