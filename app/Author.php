<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function getAuthors()
    {
        return $this->query()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getNameById($id) {
        return (isset($this->getById($id)->name)) ? $this->getById($id)->name : false;
    }

    public function getById($id) {
        return self::query()
            ->where('id', $id)
            ->first();
    }
}
