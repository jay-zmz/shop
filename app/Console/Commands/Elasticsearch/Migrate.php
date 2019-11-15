<?php

namespace App\Console\Commands\Elasticsearch;

use Illuminate\Console\Command;
use App\Console\Commands\Elasticsearch\Indices\ProjectIndex;
class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:migrate';
    protected $es;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elasticsearch 索引结构迁移';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->es = app('es');
        $aliasName = ProjectIndex::getAliasName();
        $this->info('正在处理索引 '.$aliasName);
        $this->createIndex($aliasName);

    }

    public function createIndex($aliasName){
        $this->es->indices()->create([
           'index'=> $aliasName.'_0',
           'body'=>[
               // 调用索引类的 getSettings() 方法获取索引设置
               'settings'=>ProjectIndex::getSettings(),
               'mappings'=>[
                   'doc'=>[
                       'properties'=>ProjectIndex::getProperties()
                   ]
               ]
           ]
        ]);
    }
}
