<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlentities($title) ?></title>
    <!-- Favicons -->
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.png" rel="icon">
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.png" rel="apple-touch-icon">
    <link rel="stylesheet"
        href="<?= base_url('assets')?>/css/pages_404.css">
</head>

<body>
    <div class="box">
        <img src="<?= base_url('assets'); ?>/img/mybranch-white.png" alt="err-img" width="100" height="50">
        <div class="box__ghost">
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>

            <div class="box__ghost-container">
                <div class="box__ghost-eyes">
                    <div class="box__eye-left"></div>
                    <div class="box__eye-right"></div>
                </div>
                <div class="box__ghost-bottom">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="box__ghost-shadow"></div>
        </div>

        <div class="box__description">
            <div class="box__description-container">
                <div class="box__description-title">Whoops!</div>
                <div class="box__description-text">Sorry, it seems like we couldn't find the page you were looking for
                </div>
            </div>

            <a href="<?= base_url('dashboard') ?>"
                class="box__button">Go back</a>

        </div>

    </div>
</body>
<script>
    var pageX = $(document).width();
    var pageY = $(document).height();
    var mouseY = 0;
    var mouseX = 0;

    $(document).mousemove(function(event) {
        //verticalAxis
        mouseY = event.pageY;
        yAxis = (pageY / 2 - mouseY) / pageY * 300;
        //horizontalAxis
        mouseX = event.pageX / -pageX;
        xAxis = -mouseX * 100 - 100;
        $('.box__ghost-eyes').css({
            'transform': 'translate(' + xAxis + '%,-' + yAxis + '%)'
        });
        // console.log('X: ' + xAxis);
    });
</script>

</html>