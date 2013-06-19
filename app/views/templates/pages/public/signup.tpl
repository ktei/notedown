<div class="row">
    <div class="large-8 large-centered columns">
        <h5>Create free personal account</h5>
        <form action="/public/signup" method="POST">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username" value="{$model->username}"
                           placeholder="Pick up a username"/>
                    {field_error model=$model name='username'}
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="email" name="email" value="{$model->email}"
                           placeholder="Provide a valid email"/>
                    {field_error model=$model name='email'}
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password" value="{$model->password}"
                           placeholder="Create a password"/>
                    {field_error model=$model name='password'}
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <input class="button" type="submit" value="Sign up"/>
                    <a href="/" class="button secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>