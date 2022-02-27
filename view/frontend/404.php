<?php ob_start(); ?>


<div class="container">
    <div class="errorBody">
        <div class="errorMainbox">
            <h1>ERROR 404</h1>
            <div class="errorMsg">Maybe this page moved? ..................Got deleted? Is hiding out in quarantine? Never existed in the first place?</div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>