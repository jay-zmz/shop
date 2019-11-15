<?php

namespace App\Console\Commands\Elasticsearch;

use Illuminate\Console\Command;
use App\Goods;
class SyncGoods extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:sync-goods {--index=products}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将商品数据同步到 Elasticsearch';

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
        $es = app('es');
        Goods::query()
            ->with(['product','category','brand','type'])
            ->chunkById(100,function ($goods) use($es){
                $this->info(sprintf('正在同步 ID 范围为 %s 至 %s 的商品', $goods->first()->id, $goods->last()->id));
                //初始化请求他
                $req = ['body'=>[]];
                foreach ($goods as $good){
                    $good = $good->toEsArray();

                    $req['body'][] = [
                        'index'=>[
                            '_index'=>$this->option('index'),
                            '_type'=>'doc',
                            '_id'=>$good['id'],
                        ]
                    ];
                    $req['body'][] = $good;
                }
                try{
                    $es->bulk($req);
                }catch (\Exception $e){
                    $this->error($e->getMessage());
                }
            });
        $this->info('同步完成');
    }
}
