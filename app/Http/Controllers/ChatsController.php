<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    /**
     * Middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * get chat
     * @return void
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * fetch message
     * @return void
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * send message
     * @param Request $request
     * @return void
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent'];
    }

    public function deleteMessage(Request $request, Message $message)
    {
        $user = Auth::user();

        $message = Message::findOrFail($message);

        if ($user->id == $message->user_id) {
            $message->delete();
        }
    }
}
