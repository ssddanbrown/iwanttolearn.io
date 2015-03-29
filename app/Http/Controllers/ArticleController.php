<?php namespace Learn\Http\Controllers;

use Learn\Http\Requests;
use Learn\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Learn\Http\Requests\ArticleRequest;
use Learn\Models\Article;
use Learn\Services\MessageService;

class ArticleController extends Controller {

    protected $article;
    protected $message;

    function __construct(Article $article, MessageService $message)
    {
        $this->article = $article;
        $this->message = $message;
    }


    /**
     * Display a listing of the article in the admin area.
     *
     * @return Response
     */
    public function adminIndex()
    {
        $articles = $this->article->paginate(50);
        return view('admin/articles/index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new article.
     *
     * @return Response
     */
    public function adminCreate()
    {
        return view('admin/articles/create');
    }

    /**
     * Store a newly created article in storage.
     *
     * @return Response
     */
    public function adminStore(ArticleRequest $request)
    {
        $this->article = $this->article->fill($request->all());
        $this->article->save();
        $this->message->success('New article "' . $this->article->title . '" has been saved.');
        return redirect('admin/articles');
    }

    /**
     * Display the specified article.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $this->article = $this->article->find($id);
        return view('admin/articles/edit')->with('article', $this->article);
    }

    /**
     * Update the specified article in storage.
     *
     * @param ArticleRequest $request
     * @param  int $id
     * @return Response
     */
    public function adminUpdate(ArticleRequest $request, $id)
    {
        $this->article = $this->article->find($id);
        $this->article->fill($request->all());
        $this->article->save();
        $this->message->success('Article "' . $this->article->title . '" has been updated.');
        return redirect('/admin/articles/' . $id);
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        $this->article = $this->article->find($id);
        $this->article->delete();
        $this->message->success('Article "' . $this->article->title . '" has been deleted.');
        return redirect('/admin/articles');
    }

}
