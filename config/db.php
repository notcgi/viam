<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=postgres;dbname='.getenv('POSTGRES_DB'),
    'username' => getenv('POSTGRES_USER'),
    'password' => getenv('POSTGRES_PASSWORD'),
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public'
        ]
    ], // PostgreSQL

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
