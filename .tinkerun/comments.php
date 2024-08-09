<?php

use App\Models\Comment;

Comment::limit(4)->with(['invoice.customer'])->get();