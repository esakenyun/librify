<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherFormRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.adminpublisher', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(PublisherFormRequest $request)
    {
        $data = $request->validated();

        $publisher = Publisher::create($data);

        notify()->success('Publisher Added Successfully');
        return redirect('/publisher');
    }

    public function edit($publisher_id)
    {
        $publisher = Publisher::find($publisher_id);

        return view('admin.publisher.edit', compact('publisher'));
    }

    public function update(PublisherFormRequest $request, $publisher_id)
    {
        $data = $request->validated();

        $publisher = Publisher::where('id', $publisher_id)->update([
            'name' => $data['name'],
            'city' => $data['city'],
            'year' => $data['year'],
        ]);

        notify()->success('Publisher Updated Successfully');
        return redirect('/publisher');
    }

    public function destroy($publisher_id)
    {
        $publisher = Publisher::find($publisher_id)->delete();

        notify()->success('Publisher Deleted Successfully');
        return redirect('/publisher');
    }
}
