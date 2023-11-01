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

    // admin
    public function packagesManagement()
    {
        return view('admin.admin-packages');
    }
}
