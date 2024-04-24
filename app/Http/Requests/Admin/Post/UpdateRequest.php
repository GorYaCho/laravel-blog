<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'This field must be filled',
            'title.string' => 'This field must be in string type',
            'preview_image.required' => 'This field must be filled',
            'preview_image.file' => 'You need to choose file type',
            'main_image.required' => 'This field must be filled',
            'main_image.file' => 'You need to choose file type',
            'category_id.required' => 'This field must be filled',
            'category_id.integer' => 'This field must be in integer type',
            'category_id.exists' => 'This category does not exist',
            'tag_ids.array' => 'This field requires an array',
        ];
    }
}
