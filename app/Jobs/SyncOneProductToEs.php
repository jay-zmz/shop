<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;
class SyncOneProductToEs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $goods ;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Goods $goods)
    {
        //
        $this->goods = $goods;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->goods->toEsArray();
        app('es')->index([
            'index'=>'products_0',
            'type'=>'doc',
            'id'=>$data['id'],
            'body'=>$data
        ]);
    }
}
