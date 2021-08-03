<?php

namespace App\Http\Controllers;

use App\Models\DownVote;
use App\Models\UpVote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function upVote( $post_id, $user_id )
    {
        $isVotedDown = DownVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->first();
        $isVotedUp = UpVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->first();
        if($isVotedUp === null) {
            if($isVotedDown !== null) {
                DownVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->delete();
            }
            $upvote = new UpVote();
            $upvote->fr_user_id = $user_id;
            $upvote->fr_post_id = $post_id;
            $upvote->save();
        }
        return back();
    }
    public function downVote( $post_id, $user_id ) 
    {
        $isVotedDown = DownVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->first();
        $isVotedUp = UpVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->first();
        if($isVotedDown === null) {
            if($isVotedUp !== null) {
                UpVote::where('fr_user_id', $user_id)->where('fr_post_id', $post_id)->delete();
            }
            $upvote = new DownVote();
            $upvote->fr_user_id = $user_id;
            $upvote->fr_post_id = $post_id;
            $upvote->save();
        }       

        return back();
    }
}
