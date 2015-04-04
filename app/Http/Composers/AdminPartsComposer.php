<?php namespace Learn\Http\Composers;

use Illuminate\Contracts\View\View;
use Learn\Models\Format;
use Learn\Repos\TagRepo;

class AdminPartsComposer extends NamedComposer {

    protected $tagRepo;
    protected $format;

    function __construct(TagRepo $tagRepo, Format $format)
    {
        $this->tagRepo = $tagRepo;
        $this->format = $format;
    }

    public function tagSelection(View $view)
    {
        $tags = $this->tagRepo->getAll();
        $view->with('tags', $tags);
    }

    public function formatSelection(View $view)
    {
        $formats = $this->format->all();
        $view->with('formats', $formats);
    }


}