<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <base href="./trabEstagios">
    <title>Lista de Estágios</title>
</head>
<body>
    <?php include("includes/navbarUser.php"); ?>
    <div class="body">
        <h2>Lista de Estágios</h2>
        <?php if (empty($estagios)): ?>
            <p style="color: white">Nenhum estágio cadastrado.</p>
        <?php else: ?>
            <div class="tableDiv">
                <table class="responsive-table" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Período</th>
                            <th>Área</th>
                            <th>Carga Horária</th>
                            <th>Estudante</th>
                            <th>Orientador</th>
                            <th>Coorientador</th>
                            <th>Supervisor</th>
                            <th>Empresa</th>
                            <th>Cidade</th>
                            <th>Status</th>
                            <th>Tipo Processo</th>
                            <th>Representante</th>
                            <th>Cargo Supervisor</th>
                            <th>Telefone Supervisor</th>
                            <th>Email Supervisor</th>
                            <th>Plano Atividades</th>
                            <th>Relatório Final</th>
                            <th>Autoavaliação Empresa</th>
                            <th>Autoavaliação</th>
                            <th>Termo Compromisso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estagios as $estagio): ?>
                            <tr>
                                <td><?php echo $estagio->getId(); ?></td>
                                <td>
                                    <?php 
                                    $dataInicio = new DateTime($estagio->getDataInicio());
                                    $dataFinal = new DateTime($estagio->getDataFinal());
                                    echo $dataInicio->format('d/m/Y') . ' - ' . $dataFinal->format('d/m/Y'); 
                                    ?>
                                </td>
                                <td><?php echo $estagio->getArea(); ?></td>
                                <td><?php echo $estagio->getCargaHoraria(); ?></td>
                                <td><?php echo $estagio->getNomeEstudante(); ?></td>
                                <td><?php echo $estagio->getNomeOrientador(); ?></td>
                                <td><?php echo $estagio->getNomeCoorientador(); ?></td>
                                <td><?php echo $estagio->getNomeSupervisor(); ?></td>
                                <td><?php echo $estagio->getNomeEmpresa(); ?></td>
                                <td><?php echo $estagio->getNomeCidade(); ?></td>
                                <td><?php echo $estagio->getStatus(); ?></td>
                                <td><?php echo $estagio->getTipoProcesso(); ?></td>
                                <td><?php echo $estagio->getRepresentante(); ?></td>
                                <td><?php echo $estagio->getCargoSupervisor(); ?></td>
                                <td><?php echo $estagio->getTelefoneSupervisor(); ?></td>
                                <td><?php echo $estagio->getEmailSupervisor(); ?></td>
                                <td><?php echo $estagio->getPlanoAtividades() ? "<a href='../uploads/{$estagio->getPlanoAtividades()}' target='_blank'>Plano Atividades</a>" : 'N/A'; ?></td>
                                <td><?php echo $estagio->getRelatorioFinal() ? "<a href='../uploads/{$estagio->getRelatorioFinal()}' target='_blank'>Relatório Final</a>" : 'N/A'; ?></td>
                                <td><?php echo $estagio->getAutoavaliacaoEmpresa() ? "<a href='../uploads/{$estagio->getAutoavaliacaoEmpresa()}' target='_blank'>Autoavaliação Empresa</a>" : 'N/A'; ?></td>
                                <td><?php echo $estagio->getAutoavaliacao() ? "<a href='../uploads/{$estagio->getAutoavaliacao()}' target='_blank'>Autoavaliação</a>" : 'N/A'; ?></td>
                                <td><?php echo $estagio->getTermoCompromisso() ? "<a href='../uploads/{$estagio->getTermoCompromisso()}' target='_blank'>Termo Compromisso</a>" : 'N/A'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
