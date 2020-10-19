@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")
        <main class="page-content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="eng-context-info">
                            <h5>English</h5>
                            <p></p>
                            <span id="context_id">Context ID: {{ $detail->context_no }}</span><br>
                            <span id="enote">Source: {{ $detail->esource }}</span><br>
                            <span id="order">Title: {!! $detail->eparagraph !!}</span><br>
                            Terms: 
                            @foreach($detail->temrengchi as $eterm)
                            <span id="eterm">{{ $eterm->etermst }}</span>,
                            @endforeach
                            <br>
                            <span id="enote">Note: {{ $detail->enote }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="chi-context-info">
                            <h5>Chinese</h5>
                            <span id="ccontext_id">Context ID: {{ $detail->context_no }}</span><br>
                            <span id="enote">Source: {{ $detail->csource }}</span><br>
                            <span id="corder">Title: {!! $detail->cparagraph !!}</span><br>
                            Terms: 
                            @foreach($detail->temrengchi as $cterm)
                            <span id="cterm">{{ $cterm->ctermst }}</span>,
                            @endforeach
                            <br>
                            <span id="cnote">Note: {{ $detail->cnote }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection
