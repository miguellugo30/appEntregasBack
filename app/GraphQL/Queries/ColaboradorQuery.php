<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Colaboradores;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ColaboradorQuery extends Query
{
    protected $attributes = [
        'name' => 'colaborador',
        'description' => 'Consulta para obtener un colaborador'
    ];

    public function type(): Type
    {
        return GraphQL::type('CatColaborado');
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
        return Colaboradores::findOrFail($args['id']);
    }
}
