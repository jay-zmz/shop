@php
$arrSettingData = App\Helpers\Helper::getAdminDetail();
@endphp
<footer class="main-footer">
    <!--
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    -->
    <strong>{{ @$arrSettingData['copyright_content'] }}</strong>
</footer>