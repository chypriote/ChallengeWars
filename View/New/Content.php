<div class="widget-container" style="margin-top: 40px">
    <div>
        <div class="page-heading">
            <div class="page-heading-breadcrumbs">
                <a href="<?php echo $_SITE_INDEX_; ?>challenge">Challenge</a>
                <i class="fa fa-angle-right"></i>
                <a href="<?php echo $_SITE_INDEX_; ?>challenge/new">New</a>
            </div>
        </div>
        <form method="post" action="" id="formNew">
            <div class="form-rows">
                <div class="form-row">
                    <div class="form-heading">
                        <div class="form-heading-number">1.</div>
                        <div class="form-heading-text">Challenge title</div>
                    </div>
                    <div class="form-row-indent">
                        <input class="form-input-medium" name="inputName" type="text" required>
                    </div>
                </div>
                <div class="form-row form-row--new-challenge-type">
                    <div class="form-heading">
                        <div class="form-heading-number">2.</div>
                        <div class="form-heading-text">Type of Challenge</div>
                    </div>
                    <div class="form-row-indent">
                        <input type="hidden" id="inputType" name="inputType" value="">
                        <div data-checkbox-value="creep" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Creep
                            <div class="form-input-description form-type is-hidden">Creep challenge description.</div>
                        </div>
                        <div data-checkbox-value="victory" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Victory
                            <div class="form-input-description form-type is-hidden">Victory challenge description.</div>
                        </div>
                        <div data-checkbox-value="kill" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Kills
                            <div class="form-input-description form-type is-hidden">Kill challenge description.</div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-heading">
                        <div class="form-heading-number">2.</div>
                        <div class="form-heading-text">Champion</div>
                    </div>
                    <div class="form-row-indent">
                        <div class="form-time-container">
                            <select class="form-input-small" id="inputChampion" name="inputChampion">
							    <option value="0"> All Champions </option>
                        <?php for ($i = 0; !empty($listChampions[1][$i]); $i++) {
                               echo "<option value=".$listChampions[0][$i].">".$listChampions[1][$i]."</option>";
                           }
						   ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-heading">
                        <div class="form-heading-number">3.</div>
                        <div class="form-heading-text">Time range</div>
                    </div>
                    <div class="form-row-indent">
                        <div class="form-time-container">
                            This challenge will end on &nbsp;<strong><?php echo date("l j F", strtotime("+7 days")); ?></strong>.
                        </div>
                        <div class="form-input-description">Challenges end a week after their creation.</div>
                    </div>
                </div>
                <?php /*
                <div class="form-row form-row--new-challenge-who">
                    <div class="form-heading">
                        <div class="form-heading-number">3.</div>
                        <div class="form-heading-text">Who Can Enter</div>
                    </div>
                    <div class="form-row-indent">
                        <input type="hidden" id="new-who" name="type" value="">
                        <div data-checkbox-value="everyone" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Everyone
                        </div>
                        <div data-checkbox-value="friends" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Friends
                        </div>
                        <div data-checkbox-value="custom" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Groups
                        </div>
                        <div class="form-groups is-hidden">
                            <div data-group-id="13146" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/06/0629ffe7fc7d88011c5b9705625bfe3791fe0afe_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">Assassin’s Creed Unity</div>
                                <div class="form-group-members">Members: 101,908</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="3286" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fe39a17ad0bb3834d0afc5b6ac8190bbe45c0924_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">Back Log Gaming</div>
                                <div class="form-group-members">Members: 396</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="5446" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/83/83c929d4965963f6e0bc17969a2599e7829ac23d_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">FINAL FANTASY XIII</div>
                                <div class="form-group-members">Members: 51,279</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="16696" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/0a/0a8a105b187f64a01c58acc82a22bc14b40b4920_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">Football Manager 2015</div>
                                <div class="form-group-members">Members: 36,884</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="25217" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/64/646297e1b481ae0e57c4597452fb45ff9ce16989_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">Frozen Synapse</div>
                                <div class="form-group-members">Members: 3,582</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="7529" class="form-group form-group--steam">
                            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/76/76e95a57a669c30984c9dcd32879536746d75de9_medium.jpg);" class="global-image-inner-wrap"></div>
                            </div>
                            <div class="form-group-details">
                                <div class="form-group-name">Gauntlet™ </div>
                                <div class="form-group-members">Members: 52,711</div>
                            </div>
                            <i class="form-group-uncheck fa fa-square-o"></i>
                            <i class="form-group-check fa fa-check-square"></i>
                        </div>
                            <div data-group-id="16696" class="form-group form-group--steam">
                                <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                    <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/0a/0a8a105b187f64a01c58acc82a22bc14b40b4920_medium.jpg);" class="global-image-inner-wrap"></div>
                                </div>
                                <div class="form-group-details">
                                    <div class="form-group-name">Football Manager 2015</div>
                                    <div class="form-group-members">Members: 36,884</div>
                                </div>
                                <i class="form-group-uncheck fa fa-square-o"></i>
                                <i class="form-group-check fa fa-check-square"></i>
                            </div>
                            <div data-group-id="25217" class="form-group form-group--steam">
                                <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                    <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/64/646297e1b481ae0e57c4597452fb45ff9ce16989_medium.jpg);" class="global-image-inner-wrap"></div>
                                </div>
                                <div class="form-group-details">
                                    <div class="form-group-name">Frozen Synapse</div>
                                    <div class="form-group-members">Members: 3,582</div>
                                </div>
                                <i class="form-group-uncheck fa fa-square-o"></i>
                                <i class="form-group-check fa fa-check-square"></i>
                            </div>
                            <div data-group-id="7529" class="form-group form-group--steam">
                                <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                                    <div style="background-image:url(cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/76/76e95a57a669c30984c9dcd32879536746d75de9_medium.jpg);" class="global-image-inner-wrap"></div>
                                </div>
                                <div class="form-group-details">
                                    <div class="form-group-name">Gauntlet™ </div>
                                    <div class="form-group-members">Members: 52,711</div>
                                </div>
                                <i class="form-group-uncheck fa fa-square-o"></i>
                                <i class="form-group-check fa fa-check-square"></i>
                            </div>
                        </div>
                        <div class="form-input-description">Select who will be allowed to join your challenge.</div>
                    </div>
                </div>
                */ ?>
                <div class="form-row form-row--new-challenge-level">
                    <div class="form-heading">
                        <div class="form-heading-number">4.</div>
                        <div class="form-heading-text">Level requirement</div>
                    </div>
                    <div class="form-row-indent">
                        <input type="hidden" id="inputLevel" name="inputLevel" value="starter">
                        <div data-checkbox-value="starter" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Starter
                        </div>
                        <div data-checkbox-value="advanced" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Advanced
                        </div>
                        <div class="form-input-description">Advanced challenges will be reviewed by an admin.</div>
                    </div>
                </div>
                <div class="form-row form-row--new-challenge-level">
                    <div class="form-heading">
                        <div class="form-heading-number">5.</div>
                        <div class="form-heading-text">Availability</div>
                    </div>
                    <div class="form-row-indent">
                        <input type="hidden" id="inputLevel" name="inputOpen" value="public">
                        <div data-checkbox-value="public" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Public
                        </div>
                        <div data-checkbox-value="private" class="form-checkbox is-disabled">
                            <i class="form-checkbox-default fa fa-circle-o"></i><i class="form-checkbox-hover fa fa-circle"></i><i class="form-checkbox-selected fa fa-check-circle"></i> Private
                        </div>
                        <div class="form-input-description">Private challenges can only be seen by users in your friend list.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-heading">
                        <div class="form-heading-number">6.</div>
                        <div class="form-heading-text">Description</div>
                        <div class="form-heading-optional">(Optional)</div>
                    </div>
                    <div class="form-row-indent">
                        <textarea name="inputDescription"></textarea>
                    </div>
                </div>
                <button type="submit" class="form-submit-button pull-right" name="do-new">
                    <i class="fa fa-arrow-circle-right"></i> Submit Challenge
                </button>
            </div>
        </form>
    </div>
</div>