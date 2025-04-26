<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Pastikan ini true agar request bisa diproses
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255|unique:books,judul',
            'penulis_id' => 'required|string|max:255',
            'total_pages' => 'required|integer|min:100',
            'last_read_page' => 'nullable|integer|min:0',
            'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'total_pages'  => 'required|integer|min:1',
            'status' => 'belum_dibaca',
        ];
    }
}
