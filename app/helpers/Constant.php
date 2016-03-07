<?php
//menu category_parent
define('MENU', 1);
//content category_parent
define('CONTENT', 2);
//Relation parent
define('MENU_RELATION', '1');
define('CONTENT_RELATION', '2');
define('TYPE_RELATION', '3');

define('CATEGORYPARENT', 'CategoryParent');
define('TYPE', 'Type');
define('CONTENTREATION', 'Content');
define('MENURELATION', 'Menu');
//End Relation
define('CONTENT_SEGMENT', 'content');
//permission role
define('ADMIN', 1);
define('EDITOR', 2);
define('SEO', 3);
define('REPORTER', 4);

//game of parent category only
define('GAME_OF_PARENT', 0);
//pagination manager admin
define('PAGINATE', 20);
//pagination frontend
define('FRONENDPAGINATE', 2);
//url upload img
define('UPLOADIMG', '/images');
//url upload avatar game
define('UPLOAD_GAME_AVATAR', '/images/game_avatar');
//url upload games
define('UPLOAD_GAMEZIP', '/games-zip');
//define('UPLOAD_GAME', '/gametest');
define('UPLOAD_GAME', '/games');
define('UPLOAD_FLASH', '/games-flash');
define('UPLOAD_GAMEOFFLINE', '/games-offline');
//url upload news
define('UPLOAD_NEWS', '/news');
//url for new slides
define('UPLOAD_NEWS_SLIDE', '/slides/news');
//folder upload image facebook
define('FOLDER_SEO_GAME', 'fb_game');
define('FOLDER_SEO_GAMETYPE', 'fb_gametype');
define('FOLDER_SEO_PARENT', 'fb_parent');
define('FOLDER_SEO_NEWS', 'fb_news');
define('FOLDER_SEO', 'seo');

//device
define('MOBILE', 1);
define('COMPUTER', 2);
//if upload file
define('IS_UPLOAD_FILE', 1);
define('IS_UPLOAD_UNIQUE', 1);
//status admin
define('INACTIVE', 0);
define('ACTIVE', 1);
//status game:
define('DISABLED', 0);
define('ENABLED', 1);
//saveScore
define('SAVESCORE', 1);
define('UNSAVESCORE', 2);
//category game
define('GAMEFLASH', 7);
define('GAMEHTML5', 2);
define('GAMEOFFLINE', 3);
//history action
define('CREATE', 'Create');
define('EDIT', 'Edit');
define('REMOVE', 'Remove');
define('LOGIN', 'Login');
//define device
define('SMART_DEVICE', 'Smart device');
define('COMPUTER_DEVICE', 'Computer');
//define advertise position
define('HEADER', 1);
define('Footer', 2);
define('CHILD_PAGE', 3);
define('CHILD_PAGE_RELATION', 4);
define('AD_NEW', 5);
//advertise url image
define('UPLOAD_ADVERTISE', '/images/advertise');
define('BOTTOM', 'bottom');
//arrange parent
define('HOT', 1);
define('GAME_PLAY', 2);
define('GAME_VOTE', 3);
define('GAME_VIEW', 4);
define('GAME_DOWNLOAD', 5);
define('GAME_NEWEST', 6);
//type policy
define('POLICY', 1);
define('ABOUT_POLICY', 2);
//define paging frontend
define('PAGINATE_BOXGAME', 12);
define('PAGINATE_MOBILE_BOXGAME', 9);
define('PAGINATE_LISTGAME', 12);
//status user
define('ACTIVEUSER', 'Kích hoạt');
define('INACTIVEUSER', 'Chưa kích hoạt');
define('TYPESYSTEM', 'Hệ thống');
define('TYPEFACEBOOK', 'Facebook');
define('TYPEGOOGLE', 'Google');
//define slide type name
define('SLIDE_TYPE_NAME', 'Kiểu slide chạy ngang');
//define limited box game related
define('GAME_RELATED_MOBILE', 6);
define('GAME_RELATED_WEB', 12);
define('UPLOAD_IMAGE_SLIDE', '/slide');
define('PAGINATE_SLIDE', 10);
//define seo model name:
define('SEO_SCRIPT', 'Seo_Script');
define('SEO_META', 'Seo_Meta');
//define check time count download
define('TIMELIMITED', 60);
//define size cut off text descript
define('SIZETEXT', '200');
//facebook
define('APP_ID', '1008308405878197');
define('APP_SECRET', 'a758055e09aef79f81eb7dd4f4588be7');
define('APP_ADMIN', '1088553914497350');
//define limit scores
define('GAMESCORE_LIMITED', 5);
//defune page comment fron-end
define('PAGE_COMMENT', 5);
//define google app
define('GOOGLE_REDIRECT_URL', 'http://game.kienthuc.net.vn/login_google');
define('GOOGLE_CLIENT_SECRET', '_qQN3_WpbX-RlWx_qt0zZUaB');
define('GOOGLE_CLIENT_ID', '1060926121483-98np51otttt7frrl8nda3mjtq5cfuk78.apps.googleusercontent.com');
define('TEXTLENGH', 30);
//define total game if count = 0
define('NO_GAME', 0);
//define message comment
define('COMMENT_MESSAGE', 'Bạn đã comment thành công, xin chờ kiểm duyệt');
define('COMMENT_NO_MESSAGE', 'Bạn chưa nhập nội dung');
define('TEXTLENGH_DESCRIPTION', 300);
define('TEXTLENGH_DESCRIPTION_CODE', 120);
define('PAGINATE_RELATED', 10);
define('PAGINATE_MOBILE', 12);
//image avatar
define('UPLOAD_USER_AVATAR', '/user_avatar');
//error type
define('ERROR_TYPE_404', 1);
define('ERROR_TYPE_MISSING', 2);
//define cache time
define('CACHETIME', 2);
//define game top
define('GAMETOP', 30);
define('GAMETOP_LIMITED', 5);
//define game scale
define('GAME_VERTICAL', 1);
define('GAME_HORIZONTAL', 2);

