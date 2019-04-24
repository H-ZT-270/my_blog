<?php

use yii\helpers\Url;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->avatar ?>" class="img-circle" alt="User Image" onerror="this.src='/backend/web/images/default-avatar.png'" />
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->nickname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form" style="display: none">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '菜单', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

        <ul class="sidebar-menu tree" data-widget="tree">            
            <li class="treeview">               
                <a href="#">                    
                    <i class="fa fa-gears"></i> <span>权限控制</span>                    
                    <i class="fa fa-angle-left pull-right"></i>               
                </a>               
                <ul class="treeview-menu">                   
                    <li class="treeview">    
                        <li><a href="<?= Url::toroute('admin-user/list')?>"><i class="fa fa-circle-o"></i> 后台用户</a></li> 
                    </li>
                    <li class="treeview">                                
                        <a href="<?= Url::toroute('admin/role')?>">                                    
                            <i class="fa fa-circle-o"></i> 权限 <i class="fa fa-angle-left pull-right"></i>
                        </a>                                
                        <ul class="treeview-menu">                                    
                            <li><a href="<?= Url::toroute('admin/route')?>"><i class="fa fa-circle-o"></i> 路由</a></li>                                    
                            <li><a href="<?= Url::toroute('admin/permission')?>"><i class="fa fa-circle-o"></i> 权限</a></li>                                    
                            <li><a href="<?= Url::toroute('admin/role')?>"><i class="fa fa-circle-o"></i> 角色</a></li>                                    
                            <li><a href="<?= Url::toroute('admin/assignment')?>"><i class="fa fa-circle-o"></i> 分配</a></li>                                    
                            <li><a href="<?= Url::toroute('admin/menu')?>"><i class="fa fa-circle-o"></i> 菜单</a></li>                                
                        </ul>                           
                    </li>                  
                </ul>            
            </li>        
        </ul>

    </section>

</aside>
