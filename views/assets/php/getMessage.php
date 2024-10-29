<?php
function getMessage()
{
    if (isset($_SESSION['redirect_data']['message'])) {
        return $_SESSION['redirect_data']['message'];
    }
    return null;
}


function getForm()
{

    if (isset($_SESSION['redirect_data']['form'])) {
        return $_SESSION['redirect_data']['form'];
    }
    return null;

}

function removeMessage()
{
    unset($_SESSION['redirect_data']['message']);
}


function showMessage(): void
{
    if (isset($_SESSION['redirect_data']['message'])) {

        if (getMessage()): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars(getMessage()) ?>
            </div>
            <?php removeMessage(); ?>
        <?php endif;

    }

}