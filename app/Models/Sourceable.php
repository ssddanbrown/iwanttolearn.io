<?php namespace Learn\Models;

use Illuminate\Database\Eloquent\Model;

class Sourceable extends Model {

    protected $table = 'resources';

    protected $fillable = ['name', 'description', 'link', 'cost'];

    // Relations
    public function tags()
    {
        return $this->morphToMany('Learn\Models\Tag', 'taggable')->withPivot('index')->orderBy('index', 'asc');
    }

    // Relations
    public function formats()
    {
        return $this->morphToMany('Learn\Models\Format', 'formattable');
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

    public function syncFormatArray($formatArray)
    {
        if ($formatArray === null) {
            $formatArray = array();
        }
        $this->formats()->sync($formatArray);
    }

}
