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
                    		<h1>terms</h1>
                    	</div>
                    	<div class="main-content article-list">
                            <a href="{{ route('term.create') }}" class="new-article-btn"><span class="material-icons">post_add</span>Create New Term</a>
                    		<table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>English</th>
                                        <th>Chinese</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($termcontexts as $termc)
                                    <tr>
                                        <td>
                                            <span class="term-group">{{ $termc->etermst }}</span><br>
                                            {!!  $termc->termcontext->eparagraph !!}
                                        </td>
                                        <td>
                                            <span class="term-group">{{ $termc->ctermst }}</span><br>
                                            {!! $termc->termcontext->cparagraph !!}
                                        </td>
                                        <td>
                                        	<div class="dropdown">
                                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="material-icons">more_vert</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('editTerm', $termc->id) }}"><span class="material-icons">create</span> Edit</a><br>
                                                    <a href="#" data-toggle="modal" data-target="#add-term-modal"><span class="material-icons">view_headline</span> Context</a><br>
                                                     <a href="#" data-id="{{ $termc->id }}" class="deleteTerm"><i class="material-icons">close</i> Delete</a><br>
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
      
      
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $( ".deleteTerm" ).click(function() {
            var termtId = $(this).attr('data-id');
            if(termtId) {
                $.ajax({
                    url: '/deleteTerm/'+termtId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        location.reload();
                        alert('Term Context successfully deleted');
                    }
                });
            }
        });
    });
</script>
@endsection