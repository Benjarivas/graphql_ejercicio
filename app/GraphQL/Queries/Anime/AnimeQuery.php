<?php

// app/graphql/queries/anime/AnimeQuery 

namespace App\GraphQL\Queries\Anime;

use App\Models\Anime;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AnimeQuery extends Query
{
    protected $attributes = [
        'name' => 'anime',
    ];

    public function type(): Type
    {
        return GraphQL::type('Anime');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Anime::findOrFail($args['id']);
    }
}
