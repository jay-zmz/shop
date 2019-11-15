<?php


namespace App\Console\Commands\Elasticsearch\Indices;


class ProjectIndex
{
    public static function getAliasName()
    {
        return 'products';
    }
    public static function getSettings()
    {

        return [
            'analysis'=>[
                'analyzer'=>[
                    'ik_smart_synonym' => [
                        'type'      => 'custom',
                        'tokenizer' => 'ik_smart',
                        'filter'    => ['synonym_filter'],
                    ],
                ],
                'filter'   => [
                    'synonym_filter' => [
                        'type'          => 'synonym',
                        'synonyms_path' => 'analysis/synonyms.txt',
                    ],
                ],
            ],
        ];
    }
    public static function getProperties()
    {
        return [
            'goods_name'=>['type'=>'text'],
            'category'      => ['type' => 'keyword'],
            'on_sale'=>['type'=>'integer'],
            'market_price'=>['type' => 'scaled_float', 'scaling_factor' => 100],
            'shop_price'=>['type' => 'scaled_float', 'scaling_factor' => 100],
            'description'=>['type'=>'text','analyzer' => 'ik_smart', 'search_analyzer' => 'ik_smart_synonym'],
            'goods_code'=>['type'=>'text','analyzer' => 'ik_smart', 'search_analyzer' => 'ik_smart_synonym'],
            'skus'=>[
                'type'       => 'nested',
                'properties'=>[
                    'goods_number'       => ['type'=>'integer'],
                    'sku_price'=>['type' => 'scaled_float', 'scaling_factor' => 100],
                ]
            ],
            'properties'    => [
                'type'       => 'nested',
                'properties' => [
                    'attr_name'         => ['type' => 'keyword'],
                    'attr_value'        => ['type' => 'keyword', 'copy_to' => 'properties_value'],
                ],
            ],
        ];
    }
}
