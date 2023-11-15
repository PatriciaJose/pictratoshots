<?php

namespace App\Http\Controllers;

use App\Models\PhotoshootType;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $photoshootTypes = PhotoshootType::all();
        $selectedType = $request->get('type_id');

        $query = Package::query();

        if ($selectedType) {
            $query->where('typeID', $selectedType);
        }

        $packages = $query->get();

        return view('clients.services', compact('packages', 'photoshootTypes', 'selectedType'));
    }

    public function packagesManagement()
    {
        $packages = Package::all();
        $photoshootTypes = PhotoshootType::all();

        return view('admin.admin-packages', compact('packages', 'photoshootTypes'));
    }
    public function packageStore(Request $request)
    {
        $data = $request->validate([
            'package_name' => 'required',
            'typeID' => 'required',
            'package_desc' => 'required',
            'price' => 'required',
            'inclusions' => 'required',
        ]);

        Package::create($data);

        return redirect()->route('package-management')->with('message', 'Package created successfully');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'package_name' => 'required',
            'typeID' => 'required',
            'package_desc' => 'required',
            'price' => 'required',
            'inclusions' => 'required',
        ]);

        Package::find($id)->update($data);

        return redirect()->route('package-management')->with('message', 'Package updated successfully');
    }
    public function delete($id)
    {
        $package = Package::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }
        $package->delete();
        return response()->json(['message' => 'Package deleted'], 200);
    }
}
