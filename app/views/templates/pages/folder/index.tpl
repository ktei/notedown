<div class="row">
    <div class="large-12 columns">
        <ul class="breadcrumbs">
            <li class="current"><a href="#">Folders</a></li>
            <li><a href="/folder/create"><i class="icon-plus icon-large"></i></a></li>
        </ul>
        <table class="table">
            <tbody>
                {foreach from=$folders item=folder}
                    <tr>
                        <td width=30><i class="icon-folder-close-alt icon-large"></i></td>
                        <td><a href="#">{$folder['name']}</a></td>
                        <td width=200 class="show-for-medium-up">Created on {date("j M Y", strtotime($folder['created_date']))}</td>
                        <td width=55>
                            <a href="#"><i class="icon-edit icon-large"></i></a>
                            <a href="/folder/delete/{$folder['id']}"><i class="icon-trash icon-large"></i></a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
