<?php

namespace App\Http\Controllers;

use App\Models\Vaichele;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VaicheleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_Manager');
        $vaicheles=  Vaichele::latest()->paginate();
        return \view('vaichele.index',compact('vaicheles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('vaichele.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('is_Manager');
        $validated = $request->validate([
            'type'=> 'required',
            'number' =>  'required|max:50|unique:vaicheles,number',
        ]);
        if($validated){
            Vaichele::create($validated);
            return \to_route('vaicheles.index')->with('message','Vaichele Added Successfully.');
        }else{
            return \to_route('vaicheles.create')->with('message', 'Vaichele Add Failed.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaichele  $vaichele
     * @return \Illuminate\Http\Response
     */
    public function show(Vaichele $vaichele)
    {
        $this->authorize('is_Manager');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaichele  $vaichele
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaichele $vaichele)
    {
        $this->authorize('is_Manager');
        // return view('vaichele.edit',compact('vaichele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaichele  $vaichele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaichele $vaichele)
    {
        $this->authorize('is_Manager');
        // $validated=$request->validate([
        //     'type' => 'required|max:25',
        //     'number' => [
        //         'required',Rule::unique('vaicheles')->ignore($this->vaichele);
        //     ],
        // ]);
        // $vaichele->update($validated);
        // return \to_route('vaicheles.index')->with('message','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaichele  $vaichele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaichele $vaichele)
    {
        $this->authorize('is_Manager');
        $vaichele->delete();
        return \to_route('vaicheles.index')->with('message','Successfully Deleted.');
    }
}
