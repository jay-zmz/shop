<?php
$langArr    =   App\Helpers\Helper::getLanguages();
View::share(compact('langArr'));
?>
<ul class="nav nav-tabs">
    <?php
    if (isset($langArr) && count($langArr)) {
        
       
        $tabno = 1;
        if (old('lang_code')==Null) {
            $active='en';
        } else {
            $active=old('lang_code');
        }
        foreach ($langArr as $code => $lang) {
            ?>
            <li class="<?= ($code == $active) ? 'active' : '' ?>" id="{{$tabno.'_'.$code}}"><a href="#{{$code}}" data-toggle="tab">{{$lang}}</a></li>
            <?php
            $tabno++;
        }
    }
    ?>

</ul> 

 