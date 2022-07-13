<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function memberList()
    {

        $membersData = Message::all();
        return ['status' => true, 'Message' => "List of all Members.", 'data' => ["Members" => MessageResource::collection($membersData)]];

    }


    public function memberFeeList()
    {
        $membersFeeData = Message::all();
        return ['status' => true, 'Message' => "List of all Members.", 'data' => ["Members" => MessageResource::collection($membersFeeData)]];

    }
}
