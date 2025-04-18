<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="page-profile-edit-container" id="edit-profile">
    <div class="profile-edit-breadcrumb">
        <ul class="nav-profile-edit">
            <li><a href="/The-Ordinary/account" style="color: gray; margin-right: 10px;">Account</a></li>&rsaquo;
            <li><a style="margin-left: 10px;" href="#edit-profile">Edit Profile</a></li>
        </ul>
    </div>

    <div class="is-divider-login"></div>

    <div class="profile-edit-wrapper">
        <h3>EDIT PROFILE</h3>
        <form method="post">
            <input class="signup-input" type="text" name="name" value="<?= $profile['HoTen']?>" placeholder="Full name" maxlength="20" required >
            <input class="signup-input" type="text" name="phone" value="<?= $profile['SDT']?>" placeholder="Phone" required >
            <input class="signup-input" type="email" name="email" value="<?= $profile['Email']?>" placeholder="Email" required>
            <input class="signup-input" type="email" name="comfirm-email" placeholder="Comfirm Email" required>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <button type="submit" class="btn-profile-edit">SAVE CHANGES</button>
        </form>
    </div>

</div>