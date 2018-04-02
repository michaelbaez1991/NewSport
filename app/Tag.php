<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];
	/**
	 * Post belongs to .
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function posts(){
		// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
		return $this->belongsToMany(Post::class);
	}
}
