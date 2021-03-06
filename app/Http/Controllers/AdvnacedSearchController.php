<?php

namespace App\Http\Controllers;

use App\Article;
use App\Model\AddTermEngChi;
use App\Model\CotextParagraph;
use App\Model\TermEngCha;
use Illuminate\Http\Request;

class AdvnacedSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::pluck('article_code');
        $contexts = CotextParagraph::pluck('context_no');
        $terms = TermEngCha::pluck('term_no');
        return view('modules.search.index', compact('articles', 'contexts', 'terms'));
    }


    public function advancedSearch(Request $request)
    {
        $termt = $request->termtext;

        $contextsear = $request->contextsear;

        $article = Article::where('article_code', $request->article)->first();

        $context = CotextParagraph::where('context_no', $request->context)->first();

        $contexttt = CotextParagraph::where('eparagraph','LIKE','%'.$contextsear.'%')
                                ->orWhere('cparagraph','LIKE','%'.$contextsear.'%')->first();

        $term = TermEngCha::where('term_no', $request->term)->first();
        if (!empty($termt)) {
            $termtext = TermEngCha::where('etermst','LIKE','%'.$termt.'%')
                                ->orWhere('ctermst','LIKE','%'.$termt.'%')->first();
        }else{
            $termtext =  '';
        }
        

        $collection = collect($article);
        $alls =  $collection->merge($context);
        $col = collect($alls);
        $all = $col->merge($term);
        $colss = collect($all);
        $allsss = $colss->merge($contexttt);
        $colsss = collect($allsss);
        $al = $colsss->merge($termtext);

        return response()->json($al);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
