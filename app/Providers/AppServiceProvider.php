<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteInfo;
use App\Models\Database;
use App\Models\Footer;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Faculty;
use App\Models\SideInfoModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $websiteInfo = WebsiteInfo::first() ?? new WebsiteInfo;
        View::share('websiteInfo', $websiteInfo);

        $menu_databases = Database::where('status', 1)->orderBy('order_index', 'ASC')->get() ?? new Database;
        View::share('menu_databases', $menu_databases);

        $menu_database_default = new Database;
        $menu_database_default['name'] = 'All';
        $menu_database_default['name_kh'] = 'ទាំងអស់';
        $menu_database_default['slug'] = 'one_search';
        View::share('menu_database_default', $menu_database_default);

        $footer = Footer::first() ?? new Footer;
        View::share('footer', $footer);

        $links = Link::orderBy('order_index', 'ASC')->get() ?? new Link;
        View::share('links', $links);

        $top_menus = Menu::where('position', 'top')->orderBy('order_index', 'ASC')->get() ?? new Menu;
        View::share('top_menus', $top_menus);
        $bottom_menus = Menu::where('position', 'bottom')->orderBy('order_index', 'ASC')->get() ?? new Menu;
        View::share('bottom_menus', $bottom_menus);
        $faculties = Faculty::orderBy('order_index', 'ASC')->get() ?? new Menu;
        View::share('faculties', $faculties);
        $sideinfo = SideInfoModel::first() ?? new Menu;
        View::share('sideinfo', $sideinfo);
    }
}
