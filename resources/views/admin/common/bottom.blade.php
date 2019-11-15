<script src="{{URL::asset('/static/admin/style/jquery_002.js')}}"></script>
<script src="{{URL::asset('/static/admin/style/bootstrap.js')}}"></script>
<script src="{{URL::asset('/static/admin/style/jquery.js')}}"></script>
<script src="{{URL::asset('/static/admin/style/beyond.js')}}"></script>

<script>
    $(document).on('click', '.read-notification',function () {
       $.markAllRead();
    });
    $.markAllRead = function (e) {
        $.ajax({
            type: 'POST',
            url: '{{url("/admin/admin-update-notication")}}',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            dataType: 'JSON',
            success: function (res) {
                if(res.status == "1"){
                    $(".notification-span").text("0");
                    $(".inner-notification-span").html("You have <strong>0</strong> new notifications.");                
                }
            },
        });
    };    
</script>