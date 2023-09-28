<div class="tab-pane fade" id="tab-transporte" role="tabpanel" aria-labelledby="transporte_tab">

        <div class="d-flex flex-wrap">
            <div class="row flex-fill">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Formulário Auxilio VT

                        </div>
                        <div class="card-body">
                            <form id="aux_vt_form">
                                <!-- <div class="form-group">
                                    <label for="id_vt">ID_VT:</label>
                                    <input type="text" class="form-control" id="id_vt" name="id_vt">
                                </div> -->
                                <div class="form-group">
                                    <label for="vt_nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="vt_nome" name="vt_nome">
                                </div>
                                <div class="form-group">
                                    <label for="vt_valor" class="form-label">Valor:</label>
                                    <input type="number" class="form-control" id="vt_valor" name="vt_valor">
                                </div>
                                <div class="form-group">
                                    <label for="vt_habilitado" class="form-label">HABILITADO:</label>
                                    <select class="form-control" id="habilitado" name="habilitado">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="sys_user">SYS_USER:</label> -->
                                    <input type="text" class="form-control d-none" id="sys_user" name="sys_user"
                                        value="<?php echo $id_user ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="sys_data">SYS_DATA:</label>
                                    <input type="date" class="form-control" id="sys_data" name="sys_data">
                                </div> -->
                                <button type="submit" class="btn btn-primary mt-2">Cadastrar Vale Transporte</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Itens Cadastrados
                        </div>
                        <div class="card-body">
                            <div id="tableExample2"
                                data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                                <div class="table-responsive ms-n1 ps-1 scrollbar">
                                    <table class="table table-striped table-sm fs--1 mb-0">
                                        <thead>
                                            <tr>

                                                <th class="sort border-top " data-sort="id">ID</th>
                                                <th class="sort border-top " data-sort="vt_nome">Nome</th>
                                                <th class="sort border-top " data-sort="vt_valor">Valor R$</th>
                                                <th class="sort border-top ">Habilitado</th>

                                                <th class="sort border-top ">Apagar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body_vt" class="list">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="page-link" data-list-pagination="prev"><span
                                            class="fas fa-chevron-left"></span></button>
                                    <ul class="mb-0 pagination"></ul>
                                    <button class="page-link pe-0" data-list-pagination="next"><span
                                            class="fas fa-chevron-right"></span></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
// Função para carregar os itens cadastrados na inicialização da página - Formulário 1
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_vt.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_vt + "</td><td>" + item.vt_nome +
                        "</td><td>" + item.vt_valor + "</td><td>" + item.habilitado_icon +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm apagar_vt' data-id='" +
                        item.id_vt + "'>Excluir</button></td></tr></tr>";
                });
                $("#table_body_vt").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".apagar_vt", function() {
        var id_vt = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_vt);
            }
        });
    });

    function deleteItem(id_vt) {
        $.ajax({
            url: 'pages/config/insert/delete_vt.php',
            type: 'POST',
            data: {
                id_vt: id_vt
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("aux_vt_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var vt_nome = document.getElementById("vt_nome").value;
        var vt_valor = document.getElementById("vt_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_vt.php',
            type: 'POST',
            data: {
                vt_nome: vt_nome,
                vt_valor: vt_valor,
                habilitado: habilitado,
                sys_user: sys_user
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("aux_vt_form").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>