<?php

// app/graphql/queries/anime/AnimesQuery 

namespace App\GraphQL\Queries\Anime;

use App\Models\Anime;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AnimesQuery extends Query
{
    protected $attributes = [
        'name' => 'animes',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Anime'));
    }

    public function resolve($root, $args)
    {
        return Anime::all();
    }
}
