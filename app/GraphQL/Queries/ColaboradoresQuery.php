<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\CatColaboradores;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ColaboradoresQuery extends Query
{
    protected $attributes = [
        'name' => 'colaboradores',
        'description' => 'Consulta para obtener todos los colaboradores'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('CatColaborado'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args)
    {
        return CatColaboradores::active()->get();
    }
}
