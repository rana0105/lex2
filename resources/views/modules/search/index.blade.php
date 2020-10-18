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
                    		<h1>advance search</h1>
                    	</div>
                        <div class="search-box">
                            <form id="avanSearch" method="GET">
                                @csrf
                                <select id="article" class="search-article-id">
                                    <option></option>
                                    @foreach($articles as $article)
                                    <option value="{{ $article }}">{{ $article }}</option>
                                    @endforeach
                                </select>
                                <select id="context" class="search-context-id">
                                    <option></option>
                                    @foreach($contexts as $context)
                                    <option value="{{ $context }}">{{ $context }}</option>
                                    @endforeach
                                </select>
                                <select id="term" class="search-term">
                                    <option></option>
                                    @foreach($terms as $term)
                                    <option value="{{ $term }}">{{ $term }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="articleHide" class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Full article</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="english-article">
                                <h5 id="articleTitleE" class="article-title"></h5>
                                <div class="article-content">
                                    <p id="articleContentE"></p>
                                </div>
                            </div>
                            <div class="chinese-article">
                                <h5 id="articleTitleC" class="article-title"></h5>
                                <div class="article-content">
                                    <p id="articleContentC"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contextHide"  class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Context</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="english-article">
                                <h5 class="article-title"></h5>
                                <div class="article-content">
                                    <p id="eparagraph"></p>
                                </div>
                            </div>
                            <div class="chinese-article">
                                <h5 class="article-title"></h5>
                                <div class="article-content">
                                    <p id="cparagraph"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="termHide" class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Terms</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="english-article">
                                <h5 id="" class="article-title"></h5>
                                <div class="article-content">
                                    <p id="eterms"></p>
                                </div>
                            </div>
                            <div class="chinese-article">
                                <h5 class="article-title"></h5>
                                <div class="article-content">
                                    <p id="cterms"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $("#avanSearch").submit(function(e) {
           e.preventDefault(); 
           var article = $('#article').val();
           var context = $('#context').val();
           var term = $('#term').val();
           $.ajax({
               url: '/advancedSearchp/',
               type: "GET",
               data: {article:article, context:context, term:term},
               dataType: "json",
               success: function(data) {
                console.log(data);
                if (data.article_code) {
                    $("#articleHide").show();
                }
                 $("#articleTitleE").html(data.title_en);
                 $("#articleContentE").html(data.content_en);
                 $("#articleTitleC").html(data.title_cn);
                 $("#articleContentC").html(data.content_cn);

                 $("#contextNo").html(data.context_no);
                 if (data.context_no) {
                    $("#contextHide").show();
                 }
                 $("#eparagraph").html(data.eparagraph);
                 $("#cparagraph").html(data.cparagraph);
                 if (data.term_no) {
                    $("#termHide").show();
                 }
                 $("#eterms").html(data.etermst);
                 $("#cterms").html(data.ctermst);
               }
           });
       });
    });
</script>

@endsection