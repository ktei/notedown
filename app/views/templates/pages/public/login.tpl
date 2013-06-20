<div class="row">
    <div class="large-8 large-centered columns">
        <h5>Welcome back</h5>
        {show_errors model=$model name='login' title='Login failed'}
        <form action="/public/login" method="POST">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username" value="{$model->username}"
                           placeholder="Email or username"/>
                    {field_error model=$model name='username'}
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password" value="{$model->password}"
                           placeholder="Password"/>
                    {field_error model=$model name='password'}
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input class="button" type="submit" value="Log in"/>
                    <a href="/" class="button secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>