<?php namespace Learn\Http\Controllers;

use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Learn\Http\Requests\FormatRequest;
use Learn\Models\Format;
use Learn\Services\MessageService;

class FormatController extends Controller {

    protected $format;
    protected $message;

    function __construct(Format $format, MessageService $message)
    {
        $this->format = $format;
        $this->message = $message;
    }


    /**
     * Display a listing of the resource in the admin area.
     *
     * @return Response
     */
    public function adminIndex()
    {
        $formats = $this->format->paginate(50);
        return view('admin/formats/index')->with('formats', $formats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function adminCreate()
    {
        return view('admin/formats/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function adminStore(FormatRequest $request)
    {
        $this->format = $this->format->fill($request->all());
        $this->format->save();
        $this->message->success('New format "' . $this->format->name . '" has been saved.');
        return redirect('admin/formats');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $this->format = $this->format->find($id);
        return view('admin/formats/edit')->with('format', $this->format);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminUpdate(FormatRequest $request, $id)
    {
        $this->format = $this->format->find($id);
        $this->format->fill($request->all());
        $this->format->save();
        $this->message->success('Format "' . $this->format->name . '" has been updated.');
        return redirect('/admin/formats/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        $this->format = $this->format->find($id);
        $this->format->articles()->detach();
        $this->format->resources()->detach();
        $this->format->delete();
        $this->message->success('Format "' . $this->format->name . '" has been deleted.');
        return redirect('/admin/formats');
    }

}
