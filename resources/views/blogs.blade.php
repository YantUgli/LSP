@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img
                src="{{ asset('frontend/assets/img/blog-hero.jpg') }}"
                alt=""
                class="islands__bg"
              />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Our</h2>
                  <h1 class="islands__title">Blog</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!-- blog -->
      <section class="blog section" id="blog">
        <div class="blog__container container">
          <span class="section__subtitle" style="text-align: center"
            >All Blog</span
          >
          <h2 class="section__title" style="text-align: center">
            Find The Best Travel Story
          </h2>

          <div class="blog__content grid">
            @foreach($berita as $blog)
                <article class="blog__card">
                <div class="blog__image">
                    <img src="storage/{{$blog->foto}}" alt="" class="blog__img" />
                    <a href="{{ route('blog.show',$blog->id) }}" class="blog__button">
                    <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>

                <div class="blog__data">
                    <h2 class="blog__title">{{ $blog->judul }}</h2>
                    <p class="blog__description">
                        {{  Str::limit($blog->berita ,35 , '...') }}
                    </p>

                    <div class="blog__footer">
                    <div class="blog__reaction">{{ date('d M Y', strtotime($blog->created_at)) }}</div>
                    <div class="blog__reaction">
                        <i class="bx bx-show"></i>
                        <span>231933</span>
                    </div>
                    </div>
                </div>
                </article>
            @endforeach
          </div>
        </div>
      </section>
@endsection