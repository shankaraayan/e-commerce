<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    public function list()
    {
        $taxList = Country::paginate(10);
        return view('admin.tax.view',compact('taxList'));
    }

    public function add_view()
    {
        return view('admin.tax.add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vat_tax' => 'required|integer',
            'short_code' => 'required|unique:countries,short_code',
            'country' => 'required|unique:countries,country',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('country_error','Country Error')->withErrors($validator)->withInput();
        }

        Country::create($request->all());

        // dd($request->all());
        return redirect()->back();
    }

    public function edit_view($id)
    {
        $taxation = Country::find($id);
        return view('admin.tax.edit',compact('taxation'));
    }

    public function update(Request $request)
    {
        // $taxation = Country::find($request->id);

        Country::where('id',$request->id)->update([
            'vat_tax' => $request->vat_tax,
            'country' => $request->country,
            'short_code' => $request->short_code,
        ]);

        return redirect()->route('admin.taxation.list');
    }

    public function delete($id)
    {
        Country::find($id)->delete();
        return redirect()->back();
    }
}
