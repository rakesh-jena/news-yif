@extends('admin')
@section('title', 'Articles | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Articles</h5>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Title
                            </th>
                            <th>
                                Author
                            </th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($articles as $article)
                        <?php $author = App\Models\User::select('name')->where('id', $article->author_id)->first();?>
                        <?php $category = App\Models\Category::where('id', $article->category)->first();?>
                            <tr>
                                <th><?=$count?></th>
                                <td> {{ $article->title }} </td>
                                <td>
                                    {{ $author->name }}
                                </td>
                                <td>
                                    {{ $category->category }}
                                </td>
                                <td>
                                    <span class="badge rounded-pill text-bg-info text-white">{{ $article->status }}</span>
                                </td>
                                <td>
                                    <?=date_format(date_create($article->created_at), "d M, Y")?>
                                </td>
                                <td>
                                    @if($article->status == 'approved')
                                    <a href="{{ url('/article') }}/{{ $article->id }}/{{ $article->slug }}" 
                                        class="btn btn-primary rounded-pill btn-sm" target="_blank">View</a>
                                    @else
                                    <a href="{{ url('/article') }}/{{ $article->id }}/{{ $article->slug }}" 
                                        class="btn btn-primary rounded-pill btn-sm" target="_blank">Preview</a>
                                    @endif
                                    <a href="{{ url('yn-admin/articles') }}/{{ $article->id }}/edit"
                                        class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                    <a href="{{ url('/article') }}/{{ $article->id }}"
                                        class="btn btn-danger rounded-pill btn-sm">Delete</a>
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