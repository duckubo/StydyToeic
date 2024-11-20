<?php

namespace App\Http\Controllers;

use App\Models\Grammarguideline;
use App\Models\Sliderbanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listslidebanner = Sliderbanner::all();
        return view('home', compact('listslidebanner'));

    }
    public function search(Request $request)
    {
        $grammarname = $request->input('grammarname');

        if (!$grammarname) {
            return response()->json(['error' => 'Grammar name is required'], 400);
        }

        // Giả sử bạn có một mô hình Grammarguideline để tìm kiếm
        $results = Grammarguideline::where('grammarname', 'like', "%$grammarname%")->get();

        if ($results->isEmpty()) {
            $empty = "Không có kết quả";
            return view('partials.searchresult', compact('empty'));
        }
        // Trả về kết quả tìm kiếm
        return view('partials.searchresult', compact('results'));

    }
}
