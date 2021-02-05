<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Category controller.
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function show(Category $category): Response
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function edit(Category $category): Response
    {
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Category  $category
     * @return Response
     */
    public function update(Request $request, Category $category): Response
    {
        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category): Response
    {
        return view();
    }
}
