<?php

namespace App\Http\Middleware;

use Closure;


class MenuMiddleware
{
    protected $user = null;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->user = \Auth::user();

        $this->user && $this->create();

        return $next($request);
    }

    public function create()
    {
        \Menu::create('myHome-menu', function ($menu) {
            $menu->enableOrdering();
            $menu->setPresenter('Pingpong\Admin\Presenters\SidebarMenuPresenter');
            $menu->route('myHome', trans('admin.menus.dashboard'), [], 0, ['icon' => 'fa fa-home']);

            //添加员工管理
            $this->addUserMenu($menu);
            //导出数据库
            $this->addDownloadMenu($menu);
            //打卡记录菜单
            $this->addCommuteMenu($menu);
            //学车记录菜单
            $this->addCartRecordMenu($menu);
            //工资管理菜单
            $this->addWageMenu($menu);
            //卡管理
            $this->addCardMenu($menu);

            //回顾过往
            $this->addBackwardMenu($menu);

            //备忘录
            $this->addMemoMenu($menu);

            //健身记录
            $this->addExerciseMenu($menu);

            //红包管理
            $this->addBonusMenu($menu);

            //关于本系统
            $this->addAboutMenu($menu);
        });
    }

    /**
     * 员工菜单
     *
     * @param $menu
     */
    private function addUserMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('admin.menus.users.title'), function ($sub) {
                    $sub->route('admin.users.index', trans('admin.menus.users.all'), [], 1, ['icon' => 'fa fa-user']);
                    $sub->route('admin.users.create', trans('admin.menus.users.create'), [], 2, ['icon' => 'fa fa-plus-circle']);
                    $sub->divider(3);
                    $sub->route('admin.roles.index', trans('admin.menus.roles'), [], 4, ['icon' => 'fa fa-cog']);
                    $sub->route('admin.permissions.index', trans('admin.menus.permissions'), [], 5, ['icon' => 'fa fa-lock']);
                    $sub->route('admin.users.pwd', trans('admin.menus.users.pwd'), [], 6, ['icon' => 'fa fa-key']);
                }, 2, ['icon' => 'fa fa-users']);
            }
        } catch(\Exception $e) {

        }
    }


    /**
     * 考勤管理
     * @param $menu
     */
    private function addCommuteMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.commute.title'), function ($sub) {
                    $sub->route('commute.index', trans('menus.commute.all'), [], 1);
                    $sub->route('commute.create', trans('menus.commute.create'), [], 2);
                    $sub->route('commute.subscribe', trans('menus.commute.subscribe'), [], 3);
                }, 3, ['icon' => 'fa fa-history']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 学车管理
     * @param $menu
     */
    private function addCartRecordMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.cart.title'), function ($sub) {
                    $sub->route('cart.record', trans('menus.cart.all'), [], 1);
                    $sub->route('cart.create', trans('menus.cart.create'), [], 2);
                }, 4, ['icon' => 'fa fa-car']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 转账管理
     * @param $menu
     */
    private function addWageMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.wage.title'), function ($sub) {
                    $sub->route('wage.index', trans('menus.wage.list'), [], 1);
                    $sub->route('wage.create', trans('menus.wage.add'), [], 2);
                }, 5, ['icon' => 'fa fa-sign-in']);
            }
        } catch(\Exception $e) {

        }
    }


    /**
     * 卡管理
     * @param $menu
     */
    private function addCardMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.card.title'), function ($sub) {
                    $sub->route('card.list', trans('menus.card.list'), [], 1);
                }, 6, ['icon' => 'fa fa-credit-card']);
            }
        } catch(\Exception $e) {

        }
    }

    private function addExerciseMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.exercise.title'), function ($sub) {
                    $sub->route('exercise.index', trans('menus.exercise.index'), [], 1);
                    $sub->route('exercise.create', trans('menus.exercise.create'), [], 3);
                }, 7, ['icon' => 'fa fa-heart']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 红包管理
     * @index
     * @param $menu
     */
    private function addBonusMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.bonus.title'), function ($sub) {
                    $sub->route('bonus.index', trans('menus.bonus.index'), [], 1);
                    $sub->route('bonus.create', trans('menus.bonus.create'), [], 2);
                    $sub->route('bonus.fetch', trans('menus.bonus.fetch'), [], 3);
                }, 8, ['icon' => 'fa fa-money']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 数据库管理：备份，下载，导出
     * @index 996
     * @param $menu
     */
    private function addDownloadMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.download.title'), function ($sub) {
                    $sub->route('download.db', trans('menus.download.export'), [], 1, ['icon' => 'fa fa-download']);
                    $sub->route('download.history', trans('menus.download.history'), [], 2);
                    $sub->divider(3);
//                    $sub->route('download.keyDetail', trans('menus.download.keys'), [], 4);
                    $sub->route('logs', trans('menus.download.logs'), [], 5);
                    $sub->route('code.desc', trans('menus.download.desc'), [], 6);
                }, 996, ['icon' => 'fa fa-database']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 备忘录
     * @index 997
     * @param $menu
     */
    private function addMemoMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->dropdown(trans('menus.memo.title'), function ($sub) {
                    $sub->route('memo.index', trans('menus.memo.study'), [], 1);
                    $sub->route('memo.secret', trans('menus.memo.secret'), [], 2);
                    $sub->route('memo.create', trans('menus.memo.create'), [], 3);
                }, 997, ['icon' => 'fa fa-pencil']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 回顾过往
     * @index 998
     * @param $menu
     */
    private function addBackwardMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->route('backward.index', trans('menus.backward.title'), [], 998, ['icon' => 'fa fa-calendar']);
            }
        } catch(\Exception $e) {

        }
    }

    /**
     * 关于本系统
     * @index 999
     * @param $menu
     */
    private function addAboutMenu($menu)
    {
        try {
            if ($this->user) {
                $menu->route('about.index', trans('menus.about.title'), [], 999, ['icon' => 'fa fa-info']);
            }
        } catch(\Exception $e) {

        }
    }
}
