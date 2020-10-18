
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
                    <div id="rowmore" class="optionBox">
                      <div class="row">
                        <div class="col-md-5">
                          <input type="text" name="eterms[]" data-role="tagsinput" value="">
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="cterms[]" data-role="tagsinput" value="">
                        </div>
                        <a href="javascript:void(0)" id="rowadd" class="btn btn-sm btn-info mt-2">Add</a>
                      </div>
                    </div>
                    <div style="width:100%; text-align: center;">
                        <button class="btn btn-lg btn-info mt-2" type="submit">submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#rowadd").click( function(){
      var result = '<div class="row mt-2">'+
                '<div class="col-md-5">'+
                '<input type="text" name="eterms[]" data-role="tagsinput" value="">'+
                '</div>'+
                '<div class="col-md-5">'+
                '<input type="text" name="cterms[]" data-role="tagsinput" value="">'+
                '</div>'+
                '<a href="javascript:void(0)" class="btn btn-sm btn-danger remove mt-2">Remove</a>'+
                '</div>'

      $("#rowmore").append(result);
      $('input[data-role=tagsinput]').tagsinput();
      $('.optionBox').on('click','.remove',function() {
          $(this).parent().remove();
      });
    });
  });
</script>
@endsection
