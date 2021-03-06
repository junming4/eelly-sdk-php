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

namespace Eelly\SDK\Order\Api;

use Eelly\DTO\UidDTO;
use Eelly\SDK\EellyClient;
use Eelly\SDK\Order\Service\BuyerOrderInterface;

class BuyerOrder implements BuyerOrderInterface
{
    /**
     * {@inheritdoc}
     */
    public function listAppletOrder(int $tab = 0, int $page = 0, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $tab, $page, $limit);
    }

    /**
     * {@inheritdoc}
     */
    public function myAppletOrderStats(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true);
    }

    /**
     * {@inheritdoc}
     */
    public function appletOrderDetail(int $orderId, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId);
    }

    /**
     * @inheritDoc
     */
    public function confirmReceivedOrder(int $orderId, int $uid): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId, $uid);
    }
}
