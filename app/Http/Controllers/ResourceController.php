<?php namespace Learn\Http\Controllers;

use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Learn\Http\Requests\ResourceRequest;
use Learn\Models\Resource;
use Learn\Repos\ResourceRepo;
use Learn\Services\MessageService;

class ResourceController extends Controller {

    protected $resource;
    protected $repo;
    protected $message;

    function __construct(Resource $resource, ResourceRepo $repo , MessageService $message)
    {
        $this->resource = $resource;
        $this->repo = $repo;
        $this->message = $message;
    }

    /**
     * Display a listing of the resource in the admin area.
     *
     * @param Request $request
     * @return Response
     */
    public function adminIndex(Request $request)
    {
        $resources =  $this->resource->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $resources = $resources->where('name', 'LIKE', '%'.$request->get('search').'%');
        }
        return view('admin/resources/index', [
            'resources' => $resources->paginate(25)
        ]);
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
     * @param ResourceRequest $request
     * @return Response
     */
    public function adminStore(ResourceRequest $request)
    {
        $this->resource = $this->resource->fill($request->all());
        $this->resource->save();
        $this->message->success('New resource "' . $this->resource->name . '" has been saved.');

        if ($request->has('tags')) {
            $this->resource->syncTagArray($request->get('tags'));
        }
        if ($request->has('formats')) {
            $this->resource->syncFormatArray($request->get('formats'));
        }
        $this->repo->cleanCache($this->resource);
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
     * @param ResourceRequest $request
     * @param  int $id
     * @return Response
     */
    public function adminUpdate(ResourceRequest $request, $id)
    {
        $this->resource = $this->resource->find($id);
        $this->repo->cleanCache($this->resource);

        $this->resource->fill($request->all());
        $this->resource->save();
        $this->message->success('Resource "' . $this->resource->name . '" has been updated.');

        $this->resource->syncTagArray($request->get('tags'));
        $this->resource->syncFormatArray($request->get('formats'));
        $this->repo->cleanCache($this->resource);
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
        $name = $this->repo->destroy($id);
        $this->message->success('Resource "' . $name . '" has been deleted.');
        return redirect('/admin/resources');
    }

}
