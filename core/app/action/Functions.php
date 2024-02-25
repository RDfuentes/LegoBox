<?php

function permissionsUser()
{
    $p = [
        'administradores' => [
            'title' => 'Módulo de Administradores',
            'keys' => [
                'ver_usuarios' => 'Ver administradores',
                'crear_usuarios' => 'Crear administradores',
                'editar_usuarios' => 'Editar administradores',
                'eliminar_usuarios' => 'Eliminar administradores',
            ]
        ],
        'permisos' => [
            'title' => 'Módulo de Permisos',
            'keys' => [
                'ver_permisos' => 'Ver permisos',
                'crear_permisos' => 'Crear permisos',
                'editar_permisos' => 'Editar permisos',
                'eliminar_permisos' => 'Eliminar permisos',
            ]
        ],
    ];

    return $p;
}
