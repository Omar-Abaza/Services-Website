<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index()
    {
        $data["services"] = Service::get();
        return view("admin.services.services")->with($data);
    }

    public function store(Request $request)

    {
        $data = $request->validate([
            'name' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            "icon_image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_desc' => 'required|string',
            'description' => 'required|string',

        ]);

        $fileImage = Storage::putFile("services", $data["image"]);
        $imageName = explode("/", $fileImage);

        $fileImage = Storage::putFile("icon-image", $data["icon_image"]);
        $iconImageName = explode("/", $fileImage);

        Service::create([
            'name' => $request->name,
            'image' => $imageName[1],
            'icon_image' => $iconImageName[1],
            'small_desc' => $request->small_desc,
            'description' => $request->description,

        ]);

        return redirect()->route("admin.all-services");
    }

    public function update(Request $request)
    {

        $data =  $request->validate([
            'id' => 'required|exists:services,id',
            'name' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            "icon_image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_desc' => 'required|string',
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($request->id);
        if ($request->has("image")) {
            if (isset($service->image)) {
                Storage::delete("services/".$service->image);
                Storage::delete("icon-image/".$service->icon_image);
            }
                $fileImage = Storage::putFile("services", $data["image"]);
                $imageName = explode("/", $fileImage);

                $fileImage = Storage::putFile("icon-image", $data["icon_image"]);
                $iconImageName = explode("/", $fileImage);
        }

        Service::findOrFail($request->id)->update([
            'name' => $request["name"],
            'image' => $imageName[1],
            'icon_image' => $iconImageName[1],
            'small_desc' => $request["small_desc"],
            'description' => $request["description"],
        ]);

        return redirect()->route("admin.all-services");
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);
        if (isset($service->image)) {
            Storage::delete("services/".$service->image);
            Storage::delete("icon-image/".$service->icon_image);
        }

        $service->delete();

        return redirect()->route("admin.all-services");
    }
}
