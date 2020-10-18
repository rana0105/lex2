<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_code', 'title_en', 'source_en','content_en',
        'note_en','title_cn','source_cn','content_cn','note_cn'
    ];

}
