<?php
/*
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CatColaboradores;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ColaboradorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Colaborador',
        'description' => 'Coleccion de informarcion de colaborardor',
        'model' => CatColaboradores::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID de colaborador'
            ],
            'nombre' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Nombre de colaborador'
            ],
            'apellido_paterno' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Apellido Paterno de colaborador'
            ],
            'apellido_materno' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Apellido Materno de colaborador'
            ],
            'telefono' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'telefono de colaborador'
            ],
            'correo_electronico' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Correo electronico de colaborador'
            ],
            'ruta_perfil' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Foto de perfil de colaborador'
            ],
            'activo' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Estatus de colaborador'
            ],
            'user' => [
                'type' => Type::listOf( GraphQL::type('User') ),
                'description' => 'ID de colaborador'
            ],

        ];
    }
}
*/

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ColaboradorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Colaborador',
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
                'type' => GraphQL::type('Colaborador'),
                'descripcion' => 'Colaborador del usuario'
            ]
        ];
    }
}
