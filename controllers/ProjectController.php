<?php
namespace app\controllers;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends BaseController
{

    public function actions()
    {
        return [
            'desktop' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Project'
                ]
            ],
            'index' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\ProjectSearch'
                ]
            ],
            'create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\Project'
                ]
            ],
            'update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\Project'
                ]
            ],
            'view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Project'
                ]
            ],
            'delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\Project'
                ]
            ],
            // >>>Product Backlog start
            'product-backlog' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\UserStorySearch',
                    'category' => 'ProductBacklog'
                ]
            ],
            'product-backlog-update' => [
                'class' => 'app\actions\BatchUpdateAction',
                'formName' => 'UserStory',
                'modelClass' => [
                    'class' => 'app\models\UserStory',
                    'category' => 'ProductBacklog'
                ]
            ],
            'product-backlog-break' => [
                'class' => 'app\actions\BatchCreateAction',
                'formName' => 'UserStory',
                'modelClass' => [
                    'class' => 'app\models\UserStory',
                    'category' => 'ProductBacklog'
                ]
            ],
            // <<< Product Backlog end
            // >>>新鲜故事开始
            'fresh-story' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\UserStorySearch',
                    'category' => 'NoPlan'
                ]
            ],
            'userstory-batch-create' => [
                'class' => 'app\actions\BatchCreateAction',
                'formName' => 'UserStory',
                'modelClass' => [
                    'class' => 'app\models\UserStory'
                ]
            ],
            'userstory-batch-update' => [
                'class' => 'app\actions\BatchUpdateAction',
                'formName' => 'UserStory',
                'modelClass' => [
                    'class' => 'app\models\UserStory'
                ]
            ],
            'userstory-batch-convert' => [
                'class' => 'app\actions\BatchUpdateSameAction',
                'modelClass' => [
                    'class' => 'app\models\UserStory'
                ]
            ],
            'userstory-batch-delete' => [
                'class' => 'app\actions\BatchDeleteAction',
                'modelClass' => [
                    'class' => 'app\models\UserStory'
                ]
            ],
            'story-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => 'app\models\Story'
            ],
            'story-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => 'app\models\Story'
            ],
            'story-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => 'app\models\Story'
            ],
            'story-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => 'app\models\Story'
            ],

            'bug-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\Bug'
                ]
            ],
            'bug-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Bug'
                ]
            ],
            'bug-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\Bug'
                ]
            ],
            'bug-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\Bug'
                ]
            ],

            'spike-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\Spike'
                ]
            ],
            'spike-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Spike'
                ]
            ],
            'spike-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\Spike'
                ]
            ],
            'spike-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\Spike'
                ]
            ],
            // <<<新鲜故事结束

            // >>>任务开始
            'task' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\TaskSearch'
                ]
            ],
            // <<<任务结束
            // >>>迭代开始
            'sprint' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\SprintSearch'
                ]
            ],
            'sprint-kanban' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Sprint'
                ]
            ],
            'sprint-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\Sprint'
                ]
            ],
            'sprint-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Sprint'
                ]
            ],
            'sprint-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\Sprint'
                ]
            ],
            'sprint-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\Sprint'
                ]
            ],
            // <<<迭代结束
            // >>>发布开始
            'release' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\ReleaseSearch'
                ]
            ],
            // <<<发布结束
            // >>>团队开始
            'team' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\TeamSearch'
                ]
            ],
            // <<<团队结束
            // >>>虚拟用户
            'virtual-user' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\VirtualUserSearch'
                ]
            ],
            'virtual-user-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\VirtualUser'
                ]
            ],
            'virtual-user-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\VirtualUser'
                ]
            ],
            'virtual-user-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\VirtualUser'
                ]
            ],
            'virtual-user-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\VirtualUser'
                ]
            ],
            // <<<虚拟用户
            // >>>活动骨架
            'epic-feature' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\UserStoryMappingActivitySearch'
                ]
            ],
            'epic-feature-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\UserStoryMappingActivity'
                ]
            ],
            'epic-feature-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\UserStoryMappingActivity'
                ]
            ],
            'epic-feature-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\UserStoryMappingActivity'
                ]
            ],
            'epic-feature-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\UserStoryMappingActivity'
                ]
            ],
            // <<<活动骨架
            // >>>头脑风暴
            'brain-storm' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStormSearch'
                ]
            ],
            'brain-storm-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm'
                ]
            ],
            'brain-storm-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm'
                ]
            ],
            'brain-storm-wall' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm'
                ]
            ],
            'brain-storm-update' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm'
                ]
            ],
            'brain-storm-close' => [
                'class' => 'app\actions\UpdateAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm',
                    'status' => 'close',
                    'scenario' => 'Close'
                ]
            ],
            'brain-storm-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\BrainStorm'
                ]
            ],
            'brain-idea' => [
                'class' => 'app\actions\ListAction',
                'modelClass' => [
                    'class' => 'app\models\IdeaSearch'
                ]
            ],
            'brain-idea-create' => [
                'class' => 'app\actions\CreateAction',
                'modelClass' => [
                    'class' => 'app\models\Idea'
                ]
            ],

            'brain-idea-fetch' => [
                'class' => 'app\actions\LongPollAction',
                'longPollingHandlerClass' => 'app\components\UserStoryWallLongPollHandler'
            ],
            'brain-idea-view' => [
                'class' => 'app\actions\ViewAction',
                'modelClass' => [
                    'class' => 'app\models\Idea'
                ]
            ],
            'brain-idea-delete' => [
                'class' => 'app\actions\DeleteAction',
                'modelClass' => [
                    'class' => 'app\models\Idea'
                ]
            ],
            'brain-idea-convert' => [
                'class' => 'app\actions\idea\ConvertAction'
            ]
            // <<<头脑风暴
        ];
    }
}
