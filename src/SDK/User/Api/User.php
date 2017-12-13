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

namespace Eelly\SDK\User\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\User\Service\UserInterface;
use Eelly\DTO\UserDTO;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class User implements UserInterface
{
    /**
     * 校验手机号码是否存在.
     *
     * @param string $mobile 手机号
     *
     * @return int 存在返回用户Id，否则返回0
     * @requestExample({'mobile':'13512719777'})
     * @returnExample(148084)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     * @Validation(
     *    @Regex(0,{message:"手机号",'pattern':'/^1[34578]\d{9}$/'})
     * )
     */
    public function checkIsExistUserMobile(string $mobile): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $mobile);
    }

    /**
     * 校验手机号码是否存在.
     *
     * @param string $mobile 手机号
     *
     * @return int 存在返回用户Id，否则返回0
     * @requestExample({'mobile':'13512719777'})
     * @returnExample(148084)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     * @Validation(
     *    @Regex(0,{message:"手机号",'pattern':'/^1[34578]\d{9}$/'})
     * )
     */
    public function checkIsExistUserMobileAsync(string $mobile)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $mobile);
    }

    /**
     * 校验密码强度.
     *
     * @param string $password 密码
     *
     * @return int -1:密码不符合规则;<2:密码过于简单
     * @requestExample({"password":"!ab123456"})
     * @returnExample({true})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     */
    public function checkPasswordPowerRule(string $password): bool
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $password);
    }

    /**
     * 校验密码强度.
     *
     * @param string $password 密码
     *
     * @return int -1:密码不符合规则;<2:密码过于简单
     * @requestExample({"password":"!ab123456"})
     * @returnExample({true})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     */
    public function checkPasswordPowerRuleAsync(string $password)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $password);
    }

    /**
     * 更新用户数据.
     *
     * @param int   $userId 用户登录ID
     * @param array $data   需要更新的用户数据
     *
     * @return bool
     * @requestExample({'username':'username','passwordOld':'password_old','password':'password','mobile':'mobile','avatar':'avatar','status':'status'})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     * @Validation(
     *  @OperatorValidator(0,{message : "非法用户ID",operator:["gt",0]}),
     *  @PresenceOf(1,{message : "数据不能为空"})
     * )
     */
    public function updateUser(int $userId, array $data): bool
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $userId, $data);
    }

    /**
     * 更新用户数据.
     *
     * @param int   $userId 用户登录ID
     * @param array $data   需要更新的用户数据
     *
     * @return bool
     * @requestExample({'username':'username','passwordOld':'password_old','password':'password','mobile':'mobile','avatar':'avatar','status':'status'})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     * @Validation(
     *  @OperatorValidator(0,{message : "非法用户ID",operator:["gt",0]}),
     *  @PresenceOf(1,{message : "数据不能为空"})
     * )
     */
    public function updateUserAsync(int $userId, array $data)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $userId, $data);
    }

    /**
     * 注册用户.
     *
     * @param array  $data 注册数据
     * @param string $data ['mobile'] 注册数据
     * @param string $data ['captcha'] 验证码
     * @param string $data ['password'] 注册密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return int 用户ID
     * @requestExample({'mobile':13512719787,'captcha':123456,'password':'123456'})
     * @returnExample('accessToken')
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     */
    public function registerUser(array $data): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $data);
    }

    /**
     * 注册用户.
     *
     * @param array  $data 注册数据
     * @param string $data ['mobile'] 注册数据
     * @param string $data ['captcha'] 验证码
     * @param string $data ['password'] 注册密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return int 用户ID
     * @requestExample({'mobile':13512719787,'captcha':123456,'password':'123456'})
     * @returnExample('accessToken')
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     */
    public function registerUserAsync(array $data)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $data);
    }

    /**
     * 检查用户密码.
     *
     * @param string $username 用户名(支持使用用户名和手机号)
     * @param string $password 用户密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return bool 该用户密码是否正确
     *
     * @requestExample({"username":"molimoq", "password":"123456"})
     *
     * @returnExample(true)
     *
     * @author hehui<hehui@eelly.net>
     */
    public function checkPassword(string $username, string $password): bool
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $username, $password);
    }

    /**
     * 检查用户密码.
     *
     * @param string $username 用户名(支持使用用户名和手机号)
     * @param string $password 用户密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return bool 该用户密码是否正确
     *
     * @requestExample({"username":"molimoq", "password":"123456"})
     *
     * @returnExample(true)
     *
     * @author hehui<hehui@eelly.net>
     */
    public function checkPasswordAsync(string $username, string $password)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $username, $password);
    }

    /**
     * 通过密码获取用户信息.
     *
     * 支持使用用户名加密码和用户名加手机获取
     *
     * @param string $username 用户名(支持使用用户名和手机号)
     * @param string $password 用户密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return UserDTO
     *
     * @requestExample({"username":"molimoq", "password":"123456"})
     *
     * @returnExample({"uid":148086,"username":"molimoq","mobile":"13800138000"})
     *
     * @author hehui<hehui@eelly.net>
     */
    public function getUserByPassword(string $username, string $password): UserDTO
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $username, $password);
    }

    /**
     * 通过密码获取用户信息.
     *
     * 支持使用用户名加密码和用户名加手机获取
     *
     * @param string $username 用户名(支持使用用户名和手机号)
     * @param string $password 用户密码
     *
     * @throws \Eelly\Exception\LogicException
     *
     * @return UserDTO
     *
     * @requestExample({"username":"molimoq", "password":"123456"})
     *
     * @returnExample({"uid":148086,"username":"molimoq","mobile":"13800138000"})
     *
     * @author hehui<hehui@eelly.net>
     */
    public function getUserByPasswordAsync(string $username, string $password)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $username, $password);
    }

    /**
     * 获取用户信息.
     *
     * @param UidDTO $user 登录用户
     *
     * @throws \Exception
     *
     * @return UserDTO
     *
     * @requestExample()
     *
     * @returnExample({"uid":148086,"username":"molimoq","mobile":"13800138000"})
     *
     * @author hehui<hehui@eelly.net>
     */
    public function getInfo(UidDTO $user = null): UserDTO
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $user);
    }

    /**
     * 获取用户信息.
     *
     * @param UidDTO $user 登录用户
     *
     * @throws \Exception
     *
     * @return UserDTO
     *
     * @requestExample()
     *
     * @returnExample({"uid":148086,"username":"molimoq","mobile":"13800138000"})
     *
     * @author hehui<hehui@eelly.net>
     */
    public function getInfoAsync(UidDTO $user = null)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $user);
    }

    /**
     * 批量获取用户基本信息.
     *
     * @param array $userIds 用户一维数据user_id: [148086,148087,148088]
     *
     * @return array
     * @requestExample({'userIds':{148086,148087,148088}})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月25日
     * @Validation(
     *     @PresenceOf(0,{message : "用户id不能为空"})
     * )
     */
    public function getListByUserIds(array $userIds): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $userIds);
    }

    /**
     * 批量获取用户基本信息.
     *
     * @param array $userIds 用户一维数据user_id: [148086,148087,148088]
     *
     * @return array
     * @requestExample({'userIds':{148086,148087,148088}})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月25日
     * @Validation(
     *     @PresenceOf(0,{message : "用户id不能为空"})
     * )
     */
    public function getListByUserIdsAsync(array $userIds)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $userIds);
    }

    /**
     * 添加用户.
     *
     * @param array  $data
     * @param string $data ["username"]
     * @param string $data ["password"]["old"]
     * @param string $data ["password"]
     * @param int    $data ["mobile"]
     * @param string $data ["avatar"]
     * @param int    $data ["status"]
     *
     * @throws UserException
     *
     * @return int
     * @requestExample({"data":{"username":"xxx","password_old":"xxx","password":"xxx","mobile":13711223344,"avatar":"xxx","status":0}})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/29
     */
    public function addUser(array $data): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $data);
    }

    /**
     * 添加用户.
     *
     * @param array  $data
     * @param string $data ["username"]
     * @param string $data ["password"]["old"]
     * @param string $data ["password"]
     * @param int    $data ["mobile"]
     * @param string $data ["avatar"]
     * @param int    $data ["status"]
     *
     * @throws UserException
     *
     * @return int
     * @requestExample({"data":{"username":"xxx","password_old":"xxx","password":"xxx","mobile":13711223344,"avatar":"xxx","status":0}})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/29
     */
    public function addUserAsync(array $data)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $data);
    }

    /**
     * 获取会员搜索引擎所需数据.
     *
     * @param int $currentPage 当前页
     * @param int $limit       限制数
     *
     * @throws \Eelly\SDK\
     *
     * @return array
     * @requestExample({"currentPage":1,"limit":100})
     * @returnExample()
     *
     * @author liangxinyi<liangxinyi@eelly.net>
     *
     * @since 2017-10-23
     */
    public function listUserElasticData(int $currentPage = 1, int $limit = 100): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $currentPage, $limit);
    }

    /**
     * 获取会员搜索引擎所需数据.
     *
     * @param int $currentPage 当前页
     * @param int $limit       限制数
     *
     * @throws \Eelly\SDK\
     *
     * @return array
     * @requestExample({"currentPage":1,"limit":100})
     * @returnExample()
     *
     * @author liangxinyi<liangxinyi@eelly.net>
     *
     * @since 2017-10-23
     */
    public function listUserElasticDataAsync(int $currentPage = 1, int $limit = 100)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $currentPage, $limit);
    }

    /**
     * 根据传过来的用户id，获取对应的用户资料.
     *
     * @param int $userId 用户id
     *
     * @throws \Exception
     *
     * @return array
     *
     *
     * @requestExample({"userId":"148086"})
     * @returnExample({"userId":"148086","mobile":"13430245678","avatar":"","realname":"陌陌","username":"molimoq"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-26
     */
    public function getMineDataApp(int $userId): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $userId);
    }

    /**
     * 根据传过来的用户id，获取对应的用户资料.
     *
     * @param int $userId 用户id
     *
     * @throws \Exception
     *
     * @return array
     *
     *
     * @requestExample({"userId":"148086"})
     * @returnExample({"userId":"148086","mobile":"13430245678","avatar":"","realname":"陌陌","username":"molimoq"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-26
     */
    public function getMineDataAppAsync(int $userId)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $userId);
    }

    /**
     * 更新用户头像.
     *
     * @param int    $uid
     * @param string $avatar
     *
     * @throws UserException
     *
     * @return bool
     * @requestExample({"uid":1,"avatar":""})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017-11-06
     */
    public function updateUserAvatar(int $uid, string $avatar): bool
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $uid, $avatar);
    }

    /**
     * 更新用户头像.
     *
     * @param int    $uid
     * @param string $avatar
     *
     * @throws UserException
     *
     * @return bool
     * @requestExample({"uid":1,"avatar":""})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017-11-06
     */
    public function updateUserAvatarAsync(int $uid, string $avatar)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $uid, $avatar);
    }

    /**
     * 根据用户id获取二维码数据.
     *
     * @param int $userId 用户id
     *
     * @throws UserException
     *
     * @return array
     * @requestExample({"userId":"148086"})
     * @returnExample({"userId":148086, "userName":"molimoq", "portraitUrl":"https://img01.eelly.com/G03/M00/00/52/small_p4YB1.jpg","addressName": "广东.广州"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function getCodeCardInfo(int $userId): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $userId);
    }

    /**
     * 根据用户id获取二维码数据.
     *
     * @param int $userId 用户id
     *
     * @throws UserException
     *
     * @return array
     * @requestExample({"userId":"148086"})
     * @returnExample({"userId":148086, "userName":"molimoq", "portraitUrl":"https://img01.eelly.com/G03/M00/00/52/small_p4YB1.jpg","addressName": "广东.广州"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function getCodeCardInfoAsync(int $userId)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $userId);
    }

    /**
     * 查看用户绑定状态
     *
     * @param int    $type 类型 1:手机 2:QQ 3:微信 4:全部(手机+QQ+微信+邮箱)
     * @param UidDTO $user 用户登录信息
     *
     * @throws UserException
     *
     * @return array
     * @requestExample({"type":4})
     * @returnExample({"isBindMobile":"true", "mobile":"134****8648","phoneMob":"13430248648","isBindQQ":"true","qqNickname":"","isBindWechat":"false","WechatNickname":"","isBindEmail":"true","email":"molimoq@eelly.net"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function checkBindStatus(int $type, UidDTO $user = null): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $type, $user);
    }

    /**
     * 查看用户绑定状态
     *
     * @param int    $type 类型 1:手机 2:QQ 3:微信 4:全部(手机+QQ+微信+邮箱)
     * @param UidDTO $user 用户登录信息
     *
     * @throws UserException
     *
     * @return array
     * @requestExample({"type":4})
     * @returnExample({"isBindMobile":"true", "mobile":"134****8648","phoneMob":"13430248648","isBindQQ":"true","qqNickname":"","isBindWechat":"false","WechatNickname":"","isBindEmail":"true","email":"molimoq@eelly.net"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function checkBindStatusAsync(int $type, UidDTO $user = null)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $type, $user);
    }

    /**
     * 绑定手机.
     *
     * @param array  $data
     * @param string $data['mobile']    手机号
     * @param string $data['captcha']   验证码
     * @param string $data['type']      验证码类型
     * @param string $data['opType']    操作类型  (add添加绑定手机 edit修改绑定手机)
     * @param string $data['mobileNew'] 新的手机号码 (修改绑定的手机号)
     * @param UidDTO $user              用户登录信息
     *
     * @return bool
     *
     * @requestExample({"data":{"mobile":"13430245645", "captcha":"123456","type":"boundMobile","opType":"add","mobileNew":""}})
     * @returnExample(true)
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function bindingMobile(array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $data, $user);
    }

    /**
     * 绑定手机.
     *
     * @param array  $data
     * @param string $data['mobile']    手机号
     * @param string $data['captcha']   验证码
     * @param string $data['type']      验证码类型
     * @param string $data['opType']    操作类型  (add添加绑定手机 edit修改绑定手机)
     * @param string $data['mobileNew'] 新的手机号码 (修改绑定的手机号)
     * @param UidDTO $user              用户登录信息
     *
     * @return bool
     *
     * @requestExample({"data":{"mobile":"13430245645", "captcha":"123456","type":"boundMobile","opType":"add","mobileNew":""}})
     * @returnExample(true)
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function bindingMobileAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $data, $user);
    }

    /**
     * 判断用户是否已经绑定手机.
     *
     * @param int $userId 用户id
     *
     * @return array
     * @requestExample({"userId":"148086"})
     * @returnExample({"isBindMobile":1, "mobile":"134****5645","phoneMob":"13430245645"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function checkUserIsBindingMobile(int $userId): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $userId);
    }

    /**
     * 判断用户是否已经绑定手机.
     *
     * @param int $userId 用户id
     *
     * @return array
     * @requestExample({"userId":"148086"})
     * @returnExample({"isBindMobile":1, "mobile":"134****5645","phoneMob":"13430245645"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function checkUserIsBindingMobileAsync(int $userId)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $userId);
    }

    /**
     * 获取用户信息.
     *
     * @param int $uid 用户id
     *
     * @return UserDTO
     * @requestExample({"uid":"148086"})
     * @returnExample({"uid":148086,"username":"molimoq","mobile":"13800138000"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @author hehui<hehui@eelly.net>
     *
     * @since 2017-11-06
     */
    public function getUser(int $uid): UserDTO
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $uid);
    }

    /**
     * 判断用户是否已经绑定手机.
     *
     * @param int $userId 用户id
     *
     * @return array
     * @requestExample({"userId":"148086"})
     * @returnExample({"isBindMobile":1, "mobile":"134****5645","phoneMob":"13430245645"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2017-11-06
     */
    public function getUserAsync(int $uid)
    {
        return EellyClient::request('user/user', __FUNCTION__, false, $uid);
    }
    /**
     * 根据用户名获取用户信息.
     *
     * @param string $username 用户名
     *
     * @return array
     * @requestExample({"username":"hello"})
     * @returnExample({"user_id":"2","username":"hello","password_old":"","password":"xxx","mobile":"13711223344","avatar":"","status":"0","created_time":"1506668224","update_time":"2017-09-29 14:57:05"})
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017/10/9
     *
     * @validation(
     *     @PresenceOf(0,{message:"用户名不能为空"})
     * )
     */
    public function getByUserName(string $username): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $username);
    }

    /**
     * uc添加用户.
     *
     * @param array  $data
     * @param string $data["username"]  用户名
     * @param string $data["password"]  密码
     * @param string $data["email"]     邮箱地址
     * @param int $data["uid"]          用户id,没有则传0
     * @param string $data["regip"]     注册时的ip地址
     * @param int   $data["mobile"]     注册的手机号
     *
     * @return int
     * @requestExample({"data":{"username":"新增测试用户","password":"123","email":"1258525@qq.com","uid":0,"regip":"127.0.0.1","mobile":0}})
     * @returnExample(148081)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017/10/9
     */
    public function addUcUser(array $data): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $data);
    }

    /**
     * uc编辑用户.
     *
     * @param string $username      用户名
     * @param string $oldpw         旧密码
     * @param string $newpw         新密码
     * @param string $email         邮件地址
     * @param int $ignoreoldpw
     *
     * @return int
     * @requestExample({"username":"poyu","oldpw":"","newpw":"","email":"","ignoreoldpw":0})
     * @returnExample(1)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017/10/10
     */
    public function editUcUser(string $username, string $oldpw, string $newpw, string $email, int $ignoreoldpw = 0): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $username, $oldpw, $newpw, $email, $ignoreoldpw);
    }

    /**
     * 批量获取用户头像.
     * @param string $uids 用户ids
     *
     * @return array
     * @requestExample({"uids":1})
     * @returnExample({"userId":1,"avatar":""})
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017/10/13
     * @Validation(
     *     @PresenceOf(0,{message : "用户id不能为空"})
     * )
     */
    public function getUcAvatarByIds(string $uids): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $uids);
    }

    /**
     * uc根据qqopenid, 微信unionid检测用户是否存在.
     * @param int $type 第三方平台类型：1：qq 2：微信 3：新浪微博
     * @param string $key 第三方用户认证信息，qqopenid， wxunionid
     *
     * @return int
     * @requestExample({"type":1,"key":"xxx"})
     * @returnExample(0)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017/10/10
     *
     * @Validation(
     *     @InclusionIn(0,{message:"非法的第三方账号类型",domain:[1,2,3]}),
     *     @PresenceOf(1,{message : "第三方平台信息不能为空"})
     * )
     */
    public function checkThirdKey(int $type, string $key): int
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $type, $key);
    }

    /**
     * Uc通过条件获取用户信息.
     *
     * @param array     $data
     * @param int       $data["type"]   获取类型  2:username, 3:根据用户id获取字段
     * @param string    $data["val"]    对应类型的值
     * @param string    $data["field"]  字段
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * userId      |string |    用户id
     * username    |string |    用户名
     * passwordOld |string |    用户旧密码
     * password    |string |    用户新密码
     * mobile      |string |    用户手机
     * avatar      |string |    用户头像
     * status      |string |    用户状态
     * createdTime |string |    创建时间
     * updateTime  |string |    更新时间
     * email       |string |    邮箱地址
     * regIp       |string |    注册ip
     *
     *
     * @throws UserException
     *
     * @return array
     * @requestExample({"data":{"type":1,"val":"1111@qq.com"}})
     * @returnExample({"userId":"1","username":"admin_moq","passwordOld":"17130970363720a389d2c582ddb9042f03b2bd","password":"","mobile":"","avatar":"","status":"0","createdTime":"1258946046","updateTime":"2017-11-25 10:50:56","email":"111@eelly.com","regIp":"116.22.30.27"})
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     * @since  2017年12月7日
     */
    public function getInfoByFieldUc(array $data = []): array
    {
        return EellyClient::request('user/user', __FUNCTION__, true, $data);
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