<?php

/* The code snippet provided is defining a PHP interface named `ReplyRepositoryInterface` within the
namespace `App\Repositories\Contracts`. This interface declares two methods: */
namespace App\Repositories\Contracts;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    public function getAllSupportId(string $id): array;
    public function createNew(CreateReplyDTO $dto): stdClass;
    public function delete(string $id): bool;
    
}
