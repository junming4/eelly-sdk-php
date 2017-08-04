<?php

declare(strict_types=1);
/*
 * PHP version 7.1
 *
 * @copyright Copyright (c) 2012-2017 EELLY Inc. (https://www.eelly.com)
 * @link      https://api.eelly.com
 * @license   衣联网版权所有
 */

namespace Eelly\SDK\Message\Service\DTO;

use Eelly\DTO\AbstractDTO;
/**
 *
 * @author eellytools<localhost.shell@gmail.com>
 */
class SiteDTO extends AbstractDTO
{
    /**
     * 消息读取ID，自增主键
     *
     * @var int
     */
    public $msi_id;

    /**
     * 消息ID
     *
     * @var int
     */
    public $message_id; 

    /**
     * 发送者ID：0 系统消息
     *
     * @var int
     */
    public $sender_id;

    /**
     * 接收者ID
     *
     * @var int
     */
    public $receiver_id;

    /**
     * (冗余)消息标题
     *
     * @var string
     */
    public $title;

    /**
     * 站内信内容：编译后的消息内容
     *
     * @var string
     */
    public $content;

    /**
     * 是否已读：0 否 1 是
     *
     * @var string
     */
    public $is_read;

    /**
     * 添加时间
     *
     * @var int
     */
    public $created_time; 

    /**
     * 修改时间
     *
     * @var unknown
     */
    public $update_time; 




}