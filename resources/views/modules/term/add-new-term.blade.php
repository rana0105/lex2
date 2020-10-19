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
                    		<h1>add new term</h1>
                    	</div>
                        <form action="{{ route('term.store') }}" method="POST">
                        @csrf
                        <div class="main-content create-context">
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" placeholder="Source">
                                </div>
                                <textarea name="enote" class="note" placeholder="Note"> 
                                </textarea>
                                {{-- <input type="text" name="enote" required="" placeholder="Note" class="note"> --}}

                                <textarea id="eng-context-area" name="epara">  
                                </textarea>
                                
                            </div>
                            <div class="chinese-context">
                                <h5>China</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" placeholder="Source">
                                </div>
                                <textarea name="enote" class="note" placeholder="Note"> 
                                </textarea>
                                {{--  class="inputheight"<input type="text" name="cnote" placeholder="Note" class="note"> --}}

                                <textarea id="chi-context-area" name="cpara"> 
                                </textarea>
                                
                            </div>
                        </div>
                        <div id="rowmore" class="optionBox">
                          <div class="row">
                            <div class="col-md-5">
                              <input type="text" name="eterms[]" data-role="tagsinput" value="">
                              <input type="text" name="enotet[]" placeholder="Note" class="note mt-2 inputheight">
                            </div>
                            <div class="col-md-5">
                              <input type="text" name="cterms[]" data-role="tagsinput" value="">
                              <input type="text" name="cnotet[]" placeholder="Note" class="note mt-2 inputheight">
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
      <!-- page-content" -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#rowadd").click( function(){
      var result = '<div class="row mt-2">'+
                '<div class="col-md-5">'+
                '<input type="text" name="eterms[]" data-role="tagsinput" value="">'+
                '<input type="text" name="enotet[]" placeholder="Note" class="note mt-2 inputheight">'+
                '</div>'+
                '<div class="col-md-5">'+
                '<input type="text" name="cterms[]" data-role="tagsinput" value="">'+
                '<input type="text" name="cnotet[]" placeholder="Note" class="note mt-2 inputheight">'+
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
<style>
  .inputheight {
        height: 75px;
  }
</style>
@endsection
@section('script')

@endsection