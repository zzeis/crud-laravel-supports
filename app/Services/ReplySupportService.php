<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Events\SupportReplied;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplySupportService
{

    public function __construct(
        protected ReplyRepositoryInterface $repository,
    ) {
    }

    public function getAllSupportId(string $supportId): array
    {
        return $this->repository->getAllSupportId($supportId);
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {

        $support = $this->repository->createNew($dto);
       
        SupportReplied::dispatch($support);

        return $support;
    }
    public function delete(string $id): bool
    {
       

        return $this->repository->delete($id);
    }
}
