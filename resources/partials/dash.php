<?php

session_start();

require_once 'dash_' . (($_SESSION['user']['is_list_view']) ? 'list' : 'box') . '.php';

