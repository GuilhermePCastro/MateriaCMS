<div>
    <h1>CRUDÃO</h1>
    <br>
    <br>

    <?php
        if(isset($msg)){
            echo $msg;
        }
        if(isset($erro)){
            echo $erro;
        }
    ?>
    
    <form method="POST">
        <table border=1px>
            <tr>
                <td>Nome</td>
                <td>ZipZop</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" name="nome" value="<?php echo $reg[0]->nome; ?>" placeholder="Nome"></td>
                <td><input type="text" name="whatsapp" value="<?php echo $reg[0]->whatsapp; ?>" placeholder="Whatsapp"></td>
                <td><?php submit_button('Alterar'); ?></td>
            </tr>
        </table>
        <input type="hidden" value="<?php echo $reg[0]->id; ?>" name="id">
        <input type="hidden" value="alterar" name="alterar">
    </form>
</div>
