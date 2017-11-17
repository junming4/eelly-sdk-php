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

namespace Eelly\SDK\Pay\Service;

use Eelly\DTO\VoucherDTO;

/**
 * @author eellytools<localhost.shell@gmail.com>
 */
interface VoucherInterface
{
    /**
     * 新增凭证明细信息
     * 
     * @return bool
     * 
     * @param array $data 请求参数
     * @param string $data["voucherCode"] 凭证代码
     * @param int $data["money"] 发生额
     * @param int $data['refId'] 关联业务ID
     * @param string $data['remark'] 备注
     * 
     * @requestExample()
     * @returnExample()
     * 
     * @author wechan<liweiquan@eelly.net>
     * @since 2017年11月13日
     */
    public function addVoucher(array $data): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function listVoucherPage(array $condition = [], int $currentPage = 1, int $limit = 10): array;
}
