<?php

namespace App\Http\Controllers;

use App\Models\Suji;
use App\Models\SujiDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujis = Auth::user()->sujis;
        /*dd($sujis);*/
        return view('sujis.index', compact('sujis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //$dates = Date::latest()->get();
        //$suji_dates = SujiDate::latest()->get();

        //return view('sujis.create', compact('dates'));
        return view('sujis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'train_suji' => 'required',
            'train_type' => 'required',
            'quantity_of_vehicles' => 'required',
            /*'note' => 'required',*/
        ]);

        $suji = new Suji();
        $suji->title = $request->input('title');
        $suji->user_id = Auth::id();
        
        $suji->train_suji = $request->input('train_suji');
        $suji->train_type = $request->input('train_type');
        $suji->quantity_of_vehicles = $request->input('quantity_of_vehicles');
        $suji->note = $request->input('note');
        $suji->save();

        //use Illuminate\Support\Facades\DB;
        foreach ($request->input("date") as $value){
            $suji_date = new SujiDate();
            $suji_date->date = $value;
            
            $suji_date->suji_id = $suji->id;
            $suji_date->save();
        } 

        //$suji_date = DB::select("select date from suji_dates");
        //$suji_date->date = $request->input('date');
        
        //$suji_dates->suji_date = $request->input('date');
        //$suji_date->save();
        
        /*dd($suji);*/

        //$suji->suji_dates()->sync($request->input('suji_date_ids'));

        return redirect()->route('sujis.index')->with('flash_message', '投稿が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suji  $suji
     * @return \Illuminate\Http\Response
     */
    public function show(Suji $suji)
    {        
        $suji_dates = $suji->suji_dates;
        
        //view('sujis.show', compact('suji'));
        //return;
        //return view('sujis.show', compact('suji'));
        
        //$suji_date = new SujiDate();

        //$suji_date->date = $request->input('date');
        //$suji_date->suji_id = $suji->id;
        //$suji_date->save();

        $reviews = $suji->reviews;
        //$reviews = $suji_date->reviews()->get();
        return view('sujis.show', compact('suji', 'reviews', 'suji_dates'));
        //return view('suji_dates.show', compact('suji_date', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suji  $suji
     * @return \Illuminate\Http\Response
     */
    public function edit(Suji $suji)
    {
        $suji_dates = $suji->suji_dates;
        $reviews = $suji->reviews;
        //$suji_date = new SujiDate();
        //$suji_date->date = $request->input('date');
        //$suji_date->suji_id = $suji->id;
        //$suji_date->save();
        return view('sujis.edit', compact('suji', 'reviews', 'suji_dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suji  $suji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suji $suji)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'train_suji' => 'required',
            'train_type' => 'required',
            'quantity_of_vehicles' => 'required',
            /*'note' => 'required',*/
        ]);

        /*$suji = new Suji();*/
        $suji->title = $request->input('title');
        $suji->user_id = Auth::id();
        /*$suji->date = $request->input('date');*/
        // $suji->train_name = $request->input('train_name');
        // $suji->train_number = $request->input('train_number');
        // $suji->train_suji = $request->input('train_suji');
        // $suji->train_type = $request->input('train_type');
        // $suji->quantity_of_vehicles = $request->input('quantity_of_vehicles');
        // $suji->note = $request->input('note');
        // $suji->save();

        $suji->train_suji = $request->input('train_suji');
        $suji->train_type = $request->input('train_type');
        $suji->quantity_of_vehicles = $request->input('quantity_of_vehicles');
        $suji->note = $request->input('note');
        $suji->save();

        // foreach ($suji->suji_dates as $suji_date){
        //     $suji_date->delete();
        // } 
        SujiDate::where('suji_id', '=', $suji->id)->delete();

        foreach ($request->input("date") as $value){
            $suji_date = new SujiDate();
            $suji_date->date = $value;
            
            $suji_date->suji_id = $suji->id;
            $suji_date->save();
        } 

        // $suji_date = new SujiDate();
        // $suji_date->date = $request->input('date');
        // $suji_date->suji_id = $suji->id;
        // $suji_date->save();

        // $suji->suji_dates()->sync($request->input('suji_date_ids'));
        
        return redirect()->route('sujis.show', $suji)->with('flash_message', '投稿を編集しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suji  $suji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suji $suji)
    {
        $suji->delete();
        
        return redirect()->route('sujis.index')->with('flash_message', '投稿を削除しました');
    }

    public function getLogout()
    {
        Auth::logout();
        
        return redirect()->route('user.signin');
    }
}
