<div>
    <h1>CRUDÃO</h1>
    <br>
    <br>
    <form method="POST">
        <table border=1px>
            <tr>
                <td>Nome</td>
                <td>ZipZop</td>
                <td>Ações</td>
            </tr>
            <?php
                foreach ($contatos as $key => $value){
                    echo "<tr>
                            <td>{$value -> nome}</td>
                            <td>{$value -> whatsapp}</td>
                            <td><a href='?page={$_GET['page']}&apagar={$value -> id}'>Delete</a></td>
                        </tr>";
                }
            ?>
            <tr>
                <td><input type="text" name="nome" placeholder="Nome"></td>
                <td><input type="text" name="whatsapp" placeholder="Whatsapp"></td>
                <td><?php submit_button('Gravar'); ?></td>
            </tr>
        </table>
    </form>
</div>
