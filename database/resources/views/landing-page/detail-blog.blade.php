@extends('landing-page.template.base')

@section('content')
    <section class="blog-details-area py-130">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="blog-details-content">
                        <div class="image wow fadeInUp delay-0-2s">
                            <img src="{{ asset(empty($blog->image) ? 'images/blog-empty.jpg' : $blog->image) }}"
                                alt="Blog Details">
                        </div>
                        <div class="content">
                            <ul class="blog-meta">
                                <li><i
                                        class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}
                                </li>
                                {{-- <li><i class="far fa-comment-dots"></i> <a href="#">comments (05)</a></li> --}}
                            </ul>
                            <h4 class="blog-title">{{ $blog->title }}</h4>
                            <div>{!! nl2br($blog->body) !!}</div>
                            <hr class="my-30">
                            <ul class="tag-share pb-15">
                                <li>
                                    <h6>Kategori : {{ $blog->category->category }}</h6>
                                </li>
                                {{-- <li>
                                    <h6>Bagikan :</h6>
                                    <div class="social-style-two">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-dribbble"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    @if (count($related_blogs) != 0)
                        <hr>
                        <h3 class="blog-subtitle text-center mt-50 mb-30">Blog Terkait</h3>
                        <div class="related-news-slider mb-60">
                            @foreach ($related_blogs as $blog)
                                <div class="blog-item style-two wow fadeInUp delay-0-2s">
                                    <div class="image">
                                        <img src="{{ asset(empty($blog->image) ? 'images/blog-empty.jpg' : $blog->image) }}"
                                            alt="Blog">
                                    </div>
                                    <div class="content">
                                        <span class="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <a
                                                href="#">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</a>
                                        </span>
                                        <h5>
                                            <a href="{{ url('blogs', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h5>
                                        <a href="{{ url('blogs', $blog->slug) }}" class="read-more">
                                            Baca Lebih Lanjut
                                            <i class="far fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                    <hr>
                    {{-- <h4 class="mt-50 mb-25">Peopel Comments’s</h4>
                    <ul class="comment-list pb-15 wow fadeInUp delay-0-2s">
                        <li>
                            <div class="comment-body">
                                <div class="author-thumb">
                                    <img src="assets/images/blog/comment-author1.jpg" alt="Author">
                                </div>
                                <div class="comment-content">
                                    <h6>Sidney D. Newby</h6>
                                    <span class="date">Jule 25, 2022</span>
                                    <p>On the other hand, we denounce with righteous indignations and dislike men who are so
                                        beguiled demoralized</p>
                                    <a href="#" class="reply-link">Reply <i
                                            class="far fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <ul class="children">
                                <li>
                                    <div class="comment-body">
                                        <div class="author-thumb">
                                            <img src="assets/images/blog/comment-author2.jpg" alt="Author">
                                        </div>
                                        <div class="comment-content">
                                            <h6>John T. Stewart</h6>
                                            <span class="date">Jule 25, 2022</span>
                                            <p>On the other hand, we denounce with righteous indignations and dislike men
                                                who are so beguiled demoralized</p>
                                            <a href="#" class="reply-link">Reply <i
                                                    class="far fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment-body">
                                <div class="author-thumb">
                                    <img src="assets/images/blog/comment-author3.jpg" alt="Author">
                                </div>
                                <div class="comment-content">
                                    <h6>Donald K. Jenkin</h6>
                                    <span class="date">Jule 25, 2022</span>
                                    <p>On the other hand, we denounce with righteous indignations and dislike men who are so
                                        beguiled demoralized</p>
                                    <a href="#" class="reply-link">Reply <i
                                            class="far fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <form id="comment-form" class="comment-form z-1 rel pt-35 wow fadeInUp delay-0-2s" name="comment-form"
                        action="#" method="post">
                        <h4>Leave a Reply</h4>
                        <div class="row mt-25">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="full-name" name="full-name" class="form-control"
                                        value="" placeholder="Full Name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="email-address" name="email" class="form-control"
                                        value="" placeholder="Email Address" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write a Comments"
                                        required=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="theme-btn">Send a Reply <i
                                            class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
