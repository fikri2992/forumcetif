<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function strore(Thread $thread)
    {
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
    }
}
