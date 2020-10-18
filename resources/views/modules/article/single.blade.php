@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Full article</h1>
                    	</div>
                        <div class="main-content create-article">

                            <div class="english-article">
                                <h5 class="article-title">{{$post->title_en}}</h5>
                                <div class="article-content">

                                {!!$post->content_en!!}
                                </div>
                            </div>
                            <div class="chinese-article">
                                <h5 class="article-title">{{$post->title_cn}}</h5>
                                <div class="article-content">
                                {!!$post->content_cn!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
      
@endsection