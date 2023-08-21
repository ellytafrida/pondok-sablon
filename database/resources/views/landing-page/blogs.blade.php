@extends('landing-page.template.base')

@section('content')
    <!-- Blog Page Area start -->
    <section class="blog-standard-area py-130">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-5">
                    <div class="blog-sidebar rmb-75">
                        <div class="widget widget-category wow fadeInUp delay-0-4s">
                            <h4 class="widget-title">Kategori</h4>
                            <ul>
                                @foreach ($blog_categories as $category)
                                    <li
                                        class="{{ $category->category == (empty($category_selected->category) ? null : $category_selected->category) ? 'text-danger' : null }}">
                                        <a href="{{ url('blogs/category', Str::slug($category->category)) }}" class="{{ $category->category == (empty($category_selected->category) ? null : $category_selected->category) ? 'text-danger' : null }}">
                                            {{ $category->category }}
                                        </a>
                                        <span>({{ $category->blogs->count() }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-recent-post wow fadeInUp delay-0-2s">
                            <h4 class="widget-title">Yang Mungkin Perlu Kamu Baca</h4>
                            <ul>
                                @foreach ($random_blogs as $blog)
                                    <li>
                                        <div class="image">
                                            <img
                                                src="{{ asset(empty($blog->image) ? 'images/blog-empty.jpg' : $blog->image) }}">
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="{{ url('blogs', $blog->slug) }}">
                                                    {{ $blog->title }}
                                                </a>
                                            </h6>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="blog-standard-wrap">
                        @foreach ($blogs as $blog)
                            <div class="blog-standard-item wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="{{ asset(empty($blog->image) ? 'images/blog-empty.jpg' : $blog->image) }}">
                                </div>
                                <div class="content">
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="far fa-calendar-alt"></i>
                                            <a
                                                href="#">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</a>
                                        </li>
                                    </ul>
                                    <h4>
                                        <a href="{{ url('blogs', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                    <a href="{{ url('blogs', $blog->slug) }}" class="read-more">Baca Lebih Lanjut <i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Page Area end -->

    @include('landing-page.template.sections.cta')
@endsection
