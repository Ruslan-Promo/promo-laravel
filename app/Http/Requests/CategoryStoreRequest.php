<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole(User::ROLE_ADMIN) || $this->user()->can('create category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:categories', 'max:255'],
            'slug' => ['unique:categories', 'max:255'],
            'description' => ['required'],
            'price_year' => ['required', 'numeric'],
        ];
    }
}
