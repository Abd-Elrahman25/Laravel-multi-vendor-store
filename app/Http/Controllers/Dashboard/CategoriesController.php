<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all(); //returns Collection object

        $user = Auth::user();

        return view('dashboard.categories.index',compact('categories','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();

        $user = Auth::user();

        return view('dashboard.categories.create',compact('user','parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    /*  $request->input('name'); from post or get 
        $request->get('name'); 
        $request->query('name'); from url
        $request->post('name');

        $request->all(); //returns array of all input data
        $request->only();
        $request->except(); */

/*      $category = new category($request->all());
        $category->save(); */

        // request merge // adds a value to the request

        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        $category = Category::create($request->all());

        //PRG post redirect get

        return redirect()
            ->route('categories.index')
            ->with('success','Category created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
