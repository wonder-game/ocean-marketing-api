<?php
/**
 * 修改创意信息
 * User: yueguang
 * Date: 2022/4/12
 * Time: 15:03
 */
namespace AdvertisingOriginality;

use core\Profile\RpcRequest;

class CreativeUpdate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/update_v2/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 计划ID
     */
    protected $ad_id;

    /**
     * 时间戳,从read接口得到,用于判断是否基于最新信息修改
     */
    protected $modify_time;

    /**
     * 展示监测链接
     */
    protected $track_url;

    /**
     * 点击监测链接
     */
    protected $action_track_url;

    /**
     * 视频有效播放监测链接
     */
    protected $video_play_effective_track_url;

    /**
     * 视频播放完毕监测链接
     */
    protected $video_play_done_track_url;

    /**
     * 视频播放监测链接
     */
    protected $video_play_track_url;

    /**
     * 是否关闭评论
     * 允许值: 0, 1
     */
    protected $is_comment_disable;

    /**
     * 是否关闭视频详情页落地页(勾选该选项后,视频详情页中不默认弹出落地页,仅对视频广告生效)
     * 允许值: 0, 1
     */
    protected $close_video_detail;

    /**
     * 创意展现方式
     * 允许值: "CREATIVE_DISPLAY_MODE_CTR", "CREATIVE_DISPLAY_MODE_RANDOM"
     */
    protected $creative_display_mode;

    /**
     * 是否使用优选广告位，0表示不使用优选，1表示使用，使用优选广告位的时候默认忽略inventory_type字段。
     * 默认值: 0
     * 允许值: 0, 1
     */
    protected $smart_inventory;

    /**
     * 创意投放位置
     */
    protected $inventory_type;

    /**
     * 文章来源
     * 当推广目的为非应用下载或推广目的为应用下载&download_type=EXTERNAL_URL时必填
     */
    protected $source;

    /**
     * 应用名(当推广应用下载[包含Android、iOS]时, 必填)
     */
    protected $app_name;

    /**
     * Android应用下载详情页(当推广应用下载Android时, 必填)
     */
    protected $web_url;

    /**
     * 创意标签
     */
    protected $ad_keywords;

    /**
     * 创意分类
     */
    protected $third_industry_id;

    /**
     * 附加创意类型
     * 允许值: "ATTACHED_CREATIVE_NONE", "ATTACHED_CREATIVE_PHONE","ATTACHED_CREATIVE_FORM"
     */
    protected $advanced_creative_type;

    /**
     * 副标题
     */
    protected $advanced_creative_title;

    /**
     * 电话号码
     */
    protected $phone_number;

    /**
     * 按钮文本
     */
    protected $button_text;

    /**
     * 表单提交链接
     */
    protected $form_url;

    /**
     * 创意类型
     */
    protected $creative_material_mode;

    /**
     * 标题信息
     */
    protected $title_list;

    /**
     * 素材信息
     */
    protected $image_list;

    /**
     * 素材信息, 投放位置和创意类型决定素材规格
     */
    protected $creatives;
    
    /**
     * @param mixed $args
     * @return $this
     */
    public function setArgs($args)
    {
        foreach ($args as $key => $value) {
            $this->params[$key] = $this->{$key} = $value;
        }
        return $this;
    }
    
}
