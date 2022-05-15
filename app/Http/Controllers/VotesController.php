<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVotesRequest;
use App\Http\Requests\UpdateVotesRequest;
use App\Models\articles_rating;
use App\Models\User;
use App\Models\Votes;
use App\Models\Article;
use App\Models\Comments;
use App\Models\Question;
use App\Models\SubComments;

class VotesController extends Controller
{
    public function isVotedByUser(?User $user, $type, $id, $query, $info)
    {
        if (!$user) {
            return false;
        }

        // Checks if we should check upvote
        if ($type) {
            // Check if an upvote exists
            return $query->where('user_id', $user->id)
                ->where($info['column'], $id)
                ->where('rating', 1)
                ->exists();
        }

        // Check if a downvote exists
        return $query->where('user_id', $user->id)
            ->where($info['column'], $id)
            ->where('rating', 0)
            ->exists();
    }

    public function ratingType(User $user, $id, $query, $info)
    {

        // Get the users rating
        $rating = $query->where('user_id', $user->id)
            ->where($info['column'], $id)
            ->get('rating');

        // Check if rating is a vote (true) or downvote (false)
        if ($rating) {
            return 1;
        }

        return 0;
    }

    public function vote(User $user, $vote, $downvote, $type, $id, $query, $info)
    {

        // Check if for voting type. True = vote, false = downvote
        if ($type) {
            // Execute following code if the user currently has a downvote
            if ($downvote) {
                // Update vote
                $query->where([
                    $info['column'] => $id,
                    'user_id' => $user->id
                ])->update(['rating' => 1]);
                // Execute the following code if the user doesn't currently have a vote
            } else {
                // Create vote
                $query->create([
                    $info['column'] => $id,
                    'user_id' => $user->id,
                    'rating' => 1
                ]);

            }
        } else {
            // Execute following code if the user currently has a vote
            if ($vote) {
                // Update vote
                $query->where([
                    $info['column'] => $id,
                    'user_id' => $user->id
                ])->update(['rating' => 0]);
                // Execute the following code if the user doesn't currently have a vote
            } else {
                // Create downvote
                $query->create([
                    $info['column'] => $id,
                    'user_id' => $user->id,
                    'rating' => 0
                ]);

            }
        }

        // Return the rating
        return $this->getRating($info['main'], $id);

    }

    public function removevote(User $user, $type, $table, $id, $query, $info)
    {

        // Remove a users vote
        $query->where([
            $info['column'] => $id,
            'user_id' => $user->id
        ])->delete();

        return $this->getRating($info['main'], $id);
    }

    public function getRating($info, $id)
    {

        switch ($info) {
            case 'Article':
                // Get amount of likes
                $likes = Article::where('articles.id', '=', $id)
                    ->join('articles_rating', 'article_id', '=', 'articles.id')
                    ->where('articles_rating.rating', 1)
                    ->get()
                    ->count();

                // Get amount of dislikes
                $dislikes = Article::where('articles.id', '=', $id)
                    ->join('articles_rating', 'article_id', '=', 'articles.id')
                    ->where('articles_rating.rating', 0)
                    ->get()
                    ->count();
                break;
            case 'Comments':
                // Get amount of likes
                $likes = Comments::where('comments.id', '=', $id)
                    ->join('comments_rating', 'comment_id', '=', 'comments.id')
                    ->where('comments_rating.rating', 1)
                    ->get()
                    ->count();

                // Get amount of dislikes
                $dislikes = Comments::where('comments.id', '=', $id)
                    ->join('comments_rating', 'comment_id', '=', 'comments.id')
                    ->where('comments_rating.rating', 0)
                    ->get()
                    ->count();
                break;
            case 'Question':
                // Get amount of likes
                $likes = Question::where('questions.id', '=', $id)
                    ->join('questions_rating', 'question_id', '=', 'questions.id')
                    ->where('questions_rating.rating', 1)
                    ->get()
                    ->count();

                // Get amount of dislikes
                $dislikes = Question::where('questions.id', '=', $id)
                    ->join('questions_rating', 'question_id', '=', 'questions.id')
                    ->where('questions_rating.rating', 0)
                    ->get()
                    ->count();
                break;
            case 'SubComments':
                // Get amount of likes
                $likes = SubComments::where('sub_comments.id', '=', $id)
                    ->join('sub_comments_rating', 'sub_comments_id', '=', 'sub_comments.id')
                    ->where('sub_comments_rating.rating', 1)
                    ->get()
                    ->count();

                // Get amount of dislikes
                $dislikes = SubComments::where('sub_comments.id', '=', $id)
                    ->join('sub_comments_rating', 'sub_comments_id', '=', 'sub_comments.id')
                    ->where('sub_comments_rating.rating', 0)
                    ->get()
                    ->count();
                break;
        }

        // Return the final result
        return $likes - $dislikes;
    }

    public function getColumn($table)
    {
        switch ($table) {
            case 'articles_rating':
                $column = 'article_id';
                $mainTable = 'Article';
                break;
            case 'CommentsRating':
                $column = 'comment_id';
                $mainTable = 'Comments';
                break;
            case 'QuestionsRating':
                $column = 'question_id';
                $mainTable = 'Question';
                break;
            case 'SubCommentsRating':
                $column = 'sub_comment_id';
                $mainTable = 'SubComments';
                break;
        }

        return [
            'column' => $column,
            'main' => $mainTable
        ];
    }
}
