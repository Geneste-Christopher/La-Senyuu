

<head>
    <?php include('./partials/head.php') ?>
    <meta http-equiv="refresh" content="8 ; url=../Accueil">
</head>

<canvas>

</canvas>

<style>
    * {
        margin: 0;
        padding: 0
    }

    body {
        background: #000;
    }

    canvas {
        display: block;
    }
</style>


<script>
    // Initialising the canvas
    var canvas = document.querySelector('canvas'),
        ctx = canvas.getContext('2d');

    // Setting the width and height of the canvas
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Setting up the letters
    var letters = '阿贝 色 德 饿艾弗日 阿 什 伊鸡 卡 艾艾马 艾 娜 哦佩苦 艾 和艾 丝特 玉维 独 布勒维 伊克 斯伊 格黑 克贼 德';
    letters = letters.split('');

    // Setting up the columns
    var fontSize = 10,
        columns = canvas.width / fontSize;

    // Setting up the drops
    var drops = [];
    for (var i = 0; i < columns; i++) {
        drops[i] = 1;
    }

    // Setting up the draw function
    function draw() {
        ctx.fillStyle = 'rgba(0, 0, 0, .1)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        for (var i = 0; i < drops.length; i++) {
            var text = letters[Math.floor(Math.random() * letters.length)];
            ctx.fillStyle = '#0f0';
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);
            drops[i]++;
            if (drops[i] * fontSize > canvas.height && Math.random() > .95) {
                drops[i] = 0;
            }
        }
    }

    // Loop the animation
    setInterval(draw, 33);
</script>