<?php namespace Learn\Http\Composers;


use Illuminate\Contracts\View\View;
use Learn\Models\Tag;

class AdminPartsComposer extends NamedComposer {

    protected $tag;

    function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function tagSelection(View $view)
    {
        $tags = $this->tag->all();
        $view->with('tags', $tags);
    }


}