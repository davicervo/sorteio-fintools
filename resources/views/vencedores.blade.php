@extends('layouts.sorteio')

@section('content')
<canvas id="confeti" width="100%" height="100%" style="position:absolute;"></canvas>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12" style="z-index: 10;">
            <h2 class="card-title mt-5 text-center m-auto" style="color:white;font-family: monospace;font-size: 2.5rem;font-weight: 500; width: fit-content;background-color: #e60000;padding: 15px 35px;border-radius: 100px;box-shadow: 5px 5px 5px -2px #acacac;">{{$sorteio->titulo}} - Vencedores</h2>
            <div class="row justify-content-center align-items-center">
                <table class="table col-md-6 text-center" style="margin: 50px 10% 10% 10%;background: linear-gradient(to right, #ff7171 , #ffd6d6);border-radius: 12px;">
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
                            <td>
                                <div style="border-radius: 50%;object-fit: cover;border:3px solid #D40000;width: 50px;height: 50px;background-color: #E9E9E9;background-image: url({{$item->funcionario->foto}}), url(<?= config('app.url') . '/' . config('picture.img_default')  ?>);background-position: center, center;background-repeat: no-repeat, no-repeat;background-size: cover, cover;margin: auto;border-collapse: separate;"></div>
                            </td>
                            <td>{{$item->funcionario->nome ?? '--'}}</td>
                            <td>{{$item->nome}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 d-flex">
                    <div class="m-auto">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    class Progress {
        constructor(param = {}) {
            this.timestamp = null;
            this.duration = param.duration || Progress.CONST.DURATION;
            this.progress = 0;
            this.delta = 0;
            this.progress = 0;
            this.isLoop = !!param.isLoop;

            this.reset();
        }

        static get CONST() {
            return {
                DURATION: 10000
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
                this.delta = now - this.timestamp;
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
            this.parent = param.elm || document.body;
            this.canvas = document.createElement("canvas");
            this.ctx = this.canvas.getContext("2d");
            this.width = param.width || this.parent.offsetWidth;
            this.height = param.height || this.window.innerHeight;
            this.length = param.length || Confetti.CONST.PAPER_LENGTH;
            this.yRange = param.yRange || this.height * 2;
            this.progress = new Progress({
                duration: param.duration,
                isLoop: true
            });
            this.rotationRange = typeof param.rotationLength === "number" ? param.rotationRange :
                10;
            this.speedRange = typeof param.speedRange === "number" ? param.speedRange :
                10;
            this.sprites = [];

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
                SPRITE_WIDTH: 9,
                SPRITE_HEIGHT: 16,
                PAPER_LENGTH: 120,
                DURATION: 10000,
                ROTATION_RATE: 50,
                COLORS: [
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
                    ctx = canvas.getContext("2d");

                canvas.width = Confetti.CONST.SPRITE_WIDTH;
                canvas.height = Confetti.CONST.SPRITE_HEIGHT;

                canvas.position = {
                    initX: Math.random() * this.width,
                    initY: -canvas.height - Math.random() * this.yRange
                };

                canvas.rotation = (this.rotationRange / 2) - Math.random() * this.rotationRange;
                canvas.speed = (this.speedRange / 2) + Math.random() * (this.speedRange / 2);

                ctx.save();
                ctx.fillStyle = Confetti.CONST.COLORS[(Math.random() * Confetti.CONST.COLORS.length) | 0];
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.restore();

                this.sprites.push(canvas);
            }
        }

        render(now) {
            let progress = this.progress.tick(now);

            this.canvas.width = this.width;
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
        const DURATION = 15000,
            LENGTH = 800;

        new Confetti({
            width: window.innerWidth,
            height: window.innerHeight,
            length: LENGTH,
            duration: DURATION
        });
    })();

    let telah = $(document).height();
    let telaw = $(document).width();
    $("canvas").height(telah);
    $("canvas").width(telaw);
</script>
@endsection

@section('css')
<style>
    th,
    tr,
    thead,
    table {
        border: none;
        font-weight: bolder;
        font-size: large;
    }

    table td {
        border-top: 1px solid #ff7b81 !important;
        vertical-align: middle !important;
    }

    th {
        border-top: none !important;
        border-bottom: none !important;
    }

    table th:nth-child(1) {
        border-radius: 12px 0px 0px 0px;
    }

    table th:nth-last-child(1) {
        border-radius: 0px 12px 0px 0px;
    }

    thead {
        background: linear-gradient(to right, #cd3737, #ff8282);
        color: white;
    }

    .page-link {
        color: #d40000 !important;
    }

    .page-item.active .page-link {
        color: white !important;
        background-color: #d40000 !important;
        border-color: #d40000 !important;
    }
</style>
@endsection