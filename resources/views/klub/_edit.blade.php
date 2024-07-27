<div class="modal fade" id="klubModal" tabindex="-1" aria-labelledby="klubModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="klubModalLabel">Edit Klub</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Batal"></button>
            </div>
            <div class="modal-body">
                <form id="klubForm" action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name">
                        <div class="w-100">
                            <p id="error-name" class="text-danger mb-0 small"></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city">
                        <div class="w-100">
                            <p id="error-city" class="text-danger mb-0 small"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="btn_edit" type="button" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="module">
    $(document).ready(() => {
        $('button[data-bs-target="#klubModal"]').each((index, btn) => {
            $(btn).on('click', (e) => {
                const id = $(e.currentTarget).data('id');
                const name = $(e.currentTarget).closest('tr').find('td:nth-child(2)').text();
                const city = $(e.currentTarget).closest('tr').find('td:nth-child(3)').text();
                $('#klubForm')
                    .attr('action', "{{ route('klub.update', 'id') }}"
                        .replace('id', id));
                $('#name').val(name);
                $('#city').val(city);
            });
        });

        const klubModal = document.getElementById('klubModal');

        klubModal.addEventListener('hidden.bs.modal', () => {
            $('#name').val('');
            $('#city').val('');
            $('#error-name').text('');
            $('#error-city').text('');
            $('#btn_edit').prop('disabled', false);
        });

        $('#btn_edit').on('click', () => {
            $('#btn_edit').prop('disabled', true);
            $.ajax({
                url: $('#klubForm').attr('action'),
                type: 'POST',
                data: {
                    _method: 'PUT',
                    _token: $('input[name="_token"]').val(),
                    name: $('#name').val(),
                    city: $('#city').val()
                },
                success: (response) => {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                },
                error: (error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Periksa kembali inputan Anda!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.name) {
                            $('#error-name').text(error.responseJSON.errors.name[0]);
                        }
                        if (error.responseJSON.errors.city) {
                            $('#error-city').text(error.responseJSON.errors.city[0]);
                        }
                    }
                    $('#btn_edit').prop('disabled', false);
                }
            });
        });
    });
</script>
