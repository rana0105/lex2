<?php

namespace App\Http\Controllers;

use App\Model\AddTermCha;
use App\Model\AddTermEng;
use App\Model\AddTermEngChi;
use App\Model\Context;
use App\Model\ContextParaCha;
use App\Model\CotextParagraph;
use Illuminate\Http\Request;

class ContextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contexts = CotextParagraph::with('paracontext','temrs')->get();
        return view('modules.context.index', compact('contexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contexts = Context::all();
        return view('modules.context.create', compact('contexts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $epara = explode('</p>', $request->epara);
        $cpara = explode('</p>', $request->cpara);

        $count = count($epara);

        $narray = array();

        for ($i=0; $i < $count; $i++) { 
            $narray[$i] = ['eparagraph' => $epara[$i], 'cparagraph' => $cpara[$i]];
        }


        $count1 = count($narray);

        $context = Context::create($request->all());

        if ($context) {
            foreach ($narray as $key => $value) {
                if (--$count1 <= 0) {
                    break;
                }
                $checkOrder = CotextParagraph::where('context_id', $context->id)
                            ->latest()->first();
                if (!empty($checkOrder)) {
                    $order = CotextParagraph::where('context_id', $context->id)->max('order');
                }else{
                    $order = 1;
                }
                $paraCon = new CotextParagraph;
                $paraCon->context_id = $context->id;
                $paraCon->esource = $request->esource;
                $paraCon->csource = $request->csource;
                // $paraCon->eterms = $request->eterms;
                // $paraCon->cterms = $request->cterms;
                $paraCon->eparagraph = $value['eparagraph'];
                $paraCon->cparagraph = $value['cparagraph'];
                $paraCon->context_no = mt_rand(100000, 999999);
                if (!empty($checkOrder)) {
                    $paraCon->order = $order + 1;
                }else{
                    $paraCon->order = $order;
                }
                $paraCon->save();
            }
        }

        return redirect()->route('context.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewmore($id)
    {
        $context = CotextParagraph::with('paracontext','temrs')->find($id);
        return view('modules.context.viewmore', compact('context'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcontext($id)
    {
        $context = CotextParagraph::with('paracontext')->find($id);
        return view('modules.context.editcon', compact('context'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function posteditcontext(Request $request)
    {
        $context = CotextParagraph::with('paracontext')->find($request->conid);

        $context->esource = $request->esource;
        $context->csource = $request->csource;
        $context->eparagraph = $request->epara;
        $context->cparagraph = $request->cpara;
        $context->save();

        $conId = Context::find($context->paracontext->id);
        $conId->etitle = $request->etitle;
        $conId->ctitle = $request->ctitle;
        $conId->enote = $request->enote;
        $conId->cnote = $request->cnote;
        $conId->save();

        return redirect()->route('context.index');
    }


    public function addTermContext($id)
    {
        $context = CotextParagraph::find($id);
        return view('modules.context.add-term', compact('context'));
    }


    public function addTerm(Request $request)
    {

        $eterm = $request->eterms;
        $cterm = $request->cterms;
        $resE = array_filter($eterm);
        $resC = array_filter($cterm);

        $resultE = array_values($resE);
        $resultC = array_values($resC);

        foreach ($resultE as $ky => $va) {
            $engT = new AddTermEngChi;

            $engT->context_id = $request->conid;
            $engT->term_no = mt_rand(100000, 999999);
            $engT->eterms = $resultE[$ky];
            $engT->cterms = $resultC[$ky];
            $engT->enote = $request->enote;
            $engT->cnote = $request->cnote;

            $engT->save();

        }

        // foreach ($resultE as $key => $value) {
        //     $engT = new AddTermEng;

        //     $engT->context_id = $request->conid;
        //     $engT->enote = $request->enote;
        //     $engT->eterms = $value;

        //     $engT->save();

        // }

        // foreach ($resultC as $ke => $val) {
        //     $chaiT = new AddTermCha;

        //     $chaiT->context_id = $request->conid;
        //     $chaiT->cnote = $request->cnote;
        //     $chaiT->cterms = $val;

        //     $chaiT->save();

        // }

        return redirect()->route('context.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteContext($id)
    {
        $context = CotextParagraph::find($id)->delete();
        return redirect()->route('context.index');
    }


    public function advancedSearch(Request $request)
    {
        $article = Article::where('id', $request->article)->first();

        $context = Context::where('id', $request->context)->first();

        $term = Term::where('id', $request->term)->first();

        // $article = $request->article;
        // $context = $request->context;
        // $term = $request->term;

        // $collection = collect($article);
        // $all =  $collection->merge($context);

        return response()->json($all);
    }
}
