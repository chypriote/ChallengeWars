<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:35
 */

    $_BDD_SERVER_ = "";
    $_BDD_NAME_ = "";
    $_BDD_USER_ = "";
    $_BDD_PASS_ = "";
    $_SITE_INDEX_ = "/";
    $_ALLOW_FRIENDS_ = true;
    $_DEBUG_ = false;


    $_TABLE_CHALLENGES_ = "cw_challenges";
    $_TABLE_COMMENTS_   = "cw_challenges_comments";
    $_TABLE_ENTRIES_   = "cw_challenges_entries";
    $_TABLE_USERS_      = "cw_users";
    $_TABLE_USERS_STATS_ = "cw_users_stats";
    $_TABLE_USERS_FRIENDS_ = "cw_users_friends";
    $_TABLE_SUMMONERS_ = "cw_summoners";
    $_TABLE_SUMMONERS_HISTORY_ = "cw_summoners_history";
    $_TABLE_RANKINGS_ = "cw_challenges_rankings";
    $_TABLE_CHAMPIONS_ = "cw_lol_champions";
    $_TABLE_MESSAGES_ = "cw_users_messages";

    
    $_LINK_CHALLENGE_ = $_SITE_INDEX_ . "challenge";
    $_LINK_NEW_ = $_LINK_CHALLENGE_ . "/new";
    $_LINK_ENTRIES_ =  "entries";
    $_LINK_RANKING_ = "rankings";
    $_LINK_COMMENT_ = "comments";
    $_LINK_HISTORY_ = "history";
    
    $_LINK_USER_ =  $_SITE_INDEX_ . "user";
    $_LINK_CREATED_ =  "created";
    $_LINK_ENTERED_ =  "entered";
    $_LINK_WON_ =  "won";
    $_LINK_FRIENDS_ =  "friends";
    $_LINK_UCOMMENT_ = "comments";
    
    $_LINK_ABOUT_ = $_SITE_INDEX_ . "about";
    $_LINK_FAQ_ = "faq";
    $_LINK_USERS_ = "users";
    $_LINK_ROLES_ = "roles";
    $_LINK_TERMS_ = "terms";
    
    $_LINK_LOGIN_ = $_SITE_INDEX_ . "login";
    $_LINK_LOGOUT_ = $_SITE_INDEX_ . "logout";

    $_LINK_ACCOUNT_ = $_SITE_INDEX_ . "account";
    $_LINK_SYNC_ = "sync";
    $_LINK_INBOX_ = "inbox";
    
    //setlocale(LC_TIME, "fr_FR");