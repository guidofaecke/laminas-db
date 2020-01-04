<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Sql\Platform\SqlServer;

use Laminas\Db\Sql\Ddl\CreateTable;
use Laminas\Db\Sql\Platform\AbstractPlatform;
use Laminas\Db\Sql\Select;

class SqlServer extends AbstractPlatform
{
    public function __construct(SelectDecorator $selectDecorator = null)
    {
        $this->setTypeDecorator(Select::class, ($selectDecorator) ?: new SelectDecorator());
        $this->setTypeDecorator(CreateTable::class, new Ddl\CreateTableDecorator());
    }
}
