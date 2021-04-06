<?php

namespace OCA\Nodue\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

class Version000000Date20210322142022 extends SimpleMigrationStep
{
    /**
    * @param IOutput $output
    * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
    * @param array   $options
    *
    * @return null|\OCP\DB\ISchemaWrapper
    */
    public function changeSchema(IOutput $output, Closure $schemaClosure, array $options)
    {
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

        if (! $schema->hasTable('nodue')) {
            $table = $schema->createTable('nodue');

            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull'       => true,
            ]);
            $table->addColumn('user_id', 'string', [
                'notnull' => true,
                'length'  => 200,
            ]);
            $table->addColumn('acl_user_ids', 'text', [
                'notnull' => true,
                'default' => '[]'
            ]);
            $table->addColumn('is_pinned', 'boolean', [
                'default' => false
            ]);
            $table->addColumn('title', 'string', [
                'notnull' => true,
                'length'  => 200
            ]);
            $table->addColumn('content', 'text', [
                'notnull' => true,
                'default' => ''
            ]);
            $table->addColumn('created_at', 'datetime', [
                'notnull' => false,
            ]);
            $table->addColumn('updated_at', 'datetime', [
                'notnull' => false,
            ]);

            $table->setPrimaryKey(['id']);
            $table->addIndex(['user_id'], 'nodue_user_id_index');
        }

        return $schema;
    }
}
