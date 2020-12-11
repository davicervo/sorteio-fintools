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
            height: 100vh;
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
        .winner-nome{font-size: 4.1rem;margin-top: -40px;}
        .winner-logo{margin-top: 125px;}
        .brinde-texto{font-size: 4.0rem;margin-top: 40px;}
        .pyro>.after,.pyro>.before{position:absolute;width:5px;height:5px;border-radius:50%;box-shadow:-120px -218.66667px #00f,248px -16.66667px #00ff84,190px 16.33333px #002bff,-113px -308.66667px #ff009d,-109px -287.66667px #ffb300,-50px -313.66667px #ff006e,226px -31.66667px #ff4000,180px -351.66667px #ff00d0,-12px -338.66667px #00f6ff,220px -388.66667px #9f0,-69px -27.66667px #ff0400,-111px -339.66667px #6200ff,155px -237.66667px #0df,-152px -380.66667px #00ffd0,-50px -37.66667px #0fd,-95px -175.66667px #a6ff00,-88px 10.33333px #0d00ff,112px -309.66667px #005eff,69px -415.66667px #ff00a6,168px -100.66667px #ff004c,-244px 24.33333px #f60,97px -325.66667px #f06,-211px -182.66667px #00ffa2,236px -126.66667px #b700ff,140px -196.66667px #9000ff,125px -175.66667px #0bf,118px -381.66667px #ff002f,144px -111.66667px #ffae00,36px -78.66667px #f600ff,-63px -196.66667px #c800ff,-218px -227.66667px #d4ff00,-134px -377.66667px #ea00ff,-36px -412.66667px #ff00d4,209px -106.66667px #00fff2,91px -278.66667px #000dff,-22px -191.66667px #9dff00,139px -392.66667px #a6ff00,56px -2.66667px #09f,-156px -276.66667px #ea00ff,-163px -233.66667px #00fffb,-238px -346.66667px #00ff73,62px -363.66667px #08f,244px -170.66667px #0062ff,224px -142.66667px #b300ff,141px -208.66667px #9000ff,211px -285.66667px #f60,181px -128.66667px #1e00ff,90px -123.66667px #c800ff,189px 70.33333px #00ffc8,-18px -383.66667px #0f3,100px -6.66667px #ff008c;-moz-animation:1s bang ease-out infinite backwards,1s gravity ease-in infinite backwards,5s position linear infinite backwards;-webkit-animation:1s bang ease-out infinite backwards,1s gravity ease-in infinite backwards,5s position linear infinite backwards;-o-animation:1s bang ease-out infinite backwards,1s gravity ease-in infinite backwards,5s position linear infinite backwards;-ms-animation:1s bang ease-out infinite backwards,1s gravity ease-in infinite backwards,5s position linear infinite backwards;animation:1s bang ease-out infinite backwards,1s gravity ease-in infinite backwards,5s position linear infinite backwards;z-index:9999}.pyro>.after{-moz-animation-delay:1.25s,1.25s,1.25s;-webkit-animation-delay:1.25s,1.25s,1.25s;-o-animation-delay:1.25s,1.25s,1.25s;-ms-animation-delay:1.25s,1.25s,1.25s;animation-delay:1.25s,1.25s,1.25s;-moz-animation-duration:1.25s,1.25s,6.25s;-webkit-animation-duration:1.25s,1.25s,6.25s;-o-animation-duration:1.25s,1.25s,6.25s;-ms-animation-duration:1.25s,1.25s,6.25s;animation-duration:1.25s,1.25s,6.25s;z-index:9999}@-webkit-keyframes bang{from{box-shadow:0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff}}@-moz-keyframes bang{from{box-shadow:0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff}}@-o-keyframes bang{from{box-shadow:0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff}}@-ms-keyframes bang{from{box-shadow:0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff}}@keyframes bang{from{box-shadow:0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff,0 0 #fff}}@-webkit-keyframes gravity{to{transform:translateY(200px);-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);-ms-transform:translateY(200px);opacity:0}}@-moz-keyframes gravity{to{transform:translateY(200px);-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);-ms-transform:translateY(200px);opacity:0}}@-o-keyframes gravity{to{transform:translateY(200px);-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);-ms-transform:translateY(200px);opacity:0}}@-ms-keyframes gravity{to{transform:translateY(200px);-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);-ms-transform:translateY(200px);opacity:0}}@keyframes gravity{to{transform:translateY(200px);-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);-ms-transform:translateY(200px);opacity:0}}@-webkit-keyframes position{0%,19.9%{margin-top:10%;margin-left:40%}20%,39.9%{margin-top:40%;margin-left:30%}40%,59.9%{margin-top:20%;margin-left:70%}60%,79.9%{margin-top:30%;margin-left:20%}80%,99.9%{margin-top:30%;margin-left:80%}}@-moz-keyframes position{0%,19.9%{margin-top:10%;margin-left:40%}20%,39.9%{margin-top:40%;margin-left:30%}40%,59.9%{margin-top:20%;margin-left:70%}60%,79.9%{margin-top:30%;margin-left:20%}80%,99.9%{margin-top:30%;margin-left:80%}}@-o-keyframes position{0%,19.9%{margin-top:10%;margin-left:40%}20%,39.9%{margin-top:40%;margin-left:30%}40%,59.9%{margin-top:20%;margin-left:70%}60%,79.9%{margin-top:30%;margin-left:20%}80%,99.9%{margin-top:30%;margin-left:80%}}@-ms-keyframes position{0%,19.9%{margin-top:10%;margin-left:40%}20%,39.9%{margin-top:40%;margin-left:30%}40%,59.9%{margin-top:20%;margin-left:70%}60%,79.9%{margin-top:30%;margin-left:20%}80%,99.9%{margin-top:30%;margin-left:80%}}@keyframes position{0%,19.9%{margin-top:10%;margin-left:40%}20%,39.9%{margin-top:40%;margin-left:30%}40%,59.9%{margin-top:20%;margin-left:70%}60%,79.9%{margin-top:30%;margin-left:20%}80%,99.9%{margin-top:30%;margin-left:80%}}
    </style>
</head>

<body>
    <div id="app">
        <!-- modal comecar -->
        <div data-backdrop="static" data-keyboard="false" class="modal fade" id="modalComecar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                            <img src="https://oliveiratrust.com.br/portal/img/logo.png" width="250">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 200px; background: #ad0000; color: white">
                            <h4 v-if="this.sorteio !== null">[[ this.sorteio.titulo ]]</h4>
                            <h4 v-if="this.sorteio === null">
                                <div class="spinner-border text-light" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </h4>
                            <div style="width: 50%">
                                <select class="form-control form-control-lg" v-model="brindeModel" :disabled="brindes.length < 1">
                                    <option v-for="(opt, index) in brindes" :key="index" :value="opt.value">[[ opt.text ]]</option>
                                </select>
                            </div>
                            <button :disabled="brindeModel === undefined" @click="selectItemGrid()" class="btn btn-light btn-lg mt-3">Começar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal comecar -->
        <!-- modal selecionado -->
        <div data-backdrop="static" data-keyboard="false" class="modal fade" id="modalSelecionado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="before"></div>
                <div class="before"></div>
                <div class="after"></div>
                <div class="after"></div>
                <div class="modal-content">
                    <div class="p-0 modal-body">
                        <div class="d-flex flex-column justify-content-center align-items-center" style="background: #ad0000; height: 170px">
                            <h4 class="text-white winner-nome">[[ winner.nome ]]</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="margin:-40px 0; height: 200px">
                            <div style="width: 150px; position: absolute; background: white; padding: 25px; border-radius: 100px">
                                <img width="100" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4IiB3aWR0aD0iNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmYWJiNTM7fS5jbHMtMntmaWxsOiNmNzk3MmU7fS5jbHMtM3tmaWxsOiNmYWIzNTM7fS5jbHMtNHtmaWxsOiNmYWNlNTM7fS5jbHMtNXtmaWxsOiM0YzU2NjU7fS5jbHMtNntmaWxsOiM2MTZjN2Y7fS5jbHMtN3tmaWxsOiMzZjQ4NTY7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZS8+PGcgZGF0YS1uYW1lPSJXaW5uZXIiIGlkPSJXaW5uZXItMiI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTQuODcxLDI2LjA0OEM0LjgyNywyNi4wNDguNzY1LDE1Ljg3LjAxOCwxMC4yNjRBMiwyLDAsMCwxLDIsOEgxMmEyLDIsMCwwLDEsMCw0SDQuNDY5YzEuMDE0LDMuNzIyLDMuOTA2LDEwLjYzMywxMS4zNjUsMTAuMDA3YTIsMiwwLDAsMSwuMzMyLDMuOTg2UTE1LjUsMjYuMDQ5LDE0Ljg3MSwyNi4wNDhaIi8+PHJlY3QgY2xhc3M9ImNscy0yIiBoZWlnaHQ9IjQiIHJ4PSIyIiByeT0iMiIgd2lkdGg9IjM0IiB4PSI3IiB5PSIyIi8+PHJlY3QgY2xhc3M9ImNscy0zIiBoZWlnaHQ9IjQiIHJ4PSIyIiByeT0iMiIgd2lkdGg9IjM0IiB4PSI3IiB5PSIyIi8+PHBhdGggY2xhc3M9ImNscy00IiBkPSJNMzMuMTI5LDI2LjA0OHEtLjYzMywwLTEuMjk1LS4wNTVhMiwyLDAsMSwxLC4zMzItMy45ODZjNy41LjYyMiwxMC4zNy02LjI4NCwxMS4zNzMtMTAuMDA3SDM2YTIsMiwwLDAsMSwwLTRINDZhMiwyLDAsMCwxLDEuOTgyLDIuMjY0QzQ3LjIzNSwxNS44Nyw0My4xNzIsMjYuMDQ3LDMzLjEyOSwyNi4wNDhaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMzMuMTI5LDI2LjA0OHEtLjYzMywwLTEuMjk1LS4wNTVhMiwyLDAsMSwxLC4zMzItMy45ODZjNy41LjYyMiwxMC4zNy02LjI4NCwxMS4zNzMtMTAuMDA3SDM2YTIsMiwwLDAsMSwwLTRINDZhMiwyLDAsMCwxLDEuOTgyLDIuMjY0QzQ3LjIzNSwxNS44Nyw0My4xNzIsMjYuMDQ3LDMzLjEyOSwyNi4wNDhaIi8+PHBvbHlnb24gY2xhc3M9ImNscy0xIiBwb2ludHM9IjI4IDM1IDIwIDM1IDIxIDMwIDI3IDMwIDI4IDM1Ii8+PHBhdGggY2xhc3M9ImNscy01IiBkPSJNMzQsNDVIMTRWMzZhMS4wMjcsMS4wMjcsMCwwLDEsMS4wNTMtMUgzMi45NDdBMS4wMjcsMS4wMjcsMCwwLDEsMzQsMzZaIi8+PHJlY3QgY2xhc3M9ImNscy02IiBoZWlnaHQ9IjUiIHdpZHRoPSIxMiIgeD0iMTgiIHk9IjM4Ii8+PHBhdGggY2xhc3M9ImNscy00IiBkPSJNMTAsNkgzOGEwLDAsMCwwLDEsMCwwVjE3QTE0LDE0LDAsMCwxLDI0LDMxaDBBMTQsMTQsMCwwLDEsMTAsMTdWNmEwLDAsMCwwLDEsMCwwWiIvPjxyZWN0IGNsYXNzPSJjbHMtNyIgaGVpZ2h0PSIzIiByeD0iMSIgcnk9IjEiIHdpZHRoPSIyOCIgeD0iMTAiIHk9IjQ1Ii8+PC9nPjwvc3ZnPg==">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="height: 20px">
                            <h4 class="brinde-texto">[[ brindeExibicao.text ]]</h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                            <img class="winner-logo" src="https://oliveiratrust.com.br/portal/img/logo.png" width="200">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 150px; background: #ad0000; color: white">
                            <button @click="draftNextAward()" class="btn btn-light btn-lg mt-3">Sortear próximo Prêmio</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal selecionado -->
        <div class="container-fluid page">
            <div class="row no-gutters d-flex justify-content-center" ref="gridCards">
                <div v-for="(func, indexFunc) in funcionarios" :key="func.funcionario_id" class="item-func" :ref="`func_${indexFunc}`">
                    <div class="card shadow-lg" style="height: 150px">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <div :style="'border-radius: 50%;border:3px solid #D40000;width: 100px;height: 100px;background-color: #D40000;background-image: url(' + func.foto + '), url(<?= config('app.url') .'/'. config('picture.img_default')  ?>);background-position: center, center;background-repeat: no-repeat, no-repeat;background-size: cover, cover;'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            delimiters: ['[[',']]'],
            created() {
                this.getEmployees()
                this.getGifts()
                this.getDraw()
            },
            mounted () {
                $('#modalComecar').modal('show')
            },
            data: () => ({
                sorteioUid: "<?= request()->route()->parameter('uid') ?>",
                numFuncionariosPorExibicao: 32,
                sleepTime: 100,
                funcionarios: [],
                chunckIndex: 0,
                loop: null,
                funcionariosTotal: 0,
                funcionariosLeitura: 0,
                chunck: [],
                funcionarioSelecionado: {},
                exibeVencedor: false,
                lastIndexSelected: undefined,
                brindes: [],
                brindeModel: undefined,
                brindeExibicao: {},
                winner: {},
                sorteio:null
            }),
            watch: {
                funcionarioSelecionado () {
                    if (Object.keys(this.funcionarioSelecionado).length > 0) {
                        $('#modalSelecionado').modal('show')
                    }
                },
                funcionariosLeitura () {
                    if (this.funcionariosLeitura === this.funcionariosTotal) {
                        this.exibeVencedor = true
                    }
                },
                exibeVencedor () {
                    setTimeout(() => {
                        clearInterval(this.loop);
                        $("#modalSelecionado").modal('show')
                        $("#modalSelecionado").find('.modal-dialog').addClass('pyro');
                        let gridCards = this.$refs['gridCards']
                        gridCards.classList.add('row-effect')
                        if (this.$refs[`func_${this.lastIndexSelected}`][0]) {
                            let cardItem = this.$refs[`func_${this.lastIndexSelected}`][0]
                            cardItem.classList.remove('select-card')
                        }
                    }, 1000)
                },
                brindeModel () {
                    if (this.brindeModel !== undefined) {
                        this.getGiftWinner()
                        this.brindeExibicao = this.brindes.find(b => b.value === this.brindeModel)
                    }
                }
            },
            methods: {
                async getGiftWinner() {
                    try {
                        const { data: { data } } = await axios.get(window.location.origin + '/brindes/ganhador/' + this.brindeModel)
                        this.winner = data
                    } catch (e) {}
                },
                async getGifts () {
                    try {
                        this.brindes = []
                        const { data: { data } } = await axios.get(window.location.origin + '/api/brindes/' + this.sorteioUid)
                        if (Object.keys(data.brindes).length > 0) {
                            Object.keys(data.brindes).forEach((b, i) => {
                                this.brindes.push({
                                    value: b,
                                    text: data.brindes[b]
                                })
                            })
                        }
                    } catch (e) {}
                },
                async getDraw () {
                    try {
                        const res = await axios.get(window.location.origin + '/api/sorteio/' + this.sorteioUid)
                        this.sorteio = res.data
                    } catch (e) {}
                },
                async getEmployees () {
                    try {
                        const data = await axios.get(window.location.origin + '/api/funcionarios/chunk/' + this.numFuncionariosPorExibicao + '/' + this.sorteioUid)
                        if (data && Array.isArray(data.data)) {
                            this.chunck = data.data
                            this.countChunks()
                        }
                    } catch (e) {}
                },
                countChunks () {
                    let counter = 0
                    for (let arrayItem in this.chunck) {
                        for (let fnc in this.chunck[arrayItem]) {
                            counter++
                        }
                    }
                    this.funcionariosTotal = counter
                },
                selectItemGrid () {
                    $('#modalComecar').modal('hide')
                    this.funcionarios = this.chunck[this.chunckIndex]
                    const funcLength = this.funcionarios.length
                    let i = 0;
                    this.loop = setInterval(() => {
                        let prevEl = undefined
                        if (this.$refs[`func_${i}`]) {
                            let nextEl = this.$refs[`func_${i}`][0]
                            if (nextEl) {
                                nextEl.classList.add('select-card')
                                this.lastIndexSelected = i
                            }
                            this.funcionariosLeitura++
                            if (i > 0) {
                                prevEl = this.$refs[`func_${i-1}`][0]
                                prevEl.classList.remove('select-card')
                            }
                        }
                        if(i == funcLength){
                            prevEl = this.$refs[`func_${funcLength-1}`][0]
                            if (prevEl) {
                                prevEl.classList.remove('select-card')
                            }
                            this.funcionarios = []
                            this.chunckIndex++
                            clearInterval(this.loop);
                            if (this.chunck[this.chunckIndex]) {
                                this.funcionarios = this.chunck[this.chunckIndex]
                                this.selectItemGrid()
                            } else {
                                this.chunckIndex = 0
                                this.selectItemGrid()
                            }
                        }
                        i++;
                    }, this.sleepTime);
                },
                draftNextAward(){
                    window.location.reload();
                }
            }
        })
    </script>
</body>

</html>
