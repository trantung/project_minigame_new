<script type="text/javascript" src="http://minigame.de/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(function () {
        getBxh();
    });
    function getBxh()
    {
        var url = 'http://minigame.de';
        var link = window.location.href;
        var segments = link.split( '/' );
        //get game name to check id game
        var link_url = segments[4];
        $.ajax(
        {
            type:'post',
            url: url + '/import-bxh',
            data: {
                'currentUrl': window.location.href,
                'link_url': link_url
            },
            success: function(data) {
                $('body').append(data);
            },
        });
    }
</script>