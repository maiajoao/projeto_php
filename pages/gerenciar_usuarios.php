<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_usuarios = "SELECT * FROM usuarios";
$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;

?>
<div class="page-wrapper">
    <div class="content-box">
        <h4>Gerenciar Usuários</h4>
        <span>Administre os usuários cadastrados no sistema</span>
        <h5>Todos os Usuários</h5>
        <span><a href="index.php?p=cadastrar_usuario">Clique aqui</a> para cadastrar um usuário</span>
        <form action="" method="get">
            <input type="hidden" name="p" value="gerenciar_usuarios">
            <input name="search" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
            <button type="submit">Pesquisar</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET['search'])) {
                if($num_usuarios == 0) { ?>
                <tr>
                    <td colspan="5">Nenhum usuário foi cadastrado</td>
                </tr>
            <?php } else {

                while ($usuario = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $usuario['id']; ?></th>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($usuario['data_cadastro'])); ?></td>
                        <td><a href="index.php?p=editar_usuario&id=<?php echo $usuario['id']; ?>">editar</a> | <a href="index.php?p=deletar_usuario&id=<?php echo $usuario['id']; ?>">deletar</a></td>
                    </tr>
                    <?php
                }
            }
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['search']);
            $sql_code = "SELECT * FROM usuarios
                        WHERE nome LIKE '%$pesquisa%' 
                        OR email LIKE '%$pesquisa%'
                        OR id LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);
    
            if ($sql_query->num_rows == 0) {
                ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado...</td>
                </tr>
                <?php
            } else {
                while($usuario = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $usuario['id']; ?></th>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($usuario['data_cadastro'])); ?></td>
                        <td><a href="index.php?p=editar_usuario&id=<?php echo $usuario['id']; ?>">editar</a> | <a href="index.php?p=deletar_usuario&id=<?php echo $usuario['id']; ?>">deletar</a></td>
                    </tr>
                    <?php
                }
            }
        }
            ?>
            </tbody>
        </table>
    </div>
</div>