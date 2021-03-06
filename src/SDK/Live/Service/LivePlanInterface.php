<?php

declare(strict_types=1);

/*
 * This file is part of eelly package.
 *
 * (c) eelly.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eelly\SDK\Live\Service;

/**
 * Interface LivePlanInterface.
 *
 * @author hehui<hehui@eelly.net>
 */
interface LivePlanInterface
{
    /**
     * 设置计划状态.
     *
     * @param int $planId
     * @param int $status
     *
     * @return bool
     */
    public function setStatus(int $planId, int $status): bool;

    /**
     * 更新是否收费和房间容量.
     *
     * @param int $planId
     * @param int $isPay
     * @param int $roomSize
     *
     * @return bool
     */
    public function updatePlan(int $planId, int $isPay, int $roomSize): bool;
}
