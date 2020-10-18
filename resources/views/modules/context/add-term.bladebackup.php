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
                        <h1>add term</h1>
                    </div>
                    <form action="{{ route('addTerm') }}" method="POST">
                        @csrf
                        <input type="hidden" name="conid" value="{{ $context->id }}">
                    <div class="main-content create-context">
                        <div class="english-context">
                            <h5>English</h5>
                            <textarea class="form-control" readonly="">{!! strip_tags($context->eparagraph) !!}
                            </textarea><br>
                            <input type="text" name="enote" placeholder="Term Note" class="note">
                            
                        </div>
                        <div class="chinese-context">
                            <h5>China</h5>
                            <textarea class="form-control" readonly="">{!! strip_tags($context->cparagraph) !!}
                            </textarea><br>
                            <input type="text" name="cnote" placeholder="Term note" class="note">
                            
                        </div>
                    </div>
                    <div id="addDivmore">
                        <div class="main-content create-context">
                            <div class="english-context">
                                <input name="eterms[]" multiple data-role="tagsinput" class="term-input">
                            </div>
                            <div class="chinese-context">
                                <input name="cterms[]" multiple data-role="tagsinput" class="term-input">
                            </div>
                        </div>
                    </div>
                    <div class="main-content create-context">
                        <a href="#" id="addMore"><span class="material-icons"> add_box</span> Add One More Term</a>
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
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var result = '<div class="main-content create-context">'+
                            '<div class="english-context">'+
                                '<input name="eterms[]" data-role="tagsinput" class="term-input form-control"/>'+
                            '</div>'+
                            '<div class="chinese-context">'+
                                '<input name="cterms[]" data-role="tagsinput" class="term-input form-control"/>'+
                            '</div>'+
                        '</div>';

        $( "#addMore" ).click(function() {
            $("#addDivmore").append(result);
        });

        $('input[data-role=tagsinput]').tagsinput();

        $( ".remove" ).click(function() {
            alert('sssssssssssssss')
        });


        // $( "#addDivmore" ).on('click', 'remove', function() {
        //     alert('ssssssssss')
        //     $(this).closest('div').remove();
        // });
    });
</script>
@endsection