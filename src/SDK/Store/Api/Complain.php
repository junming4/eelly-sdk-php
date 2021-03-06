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

namespace Eelly\SDK\Store\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Store\Service\ComplainInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Complain implements ComplainInterface
{
    /**
     * 店铺投诉举报
     * 对店铺、店铺商品、店铺订单进行投诉举报.
     *
     * @param array  $complainData              投诉举报信息
     * @param int    $complainData['storeId']   店铺id
     * @param int    $complainData['dimension'] 投诉举报的维度1店铺2交易3商品
     * @param int    $complainData['type']      投诉举报类型(对应不同维度的不同值)
     * @param int    $complainData['itemId']    投诉举报的对象id
     * @param string $complainData['username']  投诉人姓名
     * @param string $complainData['phone']     投诉人联系方式
     * @param string $complainData['qq']        投诉人QQ
     * @param string $complainData['content']   投诉举报内容
     * @param string $complainData['evidence']  投诉举报的证据
     * @param UidDTO $user                      登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return bool 投诉举报的结果
     * @requestExample({"complainData":{"storeId":1, "dimension":1,"type":2,"itemId":22,"username":"投诉举报人","phone":"123456789","qq":"123456","content":"投诉举报内容","evidence":"投诉举报证据"}})
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function addStoreComplain(array $complainData, UidDTO $user = null): bool
    {
        return EellyClient::request('store/complain', __FUNCTION__, true, $complainData, $user);
    }

    /**
     * 店铺投诉举报
     * 对店铺、店铺商品、店铺订单进行投诉举报.
     *
     * @param array  $complainData              投诉举报信息
     * @param int    $complainData['storeId']   店铺id
     * @param int    $complainData['dimension'] 投诉举报的维度1店铺2交易3商品
     * @param int    $complainData['type']      投诉举报类型(对应不同维度的不同值)
     * @param int    $complainData['itemId']    投诉举报的对象id
     * @param string $complainData['username']  投诉人姓名
     * @param string $complainData['phone']     投诉人联系方式
     * @param string $complainData['qq']        投诉人QQ
     * @param string $complainData['content']   投诉举报内容
     * @param string $complainData['evidence']  投诉举报的证据
     * @param UidDTO $user                      登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return bool 投诉举报的结果
     * @requestExample({"complainData":{"storeId":1, "dimension":1,"type":2,"itemId":22,"username":"投诉举报人","phone":"123456789","qq":"123456","content":"投诉举报内容","evidence":"投诉举报证据"}})
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function addStoreComplainAsync(array $complainData, UidDTO $user = null)
    {
        return EellyClient::request('store/complain', __FUNCTION__, false, $complainData, $user);
    }

    /**
     * 撤销投诉举报
     * 撤销对店铺的投诉举报.
     *
     * @param int    $complainId 投诉举报id
     * @param UidDTO $user       登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return bool 撤销结果
     * @requestExample({"complainId":1})
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function deleteStoreComplain(int $complainId, UidDTO $user = null): bool
    {
        return EellyClient::request('store/complain', __FUNCTION__, true, $complainId, $user);
    }

    /**
     * 撤销投诉举报
     * 撤销对店铺的投诉举报.
     *
     * @param int    $complainId 投诉举报id
     * @param UidDTO $user       登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return bool 撤销结果
     * @requestExample({"complainId":1})
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function deleteStoreComplainAsync(int $complainId, UidDTO $user = null)
    {
        return EellyClient::request('store/complain', __FUNCTION__, false, $complainId, $user);
    }

    /**
     * 获取店铺的投诉举报信息.
     * 分页获取店铺的投诉举报信息列表.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * -------------------|-------|--------------
     * items              |array  |投诉举报信息列表
     * items[complainId]  |int    |店铺投诉举报ID
     * items[dimension]   |int    |投诉举报的维度：1 店铺 2 交易 3 商品
     * items[content]     |string |投诉举报内容
     * items[evidence]    |string |投诉举报证据
     * items[status]      |int    |投诉举报的状态：0 待跟进1 已跟进 2 买家撤销 3 成立 4 不成立
     * items[appealFlag]  |int    |申诉标识：0 未申诉 1 已申诉
     * items[createdTime] |string |建立时间
     * currentPage        |int    |当前页数
     * totalPage          |int    |总页数
     * totalItems         |int    |总数据数
     *
     * @param int    $storeId   店铺id
     * @param int    $dimension 投诉举报维度1店铺2交易3商品
     * @param int    $page      页数
     * @param int    $limit     每页数据返回的数量
     * @param UidDTO $user      登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return array 投诉举报信息列表
     *
     * @requestExample({"storeId":123,"dimension":1,"page":1,"limit":10})
     *
     * @returnExample({
     * "items":[{
     *     "complainId":1,
     *     "dimension":1,
     *     "content":"投诉举报内容",
     *     "evidence":"投诉举报证据",
     *     "status":1,
     *     "appealFlag":1,
     *     "createdTime":"2017-01-01 12:12:12"
     *     }],
     * "currentPage":1,
     * "totalPage":2,
     * "totalItems":2
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function listStoreComplainPage(int $storeId, int $dimension, int $page = 1, int $limit = 10, UidDTO $user = null): array
    {
        return EellyClient::request('store/complain', __FUNCTION__, true, $storeId, $dimension, $page, $limit, $user);
    }

    /**
     * 获取店铺的投诉举报信息.
     * 分页获取店铺的投诉举报信息列表.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * -------------------|-------|--------------
     * items              |array  |投诉举报信息列表
     * items[complainId]  |int    |店铺投诉举报ID
     * items[dimension]   |int    |投诉举报的维度：1 店铺 2 交易 3 商品
     * items[content]     |string |投诉举报内容
     * items[evidence]    |string |投诉举报证据
     * items[status]      |int    |投诉举报的状态：0 待跟进1 已跟进 2 买家撤销 3 成立 4 不成立
     * items[appealFlag]  |int    |申诉标识：0 未申诉 1 已申诉
     * items[createdTime] |string |建立时间
     * currentPage        |int    |当前页数
     * totalPage          |int    |总页数
     * totalItems         |int    |总数据数
     *
     * @param int    $storeId   店铺id
     * @param int    $dimension 投诉举报维度1店铺2交易3商品
     * @param int    $page      页数
     * @param int    $limit     每页数据返回的数量
     * @param UidDTO $user      登录用户信息
     *
     * @throws \Eelly\SDK\Store\Exception\StoreException
     *
     * @return array 投诉举报信息列表
     *
     * @requestExample({"storeId":123,"dimension":1,"page":1,"limit":10})
     *
     * @returnExample({
     * "items":[{
     *     "complainId":1,
     *     "dimension":1,
     *     "content":"投诉举报内容",
     *     "evidence":"投诉举报证据",
     *     "status":1,
     *     "appealFlag":1,
     *     "createdTime":"2017-01-01 12:12:12"
     *     }],
     * "currentPage":1,
     * "totalPage":2,
     * "totalItems":2
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017-08-16
     */
    public function listStoreComplainPageAsync(int $storeId, int $dimension, int $page = 1, int $limit = 10, UidDTO $user = null)
    {
        return EellyClient::request('store/complain', __FUNCTION__, false, $storeId, $dimension, $page, $limit, $user);
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