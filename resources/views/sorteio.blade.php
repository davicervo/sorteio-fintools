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
                            <h4>Sorteio Nº 1234</h4>
                            <div style="width: 50%">
                                <select class="custom-select" v-model="brindeModel">
                                    <option v-for="(opt, index) in brindes" :key="index" :value="opt.value">[[ opt.text ]]</option>
                                </select>
                            </div>
                            <button :disabled="brindes.length < 1" @click="selectItemGrid()" class="btn btn-light btn-lg mt-3">Começar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal comecar -->
        <!-- modal selecionado -->
        <div data-backdrop="static" data-keyboard="false" class="modal fade" id="modalSelecionado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="p-0 modal-body">
                        <div class="d-flex flex-column justify-content-center align-items-center" style="background: #ad0000; height: 170px">
                            <h4 class="text-white">[[ winner.nome ]]</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="margin:-40px 0; height: 200px">
                            <div style="width: 150px; position: absolute; background: white; padding: 25px; border-radius: 100px">
                                <img width="100" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4IiB3aWR0aD0iNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmYWJiNTM7fS5jbHMtMntmaWxsOiNmNzk3MmU7fS5jbHMtM3tmaWxsOiNmYWIzNTM7fS5jbHMtNHtmaWxsOiNmYWNlNTM7fS5jbHMtNXtmaWxsOiM0YzU2NjU7fS5jbHMtNntmaWxsOiM2MTZjN2Y7fS5jbHMtN3tmaWxsOiMzZjQ4NTY7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZS8+PGcgZGF0YS1uYW1lPSJXaW5uZXIiIGlkPSJXaW5uZXItMiI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTQuODcxLDI2LjA0OEM0LjgyNywyNi4wNDguNzY1LDE1Ljg3LjAxOCwxMC4yNjRBMiwyLDAsMCwxLDIsOEgxMmEyLDIsMCwwLDEsMCw0SDQuNDY5YzEuMDE0LDMuNzIyLDMuOTA2LDEwLjYzMywxMS4zNjUsMTAuMDA3YTIsMiwwLDAsMSwuMzMyLDMuOTg2UTE1LjUsMjYuMDQ5LDE0Ljg3MSwyNi4wNDhaIi8+PHJlY3QgY2xhc3M9ImNscy0yIiBoZWlnaHQ9IjQiIHJ4PSIyIiByeT0iMiIgd2lkdGg9IjM0IiB4PSI3IiB5PSIyIi8+PHJlY3QgY2xhc3M9ImNscy0zIiBoZWlnaHQ9IjQiIHJ4PSIyIiByeT0iMiIgd2lkdGg9IjM0IiB4PSI3IiB5PSIyIi8+PHBhdGggY2xhc3M9ImNscy00IiBkPSJNMzMuMTI5LDI2LjA0OHEtLjYzMywwLTEuMjk1LS4wNTVhMiwyLDAsMSwxLC4zMzItMy45ODZjNy41LjYyMiwxMC4zNy02LjI4NCwxMS4zNzMtMTAuMDA3SDM2YTIsMiwwLDAsMSwwLTRINDZhMiwyLDAsMCwxLDEuOTgyLDIuMjY0QzQ3LjIzNSwxNS44Nyw0My4xNzIsMjYuMDQ3LDMzLjEyOSwyNi4wNDhaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMzMuMTI5LDI2LjA0OHEtLjYzMywwLTEuMjk1LS4wNTVhMiwyLDAsMSwxLC4zMzItMy45ODZjNy41LjYyMiwxMC4zNy02LjI4NCwxMS4zNzMtMTAuMDA3SDM2YTIsMiwwLDAsMSwwLTRINDZhMiwyLDAsMCwxLDEuOTgyLDIuMjY0QzQ3LjIzNSwxNS44Nyw0My4xNzIsMjYuMDQ3LDMzLjEyOSwyNi4wNDhaIi8+PHBvbHlnb24gY2xhc3M9ImNscy0xIiBwb2ludHM9IjI4IDM1IDIwIDM1IDIxIDMwIDI3IDMwIDI4IDM1Ii8+PHBhdGggY2xhc3M9ImNscy01IiBkPSJNMzQsNDVIMTRWMzZhMS4wMjcsMS4wMjcsMCwwLDEsMS4wNTMtMUgzMi45NDdBMS4wMjcsMS4wMjcsMCwwLDEsMzQsMzZaIi8+PHJlY3QgY2xhc3M9ImNscy02IiBoZWlnaHQ9IjUiIHdpZHRoPSIxMiIgeD0iMTgiIHk9IjM4Ii8+PHBhdGggY2xhc3M9ImNscy00IiBkPSJNMTAsNkgzOGEwLDAsMCwwLDEsMCwwVjE3QTE0LDE0LDAsMCwxLDI0LDMxaDBBMTQsMTQsMCwwLDEsMTAsMTdWNmEwLDAsMCwwLDEsMCwwWiIvPjxyZWN0IGNsYXNzPSJjbHMtNyIgaGVpZ2h0PSIzIiByeD0iMSIgcnk9IjEiIHdpZHRoPSIyOCIgeD0iMTAiIHk9IjQ1Ii8+PC9nPjwvc3ZnPg==">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="height: 20px">
                            <h4>Brinde: [[ brindeExibicao.text ]]</h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                            <img src="https://oliveiratrust.com.br/portal/img/logo.png" width="200">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 150px; background: #ad0000; color: white">
                            <button @click="draftNextAward()" class="btn btn-light btn-lg mt-3">Sortear próximo Brinde</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal selecionado -->
        <div class="container-fluid page">
            <div class="row no-gutters d-flex justify-content-center" ref="gridCards">
                <div v-for="(func, indexFunc) in funcionarios" :key="func.funcionario_id" class="item-func" :ref="`func_${indexFunc}`">
                    <div class="card shadow-lg" style="height: 240px">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <img style="border-radius: 50%;border:3px solid #D40000;" width="100" height="100" :src=" func.foto ">
                            <h4 class="mt-2">[[ func.nome.split(" ")[0].substr(0, 20) ]]</h4>
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
            },
            mounted () {
                $('#modalComecar').modal('show')
            },
            data: () => ({
                sorteioUid: "<?= request()->route()->parameter('uid') ?>",
                numFuncionariosPorExibicao: 24,
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
                winner: {}
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
