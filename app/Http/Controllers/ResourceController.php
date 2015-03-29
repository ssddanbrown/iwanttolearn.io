<?php namespace Learn\Http\Controllers;

use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Learn\Http\Requests\ResourceRequest;
use Learn\Models\Resource;
use Learn\Services\MessageService;

class ResourceController extends Controller {

    protected $resource;
    protected $message;

    function __construct(Resource $resource, MessageService $message)
    {
        $this->resource = $resource;
        $this->message = $message;
    }


    /**
     * Display a listing of the resource in the admin area.
     *
     * @return Response
     */
    public function adminIndex()
    {
        $resources = $this->resource->paginate(50);
        return view('admin/resources/index')->with('resources', $resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function adminCreate()
    {
        return view('admin/resources/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function adminStore(ResourceRequest $request)
    {
        $this->resource = $this->resource->fill($request->all());
        $this->resource->save();
        $this->message->success('New resource "' . $this->resource->name . '" has been saved.');
        return redirect('admin/resources');
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
        $this->resource = $this->resource->find($id);
        return view('admin/resources/edit')->with('resource', $this->resource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminUpdate(ResourceRequest $request, $id)
    {
        $this->resource = $this->resource->find($id);
        $this->resource->fill($request->all());
        $this->resource->save();
        $this->message->success('Resource "' . $this->resource->name . '" has been updated.');
        return redirect('/admin/resources/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        $this->resource = $this->resource->find($id);
        $this->resource->delete();
        $this->message->success('Resource "' . $this->resource->name . '" has been deleted.');
        return redirect('/admin/resources');
    }

}
