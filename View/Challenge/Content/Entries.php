<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="/challenge.php?id=<?php echo $thisChallenge->getId(); ?>&tab=entries">Entries</a>
    </div>
</div>
<div class="table">
<div class="table-heading">
    <div class="table-column--width-fill">User</div>
    <div class="table-column--width-small text-center">Date</div>
</div>
<div class="table-rows">
<?php for ($i = 0; $i != $_LIST_NB && !empty($listEntry[$i]); $i++) {
    $user = $UserManager->get($listEntry[$i]->getIdUser());?>
    <div class="table-row-outer-wrap">
        <div class="table-row-inner-wrap">
            <div>
                <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="user.php?id=<?php echo $user->getId(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $user->getAvatar(); ?>);"></div></a></div>
            <div class="table-column--width-fill">
                <a href="user.php?id=<?php echo $user->getId(); ?>" class="table-column-heading"><?php echo $user->getUsername(); ?></a></div>
            <div class="table-column--width-small text-center"><span title="<?php echo $listEntry[$i]->getDateEntry(); ?>">0 seconds ago</span></div>
        </div>
    </div>
<?php } ?>
</div>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong>1</strong> to <strong></strong> of <strong>11</strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>