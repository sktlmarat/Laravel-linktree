<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        $links = Auth::user()->links()->withCount('visits')->with('latest_visit')->get();

        return view('links.index', [
            'links' => $links
        ]);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->to('dashboard/links');
        }

        return redirect()->back();
    }

    public function edit(Link $link)
    {
        if ($link->user_id != Auth::id()) {
            return abort(404);
        }
        return view('links.edit', [
            'link' => $link
        ]);
    }

    public function update(Request $request, Link $link)
    {
        if ($link->user_id != Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name', 'link']));
        return redirect()->to('dashboard/links');


    }

    public function destroy(Request $request, Link $link)
    {
        if ($link->user_id != Auth::id()) {
            return abort(403);
        }

        $link->delete();
        return redirect()->to('dashboard/links');
    }
}
