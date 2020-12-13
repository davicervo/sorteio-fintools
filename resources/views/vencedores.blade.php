<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <style>

        .page {
            background: url('https://new.oliveiratrust.com.br/wp-content/themes/OliveiraTrust_WP/assets/img/fundo-marca-dagua-ot.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: auto 100%;
            height: 100vh;
            background-color: #fafafa;
        }

        .item-func {
            margin: 10px;
            width: 160px;
            text-align: center;
        }

        .select-card {
            /*border: #D40000 solid 2px;*/
            transform: scale(1.1);
        }

        .select-card .card {
            background: #D40000;
            color: white;
        }

        .row-effect {
            filter: blur(8px);
            -webkit-filter: blur(8px);
        }

        .pyro > .after, .pyro > .before {
            position: absolute;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            box-shadow: -120px -218.66667px #00f, 248px -16.66667px #00ff84, 190px 16.33333px #002bff, -113px -308.66667px #ff009d, -109px -287.66667px #ffb300, -50px -313.66667px #ff006e, 226px -31.66667px #ff4000, 180px -351.66667px #ff00d0, -12px -338.66667px #00f6ff, 220px -388.66667px #9f0, -69px -27.66667px #ff0400, -111px -339.66667px #6200ff, 155px -237.66667px #0df, -152px -380.66667px #00ffd0, -50px -37.66667px #0fd, -95px -175.66667px #a6ff00, -88px 10.33333px #0d00ff, 112px -309.66667px #005eff, 69px -415.66667px #ff00a6, 168px -100.66667px #ff004c, -244px 24.33333px #f60, 97px -325.66667px #f06, -211px -182.66667px #00ffa2, 236px -126.66667px #b700ff, 140px -196.66667px #9000ff, 125px -175.66667px #0bf, 118px -381.66667px #ff002f, 144px -111.66667px #ffae00, 36px -78.66667px #f600ff, -63px -196.66667px #c800ff, -218px -227.66667px #d4ff00, -134px -377.66667px #ea00ff, -36px -412.66667px #ff00d4, 209px -106.66667px #00fff2, 91px -278.66667px #000dff, -22px -191.66667px #9dff00, 139px -392.66667px #a6ff00, 56px -2.66667px #09f, -156px -276.66667px #ea00ff, -163px -233.66667px #00fffb, -238px -346.66667px #00ff73, 62px -363.66667px #08f, 244px -170.66667px #0062ff, 224px -142.66667px #b300ff, 141px -208.66667px #9000ff, 211px -285.66667px #f60, 181px -128.66667px #1e00ff, 90px -123.66667px #c800ff, 189px 70.33333px #00ffc8, -18px -383.66667px #0f3, 100px -6.66667px #ff008c;
            -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            z-index: 9999
        }

        .pyro > .after {
            -moz-animation-delay: 1.25s, 1.25s, 1.25s;
            -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
            -o-animation-delay: 1.25s, 1.25s, 1.25s;
            -ms-animation-delay: 1.25s, 1.25s, 1.25s;
            animation-delay: 1.25s, 1.25s, 1.25s;
            -moz-animation-duration: 1.25s, 1.25s, 6.25s;
            -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
            -o-animation-duration: 1.25s, 1.25s, 6.25s;
            -ms-animation-duration: 1.25s, 1.25s, 6.25s;
            animation-duration: 1.25s, 1.25s, 6.25s;
            z-index: 9999
        }

        @-webkit-keyframes bang {
            from {
                box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff
            }
        }

        @-moz-keyframes bang {
            from {
                box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff
            }
        }

        @-o-keyframes bang {
            from {
                box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff
            }
        }

        @-ms-keyframes bang {
            from {
                box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff
            }
        }

        @keyframes bang {
            from {
                box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff
            }
        }

        @-webkit-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0
            }
        }

        @-moz-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0
            }
        }

        @-o-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0
            }
        }

        @-ms-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0
            }
        }

        @keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0
            }
        }

        @-webkit-keyframes position {
            0%, 19.9% {
                margin-top: 10%;
                margin-left: 40%
            }
            20%, 39.9% {
                margin-top: 40%;
                margin-left: 30%
            }
            40%, 59.9% {
                margin-top: 20%;
                margin-left: 70%
            }
            60%, 79.9% {
                margin-top: 30%;
                margin-left: 20%
            }
            80%, 99.9% {
                margin-top: 30%;
                margin-left: 80%
            }
        }

        @-moz-keyframes position {
            0%, 19.9% {
                margin-top: 10%;
                margin-left: 40%
            }
            20%, 39.9% {
                margin-top: 40%;
                margin-left: 30%
            }
            40%, 59.9% {
                margin-top: 20%;
                margin-left: 70%
            }
            60%, 79.9% {
                margin-top: 30%;
                margin-left: 20%
            }
            80%, 99.9% {
                margin-top: 30%;
                margin-left: 80%
            }
        }

        @-o-keyframes position {
            0%, 19.9% {
                margin-top: 10%;
                margin-left: 40%
            }
            20%, 39.9% {
                margin-top: 40%;
                margin-left: 30%
            }
            40%, 59.9% {
                margin-top: 20%;
                margin-left: 70%
            }
            60%, 79.9% {
                margin-top: 30%;
                margin-left: 20%
            }
            80%, 99.9% {
                margin-top: 30%;
                margin-left: 80%
            }
        }

        @-ms-keyframes position {
            0%, 19.9% {
                margin-top: 10%;
                margin-left: 40%
            }
            20%, 39.9% {
                margin-top: 40%;
                margin-left: 30%
            }
            40%, 59.9% {
                margin-top: 20%;
                margin-left: 70%
            }
            60%, 79.9% {
                margin-top: 30%;
                margin-left: 20%
            }
            80%, 99.9% {
                margin-top: 30%;
                margin-left: 80%
            }
        }

        @keyframes position {
            0%, 19.9% {
                margin-top: 10%;
                margin-left: 40%
            }
            20%, 39.9% {
                margin-top: 40%;
                margin-left: 30%
            }
            40%, 59.9% {
                margin-top: 20%;
                margin-left: 70%
            }
            60%, 79.9% {
                margin-top: 30%;
                margin-left: 20%
            }
            80%, 99.9% {
                margin-top: 30%;
                margin-left: 80%
            }
        }
        th,tr,thead,table{
            border:none;
            border-collapse: collapse;
        }

        table th,table td{
            border-top: 1px solid #ff7b81 !important;
            vertical-align: middle !important;
        }
        th{
            border-top: none !important;
            border-bottom: none !important;
        }
        thead{
            background: linear-gradient(to right, #cd3737 , #ff8282);
            color: white;
        }
        td img{
            width:50px;
            height:50px;
        }



    </style>


</head>

<body>
{{--<canvas id="confeti" class="active page" width="100%" height="100%" style="position:absolute;"></canvas>--}}

<div id="app">
    <div class="container-fluid ">
        <div class="row no-gutters d-flex justify-content-center" style="height:100%;width:100%;position: relative;z-index: 10;" ref="gridCards">
            <div class="col-12">
                <h2 class="card-title mt-5" style="color:white;text-align: center;font-family: monospace;font-size: 2.5rem;font-weight: 500; width: fit-content;margin: auto;background-color: #e60000;padding: 15px 20px;border-radius: 100px;box-shadow: 5px 5px 5px -2px #acacac;">{{$sorteio->titulo . ' - '}}Vencedores</h2>
            </div>
            <table class="table"style="margin: 50px 10% 10% 10%;width: 50%;background: linear-gradient(to right, #ff7171 , #ffd6d6);border-radius: 12px;text-align:center;">
                <thead>
                <tr>
                    <th width="20%" scope="col">Foto</th>
                    <th width="60%" scope="col">Nome</th>
                    <th width="20%" scope="col">Prêmio</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td><img src="{{$item['funcionario']['foto']}}" alt="{{$item['funcionario']['nome']}}"  style="border-radius: 50%;object-fit: cover;" width="70" height="70"></td>
                        <td>{{$item['funcionario']['nome']}}</td>
                        <td>{{$item['nome']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A=="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue@2.6.12/dist/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
<script>
    class Progress {
        constructor(param = {}) {
            this.timestamp        = null;
            this.duration         = param.duration || Progress.CONST.DURATION;
            this.progress         = 0;
            this.delta            = 0;
            this.progress         = 0;
            this.isLoop           = !!param.isLoop;

            this.reset();
        }

        static get CONST() {
            return {
                DURATION : 1000
            };
        }

        reset() {
            this.timestamp = null;
        }

        start(now) {
            this.timestamp = now;
        }

        tick(now) {
            if (this.timestamp) {
                this.delta    = now - this.timestamp;
                this.progress = Math.min(this.delta / this.duration, 1);

                if (this.progress >= 1 && this.isLoop) {
                    this.start(now);
                }

                return this.progress;
            } else {
                return 0;
            }
        }
    }

    class Confetti {
        constructor(param) {
            this.parent         = param.elm || document.body;
            this.canvas         = document.createElement("canvas");
            this.ctx            = this.canvas.getContext("2d");
            this.width          = param.width  || this.parent.offsetWidth;
            this.height         = param.height || this.window.innerHeight;
            this.length         = param.length || Confetti.CONST.PAPER_LENGTH;
            this.yRange         = param.yRange || this.height * 2;
            this.progress       = new Progress({
                duration : param.duration,
                isLoop   : true
            });
            this.rotationRange  = typeof param.rotationLength === "number" ? param.rotationRange
                : 10;
            this.speedRange     = typeof param.speedRange     === "number" ? param.speedRange
                : 10;
            this.sprites        = [];

            this.canvas.style.cssText = [
                "display: block",
                "position: absolute",
                "top: 0",
                "left: 0",
                "pointer-events: none"
            ].join(";");
            this.render = this.render.bind(this);

            this.build();

            this.parent.appendChild(this.canvas);
            this.progress.start(performance.now());

            requestAnimationFrame(this.render);
        }

        static get CONST() {
            return {
                SPRITE_WIDTH  : 9,
                SPRITE_HEIGHT : 16,
                PAPER_LENGTH  : 120,
                DURATION      : 10000,
                ROTATION_RATE : 50,
                COLORS        : [
                    "#EF5350",
                    "#EC407A",
                    "#AB47BC",
                    "#7E57C2",
                    "#5C6BC0",
                    "#42A5F5",
                    "#29B6F6",
                    "#26C6DA",
                    "#26A69A",
                    "#66BB6A",
                    "#9CCC65",
                    "#D4E157",
                    "#FFEE58",
                    "#FFCA28",
                    "#FFA726",
                    "#FF7043",
                    "#8D6E63",
                    "#BDBDBD",
                    "#78909C"
                ]
            };
        }

        build() {
            for (let i = 0; i < this.length; ++i) {
                let canvas = document.createElement("canvas"),
                    ctx    = canvas.getContext("2d");

                canvas.width  = Confetti.CONST.SPRITE_WIDTH;
                canvas.height = Confetti.CONST.SPRITE_HEIGHT;

                canvas.position = {
                    initX : Math.random() * this.width,
                    initY : -canvas.height - Math.random() * this.yRange
                };

                canvas.rotation = (this.rotationRange / 2) - Math.random() * this.rotationRange;
                canvas.speed    = (this.speedRange / 2) + Math.random() * (this.speedRange / 2);

                ctx.save();
                ctx.fillStyle = Confetti.CONST.COLORS[(Math.random() * Confetti.CONST.COLORS.length) | 0];
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.restore();

                this.sprites.push(canvas);
            }
        }

        render(now) {
            let progress = this.progress.tick(now);

            this.canvas.width  = this.width;
            this.canvas.height = this.height;

            for (let i = 0; i < this.length; ++i) {
                this.ctx.save();
                this.ctx.translate(
                    this.sprites[i].position.initX + this.sprites[i].rotation * Confetti.CONST.ROTATION_RATE * progress,
                    this.sprites[i].position.initY + progress * (this.height + this.yRange)
                );
                this.ctx.rotate(this.sprites[i].rotation);
                this.ctx.drawImage(
                    this.sprites[i],
                    -Confetti.CONST.SPRITE_WIDTH * Math.abs(Math.sin(progress * Math.PI * 2 * this.sprites[i].speed)) / 2,
                    -Confetti.CONST.SPRITE_HEIGHT / 2,
                    Confetti.CONST.SPRITE_WIDTH * Math.abs(Math.sin(progress * Math.PI * 2 * this.sprites[i].speed)),
                    Confetti.CONST.SPRITE_HEIGHT
                );
                this.ctx.restore();
            }

            requestAnimationFrame(this.render);
        }
    }

    (() => {
        const DURATION = 8000,
            LENGTH   = 200;

        new Confetti({
            width    : window.innerWidth,
            height   : window.innerHeight,
            length   : LENGTH,
            duration : DURATION
        });

        setTimeout(() => {
            new Confetti({
                width    : window.innerWidth,
                height   : window.innerHeight,
                length   : LENGTH,
                duration : DURATION
            });
        }, DURATION / 2);
    })();

    let telah =  $(document).height();
    let telaw = $(document).width();
    $("canvas").height(telah);
    $("canvas").width(telaw);
    $("canvas").addClass("page");

</script>
{{--<script>var COLORS, Confetti, NUM_CONFETTI, PI_2, canvas, confetti, context, drawCircle, drawCircle2, drawCircle3, i, range, xpos;--}}
{{--    NUM_CONFETTI = 40;--}}
{{--    COLORS = [--}}
{{--        [235, 90, 70],--}}
{{--        [97, 189, 79],--}}
{{--        [242, 214, 0],--}}
{{--        [0, 121, 191],--}}
{{--        [195, 119, 224]--}}
{{--    ];--}}
{{--    PI_2 = 2 * Math.PI;--}}
{{--    canvas = document.getElementById("confeti");--}}
{{--    context = canvas.getContext("2d");--}}
{{--    window.w = 0;--}}
{{--    window.h = 0;--}}
{{--    window.resizeWindow = function() {--}}
{{--        window.w = canvas.width = window.innerWidth;--}}
{{--        return window.h = canvas.height = window.innerHeight;--}}
{{--    };--}}
{{--    window.addEventListener("resize", resizeWindow, !1);--}}
{{--    window.onload = function() {--}}
{{--        return setTimeout(resizeWindow, 0);--}}
{{--    };--}}
{{--    range = function(a, b) {--}}
{{--        return (b - a) * Math.random() + a;--}}
{{--    };--}}
{{--    drawCircle = function(a, b, c, d) {--}}
{{--        context.beginPath();--}}
{{--        context.moveTo(a, b);--}}
{{--        context.bezierCurveTo(a - 17, b + 14, a + 13, b + 5, a - 5, b + 22);--}}
{{--        context.lineWidth = 2;--}}
{{--        context.strokeStyle = d;--}}
{{--        return context.stroke();--}}
{{--    };--}}
{{--    drawCircle2 = function(a, b, c, d) {--}}
{{--        context.beginPath();--}}
{{--        context.moveTo(a, b);--}}
{{--        context.lineTo(a + 6, b + 9);--}}
{{--        context.lineTo(a + 12, b);--}}
{{--        context.lineTo(a + 6, b - 9);--}}
{{--        context.closePath();--}}
{{--        context.fillStyle = d;--}}
{{--        return context.fill();--}}
{{--    };--}}
{{--    drawCircle3 = function(a, b, c, d) {--}}
{{--        context.beginPath();--}}
{{--        context.moveTo(a, b);--}}
{{--        context.lineTo(a + 5, b + 5);--}}
{{--        context.lineTo(a + 10, b);--}}
{{--        context.lineTo(a + 5, b - 5);--}}
{{--        context.closePath();--}}
{{--        context.fillStyle = d;--}}
{{--        return context.fill();--}}
{{--    };--}}
{{--    xpos = 0.9;--}}
{{--    document.onmousemove = function(a) {--}}
{{--        return xpos = a.pageX / w;--}}
{{--    };--}}
{{--    window.requestAnimationFrame = function() {--}}
{{--        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(a) {--}}
{{--            return window.setTimeout(a, 5);--}}
{{--        };--}}
{{--    }();--}}
{{--    Confetti = function() {--}}
{{--        function a() {--}}
{{--            this.style = COLORS[~~range(0, 5)];--}}
{{--            this.rgb = "rgba(" + this.style[0] + "," + this.style[1] + "," + this.style[2];--}}
{{--            this.r = ~~range(2, 6);--}}
{{--            this.r2 = 2 * this.r;--}}
{{--            this.replace();--}}
{{--        }--}}
{{--        a.prototype.replace = function() {--}}
{{--            this.opacity = 0;--}}
{{--            this.dop = 0.03 * range(1, 4);--}}
{{--            this.x = range(-this.r2, w - this.r2);--}}
{{--            this.y = range(-20, h - this.r2);--}}
{{--            this.xmax = w - this.r;--}}
{{--            this.ymax = h - this.r;--}}
{{--            this.vx = range(0, 2) + 8 * xpos - 5;--}}
{{--            return this.vy = 0.7 * this.r + range(-1, 1);--}}
{{--        };--}}
{{--        a.prototype.draw = function() {--}}
{{--            var a;--}}
{{--            this.x += this.vx;--}}
{{--            this.y += this.vy;--}}
{{--            this.opacity +=--}}
{{--                this.dop;--}}
{{--            1 < this.opacity && (this.opacity = 1, this.dop *= -1);--}}
{{--            (0 > this.opacity || this.y > this.ymax) && this.replace();--}}
{{--            if (!(0 < (a = this.x) && a < this.xmax)) this.x = (this.x + this.xmax) % this.xmax;--}}
{{--            drawCircle(~~this.x, ~~this.y, this.r, this.rgb + "," + this.opacity + ")");--}}
{{--            drawCircle3(0.5 * ~~this.x, ~~this.y, this.r, this.rgb + "," + this.opacity + ")");--}}
{{--            return drawCircle2(1.5 * ~~this.x, 1.5 * ~~this.y, this.r, this.rgb + "," + this.opacity + ")");--}}
{{--        };--}}
{{--        return a;--}}
{{--    }();--}}
{{--    confetti = function() {--}}
{{--        var a, b, c;--}}
{{--        c = [];--}}
{{--        i = a = 1;--}}
{{--        for (b = NUM_CONFETTI; 1 <= b ? a <= b : a >= b; i = 1 <= b ? ++a : --a) c.push(new Confetti);--}}
{{--        return c;--}}
{{--    }();--}}
{{--    window.step = function() {--}}
{{--        var a, b, c, d;--}}
{{--        requestAnimationFrame(step);--}}
{{--        context.clearRect(0, 0, w, h);--}}
{{--        d = [];--}}
{{--        b = 0;--}}
{{--        for (c = confetti.length; b < c; b++) a = confetti[b], d.push(a.draw());--}}
{{--        return d;--}}
{{--    };--}}
{{--    step();--}}
{{--    let telah =  $(document).height();--}}
{{--    let telaw = $(document).width();--}}
{{--    $("canvas").height(telah);--}}
{{--    $("canvas").width(telaw);--}}
{{--</script>--}}
</body>

</html>
