<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Village;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Log";
        return view('admin.log.index', compact('title'));
    }

    ## Get Data
    public function get_log_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $log = Log::limit(10);

            return DataTables::of($log)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('display_name', function ($v) {
                return $v->user ? $v->user->name : '';
            })
            ->addColumn('name', function ($v) {
                return $v->user ? $v->user->name : '';
            })
            ->addColumn('display_description', function ($v) {
                return $v->description;
            })
            ->addColumn('display_execution_time', function ($v) {
                return \Carbon\Carbon::parse($v->created_at)->diffForHumans();
                // return $v->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('action', function ($v) {
                $name = $v->user ? $v->user->name : '';
                $btn = '<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal' . $v->id . '"><i class="fa fa-list"></i></a>';
                // More action buttons...
                return $btn;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['action'])->make(true);
        }
    }
}
