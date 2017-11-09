<?php

declare(strict_types=1);
/*
 * PHP version 7.1
 *
 * @copyright Copyright (c) 2012-2017 EELLY Inc. (https://www.eelly.com)
 * @link      https://api.eelly.com
 * @license   衣联网版权所有
 */

namespace Eelly\SDK\Pay\Service;

use Eelly\DTO\RechargeDTO;

/**
 *
 * @author eellytools<localhost.shell@gmail.com>
 */
interface RechargeInterface
{

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function getRecharge(int $rechargeId): RechargeDTO;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function addRecharge(array $data): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function updateRecharge(int $rechargeId, array $data): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function deleteRecharge(int $rechargeId): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function listRechargePage(array $condition = [], int $currentPage = 1, int $limit = 10): array;


}