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
                    		<h1>add new context</h1>
                    	</div>
                        <form action="{{ route('context.store') }}" method="POST">
                        @csrf
                        <div class="main-content create-context">
                            
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" placeholder="Source" required="">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-eng' name="etitle" required="">
                                        <option></option>
                                        @foreach($contexts as $context)
                                       <option value='{{ $context->etitle }}'>{{ $context->etitle }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <input type="text" name="enote" required="" placeholder="Note" class="note">

                                <textarea id="eng-context-area" name="epara">  
                                </textarea>
                                {{-- <input multiple data-role="tagsinput" placeholder="Terms" name="eterms" class="term-input"> --}}
                                
                            </div>
                            <div class="chinese-context">
                                <h5>China</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" required="" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi' name="ctitle" required="">
                                        <option></option>
                                       @foreach($contexts as $context)
                                       <option value='{{ $context->ctitle }}'>{{ $context->ctitle }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <input type="text" name="cnote" placeholder="Note" class="note">

                                <textarea id="chi-context-area" name="cpara"> 
                                </textarea>
                                {{-- <input multiple data-role="tagsinput" placeholder="Terms" name="cterms" class="term-input"> --}}
                                
                            </div>
                            <hr>
                            <div style="width:100%; text-align: center;">
                                <button type="submit">submit</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
@endsection