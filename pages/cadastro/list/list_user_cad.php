<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Usuários</h2>
    </div>
    <div class="col-12 col-md-auto">
        <a href="content_pages.php?id=1" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Adicionar Usuário </span></a>
        <a class="btn btn-phoenix-secondary me-2"><i class="fa-solid fa-user-clock me-2"></i><span>Usuários sem
                relação</span></a>
        <!-- <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="z-index: 9999;">
                  <li><a class="dropdown-item" href="#!">View profile</a></li>
                  <li><a class="dropdown-item" href="#!">Report</a></li>
                  <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                  <li><a class="dropdown-item text-danger" href="#!">Delete Lead</a></li>
                </ul> -->
    </div>
</div>


<div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":20,"pagination":true}'>
    <div class="table-responsive ms-n1 ps-1 scrollbar">
        <table class="table table-striped table-sm fs--1 mb-0">
            <thead>
                <tr>

                    <th class="sort border-top " data-sort="id_funcionario">ID</th>
                    <th class="sort border-top " data-sort="cpf">CPF/CNPJ</th>
                    <th class="sort border-top " data-sort="nome_social">Data de Cadastro</th>
                    <th class="sort border-top " data-sort="nome_registro">Data de Admissão</th>
                    <th class="sort border-top " data-sort="sexo">Data de Nascimento</th>


                    <th class="sort text-end align-middle pe-0 border-top" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="list">
                            <?php
                            // Recupere os dados do MySQL
                                        $sql = "SELECT subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, tipo
                                        FROM (
                                            SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo
                                            FROM funcionarios_cnpj AS fcnpj
                                            LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                                            WHERE tb_history_cadastro.id_funcionario IS NULL

                                            UNION ALL

                                            SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo
                                            FROM funcionarios AS f
                                            LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                                            WHERE tb_history_cadastro.id_funcionario IS NULL
                                        ) AS subquery;";
                                        $result = $conn->query($sql);

                        // Preencha a tabela com os dados
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';

                                echo '<td class="align-middle cpf">' . $row['idFuncionario'] . '</td>';
                                echo '<td class="align-middle">' . $row['cpf'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataCadastro'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataAdmissao'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataNascimento'] . '</td>';



                                echo '<td class="align-middle white-space-nowrap text-end pe-0">';
                                echo '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                echo '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                echo '<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="content_pages.php?id=3&id_func='.$row['idFuncionario'] . '&tipo='.$row['tipo'].'">Ver/editar</a><a class="dropdown-item" href="#!">Export</a>';
                                echo '<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
                        }

                        ?>

            </tbody>

        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
        <ul class="mb-0 pagination"></ul>
        <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>



<script>
$(document).ready(function() {
    $('#formulario').DataTable({
        searching: true,
        ordering: true,
        lengthChange: false,
        info: false,
        language: {
            searchPlaceholder: "Pesquisar...",
            search: "",
            paginate: {
                next: "Próximo",
                previous: "Anterior"
            }
        },
    });
});
</script>