<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CatColaboradores;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CatColaboradoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CatColaborado',
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
