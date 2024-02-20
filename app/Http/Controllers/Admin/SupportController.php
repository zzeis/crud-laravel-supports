<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {

        $supports = $this->service->getAll($request->filter);
        dd($supports);
        return view('Admin/supports/index', compact('supports'));
    }

    public function show(string $id)
    {

        //$Support::find($id);
        //Support::where('id', $id)->first();
        //Suports::where('id','=', $id)->first();

        if (!$support = $this->service->findOne($id)) {
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
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        // if (!$support = $support->where('id', $id)->first()) {
        //     return back();
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('Admin/supports/edit', compact('support'));
    }

    public function update(StoreSupportRequest $request, Support $support, string|int $id)
    {

        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );
        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
