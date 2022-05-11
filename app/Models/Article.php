<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;

    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isVotedByUser(?User $user, $type)
    {
        if (!$user) {
            return false;
        }

        if ($type) {
            return articles_rating::where('user_id', $user->id)
                ->where('article_id', $this->id)
                ->where('rating', 1)
                ->exists();
        }

        return articles_rating::where('user_id', $user->id)
            ->where('article_id', $this->id)
            ->exists();
    }

    public function ratingType(User $user)
    {
        $rating = articles_rating::where('user_id', $user->id)
            ->where('article_id', $this->id)
            ->get('rating');

        if ($rating) {
            return 1;
        }

        return 0;
    }

    public function vote(User $user)
    {

            articles_rating::create([
                'article_id' => $this->id,
                'user_id' => $user->id,
                'rating' => 1
            ]);

            Article::find($this->id)->increment('rating', 1);

    }

    public function downvote(User $user)
    {
        articles_rating::create([
            'article_id' => $this->id,
            'user_id' => $user->id,
            'rating' => 0
        ]);

        Article::find($this->id)->decrement('rating', 1);
    }

    public function removevote(User $user, $type)
    {
        if ($type) {
            articles_rating::where([
                'article_id' => $this->id,
                'user_id' => $user->id
            ])->delete();

            Article::find($this->id)->decrement('rating', 1);
        } else {
            articles_rating::where([
                'article_id' => $this->id,
                'user_id' => $user->id
            ])->delete();

            Article::find($this->id)->increment('rating', 1);
        }
    }



    public function topic()
    {
        return $this->belongsTo(Topics::class);
    }

    public function articles_rating()
    {
        return $this->belongsToMany(User::class, 'articles_rating');
    }
}
