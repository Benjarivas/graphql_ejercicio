<?php

// app/graphql/mutations/anime/CreateAnimeMutation 

namespace App\GraphQL\Mutations\Anime;

use App\Models\Anime;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAnimeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAnime',
        'description' => 'Creates an anime'
    ];

    public function type(): Type
    {
        return GraphQL::type('Anime');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'episode' => [
                'name' => 'episode',
                'type' => Type::nonNull(Type::int()),
            ],
            'category_id' => [
                'name' => 'category_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:categories,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $anime = new Anime();
        $anime->fill($args);
        $anime->save();

        return $anime;
    }
}
