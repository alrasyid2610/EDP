<?php

namespace App\Http\Controllers\Laptop;

use App\Http\Controllers\Controller;
use App\Models\LaptopDevice;
use Illuminate\Http\Request;

class ListLaptopController extends Controller
{
    public function index()
    {
        # code...
    }

    //
    public function create()
    {
        return view('laptop_device.create', ['page_action' => 'Index', 'page_name' => 'Laptop']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'processor' => 'required',
            'os' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'type_storage' => 'required'
        ]);

        $index_laptop = LaptopDevice::where('brand', '=', $request->brand)->count() + 1;

        $data = $request->except('_token', 'submit');
        $data['label_laptop'] = $request->brand . ' ' . $index_laptop;
        LaptopDevice::create($data);

        return redirect()->back();
    }
}
