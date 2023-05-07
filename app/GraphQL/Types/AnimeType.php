<?php

// app/graphql/types/AnimeType

namespace App\GraphQL\Types;

use App\Models\Anime;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AnimeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Anime',
        'description' => 'Collection of animes with their respective category',
        'model' => Anime::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of anime'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the anime'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of anime'
            ],
            'episode' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Anime episode'
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'The category of the anime'
            ]
        ];
    }
}
