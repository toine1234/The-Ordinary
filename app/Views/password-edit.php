<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="page-password-edit-container" id="edit-password">
    <div class="password-edit-breadcrumb">
        <ul class="nav-password-edit">
            <li><a href="/The-Ordinary/account" style="color: gray; margin-right: 10px;">Account</a></li>&rsaquo;
            <li><a style="margin-left: 10px;" href="#edit-profile">Change Password</a></li>
        </ul>
    </div>

    <div class="is-divider-login"></div>

    <div class="password-edit-wrapper">
        <h3>CHANGE PASSWORD</h3>
        <form method="post">
            <div class="input-group">
                <input type="password" name="current-password" placeholder="Current Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="input-group">
                <input type="password" name="new-password" placeholder="New Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="input-group">
                <input type="password" name="confirm-new-password" placeholder="Confirm New Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <button type="submit" class="btn-password-edit">SAVE CHANGES</button>
        </form>
    </div>

</div>