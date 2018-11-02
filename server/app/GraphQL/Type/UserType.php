<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        'model'         => User::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
                'alias' => 'user_id', // Use 'alias', if the database column is different from the type name
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],


            'name' => [
                'type' => Type::string(),
                'description' => 'The name of user',
            ],
            // Uses the 'getIsMeAttribute' function on our custom User model

        ];
    }

    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}
