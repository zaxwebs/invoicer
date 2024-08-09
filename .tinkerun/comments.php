<?php

use App\Models\Comment;

Comment::limit(4)->get();