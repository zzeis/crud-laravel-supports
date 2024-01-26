<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {

        $supports = $support->all();


        return view('Admin/supports/index', compact('supports'));
    }

    public function show(string|int $id)
    {

        //$Support::find($id);
        //Support::where('id', $id)->first();
        //Suports::where('id','=', $id)->first();

        if (!$support =  Support::find($id)) {
            return back();
        }

        return view('Admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('Admin/supports/create');
    }

    public function store(StoreSupportRequest $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';
        $support = $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        return view('Admin/supports/edit', compact('support'));
    }

    public function update(StoreSupportRequest $request, Support $support, string|int $id)
    {
        if (!$support =  $support->find($id)) {
            return back();
        }


        //alternative update
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id)
    {
        if (!$support =  Support::find($id)) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');

    }
}
