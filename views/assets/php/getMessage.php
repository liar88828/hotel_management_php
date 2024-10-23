<?php
function getMessage()
{
    return $_SESSION['redirect_data']['message'];
}

function removeMessage()
{
    unset($_SESSION['redirect_data']['message']);
}

function showMessage()
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