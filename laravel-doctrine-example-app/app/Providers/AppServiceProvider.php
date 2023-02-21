<?php

namespace App\Providers;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use App\Infrastructures\Persistence\Member\MemberRepositoryDb;
use Illuminate\Support\ServiceProvider;
use LaravelDoctrine\ORM\Facades\EntityManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MemberRepository::class, function ($app) {
            // return EntityManager::getRepository(Member::class);
            return new MemberRepositoryDb(app('em'), app('em')->getClassMetaData(Member::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
