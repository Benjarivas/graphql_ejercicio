<?php

// app/graphql/mutations/anime/DeleteAnimeMutation 

namespace App\GraphQL\Mutations\Anime;

use App\Models\Anime;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAnimeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAnime',
        'description' => 'Deletes an anime'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:animes']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $category = Anime::findOrFail($args['id']);

        return  $category->delete() ? true : false;
    }
}
