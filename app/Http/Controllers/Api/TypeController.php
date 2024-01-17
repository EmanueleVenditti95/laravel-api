<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {
        $types = Type::all();

        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    public function show(Type $type) {
        
        $projects = Project::with('technologies')->where('type_id',$type->id)->orderBy('updated_at', 'desc')->paginate(10);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);        
    }
}
