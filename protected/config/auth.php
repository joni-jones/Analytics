<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null,
        'children' => array(),
    ),
    User::ROLE_USER => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            'guest' //extend guest role
        )
    ),
    User::ROLE_CLIENT => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Client',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            'user'
        )
    ),
    User::ROLE_EMPLOYEE => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Employee',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            User::ROLE_USER
        )
    ),
    User::ROLE_ADMIN => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            User::ROLE_EMPLOYEE
        )
    )
);