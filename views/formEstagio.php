<?php
$estagio = $_SESSION['estagio_vo'];
$section = $_SESSION['sectionAtual'] ?? 'dados-gerais';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <base href="./trabEstagios">
    <title>Formulário Estágio</title>
    <style>
        nav ul {
            display: flex;
            list-style: none;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: lightgray;
        }

        nav a.active {
            color: black;
            background-color: #eee;
            font-weight: bold;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        but
        span {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        span a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Estágio</h1>

    <div class="voltar">
        <a href="../estagiosSecao">Voltar</a>
    </div>

    <!-- Menu de navegação -->
    <nav>
        <ul>
            <li>
                <a href="../mudaSectionEstagio?section=dados-gerais" class="<?=$section == 'dados-gerais' ? 'active' : ''?>">Dados Gerais</a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=periodo" class="<?=$section == 'periodo' ? 'active' : ''?>">Período</a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=atores" class="<?=$section == 'atores' ? 'active' : ''?>">Atores</a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=representante" class="<?=$section == 'representante' ? 'active' : ''?>">Representante</a>
            </li>
            <li>
                <a href="../mudaSectionEstagio?section=documentos" class="<?=$section == 'documentos' ? 'active' : ''?>">Documentos</a>
            </li>
        </ul>
    </nav>

    <!-- Seções do formulário -->
    <section>
        <?php if ($section == 'dados-gerais'): ?>
            <h2>Dados Gerais</h2>
            <form method="POST" action="./save">
                <label>Área: <input type="text" name="area" value="<?=$estagio->getArea()?>"></label>

                <label for="cidade">Cidade:</label>
                <select id="cidade" name="idCidade" required>
                    <option value="" disabled>Selecione uma cidade...</option>
                    <?php foreach ($cidades as $cidade): ?>
                        <option value="<?=$cidade->getId();?>"
                            <?=$cidade->getId() == $estagio->getIdCidade() ? 'selected' : '';?>>
                            <?=htmlspecialchars($cidade->getNome());?>
                        </option>
                    <?php endforeach;?>
                </select>

                <label>Status: <input type="text" name="status" value="<?=$estagio->getStatus()?>"></label>
                <label>Tipo Processo: <input type="text" name="tipoProcesso" value="<?=$estagio->getTipoProcesso()?>"></label>
                <button type="submit">Salvar</button>
            </form>
            <?php elseif ($section == 'periodo'): ?>
    <h2>Carga Horária e Período</h2>
    <form method="POST" action="./save">
        <label>Carga Horária Total:
            <input type="text" name="cargaHoraria" value="<?=$estagio->getCargaHoraria()?>">
        </label>

        <label>Data de Início:
            <input
                type="date"
                id="dataInicio"
                name="dataInicio"
                value="<?=htmlspecialchars($estagio->getDataInicio(), ENT_QUOTES, 'UTF-8');?>"
                required>
        </label>

        <label>Carga Horária Semanal:
            <input type="number" id="cargaHorariaSemanal" placeholder="Digite a carga horária semanal">
        </label>

        <label>Data Final:
            <input
                type="date"
                id="dataFinal"
                name="dataFinal"
                value="<?=htmlspecialchars($estagio->getDataFinal(), ENT_QUOTES, 'UTF-8');?>"
                readonly>
        </label>


        <button type="button" onclick="calculaDataFinal()">Calcular Data Final</button>
        <button type="submit">Salvar</button>
    </form>
        <?php elseif ($section == 'atores'): ?>
            <h2>Atores</h2>
            <form method="POST" action="./save">
                <label for="estudante">Estudante:</label>
                <select id="estudante" name="idEstudante" required>
                    <option value="" disabled>Selecione um estudante...</option>
                    <?php foreach ($estudantes as $estudante): ?>
                        <option value="<?=$estudante->getId();?>"
                            <?=$estudante->getId() == $estagio->getIdEstudante() ? 'selected' : '';?>>
                            <?=htmlspecialchars($estudante->getNome());?>
                        </option>
                    <?php endforeach;?>
                </select>


                <label for="orientador">Orientador:</label>
                <select id="orientador" name="idOrientador" required>
                    <option value="" disabled>Selecione um orientador...</option>
                    <?php foreach ($professores as $professor): ?>
                        <option value="<?=$professor->getId();?>"
                            <?=$professor->getId() == $estagio->getIdOrientador() ? 'selected' : '';?>>
                            <?=htmlspecialchars($professor->getNome());?>
                        </option>
                    <?php endforeach;?>
                </select>


                <label for="empresa">Empresa:</label>
                <select id="empresa" name="idEmpresa" required>
                    <option value="" disabled>Selecione uma empresa...</option>
                    <?php foreach ($empresas as $empresa): ?>
                        <option value="<?=$empresa->getId();?>"
                            <?=$empresa->getId() == $estagio->getIdEmpresa() ? 'selected' : '';?>>
                            <?=htmlspecialchars($empresa->getNome());?>
                        </option>
                    <?php endforeach;?>
                </select>


                <label for="coorientador">Coorientador:</label>
                <select id="coorientador" name="idCoorientador">
                    <option value="">Selecione um coorientador...</option>
                    <?php foreach ($professores as $coorientador): ?>
                        <option value="<?=$coorientador->getId();?>"
                            <?=$coorientador->getId() == $estagio->getIdCoorientador() ? 'selected' : '';?>>
                            <?=htmlspecialchars($coorientador->getNome());?>
                        </option>
                    <?php endforeach;?>
                </select>

                <button type="submit">Salvar</button>
            </form>
        <?php elseif ($section == 'representante'): ?>
            <h2>Representante</h2>
            <form method="POST" action="./save">
                <label>Representante: <input type="text" name="representante" value="<?=$estagio->getRepresentante()?>"></label>
                <label>Nome Supervisor: <input type="text" name="nomeSupervisor" value="<?=$estagio->getNomeSupervisor()?>"></label>
                <label>Cargo Supervisor: <input type="text" name="cargoSupervisor" value="<?=$estagio->getCargoSupervisor()?>"></label>
                <label>Telefone Supervisor: <input type="text" name="telefoneSupervisor" value="<?=$estagio->getTelefoneSupervisor()?>"></label>
                <label>Email Supervisor: <input type="email" name="emailSupervisor" value="<?=$estagio->getEmailSupervisor()?>"></label>
                <button type="submit">Salvar</button>
            </form>
        <?php elseif ($section == 'documentos'): ?>
            <h2>Documentos</h2>
            <form method="POST" enctype="multipart/form-data" action="./save">
                <label>Plano Atividades: <input type="file" name="planoAtividades"></label>
                <?php if ($estagio->getPlanoAtividades()): ?>
                    <span>
                        Documento atual:
                        <a href="../uploads/<?php echo $estagio->getPlanoAtividades(); ?>" target="_blank"><?php echo $estagio->getPlanoAtividades(); ?></a>
                        <button type="button" onclick="removeDocument('planoAtividades', '<?php echo $estagio->getPlanoAtividades(); ?>', 'planoAtividades')">Remover</button>
                    </span>
                <?php endif;?>

                <label>Relatório Final: <input type="file" name="relatorioFinal"></label>
                <?php if ($estagio->getRelatorioFinal()): ?>
                    <span>
                        Documento atual:
                        <a href="../uploads/<?php echo $estagio->getRelatorioFinal(); ?>" target="_blank"><?php echo $estagio->getRelatorioFinal(); ?></a>
                        <button type="button" onclick="removeDocument('relatorioFinal', '<?php echo $estagio->getRelatorioFinal(); ?>', 'relatorioFinal')">Remover</button>
                    </span>
                <?php endif;?>

                <label>Autoavaliação Empresa: <input type="file" name="autoavaliacaoEmpresa"></label>
                <?php if ($estagio->getAutoavaliacaoEmpresa()): ?>
                    <span>
                        Documento atual:
                        <a href="../uploads/<?php echo $estagio->getAutoavaliacaoEmpresa(); ?>" target="_blank"><?php echo $estagio->getAutoavaliacaoEmpresa(); ?></a>
                        <button type="button" onclick="removeDocument('autoavaliacaoEmpresa', '<?php echo $estagio->getAutoavaliacaoEmpresa(); ?>', 'autoavaliacaoEmpresa')">Remover</button>
                    </span>
                <?php endif;?>

                <label>Autoavaliação: <input type="file" name="autoavaliacao"></label>
                <?php if ($estagio->getAutoavaliacao()): ?>
                    <span>
                        Documento atual:
                        <a href="../uploads/<?php echo $estagio->getAutoavaliacao(); ?>" target="_blank"><?php echo $estagio->getAutoavaliacao(); ?></a>
                        <button type="button" onclick="removeDocument('autoavaliacao', '<?php echo $estagio->getAutoavaliacao(); ?>', 'autoavaliacao')">Remover</button>
                    </span>
                <?php endif;?>

                <label>Termo Compromisso: <input type="file" name="termoCompromisso"></label>
                <?php if ($estagio->getTermoCompromisso()): ?>
                    <span>
                        Documento atual:
                        <a href="../uploads/<?php echo $estagio->getTermoCompromisso(); ?>" target="_blank"><?php echo $estagio->getTermoCompromisso(); ?></a>
                        <button type="button" onclick="removeDocument('termoCompromisso', '<?php echo $estagio->getTermoCompromisso(); ?>', 'termoCompromisso')">Remover</button>
                    </span>
                <?php endif;?><br>

                <button type="submit" name="finalizar" value="1">Finalizar</button>
            </form>
        <?php endif;?>
    </section>

    <script>
    function removeDocument(fieldName, fileName, dbField) {
        var formData = new FormData();
        formData.append('file', fileName);
        formData.append('field', dbField);

        fetch('./removeFile', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                document.querySelector('input[name="' + fieldName + '"]').value = '';
                var span = document.querySelector('button[onclick="removeDocument(\'' + fieldName + '\', \'' + fileName + '\', \'' + dbField + '\')"]').closest('span');
                span.remove();
            } else {
                alert('Erro ao remover o arquivo');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }

    function calculaDataFinal() {
        const cargaHorariaTotal = parseFloat(document.querySelector('input[name="cargaHoraria"]').value);
        const cargaHorariaSemanal = parseFloat(document.getElementById('cargaHorariaSemanal').value);
        const dataInicio = new Date(document.getElementById('dataInicio').value);

        if (isNaN(cargaHorariaTotal) || isNaN(cargaHorariaSemanal) || isNaN(dataInicio)) {
            alert('Por favor, preencha todos os campos corretamente.');
            return;
        }
        const semanas = Math.ceil(cargaHorariaTotal / cargaHorariaSemanal);

        const dataFinal = new Date(dataInicio);
        dataFinal.setDate(dataFinal.getDate() + semanas * 7);
        document.getElementById('dataFinal').value = dataFinal.toISOString().split('T')[0];
    }

    </script>
</body>
</html>
