<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
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

        $newProject = new Project();

        $newProject->title = $formData['title'];
        $newProject->type_id = $formData['type_id'];
        $newProject->repo = $formData['repo'];
        $newProject->description = $formData['description'];
        $newProject->languages = $formData['languages'];
        $newProject->thumb = $formData['thumb'];
        $newProject->slug = Str::slug($formData['title'], '-');

        $newProject->save();



        return redirect()->route('admin.projects.show' , $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validatorDataForm($request);

        $formData = $request->all();

        $project->slug = Str::slug($formData['title'], '-');
        
        $project->update($formData);


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    public function contact() {
        return view('admin.contact');
    }


    private function validatorDataForm($request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'title' => 'required|max:255|unique:App\Models\Project,title',
            'repo' => 'required|max:255',
            'description' => 'required|max:1000',
            'languages' => 'required|max:500',
            'thumb' => 'required|max:500|active_url|url',
            'type_id' => 'nullable|exists:types,id',
        ],[
            'title.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'title.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'title.unique' => 'Questo titolo si riferisce a un progetto gia esistente',
            'repo.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'repo.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'description.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'description.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'languages.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'languages.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'thumb.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'thumb.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'thumb.active_url' => 'Questo link per non è funzionante',
            'thumb.url' => 'Non hai inserito un link, (Https://.... oppure Http://)',
            'type_id.required.exists' => 'Inserisci una tipologia esistente',


        ])->validate();

        return $validator;

    }



}
