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
        $taxList = country();
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
}
