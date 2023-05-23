<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatorDataForm($request);

        $formData = $request->all();

        $newType = new Type();

        $newType->name = $formData['name'];
        $newType->description = $formData['description'];
        $newType->slug = Str::slug($formData['name'], '-');

        $newType->save();



        return redirect()->route('admin.types.show' , $newType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validatorDataForm($request);

        $formData = $request->all();

        $type->slug = Str::slug($formData['name'], '-');
        
        $type->update($formData);


        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }

    private function validatorDataForm($request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'name' => 'required',
            'description' => 'required',
        ],[
            'name.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'description.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
        ])->validate();

        return $validator;

    }
}
