</body>
<script>
    var pageX = $(document).width();
    var pageY = $(document).height();
    var mouseY = 0;
    var mouseX = 0;
    $(document).mousemove(function(event) {
        mouseY = event.pageY;
        yAxis = (pageY / 2 - mouseY) / pageY * 300;
        mouseX = event.pageX / -pageX;
        xAxis = -mouseX * 100 - 100;
        $('.box__ghost-eyes').css({
            'transform': 'translate(' + xAxis + '%,-' + yAxis + '%)'
        });
    });
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });
    document.onkeydown = function (e) {
        if(e.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
    }
</script>

</html>