<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
   
    public function index()
    {
        $data['category'] = Category::where('user_id', auth()->id())->count();
        $data['file'] = File::whereHas('category', function ($query) {
            $query->where('user_id', auth()->id());
        })->where('status', 'show')->count();

        return view('home', $data);
    }
        
    public function welcome()
    {
        $data['files'] = File::whereHas('category', function ($query) {
            $query->where('status', 'show');
        })->where('status', 'show')->paginate(25);

        return view('welcome', $data);
    }

    public function changeStatus(Request $request)
    {
        $model = $request->model;
        $field = $request->field;
        $id = $request->id;
        $tab = $request->tab;

        $itemId = DB::table($model)->find($id);
        ($itemId->$field == 'show') ? $action=$itemId->$field = 'hide' : $action=$itemId->$field = 'show';     
        DB::table($model)->where('id', $id)->update([$field => $action]);
        return response()->json(['message' => 'Status updated successfully.']);
    }
}
