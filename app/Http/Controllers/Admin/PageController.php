<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('admin.pages',['pages' => $pages]);
    }

    public function create(){

        return view('admin.pageCreate');
    }

    public function store(PageRequest $request){
        $page = new Page();
        $page->title = $request->title;
        $page->min_description = $request->min_description;
        $page->description = $request->description;
        $page->save();
        if($page==true)
            return redirect()->route('pages.index');
        else
            return redirect()->back()->withErrors();
    }

    public function show($id){
        $page = Page::select('*')->find($id);
        return view('admin.pageShow',[
            'page' => $page
        ]);
    }

    public function edit($id)
    {
        $page = Page::select('*')->find($id);
        return view('admin.pageEdit', [
            'page' => $page,
        ]);
    }

    public function update(PageRequest $request,$id){
        $page = Page::select('*')->find($id);
        $page->title = $request->title;
        $page->min_description = $request->min_description;
        $page->description = $request->description;
        $page->save();
        if($page==true)
            return redirect()->route('pages.index');
    }

    public function destroy($id)
    {
        $page = Page::destroy($id);
        if ($page == true){
            return redirect()->route('pages.index');
        }
    }
}

