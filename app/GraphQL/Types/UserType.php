<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Colecciones de usuario',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID de usuario'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Nombre de usuario'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Correo de usuario'
            ],
            'colaborador' => [
                'type' => GraphQL::type('CatColaborado'),
                'descripcion' => 'Colaborador del usuario'
            ]
        ];
    }
}
