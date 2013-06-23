<form {if $action == 'create'}action="/folder/create"{else}action="/folder/edit/{$model->folderId}"{/if} method="POST">
    <div class="row">
        <div class="large-12 columns">
            <input type="text" placeholder="Give folder a name" name="name" value="{$model->name}">
            {field_error model=$model name='name'}
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button" {if $action == 'create'}value="Create"{else}value="Save changes"{/if}/>
            <a href="/folder" class="button secondary">Cancel</a>
        </div>
    </div>
</form>