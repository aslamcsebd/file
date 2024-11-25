<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\PaginationTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    use PaginationTrait;

    function fileList()
    {
        $data['files'] = File::whereHas('category', function ($query) {
            $query->where('user_id', auth()->id());
        })->paginate();

        $data['fileStartIndex'] = $this->pagination($data['files']);

        $data['category'] = Category::where('user_id', auth()->id())->get();

        return view('pages.files', $data);
    }

    function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->user()->id);
                }),
            ],
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        Category::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'status' => 'show'
        ]);

        return back()->with('success', 'Category create successfully');
    }

    function addFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'file' => 'required|file|max:10240'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        $path = "files/" . auth()->id() . "/";
        if ($request->hasFile('file')) {
            if ($files = $request->file('file')) {
                $file = $request->file;
                $fullName = str_replace(" ", "_", $request->name) . "." . $file->getClientOriginalExtension();
                $files->move(public_path($path), $fullName);
                $fileLink = $path . $fullName;
            }
        }

        File::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'file' => $fileLink,
            'status' => 'show'
        ]);

        return back()->with('success', 'File upload successfully');
    }
}
