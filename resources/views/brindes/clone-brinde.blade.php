<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-clone').on('click', function () {

            var route = $(this).data("route");
            console.log(route);

            Swal.fire({
                title: 'Informe o número de brindes que deseja criar:',
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Gerar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    console.log(login);
                    return fetch(route + '/' + login)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            location.reload();
                        })
                        .catch(error => {
                            console.log(error)
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                console.log(result);
            })
        })
    });
</script>
