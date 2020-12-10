<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-delete').on('click', function(){

            Swal.fire({
                title: 'Você tem certeza disso?',
                text: 'Você não será capaz de recuperar este arquivo novamente!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, quero continuar!',
                cancelButtonText: 'Não'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'Aguarde...',
                        text: 'Processando sua requisição',
                        icon: 'warning',
                        showConfirmButton: false
                    });
                    window.location = $(this).data('action');
                }
            })
        })
    });
</script>
