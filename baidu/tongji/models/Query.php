<?php
namespace app\baidu\tongji\models;

use yii\base\Model;

class Query extends Model
{

    /**
     * 报告类型
     *
     * @var array
     */
    public static $methods = [
        'overview/getTimeTrendRpt' => [
            'label' => '趋势数据',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问时长，秒',
                    'name' => 'avg_visit_time'
                ],
                [
                    'label' => '转化次无数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '百度推荐贡献浏览量',
                    'name' => 'contri_pv'
                ]
            ]
        ],
        'overview/getDistrictRpt' => [
            'label' => '地域分布',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ]
            ]
        ],
        'overview/getCommonTrackRpt' => [
            'label' => '来源网站、搜索词、入口页面、受访页面',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ]
            ]
        ],
        'trend/time/a' => [
            'label' => '趋势分析',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '浏览量占比，%',
                    'name' => 'pv_ratio'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '访问次数',
                    'name' => 'visit_count'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'visitorip_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '平均访问时长，秒',
                    'name' => 'avg_visit_time'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ],
                [
                    'label' => '平均转化成本，元',
                    'name' => 'avg_trans_cost'
                ],
                [
                    'label' => '收益，元',
                    'name' => 'income'
                ],
                [
                    'label' => '利润，元',
                    'name' => 'profit'
                ],
                [
                    'label' => '投资回报率，%',
                    'name' => 'roi'
                ]
            ]
        ],
        'pro/hour/a' => [
            'label' => '百度推广趋势',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '浏览量占比，%',
                    'name' => 'pv_ratio'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '访问次数',
                    'name' => 'visit_count'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'visitorip_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '平均访问时长，秒',
                    'name' => 'avg_visit_time'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ],
                [
                    'label' => '平均转化成本，元',
                    'name' => 'avg_trans_cost'
                ],
                [
                    'label' => '收益，元',
                    'name' => 'income'
                ],
                [
                    'label' => '利润，元',
                    'name' => 'profit'
                ],
                [
                    'label' => '投资回报率，%',
                    'name' => 'roi'
                ]
            ]
        ],
        'source/all/a' => [
            'label' => '全部来源',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '浏览量占比，%',
                    'name' => 'pv_ratio'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '按来源类型',
                    'name' => 'viewType:type'
                ],
                [
                    'label' => '按来源网站',
                    'name' => 'viewType:site'
                ],
                [
                    'label' => 'UV',
                    'name' => 'clientDevice_visitor'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '平均访问时长，秒',
                    'name' => 'avg_visit_time'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ]
            ]
        ],
        'source/engine/a' => [
            'label' => '搜索引擎',
            'metrics' =>'source/all/a'
        ],
        'source/searchword/a' => [
            'label' => '搜索词',
            'metrics' =>'source/all/a'
        ],
        'source/link/a' => [
            'label' => '外部链接',
            'metrics' =>'source/all/a'
        ],
        'visit/toppage/a' => [
            'label' => '受访页面',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '入口页次数',
                    'name' => 'visit1_count'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '贡献下游浏览量',
                    'name' => 'outward_count'
                ],
                [
                    'label' => '退出页次数',
                    'name' => 'exit_count'
                ],
                [
                    'label' => '平均停留时长，秒',
                    'name' => 'average_stay_time'
                ],
                [
                    'label' => '退出率，%',
                    'name' => 'exit_ratio'
                ],
            ]
        ],
        'visit/landingpage/a' => [
            'label' => '入口页面',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '访问次数',
                    'name' => 'visit_count'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '贡献浏览量',
                    'name' => 'out_pv_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'average_stay_time'
                ],
                [
                    'label' => '退出率，%',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ]
            ]
        ],
        'visit/topdomain/a' => [
            'label' => '受访域名',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '浏览量占比，%',
                    'name' => 'pv_ratio'
                ],
                [
                    'label' => '访问次数',
                    'name' => 'visit_count'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '贡献浏览量',
                    'name' => 'out_pv_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'average_stay_time'
                ],
                [
                    'label' => '退出率，%',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ]
            ]
        ],
        'visit/district/a'=>[
            'label' => '地域分布（省）',
            'metrics'=> 'visit/word/a'
        ],
        'visit/word/a' => [
            'label' => '地域分布（国）',
            'metrics' => [
                [
                    'label' => '浏览量(PV)',
                    'name' => 'pv_count'
                ],
                [
                    'label' => '浏览量占比，%',
                    'name' => 'pv_ratio'
                ],
                [
                    'label' => '访问次数',
                    'name' => 'visit_count'
                ],
                [
                    'label' => '访客数(UV)',
                    'name' => 'visitor_count'
                ],
                [
                    'label' => '新访客数',
                    'name' => 'new_visitor_count'
                ],
                [
                    'label' => '新访客比率，%',
                    'name' => 'new_visitor_ratio'
                ],
                [
                    'label' => 'IP数',
                    'name' => 'ip_count'
                ],
                [
                    'label' => '贡献浏览量',
                    'name' => 'out_pv_count'
                ],
                [
                    'label' => '跳出率，%',
                    'name' => 'bounce_ratio'
                ],
                [
                    'label' => '平均访问页数',
                    'name' => 'average_stay_time'
                ],
                [
                    'label' => '退出率，%',
                    'name' => 'avg_visit_pages'
                ],
                [
                    'label' => '转化次数',
                    'name' => 'trans_count'
                ],
                [
                    'label' => '转化率，%',
                    'name' => 'trans_ratio'
                ]
            ]
        ],
    ];

    // 基本参数
    
    /**
     * 网站id
     *
     * @var number
     */
    public $site_id;

    /**
     * 通常对应要查询的报告
     *
     * @var string
     */
    public $method;

    /**
     * 查询起始时间,例：20160501
     *
     * @var string
     */
    public $start_date;

    /**
     * 查询结束时间,例：20160531
     *
     * @var string
     */
    public $end_date;

    /**
     * 对比查询起始时间
     *
     * @var string
     */
    public $start_date2;

    /**
     * 对比查询结束时间
     *
     * @var string
     */
    public $end_date2;

    /**
     * 自定义指标选择，多个指标用逗号分隔
     *
     * @var string
     */
    public $metrics;

    /**
     * 时间粒度(只支持有该参数的报告): day/hour/week/month
     *
     * @var string
     */
    public $gran;

    /**
     * 指标排序，示例：visitor_count,desc
     *
     * @var string
     */
    public $order;

    /**
     * 获取数据偏移，用于分页；默认是0
     *
     * @var number
     */
    public $start_index;

    /**
     * 单次获取数据条数，用于分页；默认是20; 0表示获取所有数据
     *
     * @var number
     */
    public $max_results;

    // 筛选参数
    
    /**
     * 转化目标：
     * -1：全部页面目标
     * -2：全部事件目标
     * -3：时长目标
     * -4：访问页数目标
     *
     * @var number
     */
    public $target;

    /**
     * 来源过滤：
     * through：直接访问
     * search,0：搜索引擎全部
     * link：外部链接
     *
     * @var string
     */
    public $source;

    /**
     * 设备过滤
     * pc：计算机
     * mobile：移动设备
     *
     * @var string
     */
    public $clientDevice;

    /**
     * 地域过滤
     * china：全国
     * province,1：省市自治区北京
     * province,2：省市自治区上海
     * province,3：省市自治区天津
     * …
     * other：其他
     *
     * @var string
     */
    public $area;

    /**
     * 访客过滤
     * new：新访客
     * old：老访客
     *
     * @var string
     */
    public $visitor;

    public function rules()
    {
        return [
            [
                [
                    'site_id',
                    'method',
                    'start_date',
                    'end_date',
                    'start_date2',
                    'end_date2',
                    'metrics',
                    'gran',
                    'order',
                    'start_index',
                    'max_results',
                    'target',
                    'source',
                    'clientDevice',
                    'area',
                    'vistor'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'site_id' => '网站id',
            'method' => '报告',
            'start_date' => '开始日期',
            'end_date' => '结束日期',
            'start_date2' => '对比开始日期',
            'end_date2' => '对比结束日期',
            'metrics' => '指标',
            'gran' => '时间粒度',
            'order' => '排序',
            'start_index' => '偏移',
            'max_results' => '条目',
            'target' => '转化目标',
            'source' => '来源',
            'clientDevice' => '设备',
            'area' => '地区',
            'vistor' => '访客'
        ];
    }
}

