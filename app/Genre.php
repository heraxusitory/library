<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function getGenres() {
        return self::all();
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
