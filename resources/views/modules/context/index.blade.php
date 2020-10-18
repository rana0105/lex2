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
                    		<h1>context list</h1>
                    	</div>
                    	<div class="main-content">
                    		<table id="context-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Article Title</th> --}}
                                        <th>Chi Context</th>
                                        <th>Eng Context</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($contexts as $context)
                                    <tr>
                                        {{-- <td>
                                            <a href="#">{{ $context->paracontext->etitle }}</a><br>
                                            <a href="#">{{ $context->paracontext->ctitle }}</a>
                                        </td> --}}
                                        <td>{!! $context->cparagraph !!}<br>
                                            {{-- <a href="#" target="_blank">{{ $context->csource }}</a> --}}
                                        </td>
                                        <td>
                                            {!! $context->eparagraph !!}<br>
                                            {{-- <a href="#" target="_blank">{{ $context->esource }}</a> --}}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="material-icons">more_vert</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('viewmore', $context->id) }}" class="context"><i class="material-icons">info</i> View more</a><br>
                                                    {{-- <a href="#" class="context" data-id="{{$context}}" data-toggle="modal" data-target="#context-info-modal"><i class="material-icons">info</i> View more</a><br> --}}
                                                    <a href="{{ route('editcontext', $context->id) }}"><span class="material-icons">create</span> Edit</a><br>
                                                    <a href="{{ route('addTermContext', $context->id) }}" class="contextEditTerm"><span class="material-icons">note_add</span>Add Term</a><br>
                                                    <a href="#" data-id="{{ $context->id }}" class="deleteContext"><i class="material-icons">close</i> Delete</a><br>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      <!-- Context Information Modal -->
        <div class="modal fade" id="context-info-modal" tabindex="-1" role="dialog" aria-labelledby="context-info-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="context-info-modalTitle">Context Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="eng-context-info">
                                        <h5>English</h5>
                                        <p></p>
                                        <span>Article ID: 1000000</span><br>
                                        <span id="context_id"></span><br>
                                        <span id="order"></span><br>
                                        <span id="eterm"></span><br>
                                        <span id="enote"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chi-context-info">
                                        <h5>Chinese</h5>
                                        <span>Article ID: 1000000</span><br>
                                        <span id="ccontext_id"></span><br>
                                        <span id="corder"></span><br>
                                        <span id="cterm"></span><br>
                                        <span id="cnote"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Term Addition Modal -->
        <div class="modal fade" id="add-term-modal" tabindex="-1" role="dialog" aria-labelledby="add-term-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-term-modalTitle">Context Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="term-add" action="{{ route('addTerm') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>English</h5>
                                        <span id="eparagraph"></span>
                                        <input multiple data-role="tagsinput" placeholder="Terms" name="eterms" class="term-input">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Chinese</h5>
                                        <span id="cparagraph"></span>
                                        <input multiple data-role="tagsinput" placeholder="Terms" name="cterms" class="term-input">
                                    </div>
                                </div>
                                <input id="conId" type="hidden" name="conid">
                                <button type="submit">Add Terms</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $( ".context" ).click(function() {
           var context = $(this).attr('data-id');
           var con = JSON.parse(context);
           $("#context_id").html("Context ID:" +  con.id);
           $("#order").html("Context Order:" +  con.order);
           $("#ccontext_id").html("Context ID:" +  con.id);
           $("#corder").html("Context Order:" +  con.order);
           $("#eterm").html("Term:" +  con.paracontext.eterms);
           $("#cterm").html("Term:" +  con.paracontext.cterms);
           $("#enote").html("Note:" +  con.paracontext.enote);
           $("#cnote").html("Note:" +  con.paracontext.cnote);
        });

        $( ".contextEditTerm" ).click(function() {
           var contextt = $(this).attr('data-id');
           var conTerm = JSON.parse(contextt);
           console.log(conTerm);
           $("#eparagraph").html(conTerm.eparagraph);
           $("#cparagraph").html(conTerm.cparagraph);
           $("#conId").val(conTerm.id);
        });

        $( ".deleteContext" ).click(function() {
            var contextId = $(this).attr('data-id');
            if(contextId) {
                $.ajax({
                    url: '/deleteContext/'+contextId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        location.reload();
                        alert('Context successfully deleted');
                    }
                });
            }
        });
    });
</script>
@endsection