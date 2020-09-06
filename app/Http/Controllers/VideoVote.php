<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\VideoVote as Vote;

class VideoVote extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        // return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
            'vote' => 'required',
        ]);

        $current_user = Auth::user();
        // $video_vote = DB::table('video_votes')->where('user_id', $current_user->id)->first();
        $video_vote = Vote::where('user_id', $current_user->id)
                          ->where('video_id', $request->input('video_id'))
                          ->first();

        // print_r($video_vote);

        if (is_null($video_vote)) {
            $video_vote = new Vote([
                'video_id' => $request->input('video_id'),
                'user_id' => $current_user->id,
                'vote' => $request->input('vote'),
            ]);

            $video_vote->save();
        } else {
            $video_vote->update([
                'video_id' => $request->input('video_id'),
                'vote' => $request->input('vote'),
            ]);
        }

        return response()->json([
            'video_id' => $video_vote->video_id,
            'vote' => $video_vote->vote,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
