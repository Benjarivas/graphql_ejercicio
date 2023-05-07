<?php

// app/graphql/mutations/anime/UpdateAnimeMutation 

namespace App\GraphQL\Mutations\Anime;

use App\Models\Anime;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAnimeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAnime',
        'description' => 'Updates an Anime'
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
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $anime = Anime::findOrFail($args['id']);
        $anime->fill($args);
        $anime->save();

        return $anime;
    }
}
