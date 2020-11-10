<div>
    <h1>Meu menu muito maneiro</h1>
    <br>
    <br>
    <form method="POST" action='options.php'>

        <?php
            settings_fields('configs-exemplo');
            do_settings_sections('configs-exemplo');
        ?>
        <label for="token_API">Token API</label>
        <input type="text" id='token_API' name="api-token" value="<?php echo get_option('api-token');?>">

        <label for="url_API">URL API</label>
        <input type="text" id='url_API' name="api-url" value="<?php echo get_option('api-url');?>">

        <?php submit_button(); ?>
    </form>
</div>
