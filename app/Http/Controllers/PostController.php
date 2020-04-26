<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {

    public function index(Request $request)
    {
        //$posts = BulklyBufferPosting::paginate(15);
        $group_id = 0;
        $date = null;
        $search_text = null;
        if($request->isMethod('post')) {
            $search_text = $request->input('search_text') ?? null;
            $group_id = $request->input('group') ?? 0;
            $date = $request->input('date') ?? null;
        }
        $groups = DB::table('social_post_groups')->select('id', 'name')->get();
        $posts = DB::table('buffer_postings')
            ->leftJoin('social_accounts', 'buffer_postings.account_id', '=', 'social_accounts.id')
            ->leftJoin('social_post_groups', 'buffer_postings.group_id', '=', 'social_post_groups.id')
            ->where(function($query) use($group_id) {
                if($group_id != 0)
                    $query->where('buffer_postings.group_id', $group_id);
            })

            //others filter can be implemented here..

            ->select('buffer_postings.*', DB::raw('social_accounts.name as acc_name'), 'social_accounts.avatar', DB::raw('social_post_groups.name as group_name'), DB::raw('social_post_groups.type as group_type'), )
            ->paginate(15);

        //return $posts;
        return view('posts/index', ['posts' => $posts, 'groups'=>$groups]);
    }
}