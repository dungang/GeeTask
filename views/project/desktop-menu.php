<?php
use yii\bootstrap\Nav;
/* @var $this yii\web\View */
/* @var $project app\models\Project */

echo Nav::widget([
    'class' => 'nav nav-pills nav-stacked',
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-blackboard"></i> Desktop',
            'url' => [
                '/project/desktop',
                'id' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tasks"></i> 任务',
            'url' => [
                '/project/task',
                'TaskSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-repeat"></i> Sprint',
            'url' => [
                '/project/sprint',
                'SprintSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tint"></i> 新鲜故事',
            'url' => [
                '/project/fresh-story',
                'UserStorySearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-align-justify"></i> Product Backlog',
            'url' => [
                '/project/product-backlog',
                'UserStorySearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-th"></i> 故事地图',
            'url' => [
                '/project/sprint',
                'project_id' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-object-align-top"></i> 活动骨架',
            'url' => [
                '/project/epic-feature',
                'UserStoryMappingActivitySearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-registration-mark"></i> 发布计划',
            'url' => [
                '/project/release',
                'ReleaseSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-fire"></i> 头脑风暴',
            'url' => [
                '/project/brain-storm',
                'BrainStormSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-sunglasses"></i> 虚拟用户',
            'url' => [
                '/project/virtual-user',
                'VirtualUserSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> 团队',
            'url' => [
                'team',
                'TeamSearch[project_id]' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-folder-open"></i> 归档',
            'url' => [
                'archived',
                'project_id' => $project->id
            ]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-trash"></i> 回收站',
            'url' => [
                'trash',
                'project_id' => $project->id
            ]
        ]
    ]
]);