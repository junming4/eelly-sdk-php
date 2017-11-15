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

namespace Eelly\SDK\Pay\Exception;

use Eelly\Exception\LogicException;

/**
 * 错误类.
 *
 * @author 张泽强 <zhangzeqiang@eelly.net>
 *
 * @since  2017年11月13日
 *
 * @version 1.0
 */
class PaymentException extends LogicException
{

    /**
     * 支付交易处理状态失败
     */
    public const UPDATE_DATA_STATUS_FAIL = '支付交易处理状态失败';

    /**
     * 账号扣款失败
     */
    public const REDUCE_PAY_ACCOUNT_FAIL = '账号扣款失败';
}