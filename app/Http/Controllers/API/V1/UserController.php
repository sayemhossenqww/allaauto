<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $totalRecords = Employee::select('count(*) as allcount')->count();   // Total records
        $response = array(
            "totalCount" => $totalRecords,
        );
        
        return response()->json($response);
    }

}