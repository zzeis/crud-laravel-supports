<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use stdClass;

/* The SupportService class provides methods for interacting with a repository to perform CRUD
operations on support tickets. */

class SupportService
{
    protected $repository;

    public function __construct()
    {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }
    public function update(
        string $id,
        string $subject,
        string $status,
        string $body,
    ): stdClass|null {
        return $this->repository->update(
            $id,
            $subject,
            $status,
            $body
        );
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
