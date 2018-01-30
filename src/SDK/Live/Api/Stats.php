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

namespace Eelly\SDK\Live\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Live\Service\StatsInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Stats implements StatsInterface
{
    /**
     * 添加点赞数.
     *
     * @param array $data 点赞数据
     * @return bool
     * @requestExample({"liveId":1,"praise":1})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月26日
     */
    public function addStatsPraise(array $data): bool
    {
        return EellyClient::request('live/stats', 'addStatsPraise', true, $data);
    }

    /**
     * 添加点赞数.
     *
     * @param array $data 点赞数据
     * @return bool
     * @requestExample({"liveId":1,"praise":1})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月26日
     */
    public function addStatsPraiseAsync(array $data)
    {
        return EellyClient::request('live/stats', 'addStatsPraise', false, $data);
    }

    /**
     * 多用户获取统计信息.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * -------|-------|--------------
     * liveId |string |观看人数：统计进入聊天室人数
     * view   |string |获得点赞
     * praise |string |新增关注：统计直播时间段联系人关注数
     * follow |string |订单笔数：统计直播时间段店铺下单数
     *
     * @param array $liveIds 多个直播ID
     * @return array
     * @requestExample({"liveIds":[1,3,4,5]})
     * @returnExample({{"liveId":"1","view":"133","praise":"1","follow":"1"},{"liveId":"2","view":"222","praise":"1","follow":"1"}})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月29日
     * @Validation(
     *  @PresenceOf(0,{message : "数据不能为空"})
     *)
     */
    public function getStatsByLiveIds(array $liveIds): array
    {
        return EellyClient::request('live/stats', 'getStatsByLiveIds', true, $liveIds);
    }

    /**
     * 多用户获取统计信息.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * -------|-------|--------------
     * liveId |string |观看人数：统计进入聊天室人数
     * view   |string |获得点赞
     * praise |string |新增关注：统计直播时间段联系人关注数
     * follow |string |订单笔数：统计直播时间段店铺下单数
     *
     * @param array $liveIds 多个直播ID
     * @return array
     * @requestExample({"liveIds":[1,3,4,5]})
     * @returnExample({{"liveId":"1","view":"133","praise":"1","follow":"1"},{"liveId":"2","view":"222","praise":"1","follow":"1"}})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月29日
     * @Validation(
     *  @PresenceOf(0,{message : "数据不能为空"})
     *)
     */
    public function getStatsByLiveIdsAsync(array $liveIds)
    {
        return EellyClient::request('live/stats', 'getStatsByLiveIds', false, $liveIds);
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }
}