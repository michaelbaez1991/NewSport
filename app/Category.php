<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'body'];
	/**
	 * Post belongs to .
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function posts(){
		// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
		return $this->hasMany(Post::class);
	}
}