define('CHOINHANH', 'choinhanh.vn');

define('SEARCHLIMIT', 5);
define('SEARCH_PAGINATE', 5);
define('HOME_PAGINATE', 2);
define('HOME_MOBILE_PAGINATE', 2);

define('MINI_GAME_TITLE', 'Mini Game');
define('MINI_GAME_SLUG', 'mini-game');

define('LIMIT_HIGHTLIGHT_PC', 3);
define('LIMIT_HIGHTLIGHT_MOBILE', 1);

// cuongnt add statust news 01/03/2016
define('APPROVE', 1);
define('NO_APPROVE', 2);
define('REJECT', 6);
define('BACK', 3);
define('SEND', 4);
define('SCRATCH_PAPER', 5);
//END
//tin đáng đọc: status = 1
define('NEW_HOT', 1);
//tin liên quan: status = 2
define('NEW_RELATE', 2);
//define mobile
define('IS_MOBILE', 1);
define('IS_NOT_MOBILE', 0);
//define home
define('IS_HOME', 1);
define('IS_NOT_HOME', 0);

define('SAPO_TEXT', '(Game.kienthuc.net.vn) - ');

//define position ad - PC
//bar.blade.php
define('POSITION_HEADER', 1);
//index.blade.php + listNews.blade.php + showNews.blade.php + showType.blade.php + slideNews.blade.php
define('POSITION_RIGHT', 2);
//gamebox.blade.php
define('POSITION_NEWS_GAMES', 3);
//gamebox.blade.php
define('POSITION_GAMES_GAMES', 4);
//gameboxmini.blade.php
define('POSITION_GAMES_MINIGAME', 5);
//default.blade.php
define('POSITION_STICKY_LEFT', 6);
//default.blade.php
define('POSITION_STICKY_RIGHT', 7);
//showNews.blade.php
define('POSITION_SAPO', 8);
//showNews.blade.php
define('POSITION_NEWS_DETAIL_LEFT', 9);
//onlineweb.blade.php
define('POSITION_PLAYGAME_SHARE', 10);
//onlineweb.blade.php
define('POSITION_INFO', 11);
//onlineweb.blade.php
define('POSITION_INFO_RIGHT', 12);
//related.blade.php
define('POSITION_GAME_RELATED', 13);

//define position ad - MOBILE
//bar.blade.php
define('POSITION_MOBILE_HEADER', 14);
//gamebox.blade.php
define('POSITION_MOBILE_NEWS_GAMES', 15);
//gamebox.blade.php
define('POSITION_MOBILE_GAMES_GAMES', 16);
//gameboxmini.blade.php
define('POSITION_MOBILE_GAMES_MINIGAME', 17);
//gameboxmini.blade.php
define('POSITION_MOBILE_GAMES_TYPE', 18);
//footer.blade.php
define('POSITION_MOBILE_FOOTER', 19);
//showNews.blade.php
define('POSITION_MOBILE_SAPO', 20);
//showNews.blade.php
define('POSITION_MOBILE_NEWS_RELATED', 21);
//showNews.blade.php
define('POSITION_MOBILE_NEWS_DETAIL_LEFT', 22);
//onlinemobile.blade.php
define('POSITION_MOBILE_INFO_TEXT', 23);
//onlinemobile.blade.php
define('POSITION_MOBILE_INFO_COMMENT', 24);
//related.blade.php
define('POSITION_MOBILE_GAME_RELATED', 25);
