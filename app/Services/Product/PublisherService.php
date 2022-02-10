<?php

namespace App\Services\Product;

use App\Repository\Product\IPublisherRepository;
use App\Services\BaseService;
use App\Services\Product\IPublisherService;

class PublisherService extends BaseService implements IPublisherService
{
    public function __construct(IPublisherRepository $repository)
    {
        parent::__construct($repository);
    }
}
