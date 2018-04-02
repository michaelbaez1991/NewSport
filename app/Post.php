<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['user_id', 'catogory_id', 'name', 'slug', 'excerpt', 'body', 'file', 'status' 
	];

	/**
	 * Post belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class);
	}

	/**
	 * Post belongs to Categor.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		// belongsTo(RelatedModel, foreignKey = categor_id, keyOnRelatedModel = id)
		return $this->belongsTo(Category::class);
	}
	/**
	 * Post belongs to .
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tags(){
		// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
		return $this->belongsToMany(Tag::class);
	}
}
