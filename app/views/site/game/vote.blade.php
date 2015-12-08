<div id="rating" class="rating">
    <div class="rate-ex2-cnt stars">
        <div id="1" class="rate-btn-1 rate-btn"></div>
        <div id="2" class="rate-btn-2 rate-btn"></div>
        <div id="3" class="rate-btn-3 rate-btn"></div>
        <div id="4" class="rate-btn-4 rate-btn"></div>
        <div id="5" class="rate-btn-5 rate-btn"></div>
    </div>
</div>
<script>
    // rating script
    $(function(){
        $('.rate-btn').hover(function() {
            $('.rate-btn').removeClass('rate-btn-hover');
            var therate = $(this).attr('id');
            for (var i = therate; i >= 0; i--) {
                $('.rate-btn-'+i).addClass('rate-btn-hover');
            };
        });

        $('.rate-btn').click(function() {
            var therate = $(this).attr('id');
            var dataRate = 'id=<?php echo $id; ?>&rate='+therate; //
            $('.rate-btn').removeClass('rate-btn-active');
            for (var i = therate; i >= 0; i--) {
                $('.rate-btn-'+i).addClass('rate-btn-active');
            };
            $.ajax({
                type : "POST",
                url : "{{ route('vote-game') }}",
                data: dataRate,
                success:function(data){
                    // window.location.reload();
                }
            });

        });
    });

</script>
