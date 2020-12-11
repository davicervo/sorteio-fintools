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
                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 150px; background: #ad0000; color: white">
                            <h4>Sorteio Nº 1234</h4>
                            <button @click="selectItemGrid()" class="btn btn-light btn-lg mt-3">Começar</button>
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
                    <div class="p-5 modal-body">
                        <p v-text="funcionarioSelecionado"></p>
                        <button @click="[selectItemGrid(), restartSortable()]" class="btn btn-primary btn-lg">Recomeçar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal selecionado -->
        <div class="container-fluid page">
            <div class="row no-gutters d-flex justify-content-center">
                <div v-for="(func, indexFunc) in funcionarios" :key="func.funcionario_id" class="item-func" :ref="`func_${indexFunc}`">
                    <div class="card shadow-lg" style="height: 230px">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <img width="100" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsOiM5NEQ5Rjg7fQoJLnN0MXtmaWxsOiNFREQ5QjQ7fQoJLnN0MntmaWxsOiNEQ0M1QTE7fQoJLnN0M3tmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiNCQzlGODI7fQoJLnN0NHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiM4QjVFM0M7fQoJLnN0NXtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiNEQ0M1QTE7fQoJLnN0NntmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiNFREQ5QjQ7fQoJLnN0N3tmaWxsOiNGRkZGRkY7fQoJLnN0OHtmaWxsOiMzNDIyMTQ7fQoJLnN0OXtmaWxsOm5vbmU7fQoJLnN0MTB7ZmlsbDojQkUxRTJEO30KCS5zdDExe2ZpbGw6IzAwQUVFRjt9Cgkuc3QxMntmaWxsOiNFRjNGNkM7fQo8L3N0eWxlPjxnPjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik04OS43LDM3OS4yYzguOS03LjksMjkuNC0yNCw4OS4zLTUyLjRsNDMuNSw2MC4zbDE1LjItMTQuNGwtMC4yLTAuNGwxOC44LTE3LjZsMTguNCwxNy42bC0wLjEsMC4xbDE1LjQsMTQuNiAgIGw0My40LTYwLjFjNjAuMiwyOC40LDgwLjEsNDQuMiw4OS4xLDUyLjJjNCwzLjUsNy41LDkuMywxMC43LDE2LjhjMjQuNC0zNSwzOC43LTc3LjUsMzguNy0xMjMuM0M0NzEuNywxNTMuNiwzNzUuMSw1NywyNTYsNTcgICBDMTM2LjksNTcsNDAuMywxNTMuNiw0MC4zLDI3Mi44YzAsNDUuOSwxNC4zLDg4LjQsMzguNywxMjMuM0M4Mi4yLDM4OC42LDg1LjcsMzgyLjcsODkuNywzNzkuMnoiLz48cGF0aCBjbGFzcz0ic3QxIiBkPSJNMjU2LDE5Mi41djE2My4zYzE1LjYsMC4xLDMxLjMtMTAuMiw0My4yLTI0Ljh2LTk4LjZDMjk5LjIsMjA1LjgsMjc3LjYsMTkyLjUsMjU2LDE5Mi41eiIvPjxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0yMTIuOCwyMzIuNVYzMzFjMTEuOSwxNCwyNy41LDI0LjcsNDMuMiwyNC44VjE5Mi41QzIzNC40LDE5Mi41LDIxMi44LDIwNS44LDIxMi44LDIzMi41eiIvPjxwYXRoIGNsYXNzPSJzdDMiIGQ9Ik0yOTkuMiwyMzIuNXY2NkMyODIuOCwzMTAuMywyNjcuMSwzMTcsMjU2LDMxN2MtMTEuMSwwLTI2LjgtNi43LTQzLjItMTguNnYtNjYgICBDMjEyLjgsMTc5LjIsMjk5LjIsMTc5LjIsMjk5LjIsMjMyLjUiLz48cGF0aCBjbGFzcz0ic3Q0IiBkPSJNMzI4LjEsNDcuNWMyMS4zLDMuNCwzMywxOCwzOC4xLDM3LjhjMTMuMSw1MS41LTE0LjMsMTYzLjItMTA5LjMsMTY0LjZjLTQ5LDAuNy04NC4zLTExLjgtOTcuMS01MS40ICAgYy0xMi45LTM5LjYtMTguMS0xMDMuNSw5LjgtMTM5LjRDMjA0LjcsMTQsMjc4LjUsMTMuNiwzMjguMSw0Ny41Ii8+PGc+PHBhdGggY2xhc3M9InN0NSIgZD0iTTE1NS45LDE1NC41Yy0zLjctMy03LjctNC4zLTExLjMtMy4xYy03LjYsMi41LTEwLjMsMTUuMi01LjksMjguM2M0LjIsMTIuNiwxMy4yLDIxLDIwLjcsMTkuNSAgICBjNC4xLDIzLjMsMTAuNSw0MS4yLDEzLjMsNDUuM2MxMC40LDE1LjQsNTkuOSw1Ni4xLDgzLjMsNTYuMVY1NS41QzE3OC40LDU1LjUsMTU3LjMsMTA1LjcsMTU1LjksMTU0LjV6Ii8+PHBhdGggY2xhc3M9InN0NiIgZD0iTTM2NywxNTEuNGMtMy40LTEuMS03LjMsMC0xMC45LDIuOGMtMS41LTQ4LjctMjIuNi05OC43LTEwMC4xLTk4Ljd2MjQ1LjFjMjMuNCwwLDcyLjktNDAuNyw4My4zLTU2LjEgICAgYzIuOC00LjEsOS4yLTIyLDEzLjMtNDUuMmM3LjQsMS4yLDE2LjItNy4yLDIwLjMtMTkuNkMzNzcuMiwxNjYuNiwzNzQuNiwxNTMuOSwzNjcsMTUxLjR6Ii8+PC9nPjxwYXRoIGNsYXNzPSJzdDciIGQ9Ik0yNTYuMiwzNTUuM2wtNDMuNC00My44Yy0xMi41LDUuNS0yMy43LDEwLjYtMzMuOCwxNS40bDQzLjUsNjAuM0wyNTYuMiwzNTUuM3oiLz48cGF0aCBjbGFzcz0ic3Q3IiBkPSJNMjg5LjksMzg3LjJsNDMuNC02MC4xYy0xMC4yLTQuOC0yMS41LTEwLTM0LjEtMTUuNWwtNDMsNDMuN0wyODkuOSwzODcuMnoiLz48Zz48cGF0aCBjbGFzcz0ic3Q4IiBkPSJNMjA5LjIsMTYwLjVjNi4zLDAsMTEuNSw1LjgsMTEuNSwxM2MwLDcuMi01LjEsMTMtMTEuNSwxM2MtNi4zLDAtMTEuNS01LjgtMTEuNS0xMyAgICBDMTk3LjcsMTY2LjMsMjAyLjksMTYwLjUsMjA5LjIsMTYwLjUiLz48cGF0aCBjbGFzcz0ic3Q4IiBkPSJNMzAyLjQsMTYwLjVjNi4zLDAsMTEuNSw1LjgsMTEuNSwxM2MwLDcuMi01LjEsMTMtMTEuNSwxM2MtNi4zLDAtMTEuNS01LjgtMTEuNS0xMyAgICBDMjkwLjksMTY2LjMsMjk2LjEsMTYwLjUsMzAyLjQsMTYwLjUiLz48cGF0aCBjbGFzcz0ic3Q3IiBkPSJNMjMyLjEsMjQzYzQuMSw5LDEzLjEsMTUuMywyMy43LDE1LjNjMTAuNiwwLDE5LjYtNi4zLDIzLjctMTUuM0gyMzIuMXoiLz48L2c+PHBhdGggY2xhc3M9InN0NCIgZD0iTTMyNyw5OS4xYy0yNS41LDE1LjctNTUuNywxMC4yLTQ0LTMuNmMxMS44LTEzLjctMS4yLTQuMi0yNC4xLDUuOWMtMjMsMTAtNDkuNCw4LjQtMzMuOC0wLjEgICBjMTktMTAuMy01NS4yLTE3LTY4LjcsODguOWMtMjEuNy03Ni44LDE1LTE0MS4yLDk3LjktMTQ0LjhjODguNi0zLjksMTI0LjUsNjYuMiwxMDAsMTQyLjVDMzU1LjksMTQ2LjUsMzQ1LjksMTE5LjUsMzI3LDk5LjEiLz48cG9seWdvbiBjbGFzcz0ic3Q5IiBwb2ludHM9IjI3OC4yLDQ4Ny40IDI3OC4zLDQ4OC4yIDI3OC4yLDQ4Ny40ICAiLz48cG9seWdvbiBjbGFzcz0ic3Q5IiBwb2ludHM9IjIzMy44LDQ4Ny40IDIzMy43LDQ4OC4yIDIzMy44LDQ4Ny40ICAiLz48cG9seWdvbiBjbGFzcz0ic3QxMCIgcG9pbnRzPSIyNjQuMSwzODguNiAyNzguMiw0ODcuNCAyNzguMiw0ODcuNCAyNjQuMSwzODguNiAgIi8+PHBvbHlnb24gY2xhc3M9InN0MTAiIHBvaW50cz0iMjMzLjgsNDg3LjQgMjQ3LjksMzg4LjYgMjQ3LjksMzg4LjYgMjMzLjgsNDg3LjQgICIvPjxwYXRoIGNsYXNzPSJzdDExIiBkPSJNNDIyLjMsMzc5LjJjLTktNy45LTI4LjktMjMuNy04OS4xLTUyLjJsLTQzLjQsNjAuMWwtMTUuNC0xNC42bC0xMC40LDE2LjFoMGwxNC4xLDk4LjcgICBjMzIuOC0zLjQsNjMuNS0xNC4xLDkwLjMtMzAuNWMwLTEwLjUsMC0xNi45LDAtMTYuOXMwLjgsNS45LDIsMTUuNmMyNC42LTE1LjQsNDUuOC0zNS43LDYyLjQtNTkuNSAgIEM0MjkuOCwzODguNiw0MjYuMywzODIuNyw0MjIuMywzNzkuMnoiLz48cGF0aCBjbGFzcz0ic3QxMSIgZD0iTTE0MS40LDQ1NS42YzEuMi05LjcsMi0xNS42LDItMTUuNnMwLDYuMywwLDE2LjljMjYuOCwxNi40LDU3LjUsMjcuMiw5MC4zLDMwLjVsMTQuMS05OC43bC0xMC4yLTE1LjggICBsLTE1LjIsMTQuNEwxNzksMzI2LjljLTU5LjksMjguNC04MC40LDQ0LjUtODkuMyw1Mi40Yy00LDMuNS03LjUsOS40LTEwLjcsMTYuOEM5NS42LDQxOS44LDExNi44LDQ0MC4xLDE0MS40LDQ1NS42eiIvPjxwb2x5Z29uIGNsYXNzPSJzdDEyIiBwb2ludHM9IjI3NC41LDM3Mi42IDI3NC42LDM3Mi40IDI1Ni4yLDM1NC44IDIzNy40LDM3Mi40IDIzNy43LDM3Mi44IDI1Ni4yLDM1NS4zICAiLz48cGF0aCBjbGFzcz0ic3QxMiIgZD0iTTI2NC4xLDM4OC42TDI2NC4xLDM4OC42bDEwLjQtMTYuMWwtMTguMy0xNy4zbC0xOC41LDE3LjZsMTAuMiwxNS44bC0xNC4xLDk4LjdjNy4zLDAuNywxNC43LDEuMSwyMi4yLDEuMSAgIGM3LjUsMCwxNC45LTAuNCwyMi4yLTEuMUwyNjQuMSwzODguNnoiLz48cGF0aCBjbGFzcz0ic3Q3IiBkPSJNMTQxLjQsNDU1LjZjMC43LDAuNCwxLjQsMC45LDIuMSwxLjNjMC0xMC41LDAtMTYuOSwwLTE2LjlTMTQyLjYsNDQ1LjksMTQxLjQsNDU1LjZ6Ii8+PHBhdGggY2xhc3M9InN0NyIgZD0iTTM2OC41LDQ1Ni44YzAuNy0wLjQsMS40LTAuOSwyLjEtMS4zYy0xLjItOS43LTItMTUuNi0yLTE1LjZTMzY4LjYsNDQ2LjMsMzY4LjUsNDU2Ljh6Ii8+PC9nPjwvc3ZnPg==">
                            <h4 class="mt-2">[[ func.nome.substr(0, 20) ]]</h4>
                            <small v-text="func.setor"></small>
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
            },
            mounted () {
                $('#modalComecar').modal('show')
            },
            data: () => ({
                sleepTime: 100,
                funcionarios: [],
                chunckIndex: 0,
                loop: null,
                funcionariosTotal: 0,
                funcionariosLeitura: 0,
                chunck: [],
                funcionarioSelecionado: {}
            }),
            watch: {
                funcionarioSelecionado () {
                    if (Object.keys(this.funcionarioSelecionado).length > 0) {
                        $('#modalSelecionado').modal('show')
                    }
                },
                funcionariosLeitura () {
                    if (this.funcionariosLeitura === this.funcionariosTotal) {
                        clearInterval(this.loop);
                    }
                }
            },
            methods: {
                async getEmployees () {
                    try {
                        const data = await axios.get(window.location.origin + '/api/funcionarios/chunk/20')
                        this.countChunks()
                        if (data && Array.isArray(data.data)) {
                            this.chunck = data.data
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
                            nextEl.classList.add('select-card')
                            this.funcionariosLeitura++
                            if (i > 0) {
                                prevEl = this.$refs[`func_${i-1}`][0]
                                prevEl.classList.remove('select-card')
                            }
                        }
                        if(i == funcLength){
                            prevEl = this.$refs[`func_${funcLength-1}`][0]
                            prevEl.classList.remove('select-card')
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
                }
            }
        })
    </script>
</body>

</html>
