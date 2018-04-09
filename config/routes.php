<?php

$match = [
	'#connectAdminView#' => [
		'getController' => 'getControllerBackend',
		'action' => 'viewAdminConnect',
	],
	'#index.php#' => [
		'getController' => 'getControllerFrontend',
		'action' => 'listPosts',
	],
	'#post&id=([0-9]+)#' => [
		'getController' => 'getControllerFrontend',
		'action' => 'post',
	],
    '#supContent&id=([0-9]+)#' => [
        'getController' => 'getControllerBackend',
        'action' => 'deletePost',
    ],
    '#logout#' => [
        'getController' => 'getControllerBackend',
        'action' => 'logOut',
    ],
    '#postAdminView#' => [
        'getController' => 'getControllerBackend',
        'action' => 'login',
    ],
    '#viewAddPost#' => [
        'getController' => 'getControllerBackend',
        'action' => 'viewAddPost',
    ],
    '#updateContent#' => [
        'getController' => 'getControllerBackend',
        'action' => 'viewPostAdmin',
    ],
    '#updatePost&id=([0-9]+)#' => [
        'getController' => 'getControllerBackend',
        'action' => 'updatePost',
    ],
    '#viewAdmin#' => [
        'getController' => 'getControllerBackend',
        'action' => 'adminView',
    ],
    '#supComment#' => [
        'getController' => 'getControllerBackend',
        'action' => 'deleteComment',
    ],
    '#addPost#' => [
        'getController' => 'getControllerBackend',
        'action' => 'addPost',
    ],
    '#updatePost#' => [
        'getController' => 'getControllerBackend',
        'action' => 'updatePost',
    ],
    '#addComment#' => [
        'getController' => 'getControllerFrontend',
        'action' => 'addComment',
    ],
    '#reportComment&id=([0-9]+)#' => [
        'getController' => 'getControllerBackend',
        'action' => 'reportComment',
    ],
    '#reportCommentVerified&id=([0-9]+)#' => [
        'getController' => 'getControllerBackend',
        'action' => 'reportCommentVerified',
    ],
];