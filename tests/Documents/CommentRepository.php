<?php

declare(strict_types=1);

namespace Documents;

use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

/** FIXME: reflection chokes if this class doesn't have a doc comment */
class CommentRepository extends DocumentRepository
{
    public function findOneComment()
    {
        return $this->getDocumentPersister()
            ->loadAll([], ['date' => 'desc'], 1)
            ->current();
    }

    public function findManyComments()
    {
        return $this->getDocumentPersister()->loadAll();
    }

    public function findManyCommentsEager()
    {
        return $this
            ->createQueryBuilder()
            ->eagerCursor(true)
            ->getQuery()
            ->getIterator();
    }
}
