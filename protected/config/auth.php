<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null,
        'children' => array(),
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            'guest' //extend guest role
        )
    ),
    Role::EMPLOYEE => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Employee',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            'user'
        )
    ),
    Role::CLIENT => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Client',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            Role::EMPLOYEE
        )
    ),
    Role::ADMIN => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'bizRule' => null,
        'data' => null,
        'children' => array(
            Role::CLIENT
        )
    )
);