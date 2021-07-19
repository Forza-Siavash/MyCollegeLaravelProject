<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "دسته بندی ها";
        $categories = Category::orderBy('id', 'asc')->get();
        return view('categories', compact('pageTitle', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "دسته بندی جدید";
        return view('create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'برای عنوان چیزی وارد نکردید',
            'title.unique' => 'این عنوان موجود است',
            'title.max' => 'حداکثر کاراکتر برای عنوان باید 50 باشد',
            'description.required' => 'برای توضیحات چیزی وارد نکردید'
        ];
        $validated = $request->validate([
            'title' => 'required|unique:categories|max:50',
            'description' => 'required',
        ], $messages);

        $category = new  Category(
            [
                'title' => $request->get('title'),
                'description' => $request->get('description')
            ]
        );
        try {
            $category->save();
        } catch (Exception $e) {
            return redirect(route('categories'))->with('warning', $e->getCode());
        }
        $msg = "دسته بندی جدید اضافه شد";
        return redirect(route('categories'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $pageTitle = "دسته بندی";
        return view('category', compact('pageTitle', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $pageTitle = "ویرایش دسته بندی";
        return view('edit', compact('pageTitle', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $messages = [
            'title.required' => 'برای عنوان چیزی وارد نکردید',
            'title.unique' => 'این عنوان موجود است',
            'title.max' => 'حداکثر کاراکتر برای عنوان باید 50 باشد',
            'description.required' => 'برای توضیحات چیزی وارد نکردید'
        ];
        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
        ], $messages);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        // $category->update($request->all());

        try {
        } catch (Exception $e) {
            return redirect(route('categories'))->with('warning', $e->getCode());
        }
        $msg = "دسته بندی جدید ویرایش شد";
        return redirect(route('categories'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Exception $e) {
            return redirect(route('categories'))->with('warning', $e->getCode());
        }
        $msg = "دسته بندی " . $category->title . " حذف شد ";
        return redirect(route('categories'))->with('success', $msg);
    }
}
