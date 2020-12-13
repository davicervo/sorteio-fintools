@extends('layouts.sorteio')

@section('css')
<style>
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

    .winner-nome {
        font-size: 4.1rem;
        margin-top: -40px;
    }

    .winner-logo {
        margin-top: 125px;
    }

    .brinde-texto {
        font-size: 4.0rem;
        margin-top: 100px;
    }

    .pyro>.after,
    .pyro>.before {
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

    .pyro>.after {
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

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%
        }
    }

    @-moz-keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%
        }
    }

    @-o-keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%
        }
    }

    @-ms-keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%
        }
    }

    @keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%
        }
    }

    .form-control:disabled {
        background-color: #CCCCCC;
        opacity: 0.5;
    }
</style>
@endsection

@section('content')
<div id="sorteio">
    <!-- modal comecar -->
    <div data-backdrop="static" data-keyboard="false" class="modal fade" id="modalComecar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                        <img src="<?= asset('img/logo.png') ?>" width="250">
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
                            <small class="form-text text-white">Selecione um Prêmio para ser sorteado.</small>
                        </div>
                        <button :disabled="brindeModel === undefined" @click="getGiftWinner()" class="btn btn-light btn-lg mt-3">Começar</button>
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
                        <div style="width: 140px; position: absolute; background: white; padding: 20px; border-radius: 100px">
                            <div :style="'border-radius: 100px;margin: -8px 0 0 -10px;width: 120px; height: 120px;background-color: #E9E9E9;background-image: url(' + winner.foto + '), url(<?= config('app.url') . '/' . config('picture.img_default')  ?>);background-position: center, center;background-repeat: no-repeat, no-repeat;background-size: cover, cover;'"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="height: 20px">
                        <h4 class="brinde-texto">[[ brindeExibicao.text ]]</h4>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                        <img class="winner-logo" src="<?= asset('img/logo.png') ?>" width="200">
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 150px; background: #ad0000; color: white">
                        <button @click="draftNextAward()" class="btn btn-light btn-lg mt-3">Sortear próximo Prêmio</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal selecionado -->
    <div class="container-fluid d-none" id="funcs_carousel_div">
        <div id="sorteioFuncionariosOt" class="carousel slide" data-ride="carousel" data-interval="0">
            <div class="carousel-inner">
                <div :class="'carousel-item' + (indexChunck==0?' active':'')" v-for="(funcionarios,indexChunck) in chunck" :key="indexChunck">
                    <div class="row no-gutters d-flex justify-content-center" :ref="`gridCards_${indexChunck}`">
                        <div v-for="(func, indexFunc) in funcionarios" :key="func.funcionario_id" class="item-func" :ref="`func_${indexChunck}_${indexFunc}`">
                            <div class="card shadow-sm" style="height: 150px">
                                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                                    <div :style="'border-radius: 50%;border:3px solid #D40000;width: 100px;height: 100px;background-color: #E9E9E9;background-image: url(' + func.foto + '), url(<?= config('app.url') . '/' . config('picture.img_default')  ?>);background-position: center, center;background-repeat: no-repeat, no-repeat;background-size: cover, cover;'"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    new Vue({
        el: '#sorteio',
        delimiters: ['[[', ']]'],
        created() {
            this.getEmployees()
            this.getGifts()
            this.getDraw()
        },
        mounted() {
            $('#modalComecar').modal('show')
        },
        data: () => ({
            sorteioUid: "<?= request()->route()->parameter('uid') ?>",
            numFuncionariosPorExibicao: 32,
            sleepTime: 100,
            loop: null,
            chunck: [],
            chunckIndex: 0,
            exibeVencedor: false,
            brindes: [],
            brindeModel: undefined,
            brindeExibicao: {},
            winner: {},
            sorteio: null
        }),
        watch: {
            exibeVencedor() {
                setTimeout(() => {
                    // Finaliza o loop
                    clearInterval(this.loop)

                    // bota carrosel na aba atual definida
                    $('#sorteioFuncionariosOt').carousel(this.chunckIndex)

                    $("#modalSelecionado").modal('show')
                    $("#modalSelecionado").find('.modal-dialog').addClass('pyro')

                    let gridCards = this.$refs['gridCards_' + this.chunckIndex][0]
                    gridCards.classList.add('row-effect')
                }, 1000)
            },
        },
        methods: {
            getGiftWinner() {
                if (this.brindeModel !== undefined) {
                    axios.get(window.location.origin + '/api/brindes/ganhador/' + this.brindeModel).then(response => {
                            this.winner = response.data.data.ganhador
                            this.brindeExibicao = this.brindes.find(b => b.value === this.brindeModel)
                            this.startGiftDraw()
                        })
                        .catch(error => {
                            alert(error.response.data.message)
                        })
                }
            },
            async getGifts() {
                try {
                    this.brindes = []
                    const {
                        data: {
                            data
                        }
                    } = await axios.get(window.location.origin + '/api/brindes/' + this.sorteioUid)
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
            getDraw() {
                axios.get(window.location.origin + '/api/sorteio/' + this.sorteioUid).then(response => {
                        this.sorteio = response.data.data.sorteio
                    })
                    .catch(error => {
                        alert(error.response.data.message)
                        window.location.href = "<?= route('sorteios.lista') ?>"
                    })
            },
            async getEmployees() {
                try {
                    const data = await axios.get(window.location.origin + '/api/funcionarios/chunk/' + this.numFuncionariosPorExibicao + '/' + this.sorteioUid)
                    if (data && Array.isArray(data.data.data.chunk)) {
                        this.chunck = data.data.data.chunk
                    }
                } catch (e) {}
            },
            startGiftDraw() {
                $('#modalComecar').modal('hide')
                $('#funcs_carousel_div').removeClass('d-none')
                this.selectItemGrid()
            },
            selectItemGrid() {
                // bota carrosel na aba atual definida
                $('#sorteioFuncionariosOt').carousel(this.chunckIndex)

                // Recupera lista de funcionarios da aba atual
                const funcionarios = this.chunck[this.chunckIndex]

                // se funcionarios for diferente de undefined mostra animacao aleatoria de passar por funcionarios
                if (funcionarios !== undefined) {
                    // Embaralha as chaves da lista de funcionarios da aba atual para animacao ser aleatoria
                    const iterator = this.shuffle(Object.keys(funcionarios))

                    // Define um index pra percorrer o iterator embaralhado dos indexes dos funcionarios
                    let indexIterator = 0

                    // Define variavel que vai guardar ultimo funcionario selecionado
                    let funcionarioAtual = null

                    // Passa no loop de acordo com o tempo definido em sleepTime
                    this.loop = setInterval(() => {
                        // Define variavel pra guardar funcionario com card selecionado da vez 
                        let indexFuncAtual = iterator[indexIterator]

                        // Se funcionarioAtual for diferente de null tira ele da selecao
                        if (funcionarioAtual !== null) {
                            funcionarioAtual.classList.remove('select-card')
                        }

                        // Se indexFuncAtual nao for undefined seleciona card caso contrario interrompe o loop e vai pra proxima aba
                        if (indexFuncAtual !== undefined) {

                            // Define funcionarioAtual
                            funcionarioAtual = this.$refs[`func_${this.chunckIndex}_${indexFuncAtual}`][0]

                            // Insere funcionarioAtual na selecao
                            funcionarioAtual.classList.add('select-card')

                            // Incrementa index de iteracao
                            indexIterator++
                        } else {
                            // Finaliza o loop
                            clearInterval(this.loop)

                            // Vai para proxima aba
                            this.chunckIndex++

                            // Inicia animacao aleatoria de selecionar usuarios
                            this.selectItemGrid()
                        }
                    }, this.sleepTime)
                } else {
                    // Volta pra 1a aba
                    this.chunckIndex = 0

                    this.exibeVencedor = true
                }
            },
            shuffle(array) {
                var currentIndex = array.length,
                    temporaryValue, randomIndex;
                // Enquanto ainda houver elementos para embaralhar...
                while (0 !== currentIndex) {
                    // Pega o elemento restante...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;
                    // Troca com o elemento atual.
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }
                return array;
            },
            draftNextAward() {
                window.location.reload();
            }
        }
    })
</script>
@endsection