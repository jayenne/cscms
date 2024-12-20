<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Administration Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during administration for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    // GENERIC
    'sort_pages' => 'sort pages',
    // UI BUTTONS
    'btn_upload' => 'Upload a new :1',
    'btn_create' => 'Create a new :1',
    'btn_edit' => 'Edit this :1',
    'btn_update' => 'Save :1',
    'btn_delete' => 'Delete :1',
    'btn_confirm' => 'Yes',
    'btn_cancel' => 'Cancel',
    'btn_publish' => 'Publish this :1',
    'btn_remove' => 'Remove image',
    'btn_insert' => 'Insert :1',
    // UI FORMS
    'form_submit' => 'Submit',
    'form_submit_delete' => 'Delete',
    'form_submit_update' => 'Save changes',

    // GENERIC CRUD ACTION RESPONCES
    'status_message_success' => 'The :1 has been :2.',
    'status_message_denied' => 'You can not :1 this :2.',
    'status_message_error' => 'There was an error :1 this :2.',

    'modal_confirm_delete_header' => 'Delete this :1',
    'modal_confirm_delete_body' => 'Are you sure you really want to delete this :1?',

    // LOGIN
    'login_strapline' => 'Cabot Square Capital',
    'app_copyright' => 'csCMS content management system © '.Carbon\Carbon::now()->format('Y').' '.env('APP_COMPANY'),

    // NAVIGATION
    // TOP NAV
    'nav_top_admin' => 'Admin',
    'nav_top_profile' => 'Profile',

    // Dashboard
    'nav_title_dashboard' => 'Dashboard',
    // Pages
    'nav_title_pages' => 'Pages',
    'nav_title_page_list' => 'Edit pages',
    'nav_list_my_pages' => 'List my pages',
    'nav_create_page' => 'Create a new page',

    // Users
    'nav_title_users' => 'Users',
    'nav_list_all_users' => 'Users',
    'nav_create_user' => 'Create a user',

    // Files
    'nav_title_files' => 'Documents',
    'nav_title_file_list' => 'File list',
    'nav_title_file_details' => 'File details',
    'nav_title_file_manager' => 'File manager',

    // Media
    'nav_title_media' => 'Media',
    'nav_title_media_manager' => 'Image manager',
    'nav_title_media_list' => 'Media list',

    // BLOCK LIBRARY
    'nav_title_developer_theme' => 'Theme',
    'nav_title_developer_blocks_sync' => 'Sync library',
    'nav_title_developer_blocks_rebase' => 'Sync blocks',
    'nav_title_developer_blocks_list' => 'Block library',

    'nav_export_video_views' => 'Video Views',

    // PAGES

    // MESSAGES
    'pages_no_pages' => 'There are no pages to see here',
    'pages_page_order_self_error' => 'You can not set a page to be a child of itself.',

    // PAGES PAGE TITLES
    'pages_pagename_pagelist' => 'Pages overview',
    'pages_pagename_pageedit' => 'Page editor',

    'pages_page_create_title' => 'Create a new page',
    'pages_page_edit_title' => 'Page Editor',
    'files_pagename_filemanager' => 'Media Manager',
    'files_pagename_documentlist' => 'Document List',

    // TABS
    'form_page_tab_content' => 'Content',
    'form_page_tab_display' => 'Display',
    'form_page_tab_seo' => 'SEO',
    'form_page_tab_publishing' => 'Publishing',
    'form_page_tab_developer' => 'Developer',
    // TABLES

    'th_page_title' => 'Page',
    'th_page_url' => 'URL',
    'th_page_author' => 'Author',
    'th_page_published_on' => '',
    'th_page_action' => 'Actions',
    'th_page_published_status' => 'Public Status',

    'th_file_title' => 'File title',
    'th_file_excerpt' => 'Description',
    'th_file_author' => 'Author',

    'th_page_status' => 'Status',

    // FORMS
    'form_page_title' => 'Page title',
    'form_page_url' => 'Slug',
    'form_page_tags' => 'Tags',
    'form_page_content' => 'Content',
    'form_page_excerpt' => 'Excerpt',
    'form_page_title_nav' => 'Menu title',
    'form_page_redirect' => 'Redirect URL',
    'form_page_redirect_target' => 'Target',
    'form_page_redirect_target_blank' => 'Open on a new tab/page',

    'form_page_layout' => 'layout',
    'form_page_add_to_nav' => 'Show in menu',
    'form_page_status' => 'Live?',
    'form_page_publishing' => 'Publishing',
    'form_page_published_on' => 'Publish from',
    'form_page_published_off' => 'Publish until',
    'form_page_published' => 'Publish?',
    'form_page_order' => 'Page reordering',

    'form_page_order_position' => 'Place this page:',
    'form_page_order_relation' => 'Relative to this page:',

    'form_page_order_position_unselected' => 'Default',
    'form_page_order_relation_unselected' => 'None',

    'form_page_order_position_before' => 'Before',
    'form_page_order_position_after' => 'After',
    'form_page_order_position_child' => 'Child of',

    'form_page_block_title_add' => 'Add a new block',
    'form_page_block_select_new' => 'Add a new block',

    // TOOLTIPS
    'tip_page_published_on' => 'Publish from this date: ',
    'tip_page_published_off' => 'Publish until this date: ',
    'tip_page_url' => 'URL: ',
    'tip_page_unpublished' => 'Unpublished',
    'tip_page_live' => 'Show on site once published',
    'tip_page_show_on_nav' => 'Add to main menu',
    'tip_action_preview' => 'Preview',
    'tip_action_edit' => 'Edit',
    'tip_action_revert' => 'Revert changes',
    'tip_action_delete' => 'Delete',
    'tip_action_nonauthorised' => 'You are not authorised to edit this :1',
    'tip_action_nonedit' => 'This :1 is non-editable',
    'tip_action_nondelete' => 'This :1 is non-deletable',
    'tip_action_impersonate' => 'Impersonate',
    'tip_page_status_live' => 'This page is publicly visible',
    'tip_page_status_pending' => 'This page is pending approval',
    'tip_page_status_scheduled' => 'This page goes live in :1',
    'tip_page_status_unpublished' => 'This page has not been set to be published',
    'tip_page_status_undated' => 'Please set a date to publish',
    'tip_page_status_error' => 'There is an error: please notify the developer',

    // PLACEHOLDERS
    'form_page_title_placeholder' => 'Give your page a title:',

    // TIME
    'time_suffix_years' => 'years',
    'time_suffix_months' => 'months',
    'time_suffix_weeks' => 'weeks',
    'time_suffix_days' => 'days',
    'time_suffix_hours' => 'hours',
    'time_suffix_minutes' => 'minutes',

    // BLOCKS
    'pages_block_name' => 'Block Title',
    'pages_block_anchor' => 'Add to sub menu',
    'pages_block_status' => 'Push live',
    'pages_block_badge_edited' => 'Edited',
    'pages_block_badge_moved' => 'Re-ordered',
    'pages_block_badge_resized' => 'Re-sized',

    'block_error_unknown_content_field' => 'unknown content field,please re-sync library',

    // MODALS
    'pages_block_modal_settings_title' => 'Attribute Editor',
    'pages_block_modal_content_title' => 'Content Editor',

    // USERS

    // MESSAGES
    'users_status_message_denied_selfadmin' => 'You can not remove yourself from the admin role. Please ask another administrator to do this.',

    // USER PAGE TITLES
    'users_page_userlist' => 'Users overview',
    'users_page_create_title' => 'Create a user',
    'users_page_edit_title' => 'Edit this user',
    'users_avatar_btn_edit' => 'Upload profile picture',
    // FORMS
    'form_users_username' => 'USername',
    'form_users_forename' => 'Forname',
    'form_users_surname' => 'Surname',
    'form_users_email' => 'Email',
    'form_users_roles' => 'Roles',
    'form_users_password' => 'Password',
    'form_users_password_confirm' => 'Confirm',

    'form_users_biography' => 'Biography',
    'form_users_phone' => 'Phone',
    'form_users_position' => 'Position',
    'form_users_links' => 'Links',
    'form_users_avatar' => 'Avatar',
    'form_users_picture' => 'Picture',

    // TABLES
    'th_users_roles' => 'Roles',
    'th_users_name' => 'User name',
    'th_users_email' => 'Email',
    'th_users_action' => 'Actions',

    // MODALS
    'modal_title_crop_avatar' => 'Profile resize and crop',
    'modal_button_close' => 'Cancel',
    'modal_button_crop' => 'Crop',
    // FILES
    'files_file_create_title' => 'Media Manager',
    'files_no_files' => 'You have no files in storage',
];
