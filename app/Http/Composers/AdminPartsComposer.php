<?php namespace Learn\Http\Composers;


use Illuminate\Contracts\View\View;
use Learn\Models\Format;
use Learn\Models\Tag;

class AdminPartsComposer extends NamedComposer {

    protected $tag;
    protected $format;

    function __construct(Tag $tag, Format $format)
    {
        $this->tag = $tag;
        $this->format = $format;
    }

    public function tagSelection(View $view)
    {
        $tags = $this->tag->all();
        $view->with('tags', $tags);
    }

    public function formatSelection(View $view)
    {
        $formats = $this->format->all();
        $view->with('formats', $formats);
    }


}