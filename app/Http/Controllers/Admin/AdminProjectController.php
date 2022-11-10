<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function index()
    {
        $data["projects"] = Project::get();
        return view("admin.projects.projects")->with($data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_desc' => 'required|string',
            'description' => 'required|string',

        ]);

        $fileName = Storage::putFile("projects", $data["image"]);
        $imageName = explode("/", $fileName);

        Project::create([
            'name' => $request->name,
            'image' => $imageName[1],
            'small_desc' => $request->small_desc,
            'description' => $request->description,

        ]);

        return redirect()->route("admin.all-projects");
    }


    public function update(Request $request)
    {

        $data =  $request->validate([
            'id' => 'required|exists:projects,id',
            'name' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_desc' => 'required|string',
            'description' => 'required|string',
        ]);

        $project = Project::findOrFail($request->id);
        if ($request->has("image")) {
            if (isset($project->image)) {
                Storage::delete("projects/".$project->image);
            }
            $fileName = Storage::putFile("projects", $data["image"]);
            $imageName = explode("/", $fileName);
        }



        Project::findOrFail($request->id)->update([
            'name' => $request["name"],
            'image' => $imageName[1],
            'small_desc' => $request["small_desc"],
            'description' => $request["description"],
        ]);

        return redirect()->route("admin.all-projects");
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        if (isset($project->image)) {
            Storage::delete("projects/".$project->image);
        }
        $project->delete();

        return redirect()->route("admin.all-projects");
    }
}
