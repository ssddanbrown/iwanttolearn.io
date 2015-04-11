<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';
    protected $fillable = ['name', 'slug', 'description'];

    // Relations
    public function resources()
    {
        return $this->morphedByMany('Learn\Models\Resource', 'taggable');
    }

    public function articles()
    {
        return $this->morphedByMany('Learn\Models\Article', 'taggable');
    }

    // Relations
    public function tags()
    {
        return $this->morphToMany('Learn\Models\Tag', 'taggable')->withPivot('index')->orderBy('index', 'asc');
    }

    // Utility Methods
    public function syncTagArray($tagArray)
    {
        $arrayWithPivotData = array();
        if ($tagArray === null) {
            $tagArray = array();
        }
        foreach($tagArray as $index => $tagId) {
            $arrayWithPivotData[$tagId] = [
                'index' => $index
            ];
        }
        $this->tags()->sync($arrayWithPivotData);
    }

    /**
     * Creates a relative link for this tag.
     *
     * @return string
     */
    public function link()
    {
        return '/t/' . $this->slug;
    }
}
