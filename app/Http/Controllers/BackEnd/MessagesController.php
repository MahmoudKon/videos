<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay(Store $request, $id)
    {
        $message = $this->model->findOrFail($id);
        Mail::send(new ReplayContact($message, $request->replay));
        alert()->success('successfuly replayed message', 'Replayed Done')->persistent("Close");
        return redirect()->route('message.edit', ['id' => $message->id]);
    }
}
