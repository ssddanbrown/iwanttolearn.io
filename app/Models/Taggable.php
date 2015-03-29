<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model {

    protected $table = 'resources';

    protected $fillable = ['name', 'description', 'link', 'cost'];

    // Relations
    public function tags()
    {
        return $this->morphToMany('Learn\Models\Tag', 'taggable')->withPivot('index')->orderBy('index', 'asc');
    }

    // Utility Methods
    public function syncTagArray($tagArray)
    {
        $arrayWithPivotData = array();
        foreach($tagArray as $index => $tagId) {
            $arrayWithPivotData[$tagId] = [
                'index' => $index
            ];
        }
        $this->tags()->sync($arrayWithPivotData);
    }

}
