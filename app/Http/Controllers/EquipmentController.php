<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('equipment.index');
    }

    public function show($id)
    {
        $user = User::with('charges')->where('id', $id)->first();

        return view('equipment.show', compact('user'));
    }

    public function importData()
    {
        $jsonData = file_get_contents(storage_path('devicesList.json'));
        $objects = json_decode($jsonData,true);

        foreach ($objects as $object) {
            $device = new Device();
            $device->item = $object['Type'];
            $device->serial_number = $object['Serial'];
            $device->inventory_number = $object['Inventory'];
            $device->created_at = now();
            $device->updated_at = now();
            $device->save();
        }

        echo "Success!";
    }
}
