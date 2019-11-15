<?php

namespace App\Jobs;

use App\Goods;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
class UpdateProductToEs implements ShouldQueue
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
        //
        $data = $this->goods->toEsArray();
        Log::info(json_encode($data));
        app('es')->update([
            'index'=>'products_0',
            'type'=>'doc',
            'id'=>$data['id'],
            'body'=>[
                'doc'=>$data
            ]
        ]);
    }
}
