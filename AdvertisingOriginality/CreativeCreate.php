<?php
/**
 * 创建广告创意
 * User: yueguang
 * Date: 2022/4/12
 * Time: 10:27
 */
namespace AdvertisingOriginality;

use AdvertisingDelivery\CampaignCreate;
use core\Profile\RpcRequest;

class CreativeCreate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/create_v2/';
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
     * (可选)
     * 展示监测链接
     */
    protected $track_url;

    /**
     * (可选)
     * 点击监测链接
     */
    protected $action_track_url;

    /**
     * (可选)
     * 视频有效播放监测链接
     */
    protected $video_play_effective_track_url;

    /**
     * (可选)
     * 视频播放完毕监测链接
     */
    protected $video_play_done_track_url;

    /**
     * (可选)
     * 视频播放监测链接
     */
    protected $video_play_track_url;

    /**
     * (可选)
     * 是否关闭评论
     * 允许值: 0, 1
     */
    protected $is_comment_disable;

    /**
     * (可选)
     * 是否关闭视频详情页落地页(勾选该选项后,视频详情页中不默认弹出落地页,仅对视频广告生效)
     * 允许值: 0, 1
     */
    protected $close_video_detail;

    /**
     * (可选)
     * 创意展现方式
     * 允许值: "CREATIVE_DISPLAY_MODE_CTR", "CREATIVE_DISPLAY_MODE_RANDOM"
     */
    protected $creative_display_mode;

    /**
     * (可选)
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
     * (可选)
     * 文章来源
     */
    protected $source;

    /**
     * (可选)
     * 应用名(当推广应用下载[包含Android、iOS]时, 必填)
     */
    protected $app_name;

    /**
     * (可选)
     * Android应用下载详情页(当推广应用下载Android时, 必填)
     */
    protected $web_url;

    /**
     * 创意标签(以英文逗号分隔,最多20个标签,且每个标签长度不超过10个字符)
     */
    protected $ad_keywords;

    /**
     * 创意分类-三级行业
     */
    protected $third_industry_id;

    /**
     * (可选)
     * 附加创意类型(仅当推广目的landing_type=LINK时,填写)
     * 允许值: "ATTACHED_CREATIVE_NONE", "ATTACHED_CREATIVE_PHONE","ATTACHED_CREATIVE_FORM"
     */
    protected $advanced_creative_type;

    /**
     * (可选)
     * 副标题
     */
    protected $advanced_creative_title;

    /**
     * (可选)
     * 电话号码
     */
    protected $phone_number;

    /**
     * (可选)
     * 按钮文本
     */
    protected $button_text;

    /**
     * (可选)
     * 表单提交链接
     * (当附加创意类型为ATTACHED_CREATIVE_FORM时, 必填, 切当附加创意类型为当附加创意类型为ATTACHED_CREATIVE_FORM时, 必须为今日头条建站地址)
     */
    protected $form_url;

    /**
     * (可选)
     * 创意类型，该字段为STATIC_ASSEMBLE表示程序化创意，其他情况无该字段。
     * （请注意：如果投放程序化创意，标题和素材使用的是下面title_list与image_list 部分的字段）
     */
    protected $creative_material_mode;

    /**
     * (可选)
     * 标题信息，程序化创意必填，字段说明见下表。最多包含10个标题。
     */
    protected $title_list;

    /**
     * (可选)
     * 素材信息，程序化创意必填，字段说明见下表。最多包含12张图和6个视频。
     */
    protected $image_list;

    /**
     * 素材信息, 投放位置和创意类型决定素材规格。以下为字段说明。当为程序化创意时，该字段不填数据，值为[]
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
