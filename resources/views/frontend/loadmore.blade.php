@foreach($articles as $article)
<?php $category = App\Models\Category::where('id', $article->category)->first();?>
<article class="yn__infinite-item">
    <div class="item-outer row">
        <div class="item__image col-12 col-md-4 mb-3 mb-md-0">
            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                <img height="200" class="w-100" loading="lazy"src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
            </a>
        </div>
        <div class="item-content col-12 col-md-8">
            <div class="meta-category">
                <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
            </div>
            <div class="meta-title">
                <h4>
                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                        {{$article->title}}
                    </a>
                </h4>
            </div>
            <div class="meta-subtitle">
                {{$article->subtitle}}
            </div>
            <div class="meta-date">
                <?=date_format(date_create($article->created_at), "F j, Y")?>
            </div>
        </div>
    </div>
</article>
@endforeach         