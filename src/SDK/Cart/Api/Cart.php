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

namespace Eelly\SDK\Cart\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Cart\Service\CartInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Cart implements CartInterface
{
    /**
     * 购物车列表.
     *
     * > 返回数据说明
     * key | type | value
     * --- | ---- | -----
     * uniqueId | string | 购物车唯一识别
     * storeId | int | 店铺id
     * storeName | string | 店铺名称
     * goodsName | string | 商品名称
     * goodsId | int | 商品id
     * quantity | int | 商品数量
     * price | float | 商品总价
     * attributes | array | 商品规格属性
     * priceInfo | array | 价格详情信息
     * priceInfo['goods_id'] | int | 商品id
     * priceInfo['store_id'] | int | 店铺id
     * priceInfo['price_type'] | int | 价格类型
     * priceInfo['price_lower'] | float | 最低价
     * priceInfo['price_upper'] | float | 最高价
     * priceInfo['price_data'] | array | 阶梯价数组（含一或多个，规格报价时只有一个）
     * priceInfo['price_specdata'] | array | 规格价数组（含一或多个，阶梯价时不存在此key）
     * priceInfo['price_detail'] | array | 活动相关的详情数据（没活动时不存在此key）
     * priceInfo['price_title'] | string | 活动标题
     * priceInfo['price_crm'] | array | crm的原价数组（详情页特殊需要）
     * tipType | int | 提示分类 
     * tipReason | string | 提示分类的原因 同 tipType
     * createdTime | int | 创建时间
     * updateTime | int | 更新时间
     * useful | bool | 是否有效 true 有效，false 无效
     * isMix | int | 是否设置了混批 0 否 1 是
     * minMoney | float | 混批最低价格条件
     * mixNum | int | 混批最少件数
     * colorSum | int | 颜色数量
     * sizeSum | int | 尺寸数量
     *
     * > attributes 商品规格数据说明
     * key | type | value
     * --- | ---- | -----
     * attributes['spId'] | int | 规格id
     * attributes['color'] | string | 规格颜色
     * attributes['size'] | string | 规格尺寸
     * attributes['quantity'] | int | 规格数量
     * attributes['loseSpec'] ] bool | 是否不存在该规格 true 是， false， 否
     *
     * > priceInfo['price_data'] 数据说明
     * key | type | value
     * --- | ---- | -----
     * lower_limit | int | 数量左区间
     * upper_limit | int | 数量右区间
     * price | float | 价格
     *
     * > priceInfo['price_specdata'] 数据说明
     * key | type | value
     * --- | ---- | -----
     * spec_id | int | 规格id
     * goods_id | int | 商品id
     * spec_1 | string | 规格第一名称，颜色
     * spec_2 | string | 规格第二名称，尺码
     * color_rgb | string | 颜色RGB值
     * price | float | 价格
     * stock | int | 库存数量
     * sku | string | 库存号
     *
     * > riceInfo['price_detail'] 数据说明
     * > 数据说明（只列出公共key，不同活动返回的数组也不同）
     * key | type | value
     * --- | ---- | -----
     * act_id | int | 活动id
     * goods_id | int | 商品id
     * price | float | 价格
     * tag | string | 活动标签
     * start_time | int | 活动开始时间
     * end_time | int | 活动结束时间
     * type | int | 活动类型
     * expire_time | int | 倒计时剩余秒数（无倒计时的活动不存在此key）
     * 
     * > tipType 分类说明 
     * > tipReason 原因来源
     * key | value
     * --- | -----
     * 0 | 正常情况
     * 1 | 您选的商品规格已被抢空
     * 2 | 该商品规格发生变更，请重新选择
     * 3 | 数量或金额不满足商家混批规则
     *
     * @param UidDTO $user 用户信息
     *
     * @return array
     * @requestExample()
     * @returnExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","storeId":159771,"storeName":"艾欧严选大码女装","goodsName":"ioeoi正品☆9568时尚典雅法式长大衣","goodsId":27767,"quantity":8,"price":"464.00","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3,"loseSpec":false},{"spId":9521390,"color":"黄色","size":"xl","quantity":5,"loseSpec":false}],"ifShow":"5","closed":"0","pirceInfo":{"goods_id":"27767","store_id":"159771","price_type":1,"price_lower":"58.00","price_upper":"58.00","price_data":[{"lower_limit":"1","upper_limit":"0","price":"58.00","type":"1"}]},"tipType":2,"tipReason":"该商品规格发生变更，请重新选择","createdTime":1534408722,"updateTime":1534413098,"useful":false,"isMix":1,"colorSum":2,"sizeSum":1,"mixMoney":100,"mixNum":2 
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function listCart(UidDTO $user = null): array
    {
        return EellyClient::request('cart/cart', 'listCart', true, $user);
    }

    /**
     * 购物车列表.
     *
     * > 返回数据说明
     * key | type | value
     * --- | ---- | -----
     * uniqueId | string | 购物车唯一识别
     * storeId | int | 店铺id
     * storeName | string | 店铺名称
     * goodsName | string | 商品名称
     * goodsId | int | 商品id
     * quantity | int | 商品数量
     * price | float | 商品总价
     * attributes | array | 商品规格属性
     * priceInfo | array | 价格详情信息
     * priceInfo['goods_id'] | int | 商品id
     * priceInfo['store_id'] | int | 店铺id
     * priceInfo['price_type'] | int | 价格类型
     * priceInfo['price_lower'] | float | 最低价
     * priceInfo['price_upper'] | float | 最高价
     * priceInfo['price_data'] | array | 阶梯价数组（含一或多个，规格报价时只有一个）
     * priceInfo['price_specdata'] | array | 规格价数组（含一或多个，阶梯价时不存在此key）
     * priceInfo['price_detail'] | array | 活动相关的详情数据（没活动时不存在此key）
     * priceInfo['price_title'] | string | 活动标题
     * priceInfo['price_crm'] | array | crm的原价数组（详情页特殊需要）
     * tipType | int | 提示分类 
     * tipReason | string | 提示分类的原因 同 tipType
     * createdTime | int | 创建时间
     * updateTime | int | 更新时间
     * useful | bool | 是否有效 true 有效，false 无效
     * isMix | int | 是否设置了混批 0 否 1 是
     * minMoney | float | 混批最低价格条件
     * mixNum | int | 混批最少件数
     * colorSum | int | 颜色数量
     * sizeSum | int | 尺寸数量
     *
     * > attributes 商品规格数据说明
     * key | type | value
     * --- | ---- | -----
     * attributes['spId'] | int | 规格id
     * attributes['color'] | string | 规格颜色
     * attributes['size'] | string | 规格尺寸
     * attributes['quantity'] | int | 规格数量
     * attributes['loseSpec'] ] bool | 是否不存在该规格 true 是， false， 否
     *
     * > priceInfo['price_data'] 数据说明
     * key | type | value
     * --- | ---- | -----
     * lower_limit | int | 数量左区间
     * upper_limit | int | 数量右区间
     * price | float | 价格
     *
     * > priceInfo['price_specdata'] 数据说明
     * key | type | value
     * --- | ---- | -----
     * spec_id | int | 规格id
     * goods_id | int | 商品id
     * spec_1 | string | 规格第一名称，颜色
     * spec_2 | string | 规格第二名称，尺码
     * color_rgb | string | 颜色RGB值
     * price | float | 价格
     * stock | int | 库存数量
     * sku | string | 库存号
     *
     * > riceInfo['price_detail'] 数据说明
     * > 数据说明（只列出公共key，不同活动返回的数组也不同）
     * key | type | value
     * --- | ---- | -----
     * act_id | int | 活动id
     * goods_id | int | 商品id
     * price | float | 价格
     * tag | string | 活动标签
     * start_time | int | 活动开始时间
     * end_time | int | 活动结束时间
     * type | int | 活动类型
     * expire_time | int | 倒计时剩余秒数（无倒计时的活动不存在此key）
     * 
     * > tipType 分类说明 
     * > tipReason 原因来源
     * key | value
     * --- | -----
     * 0 | 正常情况
     * 1 | 您选的商品规格已被抢空
     * 2 | 该商品规格发生变更，请重新选择
     * 3 | 数量或金额不满足商家混批规则
     *
     * @param UidDTO $user 用户信息
     *
     * @return array
     * @requestExample()
     * @returnExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","storeId":159771,"storeName":"艾欧严选大码女装","goodsName":"ioeoi正品☆9568时尚典雅法式长大衣","goodsId":27767,"quantity":8,"price":"464.00","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3,"loseSpec":false},{"spId":9521390,"color":"黄色","size":"xl","quantity":5,"loseSpec":false}],"ifShow":"5","closed":"0","pirceInfo":{"goods_id":"27767","store_id":"159771","price_type":1,"price_lower":"58.00","price_upper":"58.00","price_data":[{"lower_limit":"1","upper_limit":"0","price":"58.00","type":"1"}]},"tipType":2,"tipReason":"该商品规格发生变更，请重新选择","createdTime":1534408722,"updateTime":1534413098,"useful":false,"isMix":1,"colorSum":2,"sizeSum":1,"mixMoney":100,"mixNum":2 
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function listCartAsync(UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'listCart', false, $user);
    }

    /**
     * 添加购物车.
     *
     * @param int   $goodsId    商品id
     * @param array $attributes 其他属性
     * @param array $attributes['spId'] 规格属性Id
     * @param array $attributes['color'] 颜色
     * @param array $attributes['size'] 尺寸
     * @param array $attributes[‘quantity’] 属性购买数量
     * @param array $attributes['price'] 属性价格
     * @param UidDTO $user  用户
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     * @requestExample({
     *   "goodsId":27767,"attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3},{"spId":9521390,"color":"黄色","size":"xl","quantity":5}]
     * })
     * @returnExample(true)
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function addCart(int $goodsId, array $attributes, UidDTO $user = null): bool
    {
        return EellyClient::request('cart/cart', 'addCart', true, $goodsId, $attributes, $user);
    }

    /**
     * 添加购物车.
     *
     * @param int   $goodsId    商品id
     * @param array $attributes 其他属性
     * @param array $attributes['spId'] 规格属性Id
     * @param array $attributes['color'] 颜色
     * @param array $attributes['size'] 尺寸
     * @param array $attributes[‘quantity’] 属性购买数量
     * @param array $attributes['price'] 属性价格
     * @param UidDTO $user  用户
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     * @requestExample({
     *   "goodsId":27767,"attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3},{"spId":9521390,"color":"黄色","size":"xl","quantity":5}]
     * })
     * @returnExample(true)
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function addCartAsync(int $goodsId, array $attributes, UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'addCart', false, $goodsId, $attributes, $user);
    }

    /**
     * 更新指定id购物车.
     *
     * @param string $uniqueId 指定购物车唯一值
     * @param array  $attributes 修改属性
     * @param UidDTO $user  用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool
     * @requestExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3},{"spId":9521390,"color":"黄色","size":"xl","quantity":5}]
     * })
     * @returnExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","storeId":159771,"storeName":"艾欧严选大码女装","goodsName":"ioeoi正品☆9568时尚典雅法式长大衣","goodsId":27767,"quantity":8,"price":"464.00","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3,"loseSpec":false},{"spId":9521390,"color":"黄色","size":"xl","quantity":5,"loseSpec":false}],"ifShow":"5","closed":"0","pirceInfo":{"goods_id":"27767","store_id":"159771","price_type":1,"price_lower":"58.00","price_upper":"58.00","price_data":[{"lower_limit":"1","upper_limit":"0","price":"58.00","type":"1"}]},"tipType":2,"tipReason":"该商品规格发生变更，请重新选择","createdTime":1534408722,"updateTime":1534413098,"useful":false,"isMix":1,"colorSum":2,"sizeSum":1,"mixMoney":100,"mixNum":2
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function updateCart(string $uniqueId, array $attributes, UidDTO $user = null): array
    {
        return EellyClient::request('cart/cart', 'updateCart', true, $uniqueId, $attributes, $user);
    }

    /**
     * 更新指定id购物车.
     *
     * @param string $uniqueId 指定购物车唯一值
     * @param array  $attributes 修改属性
     * @param UidDTO $user  用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool
     * @requestExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3},{"spId":9521390,"color":"黄色","size":"xl","quantity":5}]
     * })
     * @returnExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7","storeId":159771,"storeName":"艾欧严选大码女装","goodsName":"ioeoi正品☆9568时尚典雅法式长大衣","goodsId":27767,"quantity":8,"price":"464.00","attributes":[{"spId":9521387,"color":"紫色","size":"xl","quantity":3,"loseSpec":false},{"spId":9521390,"color":"黄色","size":"xl","quantity":5,"loseSpec":false}],"ifShow":"5","closed":"0","pirceInfo":{"goods_id":"27767","store_id":"159771","price_type":1,"price_lower":"58.00","price_upper":"58.00","price_data":[{"lower_limit":"1","upper_limit":"0","price":"58.00","type":"1"}]},"tipType":2,"tipReason":"该商品规格发生变更，请重新选择","createdTime":1534408722,"updateTime":1534413098,"useful":false,"isMix":1,"colorSum":2,"sizeSum":1,"mixMoney":100,"mixNum":2
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function updateCartAsync(string $uniqueId, array $attributes, UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'updateCart', false, $uniqueId, $attributes, $user);
    }

    /**
     * 清空购物车.
     *
     * @param UidDTO $user 用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function clearCart(UidDTO $user = null): bool
    {
        return EellyClient::request('cart/cart', 'clearCart', true, $user);
    }

    /**
     * 清空购物车.
     *
     * @param UidDTO $user 用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function clearCartAsync(UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'clearCart', false, $user);
    }

    /**
     * 删除指定id购物车数据.
     *
     *
     * @param string $rawId 指定购物车key值，goods+商品id+规格id,数据格式中md5值
     * @param UidDTO $user 用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool
     * @requestExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7"
     * })
     * @returnExample(true)
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function deleteCart(string $uniqueId, UidDTO $user = null): bool
    {
        return EellyClient::request('cart/cart', 'deleteCart', true, $uniqueId, $user);
    }

    /**
     * 删除指定id购物车数据.
     *
     *
     * @param string $rawId 指定购物车key值，goods+商品id+规格id,数据格式中md5值
     * @param UidDTO $user 用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool
     * @requestExample({
     *   "uniqueId":"372f86e3539ef75e5b49f393e98decc7"
     * })
     * @returnExample(true)
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function deleteCartAsync(string $uniqueId, UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'deleteCart', false, $uniqueId, $user);
    }

    /**
     * 批量移除购物车.
     *
     * @param array  $rawIds 购物车key值id数组
     * @param UidDTO $user   用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     * @requestExample({
     *   "372f86e3539ef75e5b49f393e98decc7","37uu99hne112j6e3539ef9f93e98deuy"
     * })
     * @returnExample(true)
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function deleteCartBatch(array $uniqueIds, UidDTO $user = null): bool
    {
        return EellyClient::request('cart/cart', 'deleteCartBatch', true, $uniqueIds, $user);
    }

    /**
     * 批量移除购物车.
     *
     * @param array  $rawIds 购物车key值id数组
     * @param UidDTO $user   用户信息
     *
     * @throws \Eelly\SDK\Cart\Exception\CartException
     *
     * @return bool 返回bool值
     * @requestExample({
     *   "372f86e3539ef75e5b49f393e98decc7","37uu99hne112j6e3539ef9f93e98deuy"
     * })
     * @returnExample(true)
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function deleteCartBatchAsync(array $uniqueIds, UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'deleteCartBatch', false, $uniqueIds, $user);
    }

    /**
     * 获取购物车数量限制
     *
     * @return int
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function getMaxCount(): int
    {
        return EellyClient::request('cart/cart', 'getMaxCount', true);
    }

    /**
     * 获取购物车数量限制
     *
     * @return int
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function getMaxCountAsync()
    {
        return EellyClient::request('cart/cart', 'getMaxCount', false);
    }

    /**
     * 获取购物车数量
     *
     * @param UidDTO $user 当前登陆的用户
     * @return int
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function getCartCount(UidDTO $user = null): int
    {
        return EellyClient::request('cart/cart', 'getCartCount', true, $user);
    }

    /**
     * 获取购物车数量
     *
     * @param UidDTO $user 当前登陆的用户
     * @return int
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.8.16
     */
    public function getCartCountAsync(UidDTO $user = null)
    {
        return EellyClient::request('cart/cart', 'getCartCount', false, $user);
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