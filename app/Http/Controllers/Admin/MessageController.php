<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Requests\MassDestroyMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = Message::get();
        return view('admin.message.index', compact('messages'));
    }


    public function create()
    {
        abort_unless(\Gate::allows('message_create'), 403);

        return view('admin.message.create');
    }

    public function store(StoreMessageRequest $request)
    {
        abort_unless(\Gate::allows('message_create'), 403);

        $message = Message::create($request->all());

        return redirect()->route('admin.messages.index');
    }

    public function edit(Message $message)
    {
        abort_unless(\Gate::allows('message_edit'), 403);

        return view('admin.message.edit', compact('message'));
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        abort_unless(\Gate::allows('message_edit'), 403);

        $message->update($request->all());

        // dd($request->all());

        return redirect()->route('admin.messages.index');
    }

    public function show(Message $message)
    {
        abort_unless(\Gate::allows('product_show'), 403);

        return view('admin.message.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        abort_unless(\Gate::allows('message_delete'), 403);

        $message->delete();

        return back();
    }

    public function massDestroy(MassDestroyMessageRequest $request)
    {
        Message::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
